<%-- 
    Document   : index
    Created on : 07.05.2021, 21:28:37
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
        <form action="sign_in" method="post" class="sign_in">
            <label class="In">Log in</label><p>
            <input type="text" placeholder="username" name="username" class="username_signIn"></input><p>
            <input type="password" placeholder="password" name="password" class="password_signIn"></input><p>
            <input type="submit" class="submit_signIn" value="Log in"></input></p>
            <a href="SignUp.jsp" class="sign_up_link">Sign up</a>
        </form>
        
    </body>
</html>
