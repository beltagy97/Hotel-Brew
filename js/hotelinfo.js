function renderHotelInfo(data)
{
var code = "";
code += "<div class=\"card my-2\">";
code += "<div class=\"card-header\">";
code += "<div class=\"card-body row\">";
code += "<div class=\"col-4\"></div>";

code += "<div class=\"col-4\"></div>";
code += "</div>";
code += "<hr>";
code += "<div class=\"row\">";
code += "<div class=\"col-4\">";
code += "<label for=\"hotelname\">Hotel Name : </label>";
code += "<input type=\"text\" value=\""+ data[0].HNAME +"\" disabled>";
code += "</div>";
code += "<div class=\"col-4\">";
code += "<label for=\"city\">City : </label>";
code += "<input type=\"text\" value=\""+ data[0].City + "\" disabled>";
code += "</div>";
code += "<div class=\"col-4\">";
code += "<label for=\"city\">Address : </label>";
code += "<input type=\"text\" value=\""+data[0].Street+"\" disabled>";
code += "</div>";
code += " </div>";
code += "<br>";
code += "<div class=\"row mt-3\">";
code += "<div class=\"col-6\">";
code += "<label for=\"stars\">Stars :</label>";
for (var i=0 ; i< data[0].STARS ;i++){
code += "<img id=\"stars\" src=\"../resources/images/stars.png\">";
}
code += "</div>";

code += "</div>";
code += "</div>";
code += "</div>";
$("#hotelInfo").html(code);

}


function renderRooms(data)
{
   var code = "";
   jQuery(data).each(function (i, item) {
   code += "<div class=\"card my-2\">";
   code += "<div class=\"card-header\">";
   code += "<h5>"+ item.NAME +"</h5>";
   code += "</div>";
   code += "<div class=\"card-body row\">";
 
    code += "<div class=\"col-6\">";
           code += "<p class=\"card-text\"><img src=\""+item.PATH+"\"></p>";
        code += "</div>";
        code += "<div class=\"col-6\">";
          code += "<div class=\"col-4\">";
   code += "<p class=\"card-text\"> Capacity : "+ item.CAP +" adults </p>"
   code += "</div>";
   code += "<div class=\"col-4\">";
   code += "<p class=\"card-text\"> Number of rooms: "+ item.NO_AV +"</p>";
   code += "</div>";
   code += "<div class=\"col-4\">";
   code += "<p class=\"card-text\"> Price : $"+ item.PRICE +"</p>";
   code += "</div>";
   code += "</div>";
   code += "</div>";
      code += "</div>";
   
   });

    $("#roomCard").html(code);
}


   function renderFacilities(data)
    {
        var code = "";
        jQuery(data).each(function (i, item) {
        code += "<div class=\"card my-2\">";
        code += "<div class=\"card-header\">";
        code += "<h5>"+ item.Name +"</h5>";
        code += "</div>";
        code += "<div class=\"card-body row\">";
        code += "<div class=\"col-6\">";
        code += "<p class=\"card-text\"><img src=\""+item.PATH+"\"></p>";
        code += "</div>";
        code += "<div class=\"col-6\">";
        code += "<p style=\"margin-top:60px;\" class=\"card-text\"> Description : " + item.Descr +"</p>";
        code += "</div>";
        code += "</div>";
        code += "</div>";
        });

        $("#facilityCard").html(code);

    }
    
    
    
function renderReservations(data)
    {
        var code = "";
        jQuery(data).each(function (i, item) {
        console.log(item.Approved);
        	  var date1 = new Date(item.ReservDate);
    var date2 = new Date();
 date2.setHours(date2.getHours() - 2);
  var sec=(date2- date1) / 1000;
console.log("time "+date1);
console.log("time2"+date2);
        code += "<div class=\"card my-2\">";
        code += "<div class=\"card-header\">";
        code += "<h5>" + item.Name +"</h5>";
        code += "</div>";
        code += "<div class=\"card-body\">";
        code += "<div class=\"row\">";
        code += "<div class=\"col-6\">";
        code += "<p class=\"card-text\">Room Name : "+ item.NAME +"</p>";
        code += "</div>";
        code += "<div class=\"col-6\">";
        if( item.Approved === "1"){
            if(item.CheckIN === "1")
            {
                code += "<p class=\"card-text\">status : checked in </p>";
            }
            else
            {
                code += "<p class=\"card-text\">status : confirmed </p>";
            }
        }
        else if( item.Approved === "0")
        {
            code += "<p class=\"card-text\">status : cancelled </p>";
        }
        else{
            code += "<p class=\"card-text\">status : pending </p>";
        }
        
        

  
        code += "</div>";
        code += "</div>";
        code += "<div class=\"row my-2\">";
        code += "<div class=\"col-6\">";
        code += "<p class=\"card-text\">From "+ item.StartDate+ " to "+ item.EndDate +"</p>";
        code += "</div>";
        code += "<div class=\"col-6\">";
        code += "<p class=\"card-text\">Room Capacity : "+ item.CAP +"</p>";
        code += "</div>";
        code += "</div>";
        code += "<div class=\"row justify-content-end\">";
        code += "<div class=\"col-6\">";
        code += " </div>";
        code += "<div  class=\"col-6\">";
        if( item.Approved === "1"){
        
	
	if(sec < 30){
	 code += "<button style=\"float:right;margin-left: 10px;\" type=\"button\" class=\"btn btn-outline-danger\" onclick=\"cancel("+item.ID+","+item.ReservDate+")\">Cancel</button>";
	}
        }else if(item.Approved==="-1"){
         code += "<button style=\"float:right;margin-left: 10px;\" type=\"button\" class=\"btn btn-outline-danger \" onclick=\"cancel("+item.ID+","+item.ReservDate+")\" >Cancel</button>";
          code += "<button style=\"float:right;\" type=\"button\" class=\"btn btn-outline-success\" onclick=\"accept("+item.ID+")\">Accept</button>";
        }
      
       
       
        code += "</div>";
        code += "</div>";
        code += "</div>";
        code += "</div>";

        });

        $("#reservationCard").html(code);

    }
    
    
    
    
    function cancel(p,d){
     	  var date1 = new Date(d);
    var date2 = new Date();
 date2.setHours(date2.getHours() - 2);
  var sec=(date2- date1) / 1000;
if(sec<=30){
    
    	$.ajax({
                type: 'post',
                url: '../php/cancelResv.php',
                data: {'RESVID':p},
                success: function (data) {
                   console.log(data);
                   fetchResv();
                }
            });
            
            }else{
            alert("Sorry time Limt");
            
            }
    }
    
    function accept(p){
    
    	$.ajax({
                type: 'post',
                url: '../php/acceptResv.php',
                data: {'RESVID':p},
                success: function (data) {
                   console.log(data);
                   fetchResv();
                }
            });
    }
    
    
    
    function fetchResv(){
    
      $.ajax({
                type: 'post',
                url: '../php/getResv.php',
                data: {'HOTELID':$('#hotelID').val()},
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
    }
    
    
        function fetchRooms(){
    
      $.ajax({
                type: 'post',
                url: '../php/getRooms.php',
                data: {'hid':$('#hotelID').val()},
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
    }
    
    
     function fetchFac(){
    
      $.ajax({
                type: 'post',
                url: '../php/getFacilities.php',
                data: {'hid':$('#hotelID').val()},
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
    }
    
    
    
    
    
    