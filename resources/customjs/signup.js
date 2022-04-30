
//initialising jquery
$(document).ready(function(){
  /// onclick of the button signup
    $("#register").click(
        function(e){
    ////////////////////////////////////////////////////getting input value
            let firstName = validate( $('#firstName').val() );
            let lastName = validate( $('#lastName').val() );
            let email = validate( $('#email').val() );
            let phoneNumber  = validate( $('#phoneNumber').val() );
            let password = validate( $('#password').val() );
            let confirmPassword = validate( $('#confirmPassword').val() );
            console.log(firstName,lastName,email,phoneNumber,password,confirmPassword); //check if input are gotten
               if (firstName==="empty" || lastName==="empty" || email==="empty" || phoneNumber==="empty" || password==="empty" ||  confirmPassword==="empty" ){
                     // console.log("one of the input is empty");
                     $('#error').show();
                     $('#error').text("Please fill out all the fields.");
               }
               else {
                   if ( password != confirmPassword) {
                        $('#error').show();
                        $('#error').text("Password Mismatch.");
                   }
                   else{
                        signup_ajax(firstName,lastName,email,phoneNumber,password);
                   }
               }

        
        }
    );
///////////////////////////////////////ajax send data to the server for processing
    function signup_ajax(firstName,lastName,email,phoneNumber,password)
    {
            
            let xhr=new XMLHttpRequest();
            let fd=new FormData();
                        fd.append("firstName", firstName);
                        fd.append("lastName", lastName);
                        fd.append("email", email);
                        fd.append("phoneNumber", phoneNumber);
                        fd.append("password", password);
        
            //////creating xhr request the server
                        xhr.open("post", "http://localhost/bta/view/post/signup_post.php", true);
                        xhr.onreadystatechange=function(){
                                    if (xhr.readyState=="4" && xhr.status=="200") //if connection was success
                                    {
                                            let response=this.responseText.trim();     
                                            console.log(response);
                                            if (response==="success")
                                                {

                                                    $('#error').show();
                                                    $('#error').text("Registration Successful.");
                                                
                                                }
                                            else if (response==="exist")
                                                {
                                                    $('#error').show();
                                                    $('#error').text("User already exist.");

                                                }
                                            else 
                                                {
                                                    $('#error').show();
                                                    $('#error').text("Failed to Register.");
                                                }


                                    }
                                    else  //if connection failed
                                    {
                                        $('#error').show();
                                        $('#error').text("Connection failed! Please connect to internet");
                                    }
                                        
                                    }
                                    xhr.send(fd);
     }
 












/////////////////////////////////////////////// hide errorMessage
                $("input").click(function(e){
                    $('#error').hide();
                });
/////////////////////////////////////////////

///////////////////////////////////////////////
////validate user data
        function validate(data){
            if (data==null || data==""){
                return "empty"; 
            }
            else {
                let data1=data;
                    data1=data1.trim();
                    return data1;
            }
        }
})

