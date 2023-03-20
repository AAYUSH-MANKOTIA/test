<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JavaScript Form Validation</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
<style>
   body {
            padding: 10px 50px;
        }

        .formdesign {
            font-size: 20px;

        }

        .formdesign input {
            width: 50%;
            padding: 12px 20px;
            border: 1px solid blue;
            margin: 14px;
            border-radius: 4px;
            font-size: 15px;
        }

        .formerror {
            color: red;
        }

        .but {
            border-radius: 9px;
            width: 100px;
            height: 50px;
            font-size: 25px;
            margin: 22px 20px;
        }
</style>
</head>

<body>
    <h1>Welcome to the best form on Internet!</h1>
    <form aciton ="/myaction.php" name="myForm" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="name">
            Name: <input type="text" name="fname" ><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="email">
            Email: <input type="email" name="femail" ><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="phone">
            Phone: <input type="phone" name="fphone" ><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="pass">
            Password: <input type="password" name="fpass" ><b><span class="formerror"</span></b>
        </div>

        <div class="formdesign" id="cpass">
            Confirm Password: <input type="password" name="fcpass" ><b><span class="formerror"></span></b>
        </div>

        <input class="but" type="submit" value="Submit">

    </form>
</body>
<script >
function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var name = document.forms['myForm']["fname"].value;
    if (name.length<5){
        seterror("name", "*Length of name is too short");
        returnval = false;
    }

    if (name.length == 0){
        seterror("name", "*Length of name cannot be zero!");
        returnval = false;
    }
    if (name != "/^[A-Z]+$/"){
        seterror("name", "*chapital char only");
        returnval = false;
    }
    

    var email = document.forms['myForm']["femail"].value;
    if (email.length>15){
        seterror("email", "*Email length is too long");
        returnval = false;
    }

    var phone = document.forms['myForm']["fphone"].value;
   
   if (phone.length != 10){
        seterror("phone", "*Phone number should be of 10 digits!");
        returnval = false;
    }
   
    var password = document.forms['myForm']["fpass"].value;
    if (password.length < 6){

        // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
        seterror("pass", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    var cpassword = document.forms['myForm']["fcpass"].value;
    if (cpassword != password){
        seterror("cpass", "*Password and Confirm password should match!");
        returnval = false;
    }

    return returnval;
}

</script>
</html>