<?php
namespace Deployer;

import('recipe/laravel.php');


// Config
set('application', 'rishan.dev');
set('repository', 'git@github.com:rishan-tk/rishan.dev-php-Laravel-.git');
set('git_tty', true);
set('keep_releases', 3);
add('shared_files', ['database/database.sqlite']);

// Hosts
host('rishan.dev')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '/var/www/laravel');

// Tasks
desc('Install frontend dependencies and build assets');
task('npm:build', function () {
    within('{{release_path}}', function () {
        run('NODE_ENV=production npm ci --no-progress --silent');
        run('npm run build');
    });
});

// Run once if needed
desc('Create and fix permissions for SQLite DB');
task('fix:sqlite', function () {
    run('mkdir -p {{deploy_path}}/shared/database');
    run('if [ ! -f {{deploy_path}}/shared/database/database.sqlite ]; then touch {{deploy_path}}/shared/database/database.sqlite; fi');
    run('chmod 664 {{deploy_path}}/shared/database/database.sqlite');
    run('chmod 775 {{deploy_path}}/shared/database');
    run('chown -R www-data:www-data {{deploy_path}}/shared/database');
});

desc('Clear Laravel caches (excludes app cache)');
task('deploy:artisan:clear', [
    'artisan:config:clear',
    'artisan:view:clear',
    'artisan:route:clear'
]);

desc('Clear full application cache (optional)');
task('artisan:cache:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan cache:clear');
});

// Optimise Laravel caches
desc('Optimize Laravel');
task('deploy:artisan:optimize', [
    'artisan:optimize',
    'artisan:storage:link',
]);

// Hooks
after('deploy:vendors', 'npm:build');
after('npm:build', 'deploy:artisan:clear');
after('deploy:artisan:clear', 'deploy:artisan:optimize');
after('deploy:artisan:optimize', 'artisan:migrate');
after('deploy:failed', 'deploy:unlock');


// Laravel specific settings
set('laravel_version', function () {
    return run('{{bin/php}} {{release_path}}/artisan --version');
});
