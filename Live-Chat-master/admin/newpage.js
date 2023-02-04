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


            function LoadChat(){
            var scrolled = 0;
            $.post('adminnew1.php',function(response){
                $('#chat').html(response);
                });
        }
 /*       function LoadUser(){
            var scrolled = 0;
            $.post('loaduser.php',function(response){
                $('#users').html(response);
                });
        }
     */   
       /*setInterval(function(){
                    LoadUser();
            },3000);  
           */

      var request;
        $("#foo").submit(function(event){
        event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
        request = $.ajax({
        url: "insertmessage.php",
        type: "post",
        data: serializedData
    });
    request.done(function (response, textStatus, jqXHR){
            setInterval(function(){
                    LoadChat();
            },1000);  
           $("textarea").val('');
            });
    request.fail(function (jqXHR, textStatus, errorThrown){
        alert("Error has Occured");
    });
        request.always(function () {
        $inputs.prop("disabled", false);
    });

});
