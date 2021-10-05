<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Date time validation</title>
</head>
<body>
    <div>Enter your name and select date anh time for appointment</div>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
        <?php
        $name = "";
        $day=1;
        $month=1;
        $year=1900;
        $hour= 0;
        $minute=0;
        $second=0;
        if(array_key_exists("day",$_GET)){
            $name = $_GET["name"];
            $day=$_GET["day"];
            $month=$_GET["month"];
            $year=$_GET["year"];
            $hour= $_GET["hour"];
            $minute=$_GET["minute"];
            $second=$_GET["second"];
        }
        ?>
        <table>
            <tr>
                <td>
                    Your name:
                </td>
                <td>
                    <label>
                        <input type="text" maxlength="20" size="15" value="<?php if (isset($_GET['name'])) echo $_GET['name']; ?>" name="name">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Date:
                </td>
                <td>
                    <label>
                        <select name="day">
                            <?php
                            for($i=1;$i<=31;$i++){
                                if($day==$i){
                                    print("<option selected value='$i'>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        <select name="month">
                            <?php
                            for($i=1;$i<=12;$i++){
                                if($month==$i){
                                    print("<option selected value='$i'>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        <select name="year">
                            <?php
                            for($i=1900;$i<=2021;$i++){
                                if($year==$i){
                                    print("<option selected>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Time:
                </td>
                <td>
                    <label>
                        <select name="hour">
                            <?php
                            for($i=0;$i<=23;$i++){
                                if($hour==$i){
                                    print("<option selected value='$i'>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        <select name="minute">
                            <?php
                            for($i=0;$i<=59;$i++){
                                if($minute==$i){
                                    print("<option selected value='$i'>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        <select name="second">
                            <?php
                            for($i=0;$i<=59;$i++){
                                if($second==$i){
                                    print("<option selected value='$i'>$i</option>");
                                }else{
                                    print("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        <br><br>
        <table>
            <?php
            if(array_key_exists("name",$_GET)){
                print ("Hi $name<br>");

                $d=1;
                if(($month == 4 || $month == 6||$month == 9||$month == 11) && $day > 30){
                    print ("Không có ngày nào như trên");
                    exit();
                }
                if($year % 400 == 0 || ($year % 4==0 && $year % 100 != 0)){
                    if($month == 2 && $day > 29){
                        print ("Không có ngày nào như trên");
                        exit();
                    }
                    $d=29;
                }else{
                    if($month == 2 && $day > 28){
                        print ("Không có ngày nào như trên");
                        exit();
                    }
                    $d=28;
                }
                print ("You have choose to have an appointment on $hour:$minute:$second,$day/$month/$year<br><br>");
                print ("More information<br><br>");
                $hour12 = $hour>12?$hour-12:$hour;
                if($hour>12){
                    print ("In 12 hours, the time and date is $hour12:$minute:$second PM,$day/$month/$year<br><br>");
                }else{
                    print ("In 12 hours, the time and date is $hour12:$minute:$second AM,$day/$month/$year<br><br>");
                }
                if($month == 4 || $month == 6||$month == 9||$month == 11){
                    $d=30;
                }else if($month == 1 || $month == 3||$month == 5||$month == 7||$month==8||$month==10||$month=12){
                    $d=31;
                }
                print ("This month has $d");
            }
            ?>
        </table>
    </form>
</body>
</html>
