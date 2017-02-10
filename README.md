# Astley's Shark Tank Assignment Grader
[![GitHub forks](https://img.shields.io/github/forks/dvigne/shark-tank.svg)](https://github.com/dvigne/shark-tank/network) [![GitHub stars](https://img.shields.io/github/stars/dvigne/shark-tank.svg)](https://github.com/dvigne/shark-tank/stargazers) [![GitHub issues](https://img.shields.io/github/issues/dvigne/shark-tank.svg)](https://github.com/dvigne/shark-tank/issues) [![Join Us On Slack](https://rauchg-slackin-bfastaugvi.now.sh/badge.svg)](https://rauchg-slackin-bfastaugvi.now.sh/)

This guide will walk you through a bare metal install and configuration of the server to support the web app

## Production Deploy
Before installation be sure to update the server to the latest versions using the commands below

```
administrator@server:~$ sudo apt-get update
administrator@server:~$ sudo apt-get upgrade
```
Next you need to install the required software to run the webserver. This webapp runs on:

1. PHP - Scripting Language
  * php-cli
  * php-fpm
  * php-mysql
  * php-curl
  * php-mcrypt
  * php-mbstring
  * php-gettext
  * php-gd
  * php-zip
2. Nginx - Web Server
3. MySQL - Database Server
4. Composer - Dependency Manager
5. Git - Distributed Version Control System

To install the required software run the command below
```
administrator@server:~$ sudo apt-get install nginx git composer mysql-server php php-cli php-curl php-curl php-mcrypt php-mbstring php-gettext php-gd php-zip php-mysql php-fpm
administrator@server:~$ mysql_secure_installation
```
Next cd to the `/var/www/` folder and download the sites source code using Git and set ownership and permissions accordingly ** Substitude The Username Field According To Your Username **
```
administrator@server:~$ cd /var/www/
administrator@server:/var/www$ git clone git@github.com:dvigne/shark-tank.git
administrator@server:/var/www$ sudo chown -R -v Username:www-data shark-tank
```
Now cd into the `shark-tank` directory and run the dependency manager to load the required libraries
```
administrator@server:/var/www$ cd shark-tank
administrator@server:/var/www/shark-tank$ composer update
administrator@server:/var/www/shark-tank$ chmod 775 -R -v storage
```
Log into the MySQL server and create a new user responsible for your database
```
administrator@server:/var/www/shark-tank$ mysql -u root -p
mysql> create user 'php'@'localhost' identified by 'Insert Password You Want To Use Here';
mysql> exit
```
Now log into your new account and create the required Database
```
administrator@server:/var/www/shark-tank$ mysql -u php -p
mysql> create database shark_tank;
mysql> exit
```
Next we will configure Nginx to use an SSL Certificate From Lets-Encrypt. You can find a copy of the configuration file with instructions [here](http://www.google.com)

You are now ready to begin configuring the site

### Configuration
Navigate to the shark-tank folder to begin create the required configuration files for the site to run
```
administrator@server:~$ cd /var/www/shark-tank/
```
Copy the example environment configuration file downloaded from the `git clone` and rename it to `.env` and open your favorite editor (I will use nano in this example)
```
administrator@server:/var/www/shark-tank$ mv .env.example .env
administrator@server:/var/www/shark-tank$ nano .env
```
Edit the configuration file with the required Settings
```
APP_ENV=production -- Change to production
APP_KEY=base64:Vj22sIYEIe3snemWRUNoLXvS0YzrmM0yz9HScF53NDA=
APP_DEBUG=false -- Suppress warning
APP_LOG_LEVEL=error -- Change to error
APP_URL=http://YOUR DOMAIN NAME HERE

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shark_tank -- The name of the database we created
DB_USERNAME=php -- The User We Created
DB_PASSWORD=YOUR PASSWORD HERE

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

-- Email settings --

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

--------------------

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=

```
After creating the configuration file be sure to run the required migrations and seed the database to create the default administrator account
```
administrator@server:/var/www/shark-tank$ php artisan migrate --seed
```
Next you need to configure Nginx to point to your fresh install of Shark-Tank. Digital Ocean has a great paper on how to install Mysql, Nginx, and php to get them talking if you have been following my guide I recommend you goto [the nginx guide here](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04#step-1-install-the-nginx-web-server) and **skip to step four of the guide**.

**Make sure to set your document root the file path you downloaded Shark Tank. In our case it was `/var/www/shark-tank/public`**

I also highly recommend to setup Nginx to redirect all incoming traffic to SSL. You can find that guide [here](https://www.digitalocean.com/community/tutorials/how-to-secure-nginx-with-let-s-encrypt-on-ubuntu-16-04)

**Congratulations!** You have successfully deployed Shark Tank from a bare metal install.

# Contributing and Testing
I recommend using [Vagrant](https://www.vagrantup.com/) and [Homestead](https://laravel.com/docs/5.4/homestead) in order to run a virtual machine on your computer to test your changes. Follow their guide to get a good testing environment running.

Any contributions are welcome! Just fork the repo and submit a PR when you're ready! If you have any questions pop into our [slack team](https://rauchg-slackin-bfastaugvi.now.sh) and join our wonderful community! Thank you for your support and contributions!
