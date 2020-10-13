//variables:
var is_username_ok=0;
var is_email_ok=0;
var is_fullname_ok=0; 
var is_ssn_ok=0;
var is_password_strong=0;
var does_password_match=0;
var is_phone_format_correct=0;


//---------------------------------------------------------------------------------------------------------

function check_pass_strength(){
    
    var first_password = document.getElementById("password").value;
    var m = document.getElementById("shortpassmessage");
    var l =first_password.length;
    
    
    
    if (l>0 && l<=5)
        {  
            
            m.style.visibility="visible";
            m.style.color="red";
            is_password_strong=0;
        }
        else 
        {   is_password_strong=1;
            m.style.visibility="hidden";
        }
  }


//---------------------------------------------------------------------------------------------------------          
    
    function check_pass_match(){
        
        var first_password = document.getElementById("password").value;
        var second_password = document.getElementById("cpassword").value;
        m = document.getElementById("second_pass_message");
        
        if(first_password != second_password)
            {
                
        
        does_password_match=0;
        m.style.color="red";
        m.innerHTML="Passwords don't match !";       
            
            }
            else if (first_password !="" && second_password != "") {
                
                m.innerHTML="Password match success!"
                m.style.color="green";
                does_password_match=1;
            }
            else 
            {
                does_password_match=0;
              m.style.visibilty = "hidden";  
            }
        
    }
    
    
//---------------------------------------------------------------------------------------------------------               
function checkphone(){ 
    
    p = document.getElementById("phonenb").value;
    m = document.getElementById("phonemessage");
  
    if (p.search(/^\d{2}-\d{3}-\d{3}$/) == -1)
        { 
            alert("Wrong phone format! (dd-ddd-ddd)");
            is_phone_format_correct=0;
            
            
        }
        
        else { is_phone_format_correct=1;}
    
    
    
    
}
   
function check_email()
{if(document.getElementById("email").value=="")
is_email_ok=0;         

else {
is_email_ok=1; 
}
}

function check_ssn()
{if(document.getElementById("ssn").value=="")
is_ssn_ok=0;         

else {
is_ssn_ok=1; 
}
}

function check_username()
{if(document.getElementById("uname").value=="")
is_username_ok=0;         

else {
is_username_ok=1; 
}
}
function check_fullname()
{if(document.getElementById("fname").value=="")
is_fullname_ok=0;         

else {
is_fullname_ok=1; 
}
}
function validate_all_input(){
    
    // the call to all these functions 
    // is not necessary as we are chekcing one case by one case
    // except in the username case.
   check_username();
   checkphone();
   check_pass_match();
   check_pass_strength();
    
    
    //alert(is_anything_wrong);
       if(is_username_ok && 
               is_password_strong && 
               does_password_match && 
               is_phone_format_correct) 
    {return true;
    }
    else {
        alert("Fix your form!");
        return false;
    }
}