<?php
    class VehiclesPage extends BasePage
    {
        public function index()
        {
            $vehicles = Vehicle::all();
            $this->render("/vehicles/index", compact("vehicles"));
        }
    }