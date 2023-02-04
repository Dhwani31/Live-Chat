$("li").click(function(){
   		
		var user = jQuery(this).attr("id");
		
        var i=0;//var userName=$("#name").text();
		$.post("getuser.php", {user:user},
        function(response){
                $('#userName').html(response);
                });
        
        $.post("adminnew.php", {user:user},
		function(response){
             //   $('#userName').html(userName);
                $('#chat').html(response);
                });
        
});      


        