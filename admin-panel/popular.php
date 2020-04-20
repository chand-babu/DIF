<?php
    include './mvc/autoloader.php';
    require './shared/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="loader" style="display:none;"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Popular Download</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Popular download</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4>Gallery Post List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="galleryTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Action</th> -->
                                        <th>Popular</th>
                                        <th>Name</th>
                                        <th>Featured Image</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <!-- <th>Action</th> -->
                                        <th>Popular</th>
                                        <th>Name</th>
                                        <th>Featured Image</th>
                                        <th>Status</th>
                                        <!-- <th>Created</th>
                                        <th>Modified</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
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

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" id="gal-model-id" value="">
      <div class="modal-body">
      Are you sure you want to delete ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<?php
require './shared/footer.php';
?>
<script>
    $(document).ready(function() {
        var gltable = $('#galleryTable').DataTable({
            // "order": [[ 3, "desc" ]],
            "processing": true,
            "ajax": {
                "url": "./mvc/action/gallery/galleryListAction.php",
                "type": "POST", "dataSrc": ""
            },
            "columns": [
                { 
                    "data": "popular_download",
                    "render": function(data, type, row, meta) {
                        console.log(data);
                        var trRow = $('#galleryTable tbody tr:eq('+(meta.row)+')');
                        //trRow.children().find('input[type=checkbox]')[0].checked = true;
                        if (trRow.children().find('.dt-checkboxes')[0] !== undefined && data > 0) {
                            trRow.children().find('.dt-checkboxes')[0].checked = true;
                            trRow.toggleClass('selected');
                        };
                        //console.log();
                        //console.log(row.trending_order > 0);
                        var inputDisable = data > 0 ? '':'disabled';
                        return `<div class="text-center"><input type="hidden" class="dt-hidden-id" value="${row.gal_id}">
                        <input type="checkbox" class="dt-checkboxes"></div>`;
                    }
                },
                { "data": "title" },
                { 
                    "data": "featured_image_sm",
                    "render": function(data, type, row){
                        var src = data ? './..' + data : './../assets/images/temp/no-image.jpg';
                        return `<img src='${src}' width='50' height='50'>`;
                    },     
                },
                { 
                    "data": "gal_status",
                    "render": function(data, type, row){
                        return row.popular_download == 0 ? "Inactive": "Active";
                    }
                }
            ]
        });

        $('#galleryTable tbody').on( 'click', 'tr td .dt-checkboxes', function () {
            var status = 0;
            var gal = $(this).parent().find('.dt-hidden-id').val();
            if ($(this)[0].checked) {
                $(this).parent().parent().parent().toggleClass('selected');
                status = 1;
            } else {
                $(this).parent().parent().parent().toggleClass('selected');
            }
            var form_data = new FormData();
            form_data.append('gal_id', gal);
            form_data.append('status', status);
            $('.loader').css('display', 'block');
            $.ajax({
                type: "POST",
                url: './mvc/action/gallery/galleryPopularAction.php',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    console.log(data);
                    if(JSON.parse(data).result){
                        modelMessageCall('Message', JSON.parse(data).message);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    $('.loader').css('display', 'none');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(jqXHR, exception)
                {
                    modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                    $('.loader').css('display', 'none');
                }
            });
        } );

        $("#image").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        $("#category-form").submit(function(e) {
            e.preventDefault(); 
            var status = Number($('#type').val());
            var form = new FormData(this);
            var url = './mvc/action/category/';
            //console.log(status)
            $.ajax({
                type: "POST",
                url: status ? './mvc/action/category/categoryEditAction.php' : './mvc/action/category/categoryAddAction.php',
                data: form,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    if(JSON.parse(data).result){
                        modelMessageCall('Message', JSON.parse(data).message);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(jqXHR, exception)
                {
                    modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                    //console.log(JSON.parse(err));
                }
            });
        });

        $("#confirmModal").on("click",".btn-danger", function(){
            $('.loader').css('display', 'block');
            $("#confirmModal").modal("hide");
            $.ajax({
                type: "GET",
                url: './mvc/action/gallery/galleryDeleteAction.php',
                contentType: "application/json; charset=utf-8",
                data: { 'gal_id': $("#gal-model-id").val() },
                success: function(data)
                {
                    //console.log(data);
                    if(JSON.parse(data).result){
                        // modelMessageCall('Message', JSON.parse(data).message);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    $('.loader').css('display', 'none');
                    gltable.ajax.reload();
                },
                error: function(jqXHR, exception)
                {
                    modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                    $('.loader').css('display', 'none');
                }
            });
        }); 
    });

    function addGallery() {
        location.href = './galleryAdd.php';
    }

    function del(data) {
        $("#confirmModal").modal();
        $("#gal-model-id").val(data.gal_id);
    }

    function modelMessageCall(title, data){
        $("#myModal").modal();
        $("#myModal .modal-title").html(title);
        $("#myModal .modal-body").html(data);
    }

    function errorCommon(jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        return msg;
    }
</script>