<?php

    class CategoriesAdminPage extends BasePage
    {
        public function index()
        {
            $categories = Category::all();

            $this->render("/categories/index", compact("categories"));
        }
    }