function form_validate() {
    FirstNameCheck();
	  LastNameCheck();
	  UsernameCheck();
    EmailCheck();
    PwdCheck();
	  PhoneCheck();
}

function FirstNameCheck(){
    var name = document.getElementById('firstname').value;
    var nameRegex = /^[A-Za-z ]+$/;

    if (nameRegex.test(name)==false){
        alert("Please enter valid name");
        return false;
    }
}

function LastNameCheck(){
    var name = document.getElementById('lastname').value;
    var nameRegex = /^[A-Za-z]+$/;

    if (nameRegex.test(name)==false){
        alert("Please enter valid name");
        return false;
    }
}

function UsernameCheck(){
    var uname = document.getElementById('username').value;

    var unameRegex = /^\w+$/;
    if(unameRegex.test(uname)==false) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      username.focus();
      return false;
    }
    else
        return true;
}

function EmailCheck(){
    var email = document.getElementById('email').value;
    var cemail = document.getElementById('cemail').value;

    var emailRegex = /^[\w.-]+@(\w+.){1,3}\w{2,3}$/;

	if( email!= "" && email == cemail) {
		if (emailRegex.test(email)==false){
        alert("Please enter a valid email");
        return false;
        email.focus();
    	}
        else
            return true;
	}
	else{
		alert("Error: Please check that you've entered and confirmed your email!");
      	form.cemail.focus();
      	return false;
	}

}

function PwdCheck(){
	var pwd = document.getElementById('pwd').value;
	var cpwd = document.getElementById('cpwd').value;

    if( pwd != "" && pwd == cpwd) {
      if(pwd.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd.focus();
        return false;
      }
      if(pwd == username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(pwd)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(pwd)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(pwd)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd.focus();
      return false;
    }

    //alert("You entered a valid password: " + pwd);
    return true;
}

function PhoneCheck(){
	var phone = document.getElementById('phone').value;
	var phoneRegex = /^\d{8}$/;
	if (phoneRegex.test(phone)==false){
		alert("Error: please enter valid phone number (8 digits)!");
		return false;
	}
}

function ShowAlert(){
  alert("Submitted!");
}

/*function StartDateCheck(){
    var date = Date.parse(document.getElementById('start_date').value);
    var now = new Date();

    if (date < now){
        alert("Please enter a future date");
        return false;
    }
}
*/
