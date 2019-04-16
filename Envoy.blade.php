@servers(['dev' => ['anthony@dev.matabit.org']])
@servers(['prod' => ['anthony@matabit.org']])

@task('update-dev', ['on' => 'dev'])
    cd /var/www/dev/laravel
    ls -ls
    sudo git pull
    sudo composer install
@endtask

@task('update-prod', ['on' => 'prod'])
    cd /var/www/prod/laravel
    ls -ls
    sudo git pull
    sudo composer install
@endtask