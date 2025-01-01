<?php
    class SignupPage extends BasePage
    {
        public function __construct(){}

        public function index()
        {
            if(isLoggedIn()){
                redirect("");
            }

            $this->render("auth/signup");
        }

        public function signup()
        {
            if(isLoggedIn()){
                redirect("");
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm-password'])
            ];
        }
    }