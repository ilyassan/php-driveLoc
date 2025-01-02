<?php

    class ReservationsPage extends BasePage
    {
        public function index()
        {
            $reservations = Reservation::getReservationsOfClient(user()->getId());
            
            $this->render("/reservations/index", compact("reservations"));
        }

        public function getFilteredReservations()
        {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);

            $filters['status'] = $data['status'] ?? '';
            $filters['start_date'] = $data['start_date'] ?? '';
            $filters['to_date'] = $data['to_date'] ?? '';
            
            $reservations = Reservation::getReservationsOfClient(user()->getId(), $filters);
            
            echo json_encode(["success" => true, "data" => $reservations]);
        }
    }