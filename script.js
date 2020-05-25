function validateForm(){
    var first_name=document.forms["user_data"]["first_name"].value;
    var last_name=document.forms["user_data"]["last_name"].value;
    var city_name=document.forms["user_data"]["city_name"].value;
    var username=document.forms["user_data"]["username"].value;//collect form data from the fields
    var password=document.forms["user_data"]["password"].value;


    if(first_name=="" || last_name==""||city_name==""){
        alert("Please Fill out all the details");
        return false;
    }   
    return true;
}
function loginValidate(){
    var username=document.forms["login"]["username"].value;//collect form data from the fields
    var password=document.forms["login"]["password"].value;

    if(username=="" || password==""){
        alert("Fill everything please");
        return false;

    }
    return true;
}

function displayTable(){
    var tables=document.getElementById("users_table");
    if(tables.style.display==="none"){
      tables.style.display="block";
    }else{
        tables.style.display="none";
    }

}
function showSignup(){
    var tables=document.getElementById("signup");
    if(tables.style.display==="none"){
      tables.style.display="block";
    }else{
        tables.style.display="none";
    }

}