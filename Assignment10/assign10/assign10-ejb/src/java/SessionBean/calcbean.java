package SessionBean;
import javax.ejb.Stateless;
@Stateless
public class calcbean implements calcbeanLocal {

    @Override
    public Integer add(int a, int b) {
        return (a+b);
    }
}
