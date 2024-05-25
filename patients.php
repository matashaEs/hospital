<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include('header.php') ?>

<div class="content">
    <h1>Pacjenci</h1>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <table>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Pesel</th>
            <th>Data</th>
            <th>Wynik</th>
            <th>Szczegóły</th>
        </tr>
        <?php while ($result = mysqli_fetch_array(
            $all_results,MYSQLI_ASSOC)):
            if($result['hospital'] == 1) : ?>
                <tr class="table-row">
                    <td><?php echo getData('user', 'id_user', 'name', $result['id_user']); ?></td>
                    <td><?php echo getData('user', 'id_user', 'surname', $result['id_user']); ?></td>
                    <td><?php echo getData('user', 'id_user', 'pesel', $result['id_user']); ?></td>
                    <td><?php echo $result['date']; ?></td>
                    <td><?php echo $result['result']; ?></td>
                    <td>
                        <button type="button" class="btn btn_add button btn-margin">Pokaż szczegóły</button>
                    </td>
                </tr>
                <tr class="row-hidden hidden">
                    <td colspan="6" class="column-within">
                        <table class="table-within">
                            <tr class="row">
                                <td colspan="2">Jak oceniasz swoje ogólne samopoczucie w porównaniu z czasem przed
                                    leczeniem?
                                </td>
                                <td><?php echo $result['qu1'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Na ile ustały objawy, które występowały przed leczeniem?
                                </td>
                                <td><?php echo $result['qu2'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Czy masz jakiekolwiek nowe objawy, które pojawiły się po zakończeniu
                                    leczenia?
                                </td>
                                <td><?php echo $result['qu3'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Jak oceniasz regularność wykonywania zaleconych kontroli lub badań
                                    kontrolnych?
                                </td>
                                <td><?php echo $result['qu4'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Jak bardzo przestrzegasz zaleceń dotyczących diety i aktywności
                                    fizycznej po
                                    zakończeniu leczenia?
                                </td>
                                <td><?php echo $result['qu5'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Czy doświadczasz skutków ubocznych po zakończeniu leczenia?</td>
                                <td><?php echo $result['qu6'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Jakie jest twoje ogólne zadowolenie z postępu zdrowienia po
                                    zakończeniu
                                    leczenia?
                                </td>
                                <td><?php echo $result['qu7'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Jak oceniasz swoje zaangażowanie w dbanie o swoje zdrowie po
                                    wyleczeniu?
                                </td>
                                <td><?php echo $result['qu8'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Czy masz jakiekolwiek obawy dotyczące swojego zdrowia po zakończeniu
                                    leczenia?
                                </td>
                                <td><?php echo $result['qu9'] ?></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2">Jak oceniasz swoje plany dotyczące dalszej opieki nad swoim
                                    zdrowiem?
                                </td>
                                <td><?php echo $result['qu10'] ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endif;endwhile;?>
    </table>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
</div>
<script src="results.js"></script>
</body>
</html>

