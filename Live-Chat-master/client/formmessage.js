$(function(){
    var arrow = $('.chat-head img');
    var textarea = $('.chat-text textarea');

    arrow.on('click', function(){
        var src = arrow.attr('src');

        $('.chat-body').slideToggle('fast');
        $('.chat-text').slideToggle('fast');
        if(src =='down.png'){
            arrow.attr('src', 'up.png');
        }
        else{
            arrow.attr('src', 'down.png');
        }
    }); 
});
    function LoadChat(){
            var scrolled = 0;
            $.post('message.php',function(response){
                $('#res').html(response);
                $('#res').scrollTop($('#res').prop('scrollHeight'));
                 });
                }   

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
        url: "messages.php",
        type: "post",
        data: serializedData
    });
    request.done(function (response, textStatus, jqXHR){
            setInterval(function(){
                    LoadChat();
            },1000);
            $(".rem").hide();
             $("textarea").val('');
                 
            });
    request.fail(function (jqXHR, textStatus, errorThrown){
        alert("Error has Occured");
    });
        request.always(function () {
        $inputs.prop("disabled", false);
    });

});
