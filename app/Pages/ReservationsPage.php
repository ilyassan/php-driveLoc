<?php

    class ReservationsPage extends BasePage
    {
        public function index()
        {
            $reservations = Reservation::getReservationsOfClient(user()->getId());
            
            $this->render("/reservations/index", compact("reservations"));
        }
    }