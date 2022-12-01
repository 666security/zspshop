<html>
<head>
    <meta charset="UTF-8">
        <title>logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
     
    
            <?php
                if(!empty($_COOKIE["id"])){
                    header('location: '.'index.php');
                }
                $con = new mysqli("127.0.0.1", "root", "", "zspshop");
                print_r($_POST);
                if(isset($_POST["login"]) && isset($_POST["password"])){
                    $sql = 'SELECT id FROM users WHERE login="'.$_POST['login'].'" AND password="'.$_POST['password'].'"';
                    $res = $con->query($sql);
                    $res2 = $res->fetch_array();
                    var_dump($res2);
                    if(isset($res2)){
                    // if(!empty($res2["id"])){
                        setcookie("id",$res2["id"]);
                        header('location:'.'index.php');
                    // }
                    }
                }
            ?>
        <div class="logowanie">
        <form method="POST">
        <br>
        <hr style="width: 30%">
        <h1>Logowanie</h1>
        Login
        <br>
        <input type="text" name="login">
        <br>
        <br>
        Haslo:
        <br>
        <input type="password" name="password">
        <br>
        <br>
        <input type="submit" value="Zaloguj">
        </form>
        <a href="register.php"><button>Rejestracja</button></a>
            </div>
            
</body>
</html>

