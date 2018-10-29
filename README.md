# phpCRUD (Under Development)

My first git project, CRUD operations with CodeIgniter PHP Framework and ANGULAR JS.    
A library to create CRUD operations with nice views and a lot of useful features in just few lines of code.

## Getting started

You can easily get the project running locally by following below installation steps.

### Installation

1. Clone the repo in your pc

```html
git clone https://github.com/vinodselvin/phpCRUD.git
```

2. Change the Baseurl in phpCRUD/application/config/config.php, 

```html
$config['base_url'] = 'http://localhost/phpCRUD/';
```

3. Change hostname, username, password and database in phpCRUD/application/config/database.php 

```html
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'phpcrud';
```

4. Select the table and its coloums for CRUD view and opertions in phpCRUD/application/controllers/crud_controller.php  

     4.1. Load our library
     ```html
     $this->load->library("php_crud"); 
     ```

     4.2. Select the table which you want to see CRUD View
     ```html
     $this->php_crud->select_table('user_data'); 
     ```

     4.3. render_output() will generate awesome html view, for CRUD operation

     ```html
     echo $this->php_crud->render_output(); 
     ```

## Built With

1. PHP CodeIgniter Framework
2. AngularJS 

## Contributing

Please read CONTRIBUTING.md for details on our code of conduct, and the process for submitting pull requests to us.    
     
If you have any questions, you can always get in touch with the Contributors of the Project.    
