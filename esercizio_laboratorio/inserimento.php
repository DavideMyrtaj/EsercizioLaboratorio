<!DOCTYPE html>
<html lang="IT">
<header>
    <meta charset="UTF-8">
    <title>ESERCIZIO</title>
</header>

<body>
    <?php
    if(isset($_POST["submit"]))
    {
        $user=$_POST["Username"];
        $pws=$_POST["Password"];
        $nome=$_POST["Nome"];
        $cognome=$_POST["Cognome"];

        try
        {
            $conDB=new mysqli('localhost','root','123','ESERCIZIO');
            //echo "connessione effettuata"."<br>";
        }
        catch (Exception $x)
        {
            if(mysqli_connect_errno())
            {
                echo "connessione fallita".mysqli_connect_errno()."<br>";
                exit(1);
            }
        }
        //inserimento dati
        try
        {
            $ris = $conDB->query("INSERT INTO UTENTI (NOME, COGNOME, USERNAME, PASSWORD) VALUES ('$nome', '$cognome', '$user','$pws')");
            if(!$ris){
                echo "Registrazione non andata a buon fine"."<br>";
                echo '<a href="inserimento.php"><button type="submit" value="submit">REGISTRATI</button></a>';
            }else{
                echo "Utente registrato correttamente"."<br>";
                echo '<a href="inseriscilogin.php"><button type="submit" value="submit">ACCEDI</button></a>';
            }

            
        }
        catch(Exception $x)
        {
            die("query fallita:".$x);
        }
        $conDB->close();
    }
    else{
        echo '<body>
        <h2>REGISTRAZIONE</h2>
        <form action="".$_SERVER["PHP_SELF"]."" method="POST">
            <label for="Nome">NOME</label>
            <input type="text" name="Nome"> </br></br>
            <label for="Cognome">COGNOME</label>
            <input type="text" name="Cognome"> </br></br>
            <label for="Username">USERNAME</label>
            <input type="text" name="Username"> </br></br>
            <label for="Password">PASSWORD</label>
            <input type="password" name="Password"> </br></br>
            <input type="submit" name="submit" value="INVIA"></br></br>
            <input type="reset" name="reset" value="RESET"></br></br>
        </form>
        </body>';
    }
    
    ?>
</body>