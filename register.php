<!DOCKTYPE html>
<head>
    <meta charset="UTF-8">
        <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $con = new mysqli("127.0.0.1", "root", "", "zspshop");
        var_dump($_POST);
        var_dump(isset($_POST["name"]) && strlen($_POST["name"])>0  && isset($_POST["surname"]) && isset($_POST["login"]) &&  isset($_POST["password"]));
        if(isset($_POST["name"]) && strlen($_POST["name"])>0  && isset($_POST["surname"]) && isset($_POST["login"]) &&  isset($_POST["password"])){
            var_dump($_POST);
            $sql="INSERT INTO `users`(`id`, `name`, `surname`, `login`, `password`, `isadmin`) VALUES ('NULL','".$_POST["name"]."','".$_POST["surname"]."','".$_POST["login"]."','".$_POST["password"]."','no')";
            $con->query($sql);
            header('location: '.'login.php');
        }
    ?>
    <div class="rejestracja">
   
    <form method="POST">
        Imie<br>
        <input name="name"><br>
        Nazwisko<br>
        <input name="surname"><br>
        login<br>
        <input name="login"><br>
        Haslo<br>
        <input name="password" type="password">
        <br>
        <input type="submit" value="Rejestracja">
    </form>
    <a href="login.php"><button>Wróć do logowania</button></a>
    </div>
</body>