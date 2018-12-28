$( document ).ready(function() {
console.log("shams13");
  
  

});



function render(data){
var code="";
jQuery(data).each(function (i, item) {

code += "<div class=\"card my-2\">";
code += "<div class=\"card-header\">";
code += "<div class=\"card-body row\">";
code += "<div class=\"col-4\">";

                        code += "<p class=\"card-text \"><img src=\""+item.PATH+"\" class=\"imgs img-thumbnail\" style=\"width: 300px; height: 300px; border-radius: 20px;\"></p>";
                        code += "</div>\n";
code += "<div class=\"col-8 px-0\">";
code += "<div class=\"row\">";
code += "<div style=\"float:left;\" class=\"col-6\">";
code += "<p class=\"card-text\"><strong>Hotel Name : </strong>" + item.HNAME + " </p>";
code += "</div>";
code += "<div class=\"col-6\">";
code += "<p class=\"card-text\"><strong>From </strong>" + item.StartDate + "<strong> to </strong>" + item.EndDate + "</p>";
code += "</div>";
code += "</div>";
code += "<div class=\"row my-5\">";
code += "<div style=\"float:left;\" class=\"col-6\">";
if (item.Approved === "1") {
if(item.CheckIN==="0"){
    code += "<p class=\"card-text\" ><strong>Status : </strong><span id=\"status\" style=\"color:green;\">Confirmed </span> </p>";
    }else{
     code += "<p class=\"card-text\" ><strong>Status : </strong><span id=\"status\" style=\"color:green;\">Checked In</span> </p>";
    }
} else if(item.Approved=="0") {
    code += "<p class=\"card-text\"><strong>Status : </strong><span id=\"status\">Canceled </span> </p>";
}else{
code += "<p class=\"card-text\"><strong>Status : </strong><span id=\"status\">Pending</span> </p>";
}
code += "</div>";
code += "<div style=\"float:left;\" class=\"col-6\">";
code += "<p class=\"card-text\"><strong>Room Name : </strong>"+ item.NAME +"</p>";
code += "<br>";
code += "<p class=\"card-text\"><strong>Room Capacity : </strong>"+ item.CAP +"</p>";
code += "</div>";
code += "</div>";
code += "<div class=\"row justify-content-end\">";
if(item.Approved==="1"){
code+="<form onsubmit=\"request(this)\" id=\""+item.ID+"\">";
code+="<input type=\"hidden\"  name=\"custId\" value=\""+$('#custId').val()+"\">";
code+="<input type=\"hidden\"  name=\"roomID\" value=\""+item.roomID+"\">";
code+="<input type=\"hidden\"  name=\"from\" value=\""+item.EndDate+"\">";


var one_day=1000*60*60*24;
    var input1 = item.StartDate;
     var input2 = item.EndDate;
    var date1 = new Date(input1);
    var date2 = new Date(input2);
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();
  var difference_ms = date2_ms - date1_ms;
  var days= Math.round(difference_ms/one_day); 
  var p=parseInt(item.TotalPrice)/days;
  
  

code+="<input type=\"hidden\"  name=\"price\" value=\""+p+"\">";
code += "<input style=\"float:right;\" class=\""+item.ID+"\" type=\"date\" id=\"date\" name=\"to\" value=\"2018-12-12\">";
code += "<button type=\"submit\" name=\"submit\" id=\"submitButton\" class=\"btn btn-primary ExtendStay mx-4 "+item.ID+" \">submit</button>";
code+="</form>";
code += "<button type=\"submit\" name=\"extendstay\" id=\"extend\" class=\"btn btn-primary ExtendStay mx-4 \"   onclick=\"extend("+item.ID+")\">Extend Stay</button>";

if(item.CheckIN==="0"){
code+="<form onsubmit=\"cancel(this)\" id=\""+item.ID+"\">";
code += "<button type=\"submit\" class=\"btn btn-danger cancelButton \"  >Cancel</button>";
code+="</form >";
}
code += " </div>";
if(item.CheckIN==="0"&&item.Approved==="1"){
code+="<form onsubmit=\"checkIN(this)\" id=\""+item.ID+"\">";
code += "<button type=\"submit\" class=\"btn btn-success checkinButton mt-3 \" >Check In</button>";
code+="</form >";
}

}
code += "</div>";
code += "</div>";
code += "</div>";
code += "</div>";
code += "</div>";
                      
                       
$("#resv").html(code);
                        
                        

                    });


}
    var count = 1;

    function extend(p){
 	console.log(p);
    
        count++;
        if(count%2===0){
        console.log("ana hena");
       $("."+p).css("visibility","visible");
        }else
        {
           $("."+p).css("visibility","hidden");
        }
        
   

    
    
    
    }
    
    
    function cancel(fm){
      event.preventDefault();
 	  $.ajax({
                type: 'post',
                url: '../php/cancelResv.php',
                data: {'RESVID':fm.id},
                success: function (data) {
                    
                    if(data==="0")
                    {
                           console.log("Failed");
                    }else{
                    fetchResv();
                    }
                }
            });	




    }
    
    
      function checkIN(fm){
      event.preventDefault();
 	  $.ajax({
                type: 'post',
                url: '../php/checkIN.php',
                data: {'RESVID':fm.id,'custID':$('#custId').val()},
                success: function (data) {
                    
                    if(data==="0")
                    {
                           console.log("Failed");
                    }else{
                    fetchResv();
                    }
                }
            });	




    }
    
    
    function fetchResv(){
     $.ajax({
                type: 'post',
                url: '../php/getReservations.php',
                data: {'custID': $('#custId').val()},
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
    
    
    }


	function fetchRate()
	{
	
	  $.ajax({
                type: 'post',
                url: '../php/custRatings.php',
                data: {'custID': $('#custId').val()},
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
	
	}

function rate(rate){
	
	var conceptName = $("#select"+rate.id).find(":selected").val();
      console.log(rate.id + "   "+ $('#custId').val() + " "+conceptName);
      event.preventDefault();
 	  $.ajax({
                type: 'post',
                url: '../php/rateHotel.php',
                data: {'RESVID':rate.id , 'CustID': $('#custId').val() , 'rating':conceptName},
                success: function (data) {
                    
                    if(data==="0")
                    {
                           console.log("Failed");
                    }else{
                    	fetchRate();
                    }
                }
            });	




    }
    
    function request(p){
    event.preventDefault();
    console.log(p.id);
    console.log($('#'+p.id+'').serialize());
    	 $.ajax({
                type: 'post',
                url: '../php/checkResv.php',
                data: $('#'+p.id+'').serialize(),
                success: function (data) {
                    
                   
                    fetchResv();
                    
                }
            });	
    
    
    }

function renderRating(rating){
    var code="";
    
    jQuery(rating).each(function (i, item) {
    
    code += "<div class=\"card my-2\">";
    code += "<div class=\"card-header\">";
    code += "<div class=\"row mx-1\">";
    code += "<h6>"+item.HNAME +"</h6>"
    code += "</div>";
    code += "</div>";
    code += "<div class=\"card-body\">";
    code += "<h6 style=\"margin-left: 45%;\">Rate Your Stay</h6>";
    code += "<hr style=\"width:25%;\">";
    code += "<div class=\"row\">";
    code += "<div class=\"col-6\">";
    code += "<p><strong>From</strong> "+ item.StartDate +" <strong>to</strong> "+ item.EndDate +"</p>"
    code += "</div>";
    code += "<div style=\"padding-left:200px;\" class=\"col-6\">";
    code += "<strong>Rating :</strong> <select id=\"select"+ item.ID +"\">";
    code += "<option value=\"1\">1</option>"
    code += "<option value=\"2\">2</option>"
    code += "<option value=\"3\">3</option>"
    code += "<option value=\"4\">4</option>"
    code += "<option value=\"5\">5</option>"
    code += "<option value=\"6\">6</option>"
    code += "<option value=\"7\">7</option>"
    code += "<option value=\"8\">8</option>"
    code += "<option value=\"9\">9</option>"
    code += "<option value=\"10\">10</option>"
    code += "</select>";
    code += "<button type=\"submit\" onclick=\"rate(this)\" id=\""+ item.ID +"\" class=\"btn btn-outline-success mx-1 okButton\">Rate</button>";
    code += "</div>";
    code += "</div>";
    code += "</div>";
    code += "</div>";
    
    
                           
    $("#rating").html(code);
                            
                            
    
                        });
    
    
    }
    
    
    
  function renderProfile(data)
  {
      code = "";
      console.log(data);
      
      code +="<div class=\"card my-2\">";
      code += "<div class=\"card-header\">";
      code += "<div class=\"card-body row\">";
      code += "<div class=\"col-4\"></div>";
      code += "<div class=\"col-4\">";
      code += "<img id=\"hotelImage\" src=\"../resources/images/userProfile.png\">";
      code += "</div>";
      code += "<div class=\"col-4\"></div>";
      code += "</div>";
      code += "<hr>";
      code += "<div class=\"row\">";
      code += "<div class=\"col-6\">";
      code += "<p><strong>Name : </strong>"+ data[0].Name +"</p>";
      code += " </div>";
      code += "<div class=\"col-6\">";
      code += "<p><strong>Email :</strong>"+ data[0].EMAIL +"</p>";
      code += " </div>";
      code += " </div>";
      code += " <div class=\"row mt-3\">";
      code += "<div class=\"col-12\">";
      if(data[0].TYPE === "0"){
      code += "<p><strong>Type : </strong>Standard </p>";
      }
      else
      {
      code += "<p><strong>Type : </strong>Premium</p>";
      }
      code += " </div>";
      code += " </div>";
      code += " </div>";
      code += " </div>";
      
      $("#userProfile").html(code);
      
  }