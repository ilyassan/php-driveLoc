<?php
    class DashboardPage extends BasePage
    {
        public function index()
        {
            [$monthProfit, $ratioProfit] = $this->monthProfit();
            [$monthReservations, $diffReservations] = $this->monthReservations();
            $usersCount = User::count();
            
            $this->render("/", compact('monthProfit', 'ratioProfit', 'monthReservations', 'diffReservations', 'usersCount'));
        }

        private function monthProfit(){
            $startMonth = date('Y-m-01');
            $endMonth = date('Y-m-t');

            $lastMonthStart = date('Y-m-01', strtotime('-1 month'));
            $lastMonthEnd = date('Y-m-t', strtotime('-1 month'));

            $monthProfit = Reservation::getReservationsCostBetween($startMonth, $endMonth);
            $lastMonthProfit = Reservation::getReservationsCostBetween($lastMonthStart, $lastMonthEnd);

            $ratio = 100;
            if($lastMonthProfit > 0){
                $ratio = ($monthProfit - $lastMonthProfit) / $lastMonthProfit * 100;
            }

            return [$monthProfit, $ratio];
        }

        private function monthReservations(){
            $startMonth = date('Y-m-01');
            $endMonth = date('Y-m-t');

            $lastMonthStart = date('Y-m-01', strtotime('-1 month'));
            $lastMonthEnd = date('Y-m-t', strtotime('-1 month'));

            $monthReservations = Reservation::getReservationsCount($startMonth, $endMonth);
            $lastMonthReservations = Reservation::getReservationsCount($lastMonthStart, $lastMonthEnd);

            
            $diff = $monthReservations - $lastMonthReservations;

            return [$monthReservations, $diff];
        }

    }