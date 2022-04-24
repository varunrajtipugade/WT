import java.io.IOException;
import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*; 
@WebServlet("/login")
public class login extends HttpServlet {
	private static final long serialVersionUID = 1L;

	protected void doGet(HttpServletRequest request, HttpServletResponse res) throws ServletException, IOException {
		 PrintWriter out = res.getWriter();  
		 res.setContentType("text/html");  
		 out.println("<html><body>");
         try 
         {  
             Class.forName("com.mysql.jdbc.Driver");  
             String DBURL="jdbc:mysql://localhost:3306/df";
             String USER="root";
             String PASS="";
             Connection conn=DriverManager.getConnection(DBURL,USER,PASS);   
             PreparedStatement ps=conn.prepareStatement("select * from student where username=? and password=?");  
             ps.setString(1,request.getParameter("username"));  
             ps.setString(2,request.getParameter("password"));  
             ResultSet rs = ps.executeQuery();  
             if (rs.next() && !request.getParameter("username").equals("")) 
             {
            	 out.print("<h3>"+request.getParameter("username")+", You are successfully logged in...</h3.");
             } 
             else 
             {
            	 out.println("<h3>Username or Password incorrect</h3>");
             }
             conn.close();  
            }  
             catch (Exception e) 
            {  
            	 out.println(e);  
        	}  
         out.print("</body></html>");
	}

}
