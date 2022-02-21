/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlet;

import java.io.File;
import java.io.IOException;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
 
public class upload extends HttpServlet
{
    private static final long serialVersionUID = 1L;
    public upload()
    {
        super();
    }
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
    {
        response.setContentType("text/html");
        if(ServletFileUpload.isMultipartContent(request))
        {
            try
            {
                List <FileItem> multiparts = new ServletFileUpload(new DiskFileItemFactory()).parseRequest(request);
                for(FileItem item : multiparts)
                {
                    if(!item.isFormField())
                    {
                        String name = new File(item.getName()).getName();
                        String path = new File(item.getName()).getPath();
                        long wait = item.getSize();
                        if(wait<=2*1024*1024 && !name.contains("<") && !name.contains(">") && !name.contains("script") && !name.contains("http") && !name.contains("SELECT") && !name.contains("UNION") && !name.contains("UPDATE") && !name.contains("exe") && !name.contains("INSERT") && !name.contains("tmp"))
                            item.write(new File("C:/Users/Public/img" + File.separator + name));
                        request.setAttribute("path", path);
                        request.setAttribute("wait", wait);
                    }
                }
            }
            catch(Exception ex)
            {
                request.setAttribute("message", "File Upload Failed due to " + ex);
            }
        }
        else
        {
            request.setAttribute("message","No File found");
        }
        request.getRequestDispatcher("/MyPage.jsp").forward(request, response);
    }
}