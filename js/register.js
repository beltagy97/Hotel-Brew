$(document).ready(function () {
    $(function () {
   
           $('#register').on('submit', function (e) {
   
             e.preventDefault();
                if($("input[name='inlineRadioOptions']:checked").val()==="c"){

                    if (!ValidateEmail($("#email").val())) {
                        alert("Invalid email address.");
                        return false;
                    }
                    if(!ValidatePassword($("#pass1").val(),$("#pass2").val()))
                    {
                        return false;
                    }
                    $.ajax({
                        type: 'post',
                        url: '../php/newCus.php',
                        data: $('#register').serialize(),
                        success: function (data) {

                       

                            if(data!=="0"){
                        alert('created sucessfully');
                         window.location.href = "../test";
                               
                            }
                            else
                            {
                                window.alert("failed");
                            }
                        }
                      });

                }else{
                    if (!ValidateEmail($("#email").val())) {
                        alert("Invalid email address.");
                        return false;
                    }
                    if(!ValidatePassword($("#pass1").val(),$("#pass2").val()))
                    {
                        return false;
                    }
                    $.ajax({
                        type: 'post',
                        url: '../php/newOwner.php',
                        data: $('#register').serialize(),
                        success: function (data) {

                            // if successful 
                            if(data!=="0"){
                           	
                         
                      alert('created sucessfully');
                         window.location.href = "../test";
                           
                            
                            }else
                            {
                                window.alert("failed");
                            }
                            
                        }
                      });


                }
           
   
           });
   
         });
   
    });


    // validation functions 
    
    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };

    function ValidatePassword(pass1 , pass2)
    {
        if(pass1===pass2)
        {
            
            return true;
        }else
        {
            alert("password Not Matching");
            return false;
        }
    }