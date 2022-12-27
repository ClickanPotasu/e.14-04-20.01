<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gromady kręgowców</title>
    <link rel="stylesheet" href="styl12.css">
</head>

<body>

    <section class="menu">
        <a href="gromada-ryby.html">gromada ryb</a>
        <a href="gromada-ptaki.html">gromada ptaków</a>
        <a href="gromada-ssaki.html">gromada ssaków</a>
    </section>

    <section class="logo">
        <h2>GROMADY KREGÓWCÓW</h2>
    </section>

    <section class="lewy">
        <?php 
            $server = 'localhost';
            $user = 'root';
            $password = "";
            $db = 'baza';
            $conn = mysqli_connect($server, $user, $password, $db);

            if(!$conn){
                echo "Błąd połączenia z bazą danych".mysqli_error($conn);
            }else{

                $zapytanie = "SELECT id,Gromady_id,gatunek,wystepowanie FROM `zwierzeta` WHERE Gromady_id = 4 OR Gromady_id = 5;";
                $wynik = mysqli_query($conn, $zapytanie);

                if(mysqli_num_rows($wynik) > 0){
                
                while($tekst = mysqli_fetch_assoc($wynik) ){
                    if($tekst['Gromady_id'] == 4){
                        $gromada = " ptaki";
                    }if($tekst['Gromady_id'] == 5){
                        $gromada = " ssaki";
                        }
                    echo $tekst['id'].". ".$tekst['gatunek']."<br>";
                    echo "Występowanie: ".$tekst['wystepowanie'].", gromada".$gromada.'<br>';
                    echo "<hr>"; 
                    
                }
            }
            }
            mysqli_close($conn);
        
        ?>
    </section>

    <section class="prawy">
        <h1>PTAKI</h1>
        <?php 
            $server = 'localhost';
            $user = 'root';
            $password = "";
            $db = 'baza';
            $conn = mysqli_connect($server, $user, $password, $db);

            if(!$conn){
                echo "Błąd połączenia z bazą danych".mysqli_error($conn);
            }else{

                $zapytanie = "SELECT gatunek,obraz FROM `zwierzeta` WHERE Gromady_id = 4";
                $wynik = mysqli_query($conn, $zapytanie);

                if(mysqli_num_rows($wynik) > 0){
                    echo '<ol>';
                while($tekst = mysqli_fetch_assoc($wynik) ){
                    echo '<li>';
                    echo '<a href="'.$tekst['obraz'].'">'.$tekst['gatunek'].'</a><br>';
                    echo '</li>';
                }
                echo '</ol>';
            }
            }
            mysqli_close($conn);
        
        ?>
        <img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">
    </section>

    <section class="stopka">
        Stronę o kręgowcach przygotował: Alan Maroński
    </section>

</body>

</html>