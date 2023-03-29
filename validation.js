
function formValidation() {
    var fname = document.getElementById("username").value;  
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;

    var password = document.getElementById("password").value; 
    var cpassword = document.getElementById("cpassword").value; 

    var fnamepattern = /^[a-zA-Z. ]{2,}$/; 
    var emailPattern = /^[a-zA-Z0-9_-]{3,}@[a-zA-Z0-9_-]{3,}\.[a-zA-Z]{2,4}$/  
    var mobilepattern = /^(\+88|88)?01[3-9]\d{8}$/
    var passwordpattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/ 

    console.log(fname);

    if (fnamepattern.test(fname)) {
        document.getElementById("nerror").innerHTML = "";
    } else {
        document.getElementById("nerror").innerHTML = "**Name Is Not Valid**";
        return false;
    }

    

    if (emailPattern.test(email)) {
        document.getElementById("eerror").innerHTML = "";

    } else {
        document.getElementById("eerror").innerHTML = "**Email Is Invalid**";
        return false
    }

    if (mobilepattern .test(mobile)) {
        document.getElementById("merror").innerHTML = "";

    } else {
        document.getElementById("merror").innerHTML = "**Mobile Number Not Valid**";
        return false
    }

   

    if (passwordpattern.test(password)) {
        document.getElementById("perror").innerHTML = "";

    } else {
        document.getElementById("perror").innerHTML = "**Password Incorrect**";
        return false;
    }

    if (password == cpassword) {
        document.getElementById("cperror").innerHTML = "";
    } else {
        document.getElementById("cperror").innerHTML = "**Password Not Match**";
        return false;
    }



}