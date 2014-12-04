<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Demo controller 
 * @author Gholamreza Fadakar <fadakargholamreza@gmail.com>
 */
class DemoContoller extends CI_Controller
{

    public function add_submit()
    {
        $vm = new EmployeeAddViewModel();
        Request::bind($vm);

        // now $vm was filled with request data
        // you can use it like :
        // echo $vm->firstName;
    }

}
