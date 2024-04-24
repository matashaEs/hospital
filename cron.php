<?php
//cron-job - turns on script every day

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital');

//Check if there is a user without form 
$query_check_form = "SELECT * FROM user LEFT OUTER JOIN questions ON user.id_user = questions.id_user WHERE questions.id_user IS null";
$results = mysqli_query($db, $query_check_form);

//Foreach user without form (foreach element of an array - $result)
//{ - START FOREACH

////Check registration date
$registaration_date_query = "SELECT DATE as date FROM user WHERE id_user='$id_user'";
$result = mysqli_query($db, registaration_date_query);
$registration_date = mysqli_fetch_assoc($result); 
$registration_date2 = implode("-",$registration_date);
$registration_date3 = date('Y-m-d', strtotime($registration_date2)); 

//Current date
$new_date = date("Y-m-d");
$new_date2 = date('Y-m-d', strtotime($new_date)); 

//if rejestration date
////Interval = 7 days
$interval = '0000-00-07 00:00:00';    
$difference = new DateTime($interval);

$registration_date4 = new DateTime($registration_date3);
$new_date3 = new DateTime($new_date2);

$diff = date_diff($new_date3 , $registration_date4);

////Interval = 7 days
$interval = '0000-00-07 00:00:00';    
$difference = new DateTime($interval);

////todays date-form_date > 7days
if($diff > $difference) 
{
    //Send mail to users without forms
    $msg = "Prosimy o wypełnienie ankiety pacjenta.";
    $msg = wordwrap($msg,70);
    mail("someone@example.com","My subject",$msg);
}

//} - END FOREACH

?>