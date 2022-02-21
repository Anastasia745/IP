<%-- 
    Document   : MyPage
    Created on : 18.05.2021, 0:21:26
    Author     : Анастасия
--%>

<%@ page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Uploading File</title>
        <link href = "style.css" rel = "stylesheet">
    </head>
    <body>
        <label class="choice">Select a file</label><br>
        <form action="upload" method="post" enctype="multipart/form-data" class="upload_form">
            <input type="file" name="file" class="file"/></br><br>
            <input type="submit" value="UPLOAD" class="upload"/>
        </form></br>
        <a href=${path} target="blank"><img src=${path} height="200" alt=""/></a>
    </body>
</html>
<%
    String username = (String)request.getAttribute("username");
    String password = (String)request.getAttribute("password");
    Cookie cook_username = new Cookie("cook_username",username);
    Cookie cook_password = new Cookie("cook_password",password);
    response.addCookie(cook_username);
    response.addCookie(cook_password);
%>