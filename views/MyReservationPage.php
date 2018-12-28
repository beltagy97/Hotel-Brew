<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <title>My Reservations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/myreservation.css">
</head>

<body>
    <div id="navbar">
        <nav class="navbar navbar-expand-md navbar-fixed-top navbar-custom main-nav">

            <a class="navbar-brand pos-navbar" href="../index.php"><img id="logo" src="../resources/images/logo.png"></a>


            <div class="collapse navbar-collapse justify-content-end pos-navbar">
                <ul class="navbar-nav">
<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mx-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img id="manageIcon" src="../resources/images/userlogo.png"> My Account
                                </a>
                                <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#">My Reservations</a>
                                  <a class="dropdown-item" href="#">Logout</a>
                                  
                                </div>
                              </li>





                </ul>
            </div>
        </nav>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" id="img-carousel" src="http://www.travelleaders.com/PromoImage/2511_LargeHeaderNat.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="img-carousel" src="https://www.bestattravel.co.uk/ImageLibrary/LIF-1900141-January2017JanuaryBlues-1-January2017BannerImages(6).jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="img-carousel" src="../resources/images/pyramids.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<input type="hidden" id="custId" name="custId" value="3487">
    <div class="container my-4">


        <div class="card ">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active card-buttons" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="reservations" aria-selected="true">Reservations</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link card-buttons" id="profile-tab" data-toggle="tab" href="#rating" role="tab" aria-controls="rating"
                            aria-selected="false">Rating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-buttons" id="contact-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="false">User Profile</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- first -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="reservations-tab">
                        <!-- start of row 2 -->

                        
                        <div id="resv">                          

			</div>
                        
                        <!-- end of row 2 -->
                    </div>
                    
                   

                    <!-- second -->
                    <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">
                       <div id="rating">
                       </div>
                    </div>

                    <!-- third -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div id="userProfile">
                    </div>
                    </div>
                </div>

            </div>
        </div>









    </div>
    <!-- end of data -->

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="../js/reservation.js"></script>
  <script>
    var es= '<?php echo $_SESSION["email"]; ?>';
    
    
    $('#custId').val(es);
    
  
  console.log("shams"+  $('#custId').val());
  

  
  
  
   $.ajax({
                type: 'post',
                url: '../php/getReservations.php',
                data: {'custID':es},
                success: function (data) {
                    data = JSON.parse(data);
                     $("#resv").html("");
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No reservations");
                    }else{
                    render(data);
                    }
                }
            });
            
            
     $.ajax({
                type: 'post',
                url: '../php/custRatings.php',
                data: {'custID':es},
                success: function (data) {
                    data = JSON.parse(data);
                    $("#rating").html("");
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Ratings");
                    }else{
                    renderRating(data);
                    }
                }
            });
            
            
        $.ajax({
                type: 'post',
                url: '../php/getProfile.php',
                data: {'custID':es},
                success: function (data) {
                    data = JSON.parse(data);
                    
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No profile");
                    }else{
                   	renderProfile(data);
                    }
                }
            });
            
            
    
    
            
            
  </script>
</body>

</html>