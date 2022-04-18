<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%
   String DBURL="jdbc:mysql://localhost:3306/jsp6";
   String USER="root";
   String PASS="";
   try {
      Class.forName("com.mysql.jdbc.Driver"); 
   } catch (ClassNotFoundException e) {
      e.printStackTrace();
   }
%>
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<h1>Student Information</h1>
   <table border="1" width="50%">
      <tr>
         <td>Roll No</td>
         <td>Name</td>
         <td>Class</td>
         <td>Division</td>
         <td>City</td>
      </tr>
      <%
         try{
            Connection conn=DriverManager.getConnection(DBURL,USER,PASS);   
            Statement stmt = conn.createStatement();  
            ResultSet rs = stmt.executeQuery("select * from student");  
            while(rs.next()){
      %>
         <tr>
            <td><%=rs.getInt("roll") %></td>
            <td><%=rs.getString("name") %></td>
            <td><%=rs.getString("class") %></td>
            <td><%=rs.getString("div") %></td>
            <td><%=rs.getString("city") %></td>
         </tr>
      <%
         	}
            conn.close();
         } catch (Exception e) {
            e.printStackTrace();
         }
      %>
      </table> 
</body>
</html>