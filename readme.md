Table of Contents
-----------------

* [Requirements](#requirements)
* [Installation](#installation)
    * [Bug](#bug)
* [Maintainers](#maintainers)
* [Contributing](#contributing)
* [Security Vulnerabilities](#security-vulnerabilities)
      
## Requirements

The following tools are required in order to start the installation.

- PHP >=7.0
- [Composer](https://getcomposer.org/download/)

## Installation

1. Clone this repository with `git clone git@github.com:neputertech/neputer-web.git`
2. Run `composer install` to install the PHP dependencies
3. Set up a local database called `neputer-web`
4. Run `composer setup` to setup the application
5. Set up a working e-mail driver like [Mailtrap](https://mailtrap.io/) or [Mailcatcher](https://mailcatcher.me/)
6. Run `php artisan serve` to run start the application

You can now visit the app in your browser by visiting [http://127.0.0.1:8000](http://127.0.0.1:8000). If you seeded the database you can login into a test account with **`root@neputer.com`** & **`secret`**.

### Bug

In order to start the homepage you need to do some additional steps. 

1. Go to the url [Edit Site Setting](http://127.0.0.1:8000/admin/site-configs/edit) and click `Update` at the bottom of the page.

## Maintainers

[Neputer Web](https://v2.neputertech.com/) is currently maintained by the active members of  [Neputer Tech](https://github.com/neputertech). If you have any questions please don't hesitate to create an issue on this repo.

## Contributing

To Be Updated

## Security Vulnerabilities

If you discover a security vulnerability within Neputer Web, please send an email immediately to [security@neputer.com](mailto:security@neputer.com). **Do not create an issue for the vulnerability.**
