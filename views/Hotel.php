<?php
// Start the session
session_start();

 if (empty($_POST['oemail'])){
 

}else{
$_SESSION["oemail"] = $_POST['oemail'];
}

?>
<!doctype html>
<html>

<head>
    <title>Hotel Brew</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/hotelOwner.css">
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
                            <a class="dropdown-item" href="log.php">Logout</a>

                        </div>
                    </li>





                </ul>
            </div>
        </nav>
    </div>
    
    <input type="hidden" id="custId" name="custId" value="3487">
    <div class="container my-4">


            <div class="row">
                    <div class="col-9">
                        <h2>My Hotels</h2>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary addHotelButton " onclick="modalShow(1);" id="myBtn">Add Hotel +</button>
                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header" style="padding:35px 50px;">
                                  <h4><span class="glyphicon glyphicon-lock"></span> Add Hotel</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding:40px 50px;">
                                  <form role="form" id="add" onsubmit="addHotel()">
                                    <div class="form-group">
                                      <label for="hotel"><span class="glyphicon glyphicon-user"></span> Hotel Name</label>
                                      <input type="text" class="form-control" name="HOTELNAME" id="hotel" placeholder="Hotel Name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="Country"><span class="glyphicon glyphicon-eye-open"></span> Country</label>
                                      <input type="text" class="form-control" name="COUNTRY" id="Country" placeholder="Country" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><span class="glyphicon glyphicon-eye-open"></span> City</label>
                                        <input type="text" class="form-control" name="CITY" id="city" placeholder="City" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="street"><span class="glyphicon glyphicon-eye-open"></span> Street</label>
                                            <input type="text" class="form-control" name="STREET" id="street" placeholder="street" required>
                                        </div>
                                    <div class="form-group">
                                        <label for="rating"><span class="glyphicon glyphicon-eye-open"></span> Stars</label>
                                        <input type="text" class="form-control" name="STARS" id="rating" placeholder="Stars" required>
                                    </div>
                                    <div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="radio" class="form-check-input" value="0" checked name="ac">Standard
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="radio" class="form-check-input" value="1" name="ac">Premium
					  </label>
					  <input type="hidden" id="ty" name="TYPE" value="">
					</div>
					
                                    <input type="hidden" value="" id="s" name="OWNERID">
                                      <div class="modal-footer">
                                        <button type="submit" id="save" class="btn btn-success btn-default pull-right" ><span class="glyphicon glyphicon-remove"></span> Save</button>
                                  	
                                  
                                </div>
                                  </form>
                                </div>
                                
                              </div>
                              
                            </div>
                          </div> 
                    </div>

                </div>

                

                   
<input type="hidden" id="oid"  value="">
                    
		<div id="hotelsOwned">




                </div>
















    </div>
    <!-- end of data -->

    <!-- scripts -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
        <script>
        
		
var es= '<?php echo $_SESSION["oemail"]; ?>';
  
  console.log("yes3");
  $('#oid').val(es);
  var owner = $('#oid').val();
  
  
  	$.ajax({
                type: 'post',
                url: 'http://digital-dental-scan.com/Hotel_resv/getHotelsOwned.php',
                data: {'oid':owner},
                success: function (data) {
                    data = JSON.parse(data);
                     
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Hotels");
                    }else{
                    renderMyHotels(data)
                    }
                }
            });
  
		
            function modalShow(data)
            {
              console.log("#myModal"+data);
              $("#myModal"+data).modal("show");
            }
            
            function closeModal()
            {
              console.log("#myModal1");
              $("#myModal1").modal("hide");
            }
          
          function addHotel()
          {
          event.preventDefault();
           if($("input[name='ac']:checked").val()==="1"){
           $('#ty').val("1");
           }else{
            $('#ty').val("0");
           }
          $('#s').val(owner);
          $.ajax({
                type: 'post',
                url: 'http://digital-dental-scan.com/Hotel_resv/addHotel.php',
                data: $('#add').serialize(),
                success: function (data) {
                    console.log(data);
                    closeModal();
                    fetchHotels()
                    
                }
            });
          	
          }
   
  function fetchHotels(){
 
  
  
  	$.ajax({
                type: 'post',
                url: 'http://digital-dental-scan.com/Hotel_resv/getHotelsOwned.php',
                data: {'oid': $('#oid').val()},
                success: function (data) {
                    data = JSON.parse(data);
                     
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Hotels");
                    }else{
                    renderMyHotels(data)
                    }
                }
            });
  
  
  }
          </script>
          
          <script src="../js/hotelOwner.js"></script>

</body>

</html>