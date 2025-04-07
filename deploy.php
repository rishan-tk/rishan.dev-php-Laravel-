<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

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
task('npm:ci:prod', function () {
    within('{{release_path}}', function () {
        run('NODE_ENV=production {{bin/npm}} ci {{npm_flags}}');
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
// 1. Clear Laravel caches early
before('artisan:optimize', 'deploy:artisan:clear');

// 2. Run database migrations after clearing caches (before symlink)
after('deploy:artisan:clear', 'artisan:migrate');

// 3. Build frontend assets after installing vendors
after('deploy:vendors', 'npm:build');

// 4. Fix SQLite file + dir permissions after optimization
after('deploy:artisan:optimize', 'fix:sqlite');

// 5. Unlock deploy if it fails
after('deploy:failed', 'deploy:unlock');

// Optional: enable maintenance mode during symlink switch
before('deploy:symlink', 'artisan:down');
after('deploy:symlink', 'artisan:up');


// Laravel specific settings
set('laravel_version', function () {
    return run('{{bin/php}} {{release_path}}/artisan --version');
});
