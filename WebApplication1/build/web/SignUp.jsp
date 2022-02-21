<%-- 
    Document   : SignUp
    Created on : 17.05.2021, 17:52:37
    Author     : Анастасия
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link href = "style.css" rel = "stylesheet">
    </head>
    <body>
        <form action="sign_up" method="post" class="sign_up">
            <label class="Up">Registration</label><p>
            <input type="text" placeholder="Enter your username" name="username" class="username_signUp"></input><p>
            <input type="password" placeholder="Enter your password" name="password1" class="password_signUp1"></input><p>
            <input type="password" placeholder="Confirm your password" name="password2" class="password_signUp2"></input><p></p>
            <input type="submit" name="submit_signUp" class="submit_signUp" value="OK"></button>
        </form>
    </body>
</html>
