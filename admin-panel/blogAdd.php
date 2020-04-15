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
                                    <h4>Blog Add</h4>
                                </div>
                                <div class="text-right col-1" onclick="listBlog()">
                                    <i class="text-primary fas fa-list-alt fa-2x" 
                                    aria-hidden="true" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="blog-form" method="post" class="p-4" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group status-block">
                                            <label for="title">Category <span class="text-danger">*</span></label>
                                            <select name="category" id="listCat" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Blog Title">
                                        <div id="title-err" class="text-danger" style="display:none;">Required</div>
                                    </div>
                                    
                                    <div class="col-4 mt-3">
                                        <label for="title">Image <span class="text-danger">*</span></label>
                                        <div>
                                            <img id="image-pre" src="./../assets/images/temp/no-image.jpg" width="100%" height="180" alt="">
                                        </div>
                                        <div class="mt-2 custom-file">
                                            <input id="file" type="file" name="image" class="custom-file-input"
                                            accept="image/*" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <div id="file-err" class="text-danger" style="display:none;">Required</div>
                                        </div>
                                    </div>
                                    <div class="col-8 mt-3">
                                        <div class="form-group">
                                            <label for="desc">Title Description <span class="text-danger">*</span></label>
                                            <textarea type="text" id="desc" name="description" class="form-control"
                                            placeholder="Enter Description" rows="9"></textarea>
                                            <div id="desc-err" class="text-danger" style="display:none;">Required</div>
                                            <div id="desc-size-err" class="text-danger" style="display:none;
                                            ">Should have more than 200 charecters</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="title">Image Alt Name</label>
                                        <input type="text" id="image-alt" name="image_alt" class="form-control" placeholder="Enter Image Name">
                                        <div id="image-alt-err" class="text-danger" style="display:none;">Required</div>
                                    </div>
                                    <div class="col-8">
                                        <label for="title">Post url</label>
                                        <input type="text" id="post-url" name="post_url" class="form-control" 
                                        placeholder="eg: happy-holi-festival-to-all">
                                        <div id="post-url-err" class="text-danger" style="display:none;">URL exist please try unique</div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label for="desc">Content <span class="text-danger">*</span></label>
                                            <textarea type="text" id="content" name="content_description" class="form-control"
                                            rows="20"></textarea>
                                            <div id="content-err" class="text-danger" style="display:none;">Required</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 text-right">
                                        <input id="submit" class="btn btn-success" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php
require './shared/footer.php';

?>
<script>
    $(document).ready(function() {
        $("#post-url").focusout(function(){
            $.ajax({
                type: "POST",
                url: './mvc/action/blog/checkPostUrlAction.php?id=' +  $("#post-url").val(),
                processData: false,
                contentType: false,
                success: function(data) {
                    let value = JSON.parse(data);
                    let errValidation = 'none';
                    if (value.result) {
                        errValidation = value.data.length > 0 ? 'block' : 'none';
                    }
                    $("#post-url-err").css('display',  errValidation ); 
                    //console.log();
                },
                error: function(jqXHR, exception) {
                    console.log(err);
                }
            });
        });

        $.ajax({
            type: "POST",
            url: './mvc/action/category/categoryListAction.php',
            processData: false,
            contentType: false,
            success: function(data) {
                var options = '<option value="" disabled><strong>-- Select Categort --</strong></option>';
                $(JSON.parse(data)).each(function(index, value) {
                    options += '<option value="' + value.cat_id + '">' + value.name + '</option>';
                });
                $('#listCat').html(options);
                //console.log(data);
            },
            error: function(jqXHR, exception) {
                console.log(err);
            }
        });

        $('#content').summernote({
            height: 500, 
            focus: true,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }
            }
        });

        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("image", file);
            data.append("blog_img", true);
            $.ajax({
                data: data,
                type: "POST",
                url: './mvc/action/blog/blogAddAction.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    var data = JSON.parse(url);
                    if (data.result) {
                        $('#content').summernote('editor.insertImage', './..' + data.file[0]);
                        //editor.insertImage(welEditable, './..'+data.file[1]);
                    }
                    console.log(url);
                }
            });
        }

        $("#blog-form").submit(function(e) { 
            e.preventDefault();
            $('#submit').addClass('disabled');
            if ($('#title').val() == '' || $('#desc').val() == '' || $('#content').val() == '' ||
                $('#file')[0].files.length === 0) {
                $('#desc-size-err').css('display','none');
                commonValidation();
            } else if($('#desc').val().length < 200) {
                $('#desc-size-err').css('display','block');
                commonValidation();
            }else {
                $('.loader').css('display', 'block');
                var form = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: './mvc/action/blog/blogAddAction.php',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (JSON.parse(data).result) {
                            modelMessageCall('Message', JSON.parse(data).message);
                            setTimeout(function(){
                                location.href = './blog.php';
                            }, 1000);
                        } else {
                            modelMessageCall('Message', JSON.parse(data).message);
                        }
                        $('#submit').removeClass('disabled');
                        $('.loader').css('display', 'none');
                    },
                    error: function(jqXHR, exception) {
                        modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                        //console.log(JSON.parse(err));
                        $('#submit').removeClass('disabled');
                        $('.loader').css('display', 'none');
                    }
                });
            }
        });

        $("#file").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function commonValidation() {
        $('#title-err').css('display',$('#title').val() == '' ? 'block':'none');
        $('#desc-err').css('display',$('#desc').val() == '' ? 'block':'none');
        $('#content-err').css('display', $('#content').val() == '' ? 'block':'none');
        $('#file-err').css('display',$('#file')[0].files.length === 0 ? 'block':'none');
        $('#submit').removeClass('disabled');
    }

    function modelMessageCall(title, data){
        $("#myModal").modal();
        $("#myModal .modal-title").html(title);
        $("#myModal .modal-body").html(data);
    }

    function listBlog() {
        location.href = './blog.php';
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