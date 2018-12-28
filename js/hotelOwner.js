function renderMyHotels(data)
{
console.log("shams2");

   var code = "";
   jQuery(data).each(function (i, item) {
   code += " <div class=\"row\">";
   code += "<div class=\"card my-2\">";
   code += "<div class=\"card-header\">";
   code += "<div class=\"card-body row\">";
   
   code += "<div class=\"col-12 px-0\">";
   code += "<div class=\"row\">";
   code += "<div style=\"float:left;\" class=\"col-4\">";
   code += "<p class=\"card-text\">Hotel Name : "+ item.HNAME +"</p>";
   code += "</div>";
   code += "<div class=\"col-4\">";
   code += "<p style=\"padding-left: 50px;\" class=\"card-text\">City : "+ item.City +"</p>";
   code += "</div>";
   code += "<div class=\"col-4\">";
   code += "<p style=\"padding-left:70px;\" class=\"card-text\">";
   for (var i = 0 ; i < item.STARS ; i++){
   code += "<img id=\"stars\" src=\"../resources/images/stars.png\">"
   }
   code += "</p>";
   code += "</div>";
   code += "</div>";
   code += "<div class=\"row my-5\">";
   code += "<div style=\"float:left;\" class=\"col-8\">";
   code += "<p class=\"card-text\">Address : "+ item.Street +"</p>"
   code += " </div>";
   code += " <div class=\"col-4\">";
   if(item.Suspended === "1"){
   code += "<p>Status : suspended</p>";
   }else
   {
   	if(item.APPROVAL ==="0"){
   	code += "<p>Status : not confirmed</p>";
   	}else
   	{
   	code += "<p>Status : confirmed</p>";
   	}
   }
   code += "</div>";
   code += "</div>";
   code += "<div class=\"row mt-5\">";
      code += " <div style=\"float:left;\" class=\"col-8\">";
   code += "<p class=\"card-text\">Money Owed : $"+item.MONEY +"</p>";
   code += "</div>";
   code += "<div class=\"col-4\">";
   code+="<input type=\"hidden\" id=\"hotelID\" >";
   code += "<button type=\"submit\" class=\"btn btn-success btn-default pull-right block px-4\" id=\""+item.HID+"\" onclick=\"pay(this)\">Pay</button>";
   code += "</div>";
   code += "</div>";
   code += "<br>";
   code+="<form action=\"Hotelinfo.php\" method=\"post\">";
   code+="<input type=\"hidden\" id=\"type\" name=\"hotelID\" value=\""+item.HID+"\">";
   code += "<button type=\"submit\" id=\"manageButton\" class=\"btn btn-success btn-default pull-right block\">Manage<img id=\"manageIcon\" src=\"../resources/images/manage.png\"></button>";
   code+="</form>";
   code += "</div>";
   code += "</div>";
   code += "</div>";
   code += "</div>";
    code += "</div>";
   });
   
   $("#hotelsOwned").html(code);

}


function pay(p){
  $.ajax({
                        type: 'post',
                        url: '../php/pay.php',
                        data: {'HotelID': p.id},
                        success: function (data) {
                         fetchHotels();
                        }
                      });

}



function fetchHotels(){

 var owner = $('#oid').val();
  console.log("hiii"+owner);
  
  	$.ajax({
                type: 'post',
                url: '../php/getHotelsOwned.php',
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

}