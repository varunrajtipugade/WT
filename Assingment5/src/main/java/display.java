

import java.io.IOException;
import java.io.*;  
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*; 
/**
 * Servlet implementation class display
 */
@WebServlet("/display")
public class display extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public display() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse res) throws ServletException, IOException {
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

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
