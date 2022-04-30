function pagi(user_id, current_page)
{     
        let xhr = new XMLHttpRequest();
        let fd  = new FormData();
                    fd.append("user_id",    user_id);
                    fd.append("current_page", current_page);   
        //////creating xhr request the server
                    xhr.open("post", "http://localhost/bta/view/post/pagination.php", true);
                    xhr.onreadystatechange=function()
                           {
                                if (xhr.readyState=="4" && xhr.status=="200") //if connection was success
                                {
                                        let response=JSON.parse(this.responseText);     
                                        console.log(response);
                                        let pagination='';                                      

                                          if (response.length != 1)
                                              {                                                   
                                                    for(var i=0; i< response.length; i++)  {
                                                        pagination +=response[i]['data'];
                                                    }
                                                   document.getElementById('content').innerHTML=pagination;                                                 
                                              }
                                              
                                          else
                                                {
                                                       //else if response length is greater than 2    
                                                      console.log( response[0][0][0].data)
                                                        for(var i=0; i < response[0][0].length; i++)  {
                                                            pagination += response[0][0][i].data
                                                        }
                                                      document.getElementById('content').innerHTML=pagination;    
                                                      document.getElementById('pagination').innerHTML=response[0][1];                                                    
                                                }
                                                  
                                              }                                         
                                        
                                }                             
                     xhr.send(fd);
 }
