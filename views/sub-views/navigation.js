$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 65) {
        $(".navigation").addClass('fixed-top');
    } else {
        $(".navigation").removeClass('fixed-top');
    }
});
$(document).ready(function() {
    $("#formModal").on("click",".btn-success", function(){ 
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if ($('#sub-email').val() == '' || !pattern.test($('#sub-email').val())) {
            $('#sub-err').css('display', 'block');
        } else {
            $('#sub-err').css('display', 'none');
            $("#formModal").modal('hide');
            var form = new FormData();
            form.append('email', $('#sub-email').val());
            $.ajax({
                type: "POST",
                url: './mvc/action/contact/subscribeAction.php',
                data: form,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (JSON.parse(data).result) {
                        modelMessageCall('Message', 'Thank you');
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                },
                error: function(jqXHR, exception) {
                    modelMessageCall('ERROR', exception);
                    //console.log(JSON.parse(err));
                }
            });
        }
    });
});

function modelMessageCall(title, data){
    $("#myModal").modal();
    $("#myModal").css('color', 'black');
    $("#myModal .modal-title").html(title);
    $("#myModal .modal-body").html(data);
}

function pophit(){
    $("#formModal").modal();
    $("#formModal").css('color', 'black');
}