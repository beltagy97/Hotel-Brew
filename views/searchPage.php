<?php
// Start the session
session_start();

 if (empty($_POST['cemail'])){
 

}else{
$_SESSION["email"] = $_POST['cemail'];
}

?>
<!doctype html>
<html>

<head>
    <title>Hotel Brew</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/searchPage.css">
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
                                  <a class="dropdown-item" href="MyReservationPage.php">My Reservations</a>
                                  <a class="dropdown-item" href="log.php" >Logout</a>
                                  
                                </div>
                              </li>
                         




                </ul>
            </div>
        </nav>
    </div>

    <!-- carousel for images -->
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

    <div class="container my-4">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <h5 class="card-header">Filter By</h5>
                    <div class="card-body">
                        <form id="filter">
                            <h5>Budget:</h5>
                           <input type="text" class="form-control" value="" name="max" id="max" placeholder="maximum cost">
                            <h5>Rating:</h5>
                           <input type="text" class="form-control" value="" name="rate" id="rate" placeholder="minumum rate">
                            <h5>Stars:</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="0" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="1" >
                                <label class="form-check-label" for="exampleRadios1">
                                    1-2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    3-4
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                    value="3">
                                <label class="form-check-label" for="exampleRadios3">
                                    5
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 my-2 applyButton">Apply</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- search form  -->

            <div class="col-9">
                <form id="search">
                    <div class="form-row">
                        <div class="col-3">
                            <input type="text" class="form-control" name="CITY" placeholder="Enter City" id="city">
                        </div>
                        <div class="col-3">
                            <input type="date" id="from" name="STDATE" max="3000-12-31" min="1000-01-01" value="<?php echo date('Y-m-d'); ?>"
                                class="form-control" placeholder="From">
                        </div>
                        <div class="col-3">
                            <input type="date" id="to" name="EDATE" max="3000-12-31" min="1000-01-01" value="<?php echo $date = date('Y-m-d', strtotime("+1 day")); ?>" class="form-control"
                                placeholder="From">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="CAP" placeholder="Adults" id="cap" value="">
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary mb-2 searchButton">Search</button>
                        </div>
                    </div>
                </form>


<input type="hidden"  name="custId" value="">
<input type="hidden" id="type"  value="">
<input type="hidden" id="blackList"  value="">
                <!-- card for hotels -->
                <div class="hotel">
                    
                </div>
            </div>

        </div>

 			<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header" style="padding:35px 50px;">
                                  <h4><span class="glyphicon glyphicon-lock"></span> Reservation</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding:40px 50px;">
                                  <h5 style="color:green;">Success</h5>
                                </div>
                                <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> OK</button>
                                  
                                  
                                </div>
                              </div>
                              
                            </div>
                          </div> 


    </div>
    
   
    
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
  
  <script>
  
  var es= '<?php echo $_SESSION["email"]; ?>';

 
  
  $.ajax({
                        type: 'post',
                        url: '../php/BlackList.php',
                        data: {'custID': es},
                        success: function (data) {
                           $('#blackList').val(data);
                           console.log('black List');
                           console.log(data);
                        }
                      });
                      
$.ajax({
                        type: 'post',
                        url: '../php/cusType.php',
                        data: {'custID': es},
                        success: function (data) {
                           $('#type').val(data);
                           console.log('Type');
                           console.log(data);
                        }
                      });

  
  
  function apply(element,p)
      {
      event.preventDefault();
      console.log("blackList"+$('#blackList').val());
      if($('#blackList').val()==="0"){
        
 
         var one_day=1000*60*60*24;
    var input1 = $('#from').val();
     var input2 = $('#to').val();
    var date1 = new Date(input1);
    var date2 = new Date(input2);
 
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();

 
  var difference_ms = date2_ms - date1_ms;
    
  
  var days= Math.round(difference_ms/one_day); 
 
   var custID= '<?php echo $_POST['cemail']; ?>';
var total=p*days;
        
        console.log(days+" left");
        console.log("costs: "+total);
      console.log("HotelID "+element.id);
        console.log("custID "+custID);
        
        
        
        
$.ajax({
                        type: 'post',
                        url: '../php/reserve.php',
                        data: {'total': total, 'custID': custID, 'roomID':element.id, 'from':input1,'to':input2},
                        success: function (data) {
                            if(data==="0")
                            {
                                alert("Failed");
                            }else
                            {
                                
                                modalShow("");
                                fetchSearch();
                              
                                
                            }
                        }
                      });

      
  }else{
  	alert("you are BlackListed");
  }
        
      }
      
      
       function modalShow(data)
  {
    console.log("#mymodal"+data);
    $("#myModal"+data).modal("toggle");
  }
  
  
  
  function fetchSearch(){
             // ajax code
var cap=$('#cap').val();

if(cap===""){
 $(".hotel").html("<strong> Please enter your search details</strong>");
}else{
console.log($('#search').serialize());
            $.ajax({
                type: 'post',
                url: '../php/getResults.php',
                data: $('#search').serialize(),
                success: function (data) {
                    data = JSON.parse(data);
                    var code = "";
                     $(".hotel").html(code);
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           $(".hotel").html("<strong> No rooms available in this range of date</strong>");
                    }else{
                    render(data);
                    }
                }
            });
            }
  }
  
  </script>
    <script src="../js/search.js"></script>
	
	
	

   
</body>

</html>