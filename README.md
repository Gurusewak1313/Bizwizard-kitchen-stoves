# Biz Wizard

# 1. Tech Framework

The BizWizard project utilises the CakePHP framework. The project is compatible with cakePHP version 4.0 Strawberry.
PHP version must be equal to or greater than 7.2.0 to use cakePHP.
The Resources and all the other relevant information regarding the cakePHP
version could be found on the cakePHP 4.0 Strawberry Cookbook.
CakePHP cookbook: https://book.cakephp.org/4/en/intro.html

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.
The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

# 2. Framework Plugins
Below is the list of cakePHP plugins utilised in the project and could be installed using the composer.

Installation guide: https://book.cakephp.org/4/en/plugins.html

- Authentication plugin: This is integrated with the project to act as a middleware and is carefully utilised to carry out authentication tasks for the users to login to the Admin Dashboard.
Read more: https://book.cakephp.org/4/en/tutorials-and-examples/cms/authentication.html#cms-tutorial-authentication

# 3. Architecture
The project follows a MVC architecture which includes three main components which are
- Model Components: includes the files relating to the operations regarding the database entities
- View Components:  includes the files relating to how the website looks from the frontend connected to the models using controllers
- Controller Components : Includes the data logic functions for using the data in models by views


# 4. Dev environment setup
## 4.1 Step 1: Install Xampp Control Panel
- Install [Xampp](https://www.apachefriends.org/download.html) Control Panel. Here are the official documentation for [Xampp control panel](https://www.apachefriends.org/index.html)

## 4.2 Step 2: Install Composer

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.
## 4.3 Step 3: Install IDE
The most recommended development environment for the project would be Jetbrains PHPStorm
- Install [PHPStorm](https://www.jetbrains.com/help/phpstorm/installation-guide.html#toolbox
  ) here. Here are the official installation [documentation](https://www.jetbrains.com/help/phpstorm/installation-guide.html#requirements
  ) for PHPStorm

## 4.4 Step 4 Loading Extensions
Once the Xampp has been installed, the php extensions can be viewed
1. Open Xampp control Panel
2. Click on config button
3. select PHP(php.ini) selection
4. Once the file has been opened
5. find **_;extension=intl_** and remove the **_' ; '_** from the front
6. Restart the Apache server to make it work

# 5. Deploying the project on cPanel
The recommended software to deploy the system is cPanel. This software
is found in most web hosting services, but can be purchased from their website
if needed:
https://cpanel.net/

Steps to set up the Git repository in cPanel
1. Log into cPanel
2. Under the Files menu, open Git Version Control
3. Copy the repo URL and paste it into the Clone URL textbox
4. Select the desired file path for the repository
5. Type in the name for the repo that will appear in the cPanel interface
6. Click the create button

The email address will need to be set up using cPanel so that the system will be
send out responses to incoming quote requests.

Steps to set up sending emails on cPanel
1. Log into cPanel
2. Open the Email Accounts menu
3. Click the Create button. Do not use the default account and ensure that the password is recorded.
4. Click the Connect Devices button
5. Use ‘localhost’ as the hostname and 25 as the port number, and follow everything else in the Non-SSL Settings block.
6. Disable TLS to ensure that emails will be sent properly.

For learn more information about cPanel, you can refer to the user documentation:
https://docs.cpanel.net/cpanel/


# 6. Codebase Structure

The project follows MVC architecture which includes three main components which are Model, View, and Controller folder. Secondary packages include config, logs, plugins, resources, src (MVC folders), templates (front-end PHP files), vendor, webroot.

Since MVC has been utilised,
- Model folder: Only includes the files relating to the operations regarding the database entities
- View Folder: Only includes the files relating to how the website looks from the frontend connected to the models using controllers
- Controllers: Includes the data logic for using the data in models by views

The MVC structure and the templates have been splitted among two subdivisions,
- Admin
- Front end theme

# 7. File Naming conventions for Future commits
The following rules need to be followed for correct naming structure
- Keep File Names short and concise
- File names should be meaningful
- Space / _ / - should be avoided while naming the files
- Avoid using plural forms and use singular name for the classes

# 8. Guidelines for writing code
- Descriptive names must be used for classes, functions and variable names
- Code repetition must be avoided all the times
- code indentation must be consistent
- All the tags used within HTMl and php classes, must have a closing tag
- Every expression in php class should end with semicolon
- Each function in controller folders must be commented appropriately
- All the php and html code must be in the <?php> <?> and <html> </html> tags respectively.



