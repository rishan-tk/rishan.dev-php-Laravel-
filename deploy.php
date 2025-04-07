<?php
namespace Deployer;

import('recipe/laravel.php');

// Config
set('application', 'rishan.dev');
set('repository', 'git@github.com:rishan-tk/rishan.dev-php-Laravel-.git');
set('git_tty', true);
set('keep_releases', 3);

// Hosts
host('rishan.dev')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '/var/www/laravel');

// Tasks
desc('Install frontend dependencies and build assets');
task('debug:release_path', function () {
    writeln('Release path: ' . get('release_path'));
});
task('npm:build', function () {
    within('{{release_path}}', function () {
        run('NODE_ENV=production npm ci');
        run('npm run build');
    });
});

desc('Fix SQLite permissions');
task('fix:sqlite', function () {
    run('sudo chown www-data:www-data {{release_path}}/database/database.sqlite');
    run('sudo chmod 664 {{release_path}}/database/database.sqlite');
    run('sudo chown www-data:www-data {{release_path}}/database');
    run('sudo chmod 775 {{release_path}}/database');
});

desc('Clear Laravel caches');
task('deploy:artisan:clear', [
    'artisan:cache:clear',
    'artisan:config:clear',
    'artisan:view:clear',
    'artisan:route:clear'
]);

// Optimise caches
desc('Optimize Laravel');
task('deploy:artisan:optimize', [
    'artisan:optimize',
    'artisan:storage:link',
]);

// Hooks
after('deploy:vendors', 'npm:build');
before('artisan:optimize', 'deploy:artisan:clear');
after('deploy:symlink', 'artisan:migrate');
after('deploy:artisan:optimize', 'fix:sqlite');
after('deploy:failed', 'deploy:unlock');


// Laravel specific settings
set('laravel_version', function () {
    return run('{{bin/php}} {{release_path}}/artisan --version');
});
