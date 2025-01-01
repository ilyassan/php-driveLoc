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
    }