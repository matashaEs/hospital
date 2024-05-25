<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hospital</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include('header.php') ?>
<div class="content">
<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Imię</label>
        <input type="text" name="name">
    </div>
    <div class="input-group">
        <label>Nazwisko</label>
        <input type="text" name="surname">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div class="input-group">
        <label>PESEL</label>
        <input type="text" name="pesel">
    </div>
    <div class="input-group">
        <label>Hasło</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Potwierdź hasło</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn button" name="reg_user">Rejestracja</button>
    </div>
    <p>
        Jesteś już członkiem? <a href="login.php">Zaloguj się</a>
    </p>
</form>
</div>
</body>
</html>