## Prequisites
* [Docker](https://docs.docker.com/engine/install/ubuntu/)

## Starting the app
```
cd ./responsive-app
# Install all depencies via docker
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
sail up -d
sail artisan migrate
sail artisan horizon
```

Once the application's containers have been started, you may access the project in your web browser at: [http://localhost](http://localhost).

## Previewing emails
When Sail is running, you may access the MailHog web interface at: http://localhost:8025