package org.arpit.javapostsForLearning;
import com.opensymphony.xwork2.ActionSupport;
 
public class LoginAction extends ActionSupport {
 
    private String userName;
    private String password;
 
    public String execute() {
        return SUCCESS;
    }
 
   
    public String getUserName() {
        return userName;
    }
 
    public void setUserName(String userName) {
        this.userName = userName;
    }
 
    public String getPassword() {
        return password;
    }
 
    public void setPassword(String password) {
        this.password = password;
    }
 
    public void validate() {
        if (getUserName().length() == 0) {
            addFieldError("userName", "UserName.required");
        } else if (!getUserName().equals("Arpit")) {
            addFieldError("userName", "Invalid User");
        }
        if (getPassword().length() == 0) {
            addFieldError("password", getText("password.required"));
        }
    }
}