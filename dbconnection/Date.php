<?php
class Date{
    public function getIntervalBetweenTwoDates($startDate, $endDate){
        $period = new DatePeriod(
            new DateTime($startDate),
            new DateInterval('P1D'),
            new DateTime($endDate)
            );
        $all_days = array();$i = 0;
        foreach($period as $date) {
            if ($this->isWeekend($date->format('Y-m-d'))){
                $all_days[$i] = $date->format('Y-m-d');
                $i++;
            }
        }
        return $all_days;
    }
    public function isWeekend($date) {
        $weekDay = date('w', strtotime($date));
        if (($weekDay == 0 || $weekDay == 6)){
            return false;
        }else{
            return true;
        }
    }
}
?>