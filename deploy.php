<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:juque/ricus.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('porotus')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '~/apps/ricus');

// Hooks

after('deploy:failed', 'deploy:unlock');
