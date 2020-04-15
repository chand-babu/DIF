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
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                    <h4>Category List</h4>
                                </div>
                                <div class="col-3"><button id="button" class="btn btn-success">Save Trending Order</button></div>
                                <div class="text-right col-1" onclick="openNav()">
                                    <i class="text-primary fas fa-plus-circle fa-2x"
                                    aria-hidden="true" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="categoryTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>T.CAT Order</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>T.CAT Order</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="ch-mySidenav" class="ch-sidenav">
                        <div class="row">
                            <div class="col-2 offset-10" onclick="closeNav()">
                                <i class="fas fa-times fa-2x"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-info"><h4 id="form-label">Add Category</h4></div>
                            <div class="col-12">
                                <form id="category-form" method="post" class="p-4" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        
                                        <input type="hidden" id="type" name="type" value="0">
                                        <input type="hidden" id="imageData" name="imageData" value="">
                                        <input type="hidden" id="catId" name="catId" value="">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                             <div class="col-4 mb-2 text-center">
                                               <div class="mb-1">Image Preview</div>
                                                <div><img id="img-pre" src="./../assets/images/temp/no-image.jpg" width="350" height="200"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="custom-file">
                                                    <input id="image" type="file" name="image" class="custom-file-input" accept="image/*" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group status-block">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
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
      <input type="hidden" id="cat-model-id" value="">
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
        // var displayStatus = $('#type').val() === '0' ? 'none' : 'block';
        // $('.status-block').css('display',displayStatus);
        var dtable = $('#categoryTable').DataTable({
            "processing": true,
            "ajax": {
                "url": "./mvc/action/category/categoryListAction.php",
                "type": "POST", "dataSrc": ""
            },
            "columns": [
                { 
                    "data": "Action",
                    "render": function(data, type, row){
                        return `<a href="javascript:void(0)" onclick='edit(${JSON.stringify(row)})'><i class="fa fa-edit"></i></a> |
                        <a href="javascript:void(0)" onclick='del(${JSON.stringify(row)})'><i class="fa fa-trash"></i></a>`;
                    }
                },
                { 
                    "data": "trending_order",
                    "render": function(data, type, row, meta) {
                        console.log(data);
                        var trRow = $('#categoryTable tbody tr:eq('+(meta.row)+')');
                        //trRow.children().find('input[type=checkbox]')[0].checked = true;
                        if (trRow.children().find('.dt-checkboxes')[0] !== undefined && data > 0) {
                            trRow.children().find('.dt-checkboxes')[0].checked = true;
                            trRow.toggleClass('selected');
                        };
                        //console.log();
                        //console.log(row.trending_order > 0);
                        var inputDisable = data > 0 ? '':'disabled';
                        return `<input type="hidden" class="dt-hidden-id" value="${row.cat_id}"><input type="checkbox" class="dt-checkboxes">
                        <input type="number" class="dt-input ml-2 w-50" max="6" min="1" ${inputDisable} value="${data}">`;
                    }
                },
                { "data": "name" },
                { 
                    "data": "image_sm",
                    "render": function(data, type, row, meta){
                        return `<img src='./..${data}' width='50' height='50'>`;
                    },     
                },
                { 
                    "data": "cat_status",
                    "render": function(data, type, row){
                        return data == 0 ? "Inactive": "Active";
                    }},
                { 
                    "data": "created",
                    "render": function(data, type, row){
                        return JSON.parse(data).created_on; 
                    }
                },
                { 
                    "data": "modified",
                    "render": function(data, type, row){
                        return data ? JSON.parse(data).modified_on: ""; 
                    }
                },
            ]
        });
        $('#categoryTable tbody').on( 'click', 'tr td .dt-checkboxes', function () {
            //console.log($(this).parent().parent().find('.dt-input').val() > 0);
            if ($(this)[0].checked) {
                $(this).parent().parent().toggleClass('selected');
                $(this).parent().parent().find('.dt-input')[0].disabled = false;
            } else {
                $(this).parent().parent().toggleClass('selected');
                $(this).parent().parent().find('.dt-input')[0].disabled = true;
            }
            //console.log($(this).children().find('input[type=checkbox]')[0].checked);
        } );

        $('#button').click( function () {
            //alert( dtable.rows('.selected').data().length +' row(s) selected' );
            //console.log($('#categoryTable tbody tr:eq(0)').click());
            // var trRow = $('#categoryTable tbody').find('.selected');
            // for (var i = 0; i <= trRow.length; i++) {
            //     console.log(trRow[i]);
            // }
            var zeroCheck = 0;
            var dataSet = [];
            $('#categoryTable tbody .selected').each(function(){
                var itemSet = {};
                if ($(this).find('.dt-input').val() > 0) {
                    itemSet.cat_id = $(this).find('.dt-hidden-id').val();
                    itemSet.order = $(this).find('.dt-input').val();
                    dataSet.push(itemSet);
                    itemSet = {};
                } else {
                    zeroCheck = 1;
                }
            });
            if(zeroCheck){
                modelMessageCall('Alert', 'Your order value should not be zero');
            } else {
                if (dataSet.length <= 1 || dataSet.length >= 7){
                    modelMessageCall('Info', 'Min 2 and Max 6 Allow');
                } else {
                    console.log(dataSet);
                    var form_data = new FormData();
                    form_data.append('dataSet', JSON.stringify(dataSet));
                    $('.loader').css('display', 'block');
                    $.ajax({
                        type: "POST",
                        url: './mvc/action/category/categoryOrderAction.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function(data)
                        {
                            console.log(data);
                            if(JSON.parse(data).result){
                                location.reload();
                                modelMessageCall('Message', JSON.parse(data).message);
                            } else {
                                modelMessageCall('Message', JSON.parse(data).message);
                            }
                            $('.loader').css('display', 'none');
                            $("#ch-mySidenav").css("width", "0");
                            dtable.ajax.reload();
                        },
                        error: function(jqXHR, exception)
                        {
                            modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                            $('.loader').css('display', 'none');
                            $("#ch-mySidenav").css("width", "0");
                            //console.log(JSON.parse(err));
                        }
                    });
                }
            }
            //console.log($('#categoryTable tbody').find('.selected').length);
            //console.log($('#categoryTable tbody').find('.selected'));
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
            $('.loader').css('display', 'block');
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
                    console.log(data);
                    if(JSON.parse(data).result){
                        modelMessageCall('Message', JSON.parse(data).message);
                    } else {
                        modelMessageCall('Message', JSON.parse(data).message);
                    }
                    $('.loader').css('display', 'none');
                    $("#ch-mySidenav").css("width", "0");
                    dtable.ajax.reload();
                },
                error: function(jqXHR, exception)
                {
                    modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                    $('.loader').css('display', 'none');
                    $("#ch-mySidenav").css("width", "0");
                    //console.log(JSON.parse(err));
                }
            });
        });

        $("#confirmModal").on("click",".btn-danger", function(){
            $("#confirmModal").modal("hide");
            $('.loader').css('display', 'block');
            $.ajax({
                type: "GET",
                url: './mvc/action/category/categoryDeleteAction.php',
                contentType: "application/json; charset=utf-8",
                data: { 'cat_id': $("#cat-model-id").val() },
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

    function modelMessageCall(title, data){
        $("#myModal").modal();
        $("#myModal .modal-title").html(title);
        $("#myModal .modal-body").html(data);
    }

    function openNav() {
        $("#category-form").trigger("reset");
        $("#ch-mySidenav").css("width", "30%");
        $('.status-block').css('display','none');
        $('#type').val(0);
        $('#form-label').text('Add Category');
        $('#img-pre').attr('src', './../assets/images/temp/no-image.jpg');
    }

    function closeNav() {
        $("#ch-mySidenav").css("width", "0");
    }

    function del(data) {
        $("#confirmModal").modal();
        $("#cat-model-id").val(data.cat_id);
    }

    function edit(data) {
        $("#ch-mySidenav").css("width", "30%");
        $('#type').val(1);
        $('#name').val(data.name);
        $('#status').val(data.cat_status);
        $('#imageData').val(JSON.stringify([data.image_lg, data.image_sm]));
        $('#catId').val(data.cat_id);
        $('#img-pre').attr('src', './../' +data.image_sm);
        $('.status-block').css('display','block');
        $('#form-label').text('Edit Category');
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