<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'recipe/rsync.php';

// Releases to keep
set('keep_releases', 3);

// Branch to main
set('branch', 'main');

// Project name
set('application', 'simplepointer.com');

// Speedup the native ssh client.
set('ssh_multiplexing', true);

// Hosts
host('simplepointer.com')
    ->set('deploy_path', '/usr/local/www/{{application}}/html')
    ->stage('prod');

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

// Configuring the rsync exclusions.
// You'll want to exclude anything that you don't want on the production server.
add('rsync', [
    'exclude' => [
        '.git',
        '/.env',
        '/.docker/',
        '/.github/',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        '/tests/',
        'deploy.php',
        '.dockerignore',
        '.editorconfig',
        '.env.dusk.local',
        '.env.example',
        '.gitattributes',
        '.gitignore',
        '.php_cs',
        '.styleci.yml',
        'docker-compose.yml',
        'jsconfig.json',
        'LICENSE',
        'phpcs_xml',
        'phpstan.neon',
        'phpunit.dusk.xml',
        'phpunit.xml',
        'README.md',
        'tailwind.config.js',
        'webpack.mix.js'
    ],
]);

// Set up a deployer task to copy secrets to the server.
// Since our secrets are stored in Gitlab, we can access them as env vars.
task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

// Tasks
task('supervisor:restart', function () {
    run('sudo service supervisord restart');
});

task('php-fpm:restart', function () {
    run('sudo service php-fpm restart');
});

task('restart', [
    'supervisor:restart',
    'php-fpm:restart',
]);

desc('Deploy the application');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'rsync', // Deploy code & built assets
    'deploy:secrets', // Deploy secrets
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link', // |
    'artisan:view:cache',   // |
    'artisan:config:cache', // | Laravel specific steps
    'artisan:optimize',     // |
    'artisan:migrate',      // |
    'deploy:symlink',
    'restart',
    'deploy:unlock',
    'cleanup',
]);

// If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Restart FPM after deploy
after('deploy:symlink', 'restart');
