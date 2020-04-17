$(document).ready(function() {
    $("#contact-form").submit(function(e) { 
        e.preventDefault();
        $('#contact-submit').addClass('disabled');
        if ($('#name').val() == '' || $('#email').val() == '' || $('#subject').val() == '' ||
            $('#message').val() == '') {
            $('#name-err').css('display',$('#name').val() == '' ? 'block':'none');
            $('#email-err').css('display',$('#email').val() == '' ? 'block':'none');
            $('#subject-err').css('display', $('#subject').val() == '' ? 'block':'none');
            $('#message-err').css('display',$('#message').val() == '' ? 'block':'none');
            $('#contact-submit').removeClass('disabled');
        } else {
            var form = new FormData(this);
            $.ajax({
                type: "POST",
                url: './mvc/action/contact/contactAction.php',
                data: form,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (JSON.parse(data).result) {
                        modelMessageCall('Message', 'We will contact you soon');
                        setTimeout(function(){
                            location.href = './';
                        }, 3000);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    $('#contact-submit').removeClass('disabled');
                },
                error: function(jqXHR, exception) {
                    modelMessageCall('ERROR', exception);
                    //console.log(JSON.parse(err));
                    $('#contact-submit').removeClass('disabled');
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