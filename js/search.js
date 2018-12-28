$(document).ready(function () {
        function ha(){
            console.log("yes");
        }
               console.log("yes9");
      $(function () {
       $('#filter').on('submit', function (e) {
       
      e.preventDefault();
      var stars=$("input[name='exampleRadios']:checked").val();
      var bud=$('#max').val();
      var one_day=1000*60*60*24;
    var input1 = $('#from').val();
     var input2 = $('#to').val();
    var date1 = new Date(input1);
    var date2 = new Date(input2);
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();
  var difference_ms = date2_ms - date1_ms;
 
  
  var days= Math.round(difference_ms/one_day); 
      var rate=$('#rate').val();
      if(rate===""){
      rate= -1;
      }
      if(bud===""){
      	bud="1000000";
      }else{
      bud=bud/days;
      }
      
      

var st=$('#from').val();
var ed=$('#to').val();
var city=$('#city').val();
var cap=$('#cap').val();
console.log(st+ed+city+cap);
if(cap===""){
 $(".hotel").html("<strong> Please enter your search details</strong>");
}else{

       $.ajax({
                type: 'post',
                url: '../php/getFilterd.php',
               data: {'STDATE':st , 'EDATE': ed, 'CITY':city, 'CAP':cap,'stars':stars,'max':bud,'rate':rate},
                success: function (data) {
                    data = JSON.parse(data);
                    var code = "";
                     $(".hotel").html(code);
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           $(".hotel").html("<strong> No rooms available in this criteria</strong>");
                    }else{
                    render(data);
                    }
                }
            });
      }

		

});


});
    
    $(function () {

        $('#search').on('submit', function (e) {

            e.preventDefault();



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


        });

     



    });
    
    
  

});




function render(data){
var code="";
 var one_day=1000*60*60*24;
    var input1 = $('#from').val();
     var input2 = $('#to').val();
    var date1 = new Date(input1);
    var date2 = new Date(input2);
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();
  var difference_ms = date2_ms - date1_ms;
 
 var days= Math.round(difference_ms/one_day); 
 
			jQuery(data).each(function (i, item) {
                        // appending html code for hotel cards
                        if(item.RoomCount>0){
                        code += "<div class=\"card my-2\">\n";
                        code += "<div class=\"card-header\"> "+item.HNAME +"</div>\n";
                        code += "<div class=\"card-body row\">\n";
                        code += "<div class=\"col-5\">";
                        code += "<p class=\"card-text \"><img src=\""+item.PATH+"\" class=\"imgs img-thumbnail\" style=\"width: 300px; height: 300px; border-radius: 20px;\"></p>";
                        code += "</div>\n";
                        
                        code += "<div class=\"col-7\">\n";
                        code += "<div class=\"row\">";
                        code += "<div class=\"col-6\">";
                        code += "<h5 class=\"card-title\">" + item.NAME+"</h5>\n";
                        code += "</div>";
                        code += "<div class=\"col-6\">";
                        if(item.RATING===null){
                        code += "<p class=\"cusRating\" style=\"float:right;\" class=\"card-title\"><strong>Rating:</strong> N/A </p>\n";
                        }else{
                        code += "<p class=\"cusRating\" style=\"float:right;\" class=\"card-title\"><strong>Rating:</strong> "+ item.RATING+"</p>\n";
                        }
                        code += "</div>";
                        code += "</div>";
                        code +=  "<p class=\"card-text\"><strong> Located in :</strong> "+ item.Country+" "+item.City+" "+item.Street  +"</p>\n";
                        code += "<p class=\"card-text\"><strong> Stars :</strong> ";
                        for( var i=0 ;i< item.STARS ;i++){
                        code +=	"<img id=\"stars\" src=\"../resources/images/stars.png\">";
                        }
                        code += "</p>";
                         code += "<p class=\"card-text\"><strong> Price :</strong> $ "+ item.PRICE*days +"</p>\n";
                           if($('#type').val()==="1"){
                        code += "<p class=\"card-text\"><strong> Price after discount :</strong> $ "+ (item.PRICE*days)*(1-0.05) +"</p>\n";
                      }
                 
                       
                        code += "<small class=\"roomsLeft\">"+ item.RoomCount +" room left!</small>";
                         
                       
                       
                        var s=item.PRICE;
                       if($('#type').val()==="1"){
                        code+="<form onsubmit=\"apply(this,"+(item.PRICE)*(1-0.05)+")\" id=\""+item.ID+"\" method=\"post\" class=\"book\">";
}else{
 code+="<form onsubmit=\"apply(this,"+item.PRICE+")\" id=\""+item.ID+"\" method=\"post\" class=\"book\">";
}
                        code +=  "<button type=\"submit\" class=\"btn btn-primary mb-2 my-2 applyButton\">Book</button>";
                        code += "<button type=\"button\" class=\"btn btn-info btn-sm mt-2\" data-toggle=\"modal\" onclick=\"getFacilities(" +item.ID +","+item.HOTELID +")\">show facilities</button>"; 
                        code += "<div id=\"facility\"\n>";
                        code += "</div>";
                        code +="</form>";
                        
                        code += "</div>\n";
                        code += "</div>\n";
                        code += "</div>";
                        //console.log(code);
                        $(".hotel").html(code);
                        
                        
}
                    });


}



function getFacilities(roomID, hotelID){
      event.preventDefault();
 	  $.ajax({
                type: 'post',
                url: '../php/getFac.php',
                data: {'HOTELID':hotelID},
                success: function (data) {
                    
                    if(data==="0")
                    {
                           console.log("Failed");
                    }else{
                    	console.log(data);
                    	data = JSON.parse(data);
                    	renderModal(roomID,data);
                    }
                }
            });	




    }

   

     

function renderModal(roomID , data)
{
	console.log(data);
	console.log(roomID);
	var code = "";
	$("#facility").html(code);
	
	code += " <div class=\"modal fade\" id=\"myModal"+roomID +"\" role=\"dialog\">";
	code += "<div class=\"modal-dialog\">";
	code += " <div class=\"modal-content\">";
	code += "<div class=\"modal-header\">";
	code += "<h4 style=\"float:left;\" class=\"modal-title\">Facilities</h4>";
	code += "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
	code += "</div>";
	code += "<div class=\"modal-body\">";
	code += "<div id=\"carouselExampleIndicators"+ roomID+"\" class=\"carousel slide\" data-ride=\"carousel\">";
	code += "<ol class=\"carousel-indicators\">";
	for(var j = 0 ; j < data.length ; j++)
	{
		if (j===0){
		code += "<li data-target=\"#carouselExampleIndicators"+roomID +"\" data-slide-to=\""+j+"\" class=\"active\"></li>"
		}
		else
		{
		code += "<li data-target=\"#carouselExampleIndicators"+roomID +"\" data-slide-to=\""+j+"\"></li>"
		}
	}
	code += "</ol>";
	
	for(var j = 0 ; j < data.length ; j++)
	{
		if (j===0){
			code += "<div class=\"carousel-inner\">";
			code += "<div class=\"carousel-item active\">";
			code += "<img class=\"d-block w-100\" id=\"img-carousel\" src=\""+data[j].PATH  +"\" alt=\"slide"+j+"\">";
			code +="<div class=\"carousel-caption d-none d-md-block\">";
			code += "<h5>"+data[j].Name+"</h5>";
			code += "<p>"+data[j].Descr+"</p>";
			code += "</div>";
			code += "</div>";
		}
		else
		{
		        code += "<div class=\"carousel-item\">";
		        code += "<img class=\"d-block w-100\" id=\"img-carousel\" src=\""+data[j].PATH  +"\" alt=\"slide"+j+"\">"
		        code +="<div class=\"carousel-caption d-none d-md-block\">";
		        code += "<h5>"+data[j].Name+"</h5>";
			code += "<p>"+data[j].Descr+"</p>";
			code += "</div>";
			code += "</div>";
		}
	}
	code += "</div>";
	code += "<a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators"+roomID +"\" role=\"button\" data-slide=\"prev\">";
	code += "<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>";
	code += "<span class=\"sr-only\">Previous</span>";
	code += "</a>";
	code += "<a class=\"carousel-control-next\" href=\"#carouselExampleIndicators"+roomID +"\" role=\"button\" data-slide=\"next\">";
	code += "<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>";
	code += "<span class=\"sr-only\">Next</span>";
	code += "</a>";
	code += "</div>";
	code += "</div>";
	code += "<div class=\"modal-footer\">";
	code += "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
	code += "</div>";
	code += "</div>";
	code += "</div>";
	code += "</div>";
	$("#facility").html(code);
	console.log("#myModal"+roomID);
    	$("#myModal"+roomID).modal("toggle");
console.log(code);
}

  
  