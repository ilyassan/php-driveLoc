<?php
    class LoginPage extends BasePage
    {
        public function __construct(){}

        public function index()
        {
            if(isLoggedIn()){
                redirect("");
            }

            $this->render("auth/login");
        }

        public function login()
        {
            if (isLoggedIn()) {
                redirect("");
            }
    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
            ];

            print_r($data);
        }
    }