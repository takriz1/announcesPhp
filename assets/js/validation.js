// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    alert("validate from");
    // Retrieving the values of form elements 
    var nom = document.contactForm.nom.value;
    var prenom = document.contactForm.prenom.value;
    var telephone = document.contactForm.telephone.value;
    var email = document.contactForm.email.value;
    var motdepasse = document.contactForm.pass.value;
    var retypepassword = document.contactForm.confirm_pass.value;
    var conditionschk = document.getElementsByName("conditions");
    console.log("conditionschk", conditionschk);
    // Defining error variables with a default value
    var nameErr = emailErr = mobileErr = lastnameErr = passwordErr = retypeErr = conditionsErr = true;

    // Validate name
    if (nom == "") {
        printError("nameErr", "Please enter your name");
        nameErr = false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(nom) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }
    if (prenom == "") {
        printError("lastnameErr", "Please enter your firstname");
        lastnameErr = false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(prenom) === false) {
            printError("lastnameErr", "Please enter a valid firstName");
        } else {
            printError("lastnameErr", "");
            lastnameErr = false;
        }
    }

    // Validate email address
    if (email == "") {
        printError("emailErr", "Please enter your email address");
        emailErr = false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }
    if (motdepasse == "") {
        printError("passwordErr", "Please enter your password");
        passwordErr = false;
    }
    if (retypepassword == "") {
        printError("retypeErr", "Please enter your retype_password");
        retypeErr = false;

    }
    if (motdepasse != retypepassword) {
        printError("passwordErr", "Please enter your password");
        passwordErr = false;
    }
    

    // Validate mobile number
    if (telephone == "") {
        printError("mobileErr", "Please enter your mobile number");
        mobileErr = false;
    } else {
        var regex = /^[1-9]\d{9}$/;
        if (regex.test(telephone) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else {
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    // Validate Checkbox
    if (conditionschk[0].checked == false) {
        printError("conditionsErr", "Please Accept Conditions Terms");
    }
    else {
        printError("conditionsErr", "");
        conditionsErr = false;
    }




    // Prevent the form from being submitted if there are any errors
    if ((nameErr || lastnameErr || passwordErr || retypeErr || emailErr || mobileErr || conditionsErr) == true) {
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "Full Name: " + nom + "\n" +
            "Email Address: " + email + "\n" +
            "Mobile Number: " + telephone + "\n" +
            "Password: " + motdepasse + "\n" +
            "Retype Password: " + retypepassword + "\n";

        /*   if(hobbies.length) {
               dataPreview += "Hobbies: " + hobbies.join(", ");
           } */
        // Display input data in a dialog box before submitting the form
        alert("Success Register");
    }
}

/* else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(motdepasse) === false) {
            printError("passwordErr", "Please enter a valid password");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }
     if (motdepasse != retypepassword) {
        printError("retypeErr", "Passwords do not match.");
        return false;
    } 
    return true; */

    /* //check empty password field  
     if(pw== "") {  
        document.getElementById("message").innerHTML = "**Fill the password please!";  
        return false;  
     }  
      
    //minimum password length validation  
     if(pw.length < 8) {  
        document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
        return false;  
     }  
     
   //maximum length of password validation  
     if(pw.length > 15) {  
        document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
        return false;  
     } else {  
        alert("Password is correct");  
     }  */

 /* function validate_password() {
 
   var pass = document.getElementById('pass').value;
   var confirm_pass = document.getElementById('confirm_pass').value;
   if (pass != confirm_pass) {
       document.getElementById('wrong_pass_alert').style.color = 'red';
       document.getElementById('wrong_pass_alert').innerHTML
         = '☒ Use same password';
       document.getElementById('create').disabled = true;
       document.getElementById('create').style.opacity = (0.4);
   } else {
       document.getElementById('wrong_pass_alert').style.color = 'green';
       document.getElementById('wrong_pass_alert').innerHTML =
           '🗹 Password Matched';
       document.getElementById('create').disabled = false;
       document.getElementById('create').style.opacity = (1);
   }
} */

/* function wrong_pass_alert() {
     validateForm();
    if (document.getElementById('pass').value != "" &&
        document.getElementById('confirm_pass').value != "") {
      //  alert("Your response is submitted");
      
    } else {
     alert("Please fill all the fields");
       
    } 
} */
/*var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}*/
