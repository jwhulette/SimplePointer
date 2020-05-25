<?php

namespace Deployer;

require 'recipe/laravel.php';
require './vendor/deployer/recipes/recipe/npm.php';

// Releases to keep
set('keep_releases', 3);

// Branch to deploy
set('branch', 'master');

// Project name
set('application', 'simplepointer.com');

// Project repository
set('repository', 'https://github.com/jwhulette/SimplePointer');

// Allocate tty for git clone.
set('git_tty', true);

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
    'storage/database',
]);

// Writable dirs by web server
set('writable_dirs', [
    'storage',
    'vendor',
]);

// set('bin/npm', function () {
//     return run('which npm');
// });

// desc('Install npm packages');
// task('npm:install', function () {
//     if (has('previous_release')) {
//         if (test('[ -d {{previous_release}}/node_modules ]')) {
//             run('cp -R {{previous_release}}/node_modules {{release_path}}');

//             // If package.json is unmodified, then skip running `npm install`
//             if (! run('diff {{previous_release}}/package.json {{release_path}}/package.json')) {
//                 return;
//             }
//         }
//     }
//     run('cd {{release_path}} && {{bin/npm}} install');
// });

// desc('Install npm packages with a clean slate');
// task('npm:ci', function () {
//     run('cd {{release_path}} && {{bin/npm}} ci');
// });

// Hosts
host('simplepointer.com')
    ->set('deploy_path', '/usr/local/www/{{application}}/html');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

task('build:assets', function () {
    run('npm:install');
    run('cd {{release_path}} npm run prod');
});

task('supervisor:restart', function () {
    run('sudo service supervisord restart');
});

task('php-fpm:restart', function () {
    run('sudo service php-fpm restart');
});

task('web:reloads', [
    'build:assets',
    'supervisor:restart',
    'php-fpm:restart',
]);

// If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Restart FPM after deploy
after('deploy:symlink', 'web:reloads');
