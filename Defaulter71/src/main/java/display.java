

import java.io.IOException;
import java.io.*;  
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*; 

@WebServlet("/display")
public class display extends HttpServlet {
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
             Statement stmt = conn.createStatement();  
             ResultSet rs = stmt.executeQuery("select * from student");  
             out.println("<table border=1 width=50% height=80px>");  
             out.println("<tr><th>Roll No.</th><th>Name</th><th>Gener</th><th>Course</th><th>Marks</th><th>Username</th><tr>");  
             while (rs.next()) 
             {  
                 String roll = rs.getString("roll");  
                 String name = rs.getString("name");  
                 String gender = rs.getString("gender");
                 String course = rs.getString("course");
                 int mark = rs.getInt("mark");   
                 String user = rs.getString("username");  
                 out.println("<tr><td>" + roll + "</td><td>" + name + "</td><td>" + gender + "</td><td>" + course + "</td><td>" + mark + "</td><td>"+ user + "</td></tr>");   
             }  
             out.println("</table>");  
             out.println("</html></body>");  
             conn.close();  
            }  
             catch (Exception e) 
            {  
             out.println(e);  
        	}  
	}
}
