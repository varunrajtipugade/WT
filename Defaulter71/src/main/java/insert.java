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

@WebServlet("/insert")
public class insert extends HttpServlet {
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
           PreparedStatement ps=conn.prepareStatement("insert into student values(?,?,?,?,?,?,?)");  
           ps.setInt(1,Integer.parseInt(request.getParameter("roll")));
           ps.setString(2,request.getParameter("name"));
           ps.setString(3,request.getParameter("gender"));
           ps.setString(4,request.getParameter("course"));
           ps.setInt(5,Integer.parseInt(request.getParameter("mark")));
           ps.setString(6,request.getParameter("username"));
           ps.setString(7,request.getParameter("password"));
           int rs = ps.executeUpdate();  
           if (rs!=0 && !request.getParameter("roll").equals("")) 
           {
          	 out.print("<h3>Roll Number "+request.getParameter("roll")+" Inserted successfully</h3.");
           } 
           else 
           {
          	 out.println("<h3>Please, Enter Valid Data</h3>");
           }
           conn.close();  
          }  
           catch (Exception e) 
          {  
          	 out.println("<h3>This Roll Number is Already Present</h3>");  
      	}  
       out.print("</body></html>");
	}
}
