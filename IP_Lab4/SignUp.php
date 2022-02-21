<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href = "Lab4_style.css" rel = "stylesheet">
    </head>

    <body>
        <?php
            $dbc = mysqli_connect('localhost', 'root', '', 'users');
            if (isset($_POST["submit_signUp"]))
            {
                $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
                $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
                $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
                if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2))
                {
                    $query = "SELECT * FROM `signup` WHERE username = '$username'";
                    $data = mysqli_query($dbc, $query);
                    if(mysqli_num_rows($data)==false)
                    {
                        $query = "INSERT INTO `signup` (username, password) VALUES ('$username', '$password2')";
                        mysqli_query($dbc, $query);
        ?>

        <label class="done">Готово!</label><p>
        <p><a href="IPLab4.php" class="sign_in_link">Войти</a></p>

        <?php
            //echo 'Готово!';
            mysqli_close($dbc);
            exit();
        }
                    else
                    {
        ?>
                        <label class="warning_signUp">Логин уже существует</label><p>
        <?php
                    }
                }
            }
        ?>

        <content>
            <form method="POST"class="sign_up" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label class="Up">Регистрация</label><p>
                <label for="username">Введите логин</label></p>
                <input type="text" name="username" class="username_signUp"></input><p>
                <label for="password">Введите пароль</label></p>
                <input type="password" name="password1" class="password_signUp1"></input><p>
                <label for="password">Введите пароль ещё раз</label></p>
                <input type="password" name="password2" class="password_signUp2"></input><p></p>
                <button type="submit" name="submit_signUp" class="submit_signUp">OK</button>
            </form>
        </content>
    </body>
</html>
