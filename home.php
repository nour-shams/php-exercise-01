<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        
        <style type="text/css">
            
           *{
               margin:0; 
               padding:0;
           }
           body{
               background:url(https://www.wallpaperup.com/uploads/wallpapers/2013/04/19/76523/b11db302e491cba5bf5911a333bffabd.jpg);
               background-repeat:no-repeat;
               background-size:cover;

           }
           #main_part{
                
               width:100%;
               height:600px;
               padding: 6.5% 12.5% 0% 12.5%;
               box-sizing:border-box;

           }

           #login{
            
            width:40%;
            border-radius:20px;
            height: 500ps;
            background:rgba(0,0,0, 0.4);
            float:right;
            padding: 2%;
            box-sizing:border-box;
           }
           #sign_up{
            width:40%;
            border-radius:20px;
            height: 500ps;
            background:rgba(0,0,0, 0.4);
            float:left;
            padding: 2%;
            box-sizing:border-box;
           }
           #input{
               margin-bottom:2%;
               width:100%;
               height:35px;
               background:#ccc;
               border-radius:20px;
            
           }
           #input input{
               width:90%;
               height:35%;
               background:none;
               outline:none;
               border-width:0px;
               padding-left:5%;
               box-sizing:border-box;
           }
           #input select{
               margin-left:5%;
               border:1px solid #ccc;
               width:90%;
               height: 35px;
               background:none;
               outline: none;
               padding-left: 5%;
               box-sizing:border-box;
           }
           #btn{
               width:48%;
               height:35px;
               background:#ccc;
               border: 2px solid  #3366ff;
               border-radius: 20px;
               margin-top: 5%;

           }
           #btn:hover{
               cursor:pointer;
               background:  #3366ff;
               color:#fff;
           }
           #for_pass{
               margin-top:5%;
               color:#fff;

           }
           #for_pass:hover{
               cursor:pointer;
           }

            </style>
            </head>
            <body>
            
	<div id="main_part">
    <div id="sign_up">
    <h2 style="color:white">Sign Up</h2>
    <br>
    <form  method="get" id="myform" onsubmit="return validate_all_input();" >
    <div id="input">
    <input type="text" name="fname" id="fname" placeholder="Enter your Full Name" />
    </div>
    <div id="input">
    <input type="text" name="uname" id="uname" placeholder="Enter your Username" />
    </div>
    <div id="input">
    <input type="password" name="password" id="password" placeholder="Enter your Password" />
    </div>
    <div id="input">
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your Password" />
    </div>
    <div id="input">
    <input type="email" name="email" id="email" placeholder="Enter your Email" />
    </div>
    <div id="input">
    <input type="tel" name="phonenb" id="phonenb" placeholder="Enter your Phone Number" />
    </div>
    <div id="input">
    <input type="text" name="dateofbirth" placeholder="Enter your Date of Birth" onfocus="this.type='date'" />
    </div>
    <div id="input">
    <input type="number" name="ssn" id="ssn" placeholder="Enter your SSN" />
    </div>
    
    <input type="submit"  id="btn" name="signup" value="Sign Up"/>
    <input type="reset" id="btn" value="Reset"/>
        </form>
        </div>
        <div id="login">
        <h2 style="color:white">Login</h2>
        <br>
        <div id="input">
        <input type="text" name="uname_login" placeholder="Enter your Username" />
        </div>
        <div id="input">
        <input type="password" name="password_login" placeholder="Enter your Password" />
        </div>
        <input type="submit" id ="btn" name="login" value="Login"/>
        <input type="reset" id="btn" value="Reset"/>
        <center><p id="for_pass">Forgot Password? </p> </center>
        </div>
           </div>
           <script>
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
            
            alert("password too short");
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
      
        
        if(first_password != second_password)
            {
                
        
        does_password_match=0;
        
        alert("Passwords don't match !");       
            
            }
            else if (first_password !="" && second_password != "") {
                
                alert("Password match success!");
            
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
           </script>

<?php
// define variables and set to empty values
$fname = $uname = $email = $comment = $ssn = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $uname = test_input($_POST["uname"]);
  $email = test_input($_POST["email"]);
  $ssn = test_input($_POST["ssn"]);
  $password = test_input($_POST["password"]);
  $cpassword = test_input($_POST["cpassword"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    </body>

</html>
