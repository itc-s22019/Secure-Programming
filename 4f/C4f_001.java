import java.io.*;
import javax.servlet.http.*;
import org.apache.commons.lang3.StringEscapeUtils;

public class C4f_001 extends HttpServlet {
  String name;
  protected void doGet(HttpServletRequest req,
                       HttpServletResponse res)
       throws IOException {
    PrintWriter out = res.getWriter();
    out.print("<body>name=");
    try {
      name = req.getParameter("name"); 
      Thread.sleep(3000);
      out.print(StringEscapeUtils.escapeHtml4(name));
    } catch (InterruptedException e) {
      out.println(e);
    }
    out.println("</body>");
    out.close();
  }
}
