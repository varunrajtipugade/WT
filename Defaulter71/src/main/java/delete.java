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

@WebServlet("/delete")
public class delete extends HttpServlet {
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
            PreparedStatement ps=conn.prepareStatement("delete from student where roll=?");  
            ps.setInt(1,Integer.parseInt(request.getParameter("roll")));
            int rs = ps.executeUpdate();  
            if (rs!=0 && !request.getParameter("roll").equals("")) 
            {
           	 out.print("<h3>Roll Number "+request.getParameter("roll")+" Deleted successfully</h3.");
            } 
            else 
            {
           	 out.println("<h3>Please, Enter Valid Roll Number</h3>");
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