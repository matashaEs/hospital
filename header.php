<div class="header">
    <div class="header-content">
        <a href="index.php" class="button"><h3>Formularz</h3></a>
        <a href="results.php" class="button"><h3>Wyniki</h3></a>
    </div>

    <?php  if (isset($_SESSION['username'])) : ?>
        <div class="header-content">
            <?php if ($_SESSION['email'] == 'admin@gmail.com' && $_SESSION['password'] == md5('n')) : ?>
                <a href="box.php"><p>Skrzynka</p></a>
            <?php endif; ?>
            <p class="button">Hej <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">Wyjdź</a> </p>
        </div>
    <?php else: ?>

        <p><a href="login.php" class="button" style="color: white;">Zaloguj się</a></p>

    <?php endif ?>
</div>