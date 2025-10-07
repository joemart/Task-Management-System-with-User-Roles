<?php
require_once BASE_PATH . "/models/User.php";

class UserAuthController {
    private $model;

    //Assign database
    public function __construct($db)
    {

        $this->model = new User($db);
    }

    //Get all users
    public function index(){
        $users = $this->model->getAll();
        require BASE_PATH . "/views/users.view.php";
    }

    //Add user
    public function add($username, $name, $email, $password){
        $this->model->add($username, $name, $email, $password);
        header("Location: public/index.php");
        exit();
    }

}