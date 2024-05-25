<?php include('send.php'); ?>

<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$inform = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital');

$sql_result = "SELECT * FROM `questions`";
$all_results = mysqli_query($db,$sql_result);

function getData($table, $elem_id, $elem_name, $elem_data) {
    global $db;
    $query = "SELECT * FROM $table WHERE $elem_id = '$elem_data'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row[$elem_name];
    return $id;
}


//SEND RESULT
if (isset($_POST['send_result'])) {
    $id_qu = mysqli_real_escape_string($db, $_POST['id_qu']);
    $result = mysqli_real_escape_string($db, $_POST['result']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);

    $query = "UPDATE questions SET hospital = 1
                    WHERE id_question = '$id_qu'";

    mysqli_query($db, $query);

    send_message($name, $surname, $result);
}

// SEND FORM
if (isset($_POST['send_form'])) {
    if(empty($_SESSION['again'])) {
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
        if ($result >= 50) {
            $success = "Twój wynik " . $result . ". Zalecamy najszybsze skontaktowanie się z naszym ośrodkiem medycznym w celu umówienia wizyty";
        } else {
            $success = "Twój wynik " . $result;
        }

        $query = "INSERT INTO questions (id_user, date, qu1, qu2, qu3, qu4, qu5, qu6, qu7, qu8, qu9, qu10, result)
                          VALUES('$id_user', current_date, '$qu1', '$qu2', '$qu3', '$qu4', '$qu5', '$qu6', '$qu7', '$qu8', '$qu9', '$qu10', '$result')";

        mysqli_query($db, $query);

        $id_qu = mysqli_insert_id($db);
        $_SESSION['success'] = $success;
        $_SESSION['result'] = $result;
        $_SESSION['id_qu'] = $id_qu;
        $_SESSION['again'] = "Again";
    }
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
            $id_user = $user['id_user'];

            $query = "SELECT * FROM questions
                            WHERE date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                            AND id_user = '$id_user'
                            LIMIT 1";
            $result = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($result);
            if(!empty($user)) {
                $_SESSION['again'] = "Again";
            }

            header('location: index.php');
        } else {
            array_push($errors, "Nieprawidłowy adres e-mail lub hasło");
        }
    }
}
?>