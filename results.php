<?php include('server.php');

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include('header.php') ?>

<div class="content">
    <?php  if (!isset($_SESSION['username'])) : ?>

        <p>
            Aby zobaczyć wyniki należy się zalogować <a href="login.php">Zaloguj się</a>
        </p>

    <?php else: ?>
        <h1>Wyniki</h1>
        <table>
            <tr>
                <th>Data</th>
                <th>Wynik</th>
                <th>Szczegóły</th>
            </tr>
            <?php while ($result = mysqli_fetch_array(
                $all_results,MYSQLI_ASSOC)): ?>
                    <tr>
                        <td><?php echo getData('questions', 'id_user', 'date', $_SESSION['userid']); ?></td>
                    </tr>
                <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>
<script src="index.js"></script>
</body>
</html>