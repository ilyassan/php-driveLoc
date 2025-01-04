<?php
    class UsersPage extends BasePage
    {
        public function index()
        {
            $this->render("/users/index");
        }
    }