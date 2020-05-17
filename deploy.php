<?php

namespace Deployer;

require 'recipe/laravel.php';

set('keep_releases', 3);

set('branch', 'master');

// Project name
set('application', 'simplepointer.com');

// Project repository
set('repository', 'https://github.com/jwhulette/SimplePointer');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', ['.env']);

// Laravel shared dirs
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// Writable dirs by web server
set('writable_dirs', ['storage', 'vendor'])

// Hosts
host('simplepointer.com')
    ->set('deploy_path', '/usr/local/www/{{application}}/html');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
