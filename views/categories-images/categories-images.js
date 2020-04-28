/* const buttons = document.querySelectorAll('.project');
const overlay = document.querySelector('.overlay');
const overlayImage = document.querySelector('.overlay__inner img');

function open(e) {
  overlay.classList.add('open');
  const src= e.currentTarget.querySelector('img').src;
  overlayImage.src = src;
}

function close() {
  overlay.classList.remove('open');
}

buttons.forEach(button => button.addEventListener('click', open));
overlay.addEventListener('click', close);



 */
$(document).ready(function() {
    $('head').append(`<meta name="description" content="${$('#meta-desc').val()}"></meta>
    <meta name="keywords" content="${$('#meta-tag').val()}"></meta>`);

    $('#comment-form').submit(function(e) {
        e.preventDefault();
        if ($('#comment-name').val() == '' || $('#comment-msg').val() == '') {
            $('#name-err').css('display',$('#comment-name').val() == '' ? 'block':'none');
            $('#msg-err').css('display',$('#comment-msg').val() == '' ? 'block':'none');
        } else {
            var form = new FormData(this);
            $.ajax({
                type: "POST",
                url: './mvc/action/blog/commentAction.php',
                data: form,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (JSON.parse(data).result) {
                        modelMessageCall('Message', 'Comment Added');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    // $('#contact-submit').removeClass('disabled');
                },
                error: function(jqXHR, exception) {
                    modelMessageCall('ERROR', exception);
                    //console.log(JSON.parse(err));
                    $('#contact-submit').removeClass('disabled');
                }
            });
        }
            
        console.log($(this).val());
    });
});

function modelMessageCall(title, data){
    $("#myModal").modal();
    $("#myModal").css('color', 'black');
    $("#myModal .modal-title").html(title);
    $("#myModal .modal-body").html(data);
}

function myFunction(){
    $('#blog-reply').toggleClass('d-block');
}

// function downloadPage (data) {
//     if (!localStorage.getItem("image-download")){
//         localStorage.setItem("image-download", JSON.stringify(data));
//         //console.log(data);
//     } else {
//         localStorage.removeItem('image-download');
//         localStorage.setItem("image-download", JSON.stringify(data));
//     }
//     setTimeout(function(){
//         location.href = './../image/' + ;
//     },1000);
// }