<?php
 include('server.php');

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
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>

<?php include('header.php') ?>

<div class="content">
    <?php  if (!isset($_SESSION['username'])) : ?>

       
        <div class="slideshow-container">
            <?php
                $imagePaths = ["./image/hospital_building.jpg", "./image/nurse.jpg", "./image/hospital_xray.jpg", "./image/doctors.jpg", "./image/hospital1.jpg", "./image/hospital2.jpg"];
                $altTexts = ["Building", "Nurse", "xray", "doctors", "hospital1", "hospital2"];

                foreach ($imagePaths as $index => $imagePath) {
                    echo '<div class="mySlides fade">';
                    echo '<img src="' . $imagePath . '" alt="' . $altTexts[$index] . '">';
                    echo '</div>';
                }
            ?>
        </div>

        <div class="text"> Witaj w Szpitalu Nowoczesnej Medycyny, gdzie kompleksowa opieka zdrowotna spotyka najwyższy poziom technologii! Nasza placówka jest wyposażona w najnowocześniejszy sprzęt medyczny, zapewniający szybkie i skuteczne badania diagnostyczne.

            Oferujemy szeroki zakres badań diagnostycznych, w tym:
            <ul> 
            <li> tomografię komputerową, </li> 
            <li>rezonans magnetyczny, </li>
            <li>badania laboratoryjne, </li>
            <li> elektrokardiografia (EKG) </li>
            <li> ultrasonografia (USG) </li> </ul>
            Dzięki zaawansowanym technologiom i doświadczonemu personelowi medycznemu możemy zapewnić precyzyjne i dokładne wyniki badań w krótkim czasie.

     Jako Szpital Nowoczesnej Medycyny, nie tylko zapewniamy skuteczną diagnostykę, ale również dbamy o komfort i satysfakcję naszych pacjentów. Dlatego stawiamy na szybki dostęp do wyników badań i profesjonalną opiekę medyczną na każdym etapie leczenia.
Zaufaj naszemu doświadczeniu i wybierz Szpital Nowoczesnej Medycyny dla swojego zdrowia i bezpieczeństwa!
        </div>
</div>
    <div class="text1">
        <p>
            Aby wypełnić formularz należy się zalogować <a href="login.php">Zaloguj się</a> 
        </p>
    </div>


    <?php else: ?>
        <h1>Formularz</h1>

        <form method="post" action="index.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label for="qu1">Pytanie 1: Jak oceniasz swoje ogólne samopoczucie w porównaniu z czasem przed leczeniem? (0 oznacza źle, 10 oznacza doskonale).</label>
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
                <label for="qu2">Pytanie 2: Na ile ustały objawy, które występowały przed leczeniem? (0 oznacza brak poprawy, 10 oznacza całkowitą poprawę).</label>
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
                <label for="qu3">Pytanie 3: Czy masz jakiekolwiek nowe objawy, które pojawiły się po zakończeniu leczenia? (0 oznacza brak nowych objawów, 10 oznacza wystąpienie wielu nowych objawów).</label>
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
                <label for="qu4">Pytanie 4: </label>
                <input type="range" id="qu4" name="qu4" list="qu4_markers" min="1" max="10" value="1"/>

                <datalist id="qu4_markers">
                    <option value="0" label="0"></option>
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
                    <form method="post" action="index.php">
                        <input type="hidden" name="id_qu" value="<?php echo ($_SESSION['id_qu']) ?>">
                        <input type="hidden" name="name" value="<?php echo $_SESSION['username']; ?>">
                        <input type="hidden" name="surname" value="<?php echo getData('user', 'id_user', 'surname', $_SESSION['userid']); ?>">
                        <input type="hidden" name="result" value="<?php echo $_SESSION['result'] ?>">
                        <button type="submit" class="btn" name="send_result">Wyślij wynik do lekarza</button>
                    </form>
                </div>
            </div>
        <?php endif ?>
    <?php endif; ?>
</div>
<script src="index.js"></script>
</body>
</html>