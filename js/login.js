$(document).ready(function () {
    $(function () {
   
           $('#login').on('submit', function (e) {
   
             e.preventDefault();
                if($("input[name='inlineRadioOptions']:checked").val()==="c"){


                    // ajax code

                    $.ajax({
                        type: 'post',
                        url: '../php/loginCus.php',
                        data: $('#login').serialize(),
                        success: function (data) {
                            if(data==="0")
                            {
                                alert("wrong email or password ");
                            }else
                            {
                                var email = $('#email').val();


                              
                                $('#cemail').val(data);
                                $('#send').submit();
                               
                                
                            }
                        }
                      });

                // if hotel owner
                }else{


                    // ajax code

                    $.ajax({
                        type: 'post',
                        url: '../php/loginOwner.php',
                        data: $('#login').serialize(),
                        success: function (data) {
                            if(data==="0")
                            {
                                alert("wrong email or password ");
                            }else
                            {
                                 
                                  $('#oemail').val(data);
                                $('#owner').submit();
                                
                            }
                        }
                      });


                }
           
   
           });
   
         });
   
    });


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