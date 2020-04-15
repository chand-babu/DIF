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
                    <h1 class="m-0 text-dark">Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                    <h4>Gallery List</h4>
                                </div>
                                <div class="col-3"><button id="button" class="btn btn-success">Save Trending Order</button></div>
                                <div class="text-right col-1" onclick="addGallery()">
                                    <i class="text-primary fas fa-plus-circle fa-2x" 
                                    aria-hidden="true"  style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="galleryTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>T.GAL Order</th>
                                        <th>Name</th>
                                        <th>Featured Image</th>
                                        <th>status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>T.GAL Order</th>
                                        <th>Name</th>
                                        <th>Featured Image</th>
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
            "order": [[ 3, "desc" ]],
            "processing": true,
            "ajax": {
                "url": "./mvc/action/gallery/galleryListAction.php",
                "type": "POST", "dataSrc": ""
            },
            "columns": [
                { 
                    "data": "Action",
                    "render": function(data, type, row){
                        return `<a href="./galleryEdit.php?id=${row.gal_id}"><i class="fa fa-edit"></i></a> |
                        <a href="javascript:void(0)" onclick='del(${JSON.stringify(row)})'><i class="fa fa-trash"></i></a>`;
                    }
                },
                { 
                    "data": "trending_order",
                    "render": function(data, type, row, meta) {
                        
                        var trRow = $('#galleryTable tbody tr:eq('+(meta.row)+')');
                        //trRow.children().find('input[type=checkbox]')[0].checked = true;
                        if (trRow.children().find('.dt-checkboxes')[0] !== undefined && data > 0) {
                            trRow.children().find('.dt-checkboxes')[0].checked = true;
                            trRow.toggleClass('selected');
                        };
                        //console.log();
                        //console.log(row.trending_order > 0);
                        var inputDisable = data > 0 ? '':'disabled';
                        return `<input type="hidden" class="dt-hidden-id" value="${row.gal_id}"><input type="checkbox" class="dt-checkboxes">
                        <input type="number" class="dt-input ml-2 w-50" max="6" min="1" ${inputDisable} value="${data}">`;
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

        $('#galleryTable tbody').on( 'click', 'tr td .dt-checkboxes', function () {
            if ($(this)[0].checked) {
                $(this).parent().parent().toggleClass('selected');
                $(this).parent().parent().find('.dt-input')[0].disabled = false;
            } else {
                $(this).parent().parent().toggleClass('selected');
                $(this).parent().parent().find('.dt-input')[0].disabled = true;
            }
        } );

        $('#button').click( function () {
            var zeroCheck = 0;
            var dataSet = [];
            $('#galleryTable tbody .selected').each(function(){
                var itemSet = {};
                if ($(this).find('.dt-input').val() > 0) {
                    itemSet.gal_id = $(this).find('.dt-hidden-id').val();
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
                        url: './mvc/action/gallery/galleryOrderAction.php',
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
                            gltable.ajax.reload();
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