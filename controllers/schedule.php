<?php

class schedule
{
    public static function set_schedule($year, $month, $day, $hour, $minute, $pm){
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
            <select name="cm-month" class="cm-month">
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
            <select name="cm-day" class="cm-day">
            </select>
            <select name="cm-year" class="cm-year">
            </select>
        <?php $month = $_POST['cm-month'];
        $day = $_POST['cm-day'];
        $year = $_POST['cm-year'];
        $set_date = array($month, $day, $year);
        return $set_date;
    }
    public function set_time(){
        ?> <select name="cm-hour" class="cm-hour">
    <?php for($i = 1; $i <= 12; $i++) {
            echo '<option>' . $i . '</option>';
            } ?>
        </select>
        <select name="cm-minute" class="cm-minute">
        <?php for($i = 00; $i < 60; $i++){
            echo '<option>' . $i . '</option>';
        } ?>
        </select>
        <select name="cm-pm" class="cm-pm">
            <option value="false">AM</option>
            <option value="true">PM</option>
        </select>
    <? $hour = $_POST['cm-hour'];
        $minute = $_POST['cm-minute'];
        $pm = $_POST['cm-pm'];
        $the_time = array($hour, $minute, $pm);
        return $the_time;
    }
}