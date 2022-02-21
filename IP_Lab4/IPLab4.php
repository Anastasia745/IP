<?php
    $dbc = mysqli_connect('localhost', 'root', '', 'users');
    if (!isset($_COOKIE['user_id']))
    {
        if (isset($_POST["submit_signIn"]))
        {
            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            if(!empty($user_username) && !empty($user_password))
            {
                $query = "SELECT `user_id`, `username` FROM `signup` WHERE username = '$user_username' AND password = '$user_password'";
                $data = mysqli_query($dbc, $query);
                if(mysqli_num_rows($data)==1)
                {
                    $row = mysqli_fetch_assoc($data);
                    setcookie('user_id', $row['user_id'], time()+(60*60*24*30));
                    setcookie('username', $row['username'], time()+(60*60*24*30));
                    $home_url = 'http://8180979.ru/IP_Lab4/My_profile.php';
                    header('Location:'.$home_url);
                }
?>
                <label class="warning_signIn">Неверный логин или пароль!</label><p>
<?php
            }
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href = "Lab4_style.css" rel = "stylesheet">
    </head>

    <body>
        <section>
            <?php
                if(empty($_COOKIE['username']))
                {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="sign_in">
                <label class="In">Войти</label><p>  
                <label for="username">Логин</label></p>
                <input type="text" name="username" class="username_signIn"></input><p>
                <label for="password">Пароль</label></p>
                <input type="password" name="password" class="password_signIn"></input><p>
                <button type="submit" name="submit_signIn" class="submit_signIn">OK</button></p>
                <a href="SignUp.php" class="sign_up_link">Зарегистрироваться</a>
            </form>

            <?php
                }
                else
                {
                    /*$home_url = 'http://8180979.ru/IP_Lab4/exit.php';
                    header('Location:'.$home_url);*/
                }
            ?>
        </section>
            
    </body>
</html>
