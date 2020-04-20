$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 65) {
        $(".navigation").addClass('fixed-top');
    } else {
        $(".navigation").removeClass('fixed-top');
    }
});
$(document).ready(function() {
    $('#add-model').html(modelAdd());
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

function modelAdd() {
    return `<div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade mt-5" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="blg-model-id" value="">
                <div class="modal-body">
                    <label for="">Email ID</label>
                    <input id="sub-email" type="email" name="email" class="form-control" placeholder="example@example.com">
                    <div id="sub-err" class="text-danger" style="display:none;">Please enter Valid email id</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>`;
}