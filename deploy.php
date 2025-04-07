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
task('npm:build', function () {
    within('{{release_path}}', function () {
        run('NODE_ENV=production npm ci --no-progress --silent');
        run('npm run build');
    });
});

desc('Create and fix permissions for SQLite DB');
task('fix:sqlite', function () {
    run('mkdir -p {{release_path}}/database');
    run('touch {{release_path}}/database/database.sqlite');
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
after('deploy:vendors', 'npm:build');                         // Build frontend assets
after('npm:build', 'deploy:artisan:clear');                   // Clear Laravel caches BEFORE optimizing
after('deploy:artisan:clear', 'deploy:artisan:optimize');     // Compile Laravel caches (config, routes, views)
after('deploy:artisan:optimize', 'artisan:migrate');          // Run DB migrations AFTER Laravel is bootstrapped
after('artisan:migrate', 'fix:sqlite');                       // Set SQLite permissions
after('fix:sqlite', 'deploy:symlink');                        // Switch to new release LAST
after('deploy:failed', 'deploy:unlock');                      // Clean up lock on failure  


// Laravel specific settings
set('laravel_version', function () {
    return run('{{bin/php}} {{release_path}}/artisan --version');
});
