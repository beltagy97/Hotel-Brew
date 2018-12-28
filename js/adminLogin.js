$(document).ready(function () {
    $(function () {
   
           $('#login').on('submit', function (e) {
   
             e.preventDefault();
                



                    $.ajax({
                        type: 'post',
                        url: '../php/loginAdmin.php',
                        data: $('#login').serialize(),
                        success: function (data) {
                        console.log(data);
                            if(data==="0")
                            {
                                alert("wrong email or password ");
                            }else
                            {
                               window.location.replace("views/admin.html");
                                
                            }
                        }
                      });

               
                
           
   
           });
   
         });
   
    });


