<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg-style.css">
    <title>Document</title>
</head>
<body>
<div class = "main">
    <div class = "prihlasenie-place">
        <div class = "prihlasenie">
            <div class = "prihlasenie-pozadie">

        <?php

            session_start();
            require_once('db.php');
            if($_POST){
                if($_POST['rok'] != date('Y'))
                    echo '<p>Chybne vyplneny antispam.</p>';
                else if($_POST['heslo'] == '')
                    echo "<p>Nevyplnili ste heslo.</p>";
                else if($_POST['heslo'] != $_POST['oheslo'])
                    echo "<p>Hesla sa nezhoduju.</p>";
                else if($_POST['email'] == '')
                    echo "<p>Nevyplnili ste email.</p>";
                else if($_POST['meno'] !=''){
                    $meno = $_POST['meno'];
                    $email = $_POST['email'];
                    $sql = "SELECT name_user FROM uzivatelia WHERE name_user = '$meno' OR email_user = '$email' LIMIT 1;";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0)
                        echo '<p>Uzivatel s tymto menom alebo emailom uz existuje</p>';
                    else{
                        $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
                        $meno = $_POST['meno'];
                        $email = $_POST['email'];
                        $sqli = "INSERT INTO uzivatelia (name_user, user_password, email_user) VALUES ('$meno', '$heslo', '$email')";
                        $conn->query($sqli);
                        $posledny = $con->insert_id;
                        $_SESSION['uzivatel_id'] = $con->insert_id;
                        $_SESSION['uzivatel_meno'] = $_POST['meno'];
                        $_SESSION['uzivatel_email'] = $_POST['email'];
                        $_SESSION['uzivatel_admin'] = 0;
                        //header('Location: admin/administracia.php');
                        header('Location: admin/admin_view.php?stranka=administracia');
                        exit();
                    }
                }else{
                    echo "<p>Nezadali ste svoje meno.</p>";
                }   
            }
        ?>
                <form method="post">
                <div class="icon-holder">
                <?php $vyp_meno = (isset($_POST['meno'])) ? $_POST['meno'] : ''; ?>
                <input type="text" placeholder="Meno" name="meno" value="<?php echo htmlspecialchars($vyp_meno); ?>"> <br>
                </div>
                <div class="icon-holder">
                <?php $vyp_heslo = (isset($_POST['heslo'])) ? $_POST['heslo'] : ''; ?>
                <input type="password" placeholder="Heslo" name="heslo" value="<?php echo htmlspecialchars($vyp_heslo); ?>"> <br>
                </div>
                <div class="icon-holder">
                <?php $vyp_oheslo = (isset($_POST['oheslo'])) ? $_POST['oheslo'] : ''; ?>
                <input type="password" placeholder="Opakuj Heslo" name="oheslo" value="<?php echo htmlspecialchars($vyp_oheslo); ?>"> <br>
                </div>
                <div class="icon-holder">
                <?php $vyp_email = (isset($_POST['email'])) ? $_POST['email'] : ''; ?>
                <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($vyp_email); ?>"> <br>
                </div>
                <div class="icon-holder">
                <?php $vyp_rok = (isset($_POST['rok'])) ? $_POST['rok'] : ''; ?>
                <input type="number" placeholder="Aktuálny Rok" name="rok" value="<?php echo htmlspecialchars($vyp_rok); ?>"> <br>
                </div>
            <input type="submit" name="submit" value="Registrovať sa"> <br>
        </form>
        </div>
    </div>
        <div class = "loginText">
                    <?php
                        echo "Máte už účet? ";
                    ?>
                    <a href="admin/prihlasenie.php">
                        <span class="title">Prihlásiť sa</span>
                    </a>
                    <?php
                        echo ".";
                    ?>
            </div>
        </div>
        </div>

</body>
</html>