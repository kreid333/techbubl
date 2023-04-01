# TechBubl


## Description 

A full-featured blog created using PHP and the MVC architectural pattern.

## Table of Contents

* [Installation](#installation)
* [Usage](#usage)
* [Finished Project](#finished-project)
* [Credits](#credits)
* [License](#license)

## Installation

The following software must be installed in order for this application to run locally:

- [PHP](https://www.php.net/)
- [Apache](https://httpd.apache.org/)
- [MySQL](https://www.mysql.com/)

These can be installed independently or you can use a local PHP development enivronment such as [MAMP](https://www.mamp.info/) or [XAMPP](https://www.apachefriends.org/).

If you are installing the software independently, you also need an administrative interface for your database. For this I would recommend [MySQL Workbench](https://www.mysql.com/products/workbench/).

After installing the required software, make sure that you have a copy of the application on your local machine. Then, copy the seed file located in the seeds directory and execute it in either MySQL Workbench or PHPMyAdmin (available if you installed MAMP or XAMPP). After this, make sure that all of the information pertaining to your database setup matches the config.php file in the config folder.

## Usage 

All administrative functionality can be accessed by using the `/admin` URL path.

At the moment, no category can be deleted that has a post associated with it. You must delete all posts associated with the category you want to delete and then you will be able to delete it.

Instead of running locally, the application can also be ran here:
 * [TechBubl](https://techbubl.sndbxx.com/)

Below is a test admin account for those who want to test functionality:

* Username: test@test.com

* Password: test

## Finished Project

![TechBubl](https://user-images.githubusercontent.com/67942678/229319830-7b5fc7fd-a2b4-406f-9374-42d57b9f6196.gif)

## Credits

* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)
* [Apache](https://httpd.apache.org/)