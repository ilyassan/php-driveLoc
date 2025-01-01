<?php

    class VehiclesDetailsPage extends BasePage
    {
        public function index($id)
        {
            $vehicle = Vehicle::find($id);
            $places = Place::all();
            
            $this->render("/vehicles/show", compact("vehicle", "places"));
        }
    }