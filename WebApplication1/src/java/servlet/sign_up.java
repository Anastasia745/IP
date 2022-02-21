package servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class sign_up extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
    {
        response.setContentType("text/html");
        
        try (PrintWriter out = response.getWriter())
        {
            String _username = request.getParameter("username");
            String _password1 = request.getParameter("password1");
            String _password2 = request.getParameter("password2");
        
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/users","root","");
            
            if (_password1.equals(_password2))
            {
                String query = "insert into signup (username, password) values (?, ?)";
                PreparedStatement stmt = con.prepareStatement(query);
                stmt.setString(1, _username);
                stmt.setString(2, _password2);
                stmt.executeUpdate();
                con.close();
                response.sendRedirect("index.jsp");
            }
            else
                out.println("Passwords don't match");
        }
        catch(Exception e)
        {
            System.out.println(e.getMessage());
        }
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
    {
        doGet(request, response);
    }
}