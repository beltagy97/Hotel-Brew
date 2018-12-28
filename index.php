<?php
// Start the session
session_start();



?>
<!doctype html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/login.css">
</head>

<body>
   <nav class="navbar navbar-expand-md navbar-fixed-top navbar-custom main-nav" id="navbar-color">
        <div class="container-fluid">

            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><img id="logo"  src="resources/images/logo.png"></a></li>
            </ul>
        </div>
    </nav>

    <!-- login form -->
    <div class="container">
        <div class="card mx-auto" id="form">
            <div class="card-header">
                Login
            </div>
            <form class="px-4 py-2" id="login" method="post" action="">
                
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                        name="EMAIL">

                </div>
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="password" class="form-control" id="pass1" placeholder="Password" name="PASS" required>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="customer" value="c"
                        checked>
                    <label class="form-check-label" for="customer">Customer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="hotelOwner" value="o">
                    <label class="form-check-label" for="hotelOwner">Hotel Owner</label>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="my-3">Not a member ? <a class="signup" href="views/register.html">Sign Up</a></p>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary cardButton my-3 ">Login</button>
                    </div>
                </div>
            </form>
            <form action="views/searchPage.php" method="post" id="send">
             <input type="hidden" id="cemail" name="cemail" value="">
            </form>
            
             <form action="views/Hotel.php" method="post" id="owner">
             <input type="hidden" id="oemail" name="oemail" value="">
            </form>
        </div>
    </div>
    
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/login.js"></script>
    
    
    <script>

     var es=""+ '<?php echo $_SESSION["email"]; ?>';
  var ea=""+ '<?php echo $_SESSION["oemail"]; ?>';     
     if(es===""){
     if(ea===""){
      console.log("empty");
     }else{
      $('#oemail').val(ea);
      $('#owner').submit();
     }
     }else {
    $('#cemail').val(es);
      $('#send').submit();
     }
    </script>
</body>

</html>