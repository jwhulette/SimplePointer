<?php

namespace Deployer;

require 'recipe/laravel.php';

// Releases to keep
set('keep_releases', 3);

// Branch to master
set('branch', 'master');

// Project name
set('application', 'simplepointer.com');

// Project repository
set('repository', 'https://github.com/jwhulette/SimplePointer');

// Allocate tty for git clone.
set('git_tty', true);

// Speedup the native ssh client.
set('ssh_multiplexing', true);

// Shared files/dirs between deploys
set('shared_files', [
    '.env',
    'storage/database.sqlite',
]);

// Laravel shared dirs
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'storage/storage',
]);

// Writable dirs by web server
set('writable_dirs', [
    'storage',
    'vendor',
]);

// Hosts
host('simplepointer.com')
    ->set('deploy_path', '/usr/local/www/{{application}}/html');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

task('supervisor:restart', function () {
    run('sudo service supervisord restart');
});

task('php-fpm:restart', function () {
    run('sudo service php-fpm restart');
});

task('web', [
    'supervisor:restart',
    'php-fpm:restart',
]);

// If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Restart FPM after deploy
after('deploy:symlink', 'web');
