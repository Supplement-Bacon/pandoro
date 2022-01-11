<?php

namespace Deployer;

// Include the Laravel & rsync recipes
require 'contrib/rsync.php';
require 'recipe/laravel.php';

set('application', 'Template Laravel X Docker');
set('ssh_multiplexing', true); // Speeds up deployments

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

// Configuring the rsync exclusions.
// You'll want to exclude anything that you don't want on the production server.
add('rsync', [
    'exclude' => [
        '.git',
        '.circleci',
        '.github',
        '/.env',
        '/.env.prod',
        '/.env.exemple',
        '/DOT_ENV_PRODUCTION',
        '/.gitignore',
        '/.htaccess',
        '/.well-known',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        'deploy.php',
        '/docker-compose/',
        'docker-compose.yml',
        'Dockerfile',
        'Makefile',
    ]
]);


// Set up a deployer task to copy secrets to the server.
// Since our secrets are stored in Github, we can access them as env vars.
task('deploy:secrets', function () {
    $dot_env = base64_decode( getenv('DOT_ENV_PRODUCTION') );
    file_put_contents(__DIR__ . '/.env', $dot_env);
    upload('.env', get('deploy_path') . '/shared');
});


// Production Server
host( getenv('HOST_NAME') ) // Name of the server
    ->set('labels', ['stage' => 'production']) // Deployment stage (production, staging, etc)
    ->setRemoteUser('user') // SSH user
    ->setDeployPath( getenv('DEPLOY_PATH') ); // Deploy path

after('deploy:failed', 'deploy:unlock'); // Unlock after failed deploy

desc('Deploy the application');

task('deploy', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'rsync',          // Deploy code & built assets
    'deploy:secrets', // Deploy secrets
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'artisan:storage:link',  // |
    'artisan:config:cache',  // | Laravel Specific steps
    'artisan:view:cache',    // |
    'artisan:route:cache',   // |
    'artisan:optimize',      // |
    'artisan:migrate',       // |
    'artisan:queue:restart', // |
    'deploy:publish', // deploy:symlink + deploy:unlock + deploy:cleanup + deploy:success
    'releases', // Show the releases - Cherry on the cake
]);