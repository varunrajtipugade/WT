import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/update")
public class update extends HttpServlet {
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
          PreparedStatement ps=conn.prepareStatement("update student set name=?,gender=?,course=?,mark=?,username=?,password=? where roll=?");  
          
          ps.setString(1,request.getParameter("name"));
          ps.setString(2,request.getParameter("gender"));
          ps.setString(3,request.getParameter("course"));
          ps.setInt(4,Integer.parseInt(request.getParameter("mark")));
          ps.setString(5,request.getParameter("username"));
          ps.setString(6,request.getParameter("password"));
          ps.setInt(7,Integer.parseInt(request.getParameter("roll")));
          int rs = ps.executeUpdate();  
          if (rs!=0 && !request.getParameter("roll").equals("")) 
          {
         	 out.print("<h3>Roll Number "+request.getParameter("roll")+" Updated successfully</h3.");
          } 
          else 
          {
         	 out.println("<h3>This Roll Number is Not Present</h3>");
          }
          conn.close();  
         }  
          catch (Exception e) 
         {  
         	 out.println("<h3>Please, Enter All Data</h3>");  
     	}  
      out.print("</body></html>");
	}
}
