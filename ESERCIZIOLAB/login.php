<!DOCTYPE html>
<html lang="IT">
<header>
    <meta charset="UTF-8">
    <title>ESERCIZIO</title>
</header>

<body>
<?php

    $user = $_POST["username"];
    $pws = $_POST["password"];

    try{
        $conDB = new mysqli('localhost', 'root', NULL, 'userfile');
    }
    catch(Exception $x)
    {
        if(mysqli_connect_errno())
        {
            echo "connessione fallita".mysqli_connect_errno()."<br>";
            exit(1);
        }
    }

    try 
    {
        $sql = "SELECT Nome, Cognome FROM UTENTI WHERE USERNAME='$user' AND PASSWORD = '$pws';"; 
        $result = $conDB -> query($sql);
        $row = $result-> fetch_assoc();
        if ($row) 
            echo "Ciao ".$row["Nome"]." ".$row["Cognome"];
        else{
            echo "Errore in fase di login <br> Utente non registrato o credenziali errate <br>";
            echo '<a href="inserimento.php"><button type="submit" value="submit">REGISTRATI</button></a>';
        }
    } catch (Exception $x) {
        echo "Errore: ".$x;
    }
?>
</body>