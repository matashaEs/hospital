<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$inform = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital');

// SEND FORM
if (isset($_POST['send_form'])) {
    $id_user = $_SESSION['userid'];
    $qu1 = mysqli_real_escape_string($db, $_POST['qu1']);
    $qu2 = mysqli_real_escape_string($db, $_POST['qu2']);
    $qu3 = mysqli_real_escape_string($db, $_POST['qu3']);
    $qu4 = mysqli_real_escape_string($db, $_POST['qu4']);
    $qu5 = mysqli_real_escape_string($db, $_POST['qu5']);
    $qu6 = mysqli_real_escape_string($db, $_POST['qu6']);
    $qu7 = mysqli_real_escape_string($db, $_POST['qu7']);
    $qu8 = mysqli_real_escape_string($db, $_POST['qu8']);
    $qu9 = mysqli_real_escape_string($db, $_POST['qu9']);
    $qu10 = mysqli_real_escape_string($db, $_POST['qu10']);

    $result = $qu1 + $qu2 + $qu3 + $qu4 + $qu5 + $qu6 + $qu7 + $qu8 + $qu9 + $qu10;
    if($result >= 50) {
        $success = "Twój wynik " . $result . ". Zalecamy najszybsze skontaktowanie się z naszym ośrodkiem medycznym w celu umówienia wizyty";
    } else {
        $success = "Twój wynik " . $result;
    }

    $query = "INSERT INTO questions (id_user, date, qu1, qu2, qu3, qu4, qu5, qu6, qu7, qu8, qu9, qu10)
                          VALUES('$id_user', current_date, '$qu1', '$qu2', '$qu3', '$qu4', '$qu5', '$qu6', '$qu7', '$qu8', '$qu9', '$qu10')";
    mysqli_query($db, $query);

    $_SESSION['success'] = $success;
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $pesel = mysqli_real_escape_string($db, $_POST['pesel']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Imię jest wymagane"); }
    if (empty($surname)) { array_push($errors, "Nazwisko jest wymagane"); }
    if (empty($email)) { array_push($errors, "Email jest wymagany"); }
    if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }
    if ($password_1 != $password_2) {
        array_push($errors, "Te dwa hasła nie pasują do siebie");
    }
    if (empty($pesel)) {
        array_push($errors, "PESEL jest wymagany");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "Email już istnieje");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO user (name, surname, email, password, pesel)
                          VALUES('$name','$surname', '$email', '$password', '$pesel')";
        mysqli_query($db, $query);

        $id_user = mysqli_insert_id($db);
        $_SESSION['username'] = $name;
        $_SESSION['userid'] = $id_user;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: index.php');
    }
}

if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email jest wymagany");
    }
    if (empty($password)) {
        array_push($errors, "Hasło jest wymagany");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $user['name'];
            $_SESSION['userid'] = $user['id_user'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
<<<<<<< Updated upstream
            header('location: index.php');
        }else {
=======

            echo "Cos";

            ////Check form delay
            ////Retrieve date from the last patient form 
            $data_check_query = "SELECT DATE as date FROM questions WHERE id_user='$id_user'";
           
            /////Check if there is no form in database
            if (empty($data_check_query))
            {
                ////Go to page with form
                header('location: index.php'); 
            }
            if (!empty($data_check_query))
            {
                $result = mysqli_query($db, $data_check_query);
                ////Date - type of array
                $form_date = mysqli_fetch_assoc($result); 
                
                //echo "<pre>";
                //var_dump($form_date2);
                //echo "</pre>";

                ////Date - type of string
                $form_date2 = implode("-",$form_date);

                ////Date - type of date
                $form_date3 = date('Y-m-d', strtotime($form_date2)); 

                //echo gettype($form_date3);

                $new_date = date("Y-m-d");
                $new_date2 = date('Y-m-d', strtotime($new_date)); 

                //echo gettype($new_date2);

                ////Dates - type of DataTimeInterface -> date_diff(DataTimeInterface,DataTimeInterface);
                $form_date4 = new DateTime($form_date3);
                $new_date3 = new DateTime($new_date2);

                //echo gettype($form_date4);
                //echo gettype($new_date3);

                //date_diff(DataTimeInterface,DataTimeInterface);
                $diff = date_diff($new_date3 , $form_date4);

                ////Interval = 7 days
                $interval = '0000-07-00 00:00:00';    
                $difference = new DateTime($interval);

                ////todays date-form_date < 7days
                if($diff < $difference) 
                {
                    //Stay on Login page
                    echo "Stay on Login page";
                    array_push($errors, "Od przesłania ostatniego formularza nie mineło 7dni. Prosimy o cierpliwość "); 
                }
                ////todays date-form_date > 7days
                else
                {
                    //Go to Form page
                    echo "Form page";
                    header('location: index.php'); 
                }

            }
        }
        else 
        {
>>>>>>> Stashed changes
            array_push($errors, "Nieprawidłowy adres e-mail lub hasło");
        }
    }
}
?>