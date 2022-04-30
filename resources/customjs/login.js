
//initialising jquery
$(document).ready(function(){
    /// onclick of the button signup
      $("#login").click(
          function(e){
      ////////////////////////////////////////////////////getting input value
              let email    =    validate( $('#email').val() );
              let password = validate( $('#password').val() );
              console.log(email,password); //check if input are gotten
                 if (email==="empty" || password==="empty" )
                    {
                        // console.log("one of the input is empty");
                        $('#error').show();
                        $('#error').text("Please fill out all the fields.");
                    }
                 else 
                    {
                       
                         login_ajax(email,password);
                        
                    }
  
          
          }
      );
  ///////////////////////////////////////ajax send data to the server for processing
      function login_ajax(email,password)
      {
              
              let xhr = new XMLHttpRequest();
              let fd  = new FormData();
                          fd.append("email",    email);
                          fd.append("password", password);
          
              //////creating xhr request the server
                          xhr.open("post", "http://localhost/bta/view/post/login_post.php", true);
                          xhr.onreadystatechange=function(){
                                      if (xhr.readyState=="4" && xhr.status=="200") //if connection was success
                                      {
                                              let response=this.responseText.trim();     
                                              console.log(response);
                                                if (response==='user not found')
                                                    {
                                                            $('#error').show();
                                                            $('#error').text("Email/Password does not Correct.");  
                                                    }
                                                
                                                else 
                                                    {     
                                                        let data = JSON.parse(response);
                                                        // console.log(data[0]['id']);

                                                        sessionStorage.setItem('email',    data[0]['email']);
                                                        sessionStorage.setItem('user_id',  data[0]['id']);
                                                        sessionStorage.setItem('user',     data[0]['firstName']);

                                                        window.location.href = "http://localhost/bta/view/dashboard.php?user=" + data[0]['firstName']+'&usernum=' + data[0]['id'];                                                     
                                                    }
  
  
                                      }
                                      /*else  //if connection failed
                                      {
                                          $('#error').show();
                                          $('#error').text("Connection failed! Please connect to internet");
                                      }
                                       */   
                                      }
                                      xhr.send(fd);
       }
   
  
  
  
  
  
  
  
  
  
  
    
  /////////////////////////////////////////////// hide errorMessage
                  $("input").click(function(e)
                    {
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
  
  