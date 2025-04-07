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

desc('Create and fix permissions for SQLite DB');
task('fix:sqlite', function () {
    run('mkdir -p {{deploy_path}}/shared/database');
    run('touch {{deploy_path}}/shared/database/database.sqlite');
    run('sudo chown www-data:www-data {{deploy_path}}/shared/database/database.sqlite');
    run('sudo chmod 664 {{deploy_path}}/shared/database/database.sqlite');
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
after('npm:build', 'fix:sqlite');                   
after('fix:sqlite', 'deploy:artisan:clear'); 
after('deploy:artisan:clear', 'deploy:artisan:optimize');     
after('deploy:artisan:optimize', 'artisan:migrate');          
after('artisan:migrate', 'deploy:symlink');                      
after('deploy:failed', 'deploy:unlock');                       


// Laravel specific settings
set('laravel_version', function () {
    return run('{{bin/php}} {{release_path}}/artisan --version');
});
