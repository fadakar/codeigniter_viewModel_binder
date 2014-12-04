viewModel_binder
================

view model binder for bind **request** data to view model class in **codeigniter**

### How to include

1. You need only **libraries** folder.
2. Copy Request.php file to **codeigniter** application/libraries .
3. Add file name into autoloader in **codeigniter** application/config/autoload.php file:

``` php
$autoload['libraries'] = array(
    'Request'
);
```

### Usage
create a class for bind GET/POST request data
for example create Employee view model
``` php
class EmployeeViewModel
{
    public $firstName;
    public $lastName;
    public $age;
    public $salary;
}
```

#### next in your Controller/Action bind your request data with view model(Employee) :

``` php
class DemoContoller extends CI_Controller
{
    public function add_submit()
    {
        $viewModel = new EmployeeViewModel();
        Request::bind($viewModel);

        // now $viewModel filled with request data
        echo $viewModel->fisrtName . $viewModel->lastName;
    }
}
```
### how to change request method(GET/POST) :
``` php
    Request::bind($viewModel,Request::POST); // POST request method , it's default
    Request::bind($viewModel,Request::GET); // GET request method
```

### how to turn off xss filtering:
``` php
//  GET request method without xss filtering
    Request::bind(
        $viewModel,
        Request::GET,
        false
    ); 
```

### how to skip one or more variable in view model class to bind :
``` php
//  GET request method without xss filtering and skip salary
    Request::bind(
        $viewModel,
        Request::GET,
        false,
        array('salary')
    ); 
```
