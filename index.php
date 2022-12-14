<html>

<head>
</head>
<body>
<?php 
        if(empty($_COOKIE["id"])){
            header('location: '.'login.php');
        }
    ?>
<?php
$con=new mysqli("127.0.0.1", "root","","zspshop");
$sql="select * from shopping";
$res= $con->query($sql);
$shopping= $res->fetch_all(MYSQLI_ASSOC);
for($i=0;$i<count($shopping); $i++){
    echo $shopping[$i]["name"]." - ".$shopping[$i]["description"]." <a href='oferty.php?offer_id=".$shopping[$i]["id"]."'>Edytuj</a><br>";
}
?>
<?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","zspshop");
    echo '<form method="POST">';
    $res = $con->query("SELECT * FROM users");
    $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM shopping");
    $cos1 = $res1->fetch_all();
    $w = null;
    echo '<center> Zalogowany jako: '.$_COOKIE["id"].'<h1>Wystaw:</h1><br> Nazwa Przedmiotu: <input name="name"><br> Opis: <input name="description"><br><input type="submit">';
    if($_POST!=NULL)
    {
        $t = count($cos1);
            $sqlquery = "INSERT INTO shopping (id, users_id, name, description) VALUES (".$t.", '".$_COOKIE["id"]."', '".$_POST['name']."', '".$_POST['description']."');";
            echo $sqlquery;
            $con->query($sqlquery);
            header('location: index.php');
    }
    echo '</form>';

    echo '<form action="index.php"><button>Wróć</button></form></center>';
    ?>

    


</body>
</html>