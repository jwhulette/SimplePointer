<?php

namespace Deployer;

require 'recipe/laravel.php';

// Releases to keep
set('keep_releases', 3);

// Branch to main
set('branch', 'main');

// Project name
set('application', 'simplepointer.com');

// Project repository
set('repository', 'https://github.com/jwhulette/SimplePointer');

// Allocate tty for git clone.
set('git_tty', true);

// Speedup the native ssh client.
set('ssh_multiplexing', true);

// Hosts
host('simplepointer.com')
    ->set('deploy_path', '/usr/local/www/{{application}}/html')
    ->stage('prod');

// Tasks
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
