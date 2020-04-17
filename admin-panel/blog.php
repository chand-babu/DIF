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
                    <h1 class="m-0 text-dark">Blog</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
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
                                <div class="col-11">
                                    <h4>Blog List</h4>
                                </div>
                                <div class="text-right col-1" onclick="addBlog()">
                                    <i class="text-primary fas fa-plus-circle fa-2x" 
                                    aria-hidden="true"  style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="blogTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
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
      <input type="hidden" id="blg-model-id" value="">
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
        var dtable = $('#blogTable').DataTable({
            "order": [[ 3, "desc" ]],
            "processing": true,
            "ajax": {
                "url": "./mvc/action/blog/blogListAction.php",
                "type": "POST", "dataSrc": ""
            },
            "columns": [
                { 
                    "data": "Action",
                    "render": function(data, type, row){
                        return `<a href="./blogEdit.php?id=${row.blg_id}"><i class="fa fa-edit"></i></a> |
                        <a href="javascript:void(0)" onclick='del(${JSON.stringify(row)})'><i class="fa fa-trash"></i></a>`;
                    }
                },
                { "data": "title" },
                { 
                    "data": "image_sm",
                    "render": function(data, type, row){
                        var src = data ? './..' + data : './../assets/images/temp/no-image.jpg';
                        return `<img src='${src}' width='50' height='50'>`;
                    },     
                },
                { 
                    "data": "blg_status",
                    "render": function(data, type, row){
                        return data == 0 ? "Inactive": "Active";
                    }},
                { 
                    "data": "created",
                    "render": function(data, type, row){
                        return data ? JSON.parse(data).created_on: ""; 
                    }
                },
                { 
                    "data": "modified",
                    "render": function(data, type, row){
                        return data ? JSON.parse(data).modified_on: ""; 
                    }
                }
            ]
        });

        $("#confirmModal").on("click",".btn-danger", function(){
            $('.loader').css('display', 'block');
            $("#confirmModal").modal("hide");
            $.ajax({
                type: "GET",
                url: './mvc/action/blog/blogDeleteAction.php',
                contentType: "application/json; charset=utf-8",
                data: { 'blg_id': $("#blg-model-id").val() },
                success: function(data)
                {
                    //console.log(data);
                    if(JSON.parse(data).result){
                        // modelMessageCall('Message', JSON.parse(data).message);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    $('.loader').css('display', 'none');
                    dtable.ajax.reload();
                },
                error: function(jqXHR, exception)
                {
                    modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                    $('.loader').css('display', 'none');
                }
            });
        }); 
    });

    function addBlog() {
        location.href = './blogAdd.php';
    }

    function del(data) {
        $("#confirmModal").modal();
        $("#blg-model-id").val(data.blg_id);
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