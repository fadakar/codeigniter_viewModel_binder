Codeigniter_viewModel_binder
================

View model binder for bind **request** data to view model class in **codeigniter**

### How to include to **codeigniter** :

1. You need only **libraries** folder.
2. Copy Request.php file to **codeigniter** application/libraries .
3. Add file name into autoloader in **codeigniter** application/config/autoload.php file:

``` php
$autoload['libraries'] = array(
    'Request'
);
```

### Usage :
Create a class for bind GET/POST request data
For example create Employee view model
``` php
class EmployeeViewModel
{
    public $firstName;
    public $lastName;
    public $age;
    public $salary;
}
```

Next in your html file add some input :
```html
<form action="<?php echo base_url("DemoController/add_submit") ?>" method="POST">
    <input type="text" name="firstName" />
    <input type="text" name="lastName" />
    <input type="text" name="age" />
    <input type="text" name="salary" />

    <input type="submit" />
</form>
```


Next in your Controller/Action bind your request data with view model(Employee) :
``` php
class DemoContoller extends CI_Controller
{
    public function add_submit()
    {
        $viewModel = new EmployeeViewModel();
        Request::bind($viewModel);

        // now $viewModel filled with request data
        echo $viewModel->firstName . $viewModel->lastName;
    }
}
```
### How to change request method(GET/POST) :
``` php
    Request::bind($viewModel,Request::POST); // POST request method , it's default
    Request::bind($viewModel,Request::GET); // GET request method
```

### How to turn off xss filtering:
``` php
//  GET request method without xss filtering
    Request::bind(
        $viewModel,
        Request::GET,
        false
    ); 
```

### How to skip one or more variable in view model class to bind :
``` php
//  GET request method without xss filtering and skip salary
    Request::bind(
        $viewModel,
        Request::GET,
        false,
        array('salary')
    ); 
```
