<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'laravel');

// Project repository
set('repository', 'git@git.rep.elt:Phalcon/landing.git');
set('branch', 'master');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared zip/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);

// Hosts

host('php.elt')
    ->user('default')
    ->port(22)
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/www/htdocs/team2');

task('deploy:migration', function () {
    run('php {{release_path}}/artisan migrate --force');
})->desc('Artisan migrations');

task('deploy:seed', function () {
    run('php {{release_path}}/artisan db:seed');
})->desc('Artisan seed');

task('deploy:link', function () {
    run('link {{release_path}}/../../shared/.env {{release_path}}/.env');
})->desc('create env link');

task('deploy:linkEmail', function () {
   run('link {{release_path}}/../../shared/storage/app/mail.json {{release_path}}/storage/app/mail.json');
})->desc('create mail link');

task('deploy:composerinstall', function () {
    run('cd {{release_path}} && composer install');
})->desc('create env link');

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:composerinstall',
    'deploy:link',
    'deploy:linkEmail',
    'deploy:migration',
    'deploy:seed',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success',
]);

task('status', function () {
    writeln("latest release tag: {{tag}}");
})->desc('Show status of custom deploy features');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');