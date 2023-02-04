$("li").click(function(){
   		
		var user = jQuery(this).attr("id");
		$.post("postchat.php", {user:user},
        function(response){

                        $(location).attr('href', 'chat.php')
                        });
                
                });
        
