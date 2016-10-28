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
    public static function set_date(){
        ?>
            <p>Date of Event: </p>
            <select name="cm-month" id="cm-month">
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
            <select name="cm-day" id="cm-day">
                <?php for($i = 1; $i <= 31; $i++)
                    { if($i == 29){
                        echo '<option class="twenty-nine">' . $i . '</option>';
                    } elseif($i == 30){
                        echo '<option class="thirty">' . $i . '</option>';
                    } elseif($i == 31){
                        echo '<option class="thirty-one">' . $i . '</option>';
                    } else {
                        echo '<option>' . $i . '</option>';
                    }
                    }?>
            </select>
            <select name="cm-year" id="cm-year">
                <?php for($i = 2016; $i <= 2036; $i++){
                    echo '<option>' . $i . '</option>';
                }?>
            </select>
        <?php /*$month = $_POST['cm-month'];
        $day = $_POST['cm-day'];
        $year = $_POST['cm-year'];
        $set_date = array($month, $day, $year);
        return $set_date;*/
    }
    public static function set_time(){
        ?>
        <p>Time of Event: </p>
        <select name="cm-hour" id="cm-hour">
    <?php for($i = 1; $i <= 12; $i++) {
            echo '<option>' . $i . '</option>';
            } ?>
        </select>
        <select name="cm-minute" id="cm-minute">
        <?php for($i = 0; $i < 60; $i++){
            if($i < 10){
                echo '<option>0' . $i . '</option>';
            } else {
                echo '<option>' . $i . '</option>';
            }
        } ?>
        </select>
        <select name="cm-pm" id="cm-pm">
            <option value="false">AM</option>
            <option value="true">PM</option>
        </select>
    <? /*$hour = $_POST['cm-hour'];
        $minute = $_POST['cm-minute'];
        $pm = $_POST['cm-pm'];
        $the_time = array($hour, $minute, $pm);
        return $the_time;*/
    }
}