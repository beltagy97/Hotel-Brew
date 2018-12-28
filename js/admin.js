    function renderHotels(data)
    {
        var code = "";
        jQuery(data).each(function (i, item) {
        code += "<div class=\"card my-2\">";
        code += "<div class=\"card-header\">";
        code += "<h5 class=\"card-title\"> "+item.HNAME +"</h5>";
        code += " </div>";
        code += "<div class=\"card-body text-dark\">";
        code += "<p style=\"text-align:center;\"><strong>Owned By :</strong>"+ item.Owner_Name +"</p>";
        code += "<hr>";
        code += "<div class=\"row\">";
        code += "<div class=\"col-4\">";
        code += "<p><strong>Country :</strong> "+item.Country+"</p>";
        code += "</div>";
        code += "<div class=\"col-4\">";
        code += "<p><strong>City :</strong> "+item.City+"</p>";
        code += "</div>";
        code += "<div class=\"col-4\">";
        code += "<p><strong>Street :</strong> "+item.Street+"</p>";
        code += "</div>";
        code += "</div>";
        code += "<div class=\"row\">";
        code += "<div class=\"col-6\">";
        code += "<p><strong>Last Month Payment :</strong>$"+item.Last_Month  +"</p>";
        code += "</div>";
        code += "<div class=\"col-6\">";
        code += "<p><strong> Money owed :</strong>$"+item.Due  +"</p>";
        code += "</div>";
        code += "</div>";
        code += "<div class=\"row\">";
        code += "<div style=\"text-align:left;\" class=\"col-6\">";
        if(item.Suspended ==="1"){
            code += "<p><strong>Status:</strong> Suspended</p>";
        }else
        {
            if(item.APPROVAL ==="1")
            {
                code += "<p><strong>Status :</strong> Approved</p>";
            }else
            {
                code += "<p><strong>Status :</strong> Pending</p>";
            }
        }
        code += "</div>";
        code += "<div class=\"col-6\">";
        if(item.Suspended==="1"){
         code += "<button style=\"float:right;margin-left:15px;\" class=\"btn btn-outline-success\" onclick=\"unsuspend("+item.HID+")\">Unsuspend</button>";
        }else if(item.APPROVAL==="1"){
          code += "<button style=\"float:right;margin-left:15px;\"  class=\"btn btn-outline-danger\" onclick=\"suspend("+item.HID+")\">Suspend</button>";
        
        }else{
           code += "<button style=\"float:right;\" class=\"btn btn-outline-success\" onclick=\"approve("+item.HID+")\">Approve</button>";
        }
      
       
     
        code += "</div>";
        code += "</div>";
        code += "</div>";
        code += "</div>";


        });

        $("#hotelsAdmin").html(code);

    }
    
    function unsuspend(p){
    $.ajax({
                type: 'post',
                url: '../php/unsuspend.php',
                data: {'HID':p},
                success: function (data) {
                 
                     
                    console.log(data);
                    fetchHotels();
                   
                }
            });
    }
    
     function suspend(p){
    $.ajax({
                type: 'post',
                url: '../php/suspend.php',
                data: {'HID':p},
                success: function (data) {
                 
                     
                    console.log(data);
                    fetchHotels();
                   
                }
            });
    }
    
    
    
     function approve(p){
    $.ajax({
                type: 'post',
                url: '../phpv/approve.php',
                data: {'HID':p},
                success: function (data) {
                 
                     
                    console.log(data);
                    fetchHotels();
                   
                }
            });
    }
    
    
    
    function fetchHotels(){
    
      $.ajax({
                type: 'post',
                url: '../php/getHotels.php',
                data: {},
                success: function (data) {
                    data = JSON.parse(data);
                     $("#hotelsAdmin").html("");
                    console.log(data);
                    // if no search results found
                    if(data.length===0)
                    {
                           console.log("No Hotels");
                    }else{
                    renderHotels(data);
                    }
                }
            });
    
    
    }
    