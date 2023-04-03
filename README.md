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

## License

MIT License

&copy; 2023, Kai Reid

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.