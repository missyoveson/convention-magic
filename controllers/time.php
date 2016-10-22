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
    public function set_date(){
        ?>
            <label for="set_date">Date</label>
            <select name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select name="day">

            </select>

        <?php
    }
}