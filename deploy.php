<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'laravel');

// Project repository
set('repository', 'git@git.rep.elt:Phalcon/landing.git');
set('branch', 'master');
set('tag', function () {
    $cmd = 'git ls-remote --tags --refs {{repository}}';
//    $output = runLocally($cmd);
    $output = run($cmd);
    $tags = preg_split('#$#m', $output);
    $tags = array_map(
        function ($x) {
            $tt = explode('/', $x);
            return $tt[count($tt) - 1];
        },
        $tags);
    natsort($tags);
    $tags = array_values($tags);
    return count($tags) ? $tags[count($tags) - 1] : null;
});

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
    'deploy:migration',
    'deploy:seed',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success',
]);

task('deploy:update_code', function () {
    $tag = get('tag');
    if (empty($tag)) {
        throw new \Exception("No release tag specified to deploy!");
    }
    writeln("About to get sources from tags/{{tag}}");
    run("git clone --depth 1 --branch {{branch}} {{repository}} {{release_path}}");
    run("cd {{release_path}} && git fetch --tags && git checkout tags/{{tag}}");
})->desc('Updating code from git repository');

task('status', function () {
    writeln("latest release tag: {{tag}}");
})->desc('Show status of custom deploy features');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');