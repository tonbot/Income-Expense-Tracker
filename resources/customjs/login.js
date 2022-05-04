
//initialising jquery
$(document).ready(function(){
    /// onclick of the button signup
      $("#login").click(function(){
            /** get user submit data */
              let email    = validate( $('#email').val() );
              let password = validate( $('#password').val() );
              console.log(email,password); 
                 if (email==="empty" || password==="empty" )
                    {
                        $('#error').show();
                        $('#error').text("Please fill out all the fields.");
                    }
                 else 
                    {
                        var formData = {    
                            email    :  email,
                            password    :  password,
                            };

                            login_ajax(formData)

                    }   
          }
      );
      
      /** login function */
      function login_ajax(formData)
      {

            $.ajax({
                url: "post/login_post.php",
                type: "POST",
                data: formData,
                encode: true,
                    success: function(data){
                        /** on sucess function */
                        console.log(data)
                    },
                    error: function(error){
                        /**on error function */
                        console.log(error)
                    }
                    
        });
            
             
       }
  
    /** hide error message */
                  $("input").click(function(e)
                    {
                        $('#error').hide();
                    });

/** validate user data */
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

  })// end of mother function 
  
  