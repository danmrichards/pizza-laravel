# Pizza Laravel - Now with Docker!
A fork of the Pizza Laravel application with added support for the [Docker](https://www.docker.com/) container platform.
The concept of Docker is similar to a virtual machine but is much more flexible.

## Usage
### Start Containers
Start the docker containers using [Docker Compose](https://docs.docker.com/compose/overview/):
```bash
$ docker-compose up -d
```
This will start up a container for PHP, NGINX and MySQL. Effectively providing you with a full development hosting
environment, all without installing any of those pieces of software on your machine.

### Migrate database
Once the containers are ready, you can run the database migrations like so:
```bash
$ docker exec -it pizzalaravel_fpm_1 ash -c 'php artisan migrate:refresh --force'
```
As you can see we are just running a standard `php artisan` command, but `docker exec` tells Docker to run this command
inside a particular container (in this case the php-fpm container).

### Seed database
Now you can seed the database:
```bash
$ docker exec -it pizzalaravel_fpm_1 ash -c 'php artisan db:seed --force'
```

### Generate Application Key
Generate an application key, you'll see an output like so:
```bash
$ docker exec -it pizzalaravel_fpm_1 ash -c 'php artisan key:generate'
Application key [base64:5S7ty0iGZ1ZB+zMm3V/qBQRADNWxLAAnUSu/kUUHm+w=] set successfully.
```
Copy the code from the square brackets [] and place it in the service/.env file next to `APP_KEY`. Example:
```
APP_KEY=base64:5S7ty0iGZ1ZB+zMm3V/qBQRADNWxLAAnUSu/kUUHm+w=
```

### Load the Application
You can now open up http://localhost/ in your browser and you should see a Pizza site.

### Tearing Down
When you're done buying or selling Pizza you can kill the containers with this command:
```bash
$ docker-compose down
```