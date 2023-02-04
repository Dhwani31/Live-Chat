var request;
        $("#foo").submit(function(event){
        event.preventDefault();
      
        if(request) {
        request.abort();
        }
        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
        url: "admin_messages.php",
        type: "post",
        data: serializedData
    });
    request.done(function (response, textStatus, jqXHR){
                if(response=='0'){
                    alert("Please Enter Valid Id Password");
                }
                else{
                window.location = "newpage.php";
            }
                });
    request.fail(function (jqXHR, textStatus, errorThrown){
        alert("Error has Occured");
    });
        request.always(function () {
        $inputs.prop("disabled", false);
    });
});
