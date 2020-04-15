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
                    <h1 class="m-0 text-dark">Subscribe</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subscribe</li>
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
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="subscribeTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>email</th>
                                        <th>status</th>
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

<?php
require './shared/footer.php';
?>
<script>
    $(document).ready(function() {
        var dtable = $('#subscribeTable').DataTable({
            "processing": true,
            "ajax": {
                "url": "./mvc/action/subscribe/subscribeListAction.php",
                "type": "POST", "dataSrc": ""
            },
            "columns": [
                { 
                    "data": "#",
                    "render": function(data, type, row, meta){
                        return meta.row + 1;
                    }
                },
                { "data": "email" },
                { 
                    "data": "sb_status",
                    "render": function(data, type, row){
                        return data == 0 ? "Inactive": "Active";
                    }},
                { 
                    "data": "created",
                    "render": function(data, type, row){
                        return data ? data: ""; 
                    }
                },
                { 
                    "data": "modified",
                    "render": function(data, type, row){
                        return data ? data: ""; 
                    }
                }
            ]
        });
    });
</script>