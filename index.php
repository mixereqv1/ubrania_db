<?php
    function connect(){
        $conn = mysqli_connect('127.0.0.1','root','','ubrania');
        return $conn;
    }
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
</head>
    <body>
        
        <main class="main">
        
            <table>
            
                <th>ID</th><th>Nazwa</th><th>Cena</th>

                <?php

                    $sql = "SELECT * FROM produkty";
                    $result = mysqli_query(connect(),$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo('<tr>');
                        echo('<td>' .$row['id_produkt']. '</td><td>' .$row['nazwa']. '</td><td>' .$row['koszt']. '</td>');
                        echo('</tr>');
                    }

                ?>
            
            </table>

            <table>
            
                <th>ID w koszyku</th><th>ID produktu</th><th>Ilość</th><th>Cena</th>

                <?php

                    $sql = "SELECT * FROM produkty,koszyk WHERE produkty.id_produkt=koszyk.id_produkt";
                    $result = mysqli_query(connect(),$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo('<tr>');
                        echo('<td>' .$row['id_koszyk']. '</td><td>' .$row['id_produkt']. '</td><td>' .$row['ilosc']. '</td><td>' .$row['koszt']. '</td><td>
                            <form action="del.php" method="POST">
                                <input type="hidden" name="id_to_del" value='.$row['id_koszyk'].'>
                                <input type="submit" value="-">
                            </form>
                        </td>');
                        echo('</tr>');
                    }
                    $suma = "SELECT ROUND(SUM(koszyk.ilosc*produkty.koszt),2) AS suma FROM produkty,koszyk WHERE produkty.id_produkt=koszyk.id_produkt";
                    $result_suma = mysqli_query(connect(),$suma);
                    while($row = mysqli_fetch_assoc($result_suma)){
                        echo('<tr>');
                        echo('<th>SUMA: </th><th>'.$row['suma'].'</th>');
                        echo('</tr>');
                    }

                ?>
            
            </table>

        </main>

    </body>
</html>