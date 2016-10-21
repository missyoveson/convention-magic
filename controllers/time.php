<?php

class time
{
    public static function set_time($year, $month, $day, $hour, $minute, $pm){
        $date = new DateTime();
        $date -> setDate($year, $month, $day);
        if($pm && $hour != 12){
            $hour += 12;
        } elseif(!$pm && $hour==12){
            $hour = 0;
        }
        $date -> setTime($hour, $minute);
        return $date;
    }
}