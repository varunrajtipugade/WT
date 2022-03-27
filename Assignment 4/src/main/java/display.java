import java.io.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  
import java.sql.*;  
    
public class display extends HttpServlet  
{    private static final long serialVersionUID = 1L;
	public display() {}
     public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException 
      {  
         PrintWriter out = res.getWriter();  
         res.setContentType("text/html");  
         out.println("<html><body>");  
         try 
         {  
             Class.forName("com.mysql.jdbc.Driver");  
             String DBURL="jdbc:mysql://localhost:3306/wt4";
             String USER="root";
             String PASS="";
             Connection conn=DriverManager.getConnection(DBURL,USER,PASS);   
             Statement stmt = conn.createStatement();  
             ResultSet rs = stmt.executeQuery("select * from student");  
             out.println("<table border=1 width=50% height=50%>");  
             out.println("<tr><th>Roll No.</th><th>Name</th><th>Marks</th><tr>");  
             while (rs.next()) 
             {  
                 String roll = rs.getString("roll");  
                 String name = rs.getString("name");  
                 int mark = rs.getInt("mark");   
                 out.println("<tr><td>" + roll + "</td><td>" + name + "</td><td>" + mark + "</td></tr>");   
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