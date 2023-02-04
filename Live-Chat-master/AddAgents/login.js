var request;
        $("form").submit(function(event){
        event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
        request = $.ajax({
        url: "sadmin.php",
        type: "post",
        data: serializedData
    });
    request.done(function (response, textStatus, jqXHR){
                if(response=='0'){
                    alert("Wrong ID Password");
                }
                else
                {
                    $(location).attr('href', 'check.html');
                }


            });
    request.fail(function (jqXHR, textStatus, errorThrown){
        alert("Error has Occured");
    });
        request.always(function () {
        $inputs.prop("disabled", false);
    });

});
