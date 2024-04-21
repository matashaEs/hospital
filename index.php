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
            Aby wypełnić formularz należy się zalogować <a href="login.php">Zaloguj się</a>
        </p>

    <?php else: ?>
        <h1>Formularz</h1>

        <form method="post" action="index.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label for="qu1">Pytanie 1:</label>
                <input type="range" id="qu1" name="qu1" list="qu1_markers" min="1" max="10" value="1"/>

                <datalist id="qu1_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu2">Pytanie 2:</label>
                <input type="range" id="qu2" name="qu2" list="qu2_markers" min="1" max="10" value="1"/>

                <datalist id="qu2_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu3">Pytanie 3:</label>
                <input type="range" id="qu3" name="qu3" list="qu3_markers" min="1" max="10" value="1"/>

                <datalist id="qu3_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu4">Pytanie 4:</label>
                <input type="range" id="qu4" name="qu4" list="qu4_markers" min="1" max="10" value="1"/>

                <datalist id="qu4_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu5">Pytanie 5:</label>
                <input type="range" id="qu5" name="qu5" list="qu5_markers" min="1" max="10" value="1"/>

                <datalist id="qu5_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>
            <div class="input-group button-group-right">
                <button type="button" class="btn btn_next">Następna strona</button>
            </div>

            <div class="form_container">
            <div class="input-group">
                <label for="qu6">Pytanie 6:</label>
                <input type="range" id="qu6" name="qu6" list="qu6_markers" min="1" max="10" value="1"/>

                <datalist id="qu6_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu7">Pytanie 7:</label>
                <input type="range" id="qu7" name="qu7" list="qu7_markers" min="1" max="10" value="1"/>

                <datalist id="qu7_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu8">Pytanie 8:</label>
                <input type="range" id="qu8" name="qu8" list="qu8_markers" min="1" max="10" value="1"/>

                <datalist id="qu8_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu9">Pytanie 9:</label>
                <input type="range" id="qu9" name="qu9" list="qu9_markers" min="1" max="10" value="1"/>

                <datalist id="qu9_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group">
                <label for="qu10">Pytanie 10:</label>
                <input type="range" id="qu10" name="qu10" list="qu10_markers" min="1" max="10" value="1"/>

                <datalist id="qu10_markers">
                    <option value="1" label="1"></option>
                    <option value="2" label="2"></option>
                    <option value="3" label="3"></option>
                    <option value="4" label="4"></option>
                    <option value="5" label="5"></option>
                    <option value="6" label="6"></option>
                    <option value="7" label="7"></option>
                    <option value="8" label="8"></option>
                    <option value="9" label="9"></option>
                    <option value="10" label="10"></option>
                </datalist>
            </div>

            <div class="input-group button-group">
                <button type="button" class="btn btn_prev">Poprzednia strona</button>
                <button type="submit" class="btn" name="send_form">Wyślij</button>
            </div>
            </div>
        </form>
        <?php if (isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
                <div class="input-group">
                    <button type="submit" class="btn" name="send_result">Wyślij wynik do lekarza</button>
                </div>
            </div>
        <?php endif ?>
    <?php endif; ?>
</div>
<script src="index.js"></script>
</body>
</html>