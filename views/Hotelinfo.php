<?php
// Start the session
session_start();



?>



<!doctype html>
<html>

<head>
    <title>Hotel Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/hotelinfo.css">
</head>

<body>
    <div id="navbar">
        <nav class="navbar navbar-expand-md navbar-fixed-top navbar-custom main-nav">

            <a class="navbar-brand pos-navbar" href="../index.php"><img id="logo" src="../resources/images/logo.png"></a>


            <div class="collapse navbar-collapse justify-content-end pos-navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mx-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img id="manageIcon" src="../resources/images/userlogo.png"> My Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">My Hotels</a>
                            <a class="dropdown-item" href="#">Logout</a>

                        </div>
                    </li>





                </ul>
            </div>
        </nav>
    </div>

    <input type="hidden" id="custId" name="custId" value="3487">
    <div class="container my-5">
        <div class="card ">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active card-buttons" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="reservations" aria-selected="true">Hotel Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-buttons" id="facilities-tab" data-toggle="tab" href="#facilities" role="tab"
                            aria-controls="facilities" aria-selected="false">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-buttons" id="room-tab" data-toggle="tab" href="#room" role="tab"
                            aria-controls="rating" aria-selected="false">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-buttons" id="reservation-tab" data-toggle="tab" href="#reservation" role="tab"
                            aria-controls="reservation" aria-selected="false">Reservations</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- first -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="reservations-tab">
                        <!-- start of row 2 -->


                        <div id="hotelInfo">

                            

                           



                        </div>

                        <!-- end of row 2 -->
                    </div>

                    <div class="tab-pane fade" id="facilities" role="tabpanel" aria-labelledby="facility-tab">
                        <div class="row">
                            <div class="col-9">
                                <h2>My Facilities</h2>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary addHotelButton " onclick="modalShow(2);" id="myBtn">Add Facility +</button>
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header" style="padding:35px 50px;">
                                          <h4><span class="glyphicon glyphicon-lock"></span> Add Facility </h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body" style="padding:40px 50px;">
                                      
                                          
                                           
                                           <form id="uploadimage" action="" method="post" enctype="multipart/form-data">

<div id="selectImage">
<label>Select Your Image</label><br/>
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
<p id="feed"> </p>
</div>
</form>
                                           
                                           
                                           
                                          <form role="form" id="aFac" onsubmit="addFac(this)">
                                            <div class="form-group">
                                              <label for="hotel"><span class="glyphicon glyphicon-user"></span> Name</label>
                                              <input type="text" class="form-control" name="NAME" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                              <label for="Country"><span class="glyphicon glyphicon-eye-open"></span> Facility Description</label>
                                              <input type="text" class="form-control" name="DESC" placeholder="Facility Description">
                                            </div>
                                            	<input type="hidden" id="hot" name="HotelID" value="">
                                            	<input type="hidden" id="image" name="PATH" value="">
                                            
                                               <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-default pull-right" ><span class="glyphicon glyphicon-remove"></span> Save</button>
                                        
                                          
                                        </div>
                                          </form>
                                        </div>
                                       
                                      </div>
                                      
                                    </div>
                                  </div> 
                            </div>
        
                        </div>
			
			<div id="facilityCard">
			</div>

                    </div>

                    <!-- second -->
                    <div class="tab-pane fade" id="room" role="tabpanel" aria-labelledby="room-tab">
                         <div class="row">
                            <div class="col-9">
                                <h2>My Rooms </h2>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary addHotelButton " onclick="modalShow(3);" id="myBtn">Add Rooms +</button>
                                <div class="modal fade" id="myModal3" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header" style="padding:35px 50px;">
                                          <h4><span class="glyphicon glyphicon-lock"></span> Add Room</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body" style="padding:40px 50px;">
                                        
                                      <form id="uploadimageR" action="" method="post" enctype="multipart/form-data">
                                        
                                        
<div id="selectImage">
<label>Select Your Image</label><br/>
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
<p id="feedR"> </p>
</div>
</form>
                                          <form role="form" onsubmit="addRoom(this)" id="adF">
                                            <div class="form-group" >
                                              <label for="hotel"><span class="glyphicon glyphicon-user"></span> Room Name</label>
                                              <input type="text" class="form-control" name="NAME" placeholder="Room Name">
                                            </div>
                                           
                                            <div class="form-group">
                                                    <label for="street"><span class="glyphicon glyphicon-eye-open"></span> Room Price</label>
                                                    <input type="text" class="form-control" name="PRICE" placeholder="Room Price">
                                                </div>    
                                                
                                                <div class="form-group">
                                                    <label for="street"><span class="glyphicon glyphicon-eye-open"></span> Number of Rooms Available</label>
                                                    <input type="text" class="form-control" name="NO" placeholder="Number of Rooms">
                                                </div>             
                                                
                                                <div class="form-group">
                                                    <label for="street"><span class="glyphicon glyphicon-eye-open"></span> Room Capacity</label>
                                                    <input type="text" class="form-control" name="CAP" placeholder="Room Capacity">
                                                </div>  
                                                <input type="hidden" name="PATH" id="imageR">
                                                <input type="hidden" id="ho" name="HotelID" value="">  
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-default pull-right" ><span class="glyphicon glyphicon-remove"></span> Save</button>
                          
                                          
                                        </div>
                                          </form>
                                          
                                        </div>
                                      
                                      </div>
                                      
                                    </div>
                                  </div> 
                            </div>
        			
        			
        			
                        </div>
                        
                        <div id="roomCard">
                        </div>
                        
                    </div>

                    <!-- third -->
                    <div class="tab-pane fade" id="reservation" role="tabpanel" aria-labelledby="reservation-tab">
                    	<div id="reservationCard">
                    	</div>

                    </div>
                </div>
<input type="hidden" id="hotelID"  value="">
            </div>
        </div>



        <!-- end -->
    </div>


    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="../js/hotelinfo.js"></script>
    <script>
    
    
     var es= '<?php echo $_POST["hotelID"]; ?>';
  
     console.log("shams4");
	$('#hotelID').val(es);
	var hotelid = $('#hotelID').val();
var owner = $('#oid').val();
        function modalShow(data) {
            console.log("#myModal" + data);
            $("#myModal" + data).modal("show");
        }
        
        function addRoom(p){
         console.log("shams23");
        event.preventDefault();
        $('#ho').val(hotelid);
        
         
  
  
  	$.ajax({
                type: 'post',
                url: '../php/addRoom.php',
                data: $('#adF').serialize(),
                success: function (data) {
                   console.log(data);
                   closeRoomModal();
                   fetchRooms();
                }
            });
        }
        
        
        $.ajax({
                type: 'post',
                url: '../php/getHotelInfo.php',
                data: {'hid':hotelid},
                success: function (data) {
                    data = JSON.parse(data);
                    $("#hotelInfo").html("");                    
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Hotels");
                    }else{
                    renderHotelInfo(data);
                    }
                }
            });
            
             $.ajax({
                type: 'post',
                url: '../php/getRooms.php',
                data: {'hid':hotelid},
                success: function (data) {
                    data = JSON.parse(data);
                    $("#roomCard").html("");                    
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Rooms");
                    }else{
                     renderRooms(data);
                    }
                }
            });
            
             $.ajax({
                type: 'post',
                url: '../php/getFacilities.php',
                data: {'hid':hotelid},
                success: function (data) {
                    data = JSON.parse(data);
                    $("#facilityCard").html("");                    
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Facilities");
                    }else{
                     renderFacilities(data);
                    }
                }
            });
            
             $.ajax({
                type: 'post',
                url: '../php/getResv.php',
                data: {'HOTELID':hotelid},
                success: function (data) {
                    data = JSON.parse(data);
                    $("#reservationCard").html("");                    
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No reservations");
                    }else{
                     renderReservations(data);
                    }
                }
            });
            
            function closeRoomModal()
            {
              console.log("#myModal3");
              $("#myModal3").modal("hide");
            }
            function addFac(p){
             event.preventDefault();
        	$('#hot').val(hotelid);
        	$.ajax({
                type: 'post',
                url: '../php/addFacilty.php',
                data: $('#aFac').serialize(),
                success: function (data) {
                   console.log(data);
                   closeFacilityModal();
                   fetchFac();
                 
                }
            });
       	   
       	   function closeFacilityModal()
            {
              console.log("#myModal2");
              $("#myModal2").modal("hide");
            }
            
            }
            
            
        $(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();

$.ajax({
url: "upload.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
console.log(data);
$('#image').val("../views/uploads/"+data);
$('#feed').html("Done");
}
});
}));

$("#uploadimageR").on('submit',(function(e) {
e.preventDefault();

$.ajax({
url: "upload.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
console.log(data);
$('#imageR').val("uploads/"+data);
$('#feedR').html("Done");
}
});
}));
});



    </script>

</body>

</html>