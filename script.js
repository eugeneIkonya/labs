function validateForm(){
    var first_name=document.forms["user_data"]["first_name"].value;
    var last_name=document.forms["user_data"]["last_name"].value;
    var city_name=document.forms["user_data"]["city_name"].value;

    if(first_name=="" || last_name==""||city_name==""){
        alert("Please Fill out all the details");
        return false;
    }   
    return true;
}