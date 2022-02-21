package servlet;

import java.beans.Statement;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.naming.spi.DirStateFactory.Result;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Анастасия
 */
public class sign_in extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
    {
        response.setContentType("text/html");
        
        
        
        try (PrintWriter out = response.getWriter())
        {
            String _username = request.getParameter("username");
            String _password = request.getParameter("password");
        
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/users","root","");
            java.sql.Statement stm = con.createStatement();
            ResultSet rs = stm.executeQuery("select * from signup where username = '"+_username+"' and password = '"+_password+"'");

            if(rs.next())
            {
                request.setAttribute("username", _username);
                request.setAttribute("password", _password);
                request.getRequestDispatcher("/MyPage.jsp").forward(request, response);
                response.sendRedirect("MyPage.jsp");  
            }
            else
                out.println("Invalid username or password");
            con.close(); 
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
