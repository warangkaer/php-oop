<?php
namespace Controllers;

use DB\Query;

require '../database/Query.php';

class UserController{
    public function index(){
        $data = Query::all('users');

        return $data;
    }
}
?>