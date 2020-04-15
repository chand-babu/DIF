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
                                <div class="col-11">
                                    <h4>Gallery Edit</h4>
                                </div>
                                <div class="text-right col-1" onclick="listGallery()">
                                    <i class="text-primary fas fa-list-alt fa-2x" 
                                    aria-hidden="true" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="gallery-form" method="post" class="p-4" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4 offset-8">
                                        <div class="form-group status-block">
                                            <label for="status">Status</label>
                                            <select name="gal_status" id="gal-status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group status-block">
                                            <label for="title">Category <span class="text-danger">*</span></label>
                                            <select name="category" id="listCat" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="hidden" id="gal-id" name="gal_id" value="">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Gallery Title">
                                        <div id="title-err" class="text-danger">Required</div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <label for="title">Featured Image <span class="text-danger">*</span></label>
                                        <div>
                                            <img id="image-pre" src="./../assets/images/temp/no-image.jpg" width="100%" height="200" alt="">
                                        </div>
                                        <div class="mt-2 custom-file">
                                            <input type="hidden" id="image-name" name="image-name" value="">
                                            <input id="image" type="file" name="image" class="custom-file-input"
                                            accept="image/*" id="customFile" onchange="imageUpload(event, 0)">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-8 mt-3">
                                        <div class="form-group">
                                            <label for="imageDesc">Title Description <span class="text-danger">*</span></label>
                                            <textarea type="text" id="imageDesc" name="imageDesc" class="form-control"
                                            placeholder="Enter Image Description" rows="8"></textarea>
                                            <div id="desc-err" class="text-danger">Required</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="title">Featured Image Name</label>
                                        <input type="text" id="image-alt" name="imageAlt" class="form-control" 
                                        placeholder="Featured Image Alt Name">
                                        <div id="image-alt-err" class="text-danger" style="display:none;">Required</div>
                                    </div>
                                    <div class="col-8">
                                        <label for="title">Post url</label>
                                        <input type="text" id="post-url" name="postUrl" class="form-control" 
                                        placeholder="eg: happy-holi-festival-to-all">
                                        <div id="post-url-err" class="text-danger" style="display:none;">URL exist please try unique</div>
                                    </div>
                                    
                                </div>
                                <div id="image-block-set">
                                    <div class="row mt-4 gallery-block" id="gallery-block-1">
                                        <div class="col-1 offset-11 mt-2 text-right">
                                            <span onclick="deleteBlock(1)">
                                                <i id="cross-color" class="text-secondary fas fa-times"></i>
                                            </span>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3"> 
                                                <label for="title">Image alt name</label>
                                                <input type="text" id="image-alt-1" name="imageAlt-1" class="form-control" placeholder="Enter Image Name">
                                            </div>
                                            <label for="title">Image preview</label>
                                            <div>
                                                <img id="image-pre-1" src="./../assets/images/temp/no-image.jpg" width="100%" height="200" alt="">
                                            </div>
                                            <div class="mt-2 custom-file">
                                                <input type="hidden" id="image-name-1" name="imageName-1" value="">
                                                <input id="image-1" type="file" name="image-1" class="custom-file-input"
                                                accept="image/*" id="customFile-1" onchange="imageUpload(event, 1)">
                                                <label class="custom-file-label" for="customFile-1">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="imageTitle">Image Title</label>
                                                <input type="text" id="imageTitle-1" name="imageTitle-1" class="form-control" placeholder="Enter Image Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="imageDesc">Image Description</label>
                                                <textarea type="text" id="imageDesc-1" name="imageDesc-1" class="form-control" placeholder="Enter Image Description" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <div class="btn btn-primary" onclick="addGalleryBlock();">
                                            ADD IMAGES
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 text-right">
                                        <input id="submit" class="btn btn-success" type="submit" value="Update">
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

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        $('#title-err').css('display','none');
        $('#desc-err').css('display','none');
        var id = location.href.substring(location.href.lastIndexOf('=') + 1);
        var getData = {};
        $.ajax({
            type: "GET",
            url: './mvc/action/gallery/galleryGetAction.php?id=' + id,
            processData: false,
            contentType: false,
            success: function(data) {
                if (JSON.parse(data).result) {
                    getData = JSON.parse(data).data.length > 0 ? JSON.parse(data).data[0] : {};
                    if(!Object.keys(getData).length) {
                        modelMessageCall('Redirecting', 'Data not available redirec to gallery page .....');
                        setTimeout(function(){
                            location.href = './gallery.php';
                        }, 3000);
                    } else {
                        categorySelection(getData);
                        retriveData(getData);
                    }
                } else {
                    modelMessageCall('Redirecting to gallery', 'Something Went Wrong');
                }
                // console.log(getData);
            },
            error: function(jqXHR, exception) {
                console.log(exception);
            }
        });

        $("#gallery-form").submit(function(e) { 
            e.preventDefault();
            $('#submit').addClass('disabled');
            if ($('#title').val() == '' || $('#imageDesc').val() == '') {
                $('#title-err').css('display',$('#title').val() == '' ? 'block':'none');
                $('#desc-err').css('display',$('#imageDesc').val() == '' ? 'block':'none');
                $('#submit').removeClass('disabled');
            } else {
                $('.loader').css('display', 'block');
                var form = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: './mvc/action/gallery/galleryEditAction.php',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (JSON.parse(data).result) {
                            modelMessageCall('Message', JSON.parse(data).message);
                            setTimeout(function(){
                                location.href = './gallery.php';
                            }, 1000);
                        } else {
                            modelMessageCall('Message', JSON.parse(data).message);
                        }
                        $('.loader').css('display', 'none');
                        $('#submit').removeClass('disabled');
                    },
                    error: function(jqXHR, exception) {
                        modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                        //console.log(JSON.parse(err));
                        $('.loader').css('display', 'none');
                        $('#submit').removeClass('disabled');
                    }
                });
            }
        });
    });

    function categorySelection(dataSet){
        $.ajax({
            type: "POST",
            url: './mvc/action/category/categoryListAction.php',
            processData: false,
            contentType: false,
            success: function(data) {
                var options = '<option value="" disabled><strong>-- Select Categort --</strong></option>';
                $(JSON.parse(data)).each(function(index, value) {
                    var select = dataSet.cat_id == value.cat_id ? 'selected': '';
                    options += '<option value="' + value.cat_id + '" '+ select +'>' + value.name + '</option>';
                });
                $('#listCat').html(options);
                //console.log(data);
            },
            error: function(jqXHR, exception) {
                console.log(err);
            }
        });
    }

    function retriveData(data){
        var addImages = JSON.parse(data.gallery_images);
        $('#gal-status').val(data.gal_status);
        $('#gal-id').val(data.gal_id);
        $('#title').val(data.title);
        $('#imageDesc').val(data.description);
        $('#image-alt').val(data.image_alt);
        $('#post-url').val(data.post_url);
        $('#image-name').val(JSON.stringify([data.featured_image_lg, data.featured_image_sm]));
        $('#image-pre').attr('src', data.featured_image_sm ? './..' + data.featured_image_sm : './../assets/images/temp/no-image.jpg');
        $('#imageDesc').summernote({height: 155, focus: true});
        addImages.forEach((item, index) => {
            //addGalleryBlock();
            //console.log(item);
            if (index) {
                addGalleryBlock();
                $('#imageTitle-' + (index + 1)).val(item['imageTitle']);
                $('#imageDesc-' + (index + 1)).val(item['imageDesc']);
                $('#image-name-' + (index + 1)).val(item['imageName']);
                $('#image-pre-' + (index + 1)).attr('src', JSON.parse(item['imageName'])[1] ? './..' + JSON.parse(item['imageName'])[1]:'./../assets/images/temp/no-image.jpg');
                $('#imageDesc-' + (index + 1)).summernote({height: 155, focus: true});
                $('#image-alt-' + (index + 1)).val(item['imageAlt']);
            } else {
                // console.log(item);
                $('#imageTitle-1').val(item['imageTitle']);
                $('#imageDesc-1').val(item['imageDesc']);
                $('#image-name-1').val(item['imageName']);
                $('#image-pre-1').attr('src', JSON.parse(item['imageName'])[1] ? './..' + JSON.parse(item['imageName'])[1]:'./../assets/images/temp/no-image.jpg');
                $('#imageDesc-1').summernote({height: 155, focus: true});
                $('#image-alt-1').val(item['imageAlt']);
            }
        });
        //console.log(JSON.parse(data.gallery_images));
        // addGalleryBlock();
    }

    function imageUpload(e, index) {
        $('.loader').css('display', 'block');
        var form_data = new FormData();
        if (index == 0) {
            form_data.append('image', e.target.files[0]);
            form_data.append('image_index', index);
        } else {
            form_data.append('image-' + index, e.target.files[0]);
            form_data.append('image_index', index);
        }
        $.ajax({
            type: "POST",
            url: './mvc/action/gallery/galleryAddAction.php',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if (JSON.parse(data).result) {
                    if (index == 0) {
                        $('#image-pre').attr('src', './..'+ JSON.parse(data).file[1]);
                        $('#image-name').val(JSON.stringify(JSON.parse(data).file));
                    } else {
                        $('#image-pre-' + index).attr('src', './..'+ JSON.parse(data).file[1]);
                        $('#image-name-' + index).val(JSON.stringify(JSON.parse(data).file));
                    }
                } else {
                    alert('Something went Wrong');
                }
                $('.loader').css('display', 'none');
            },
            error: function(jqXHR, exception) {
                modelMessageCall('ERROR', errorCommon(jqXHR, exception));
                $('.loader').css('display', 'none');
                //console.log(JSON.parse(err));
            }
        });
    }

    function del(data) {
        $("#confirmModal").modal();
        $("#gal-model-id").val(data.gal_id);
    }

    function addGalleryBlock() {
        var total_element = $(".gallery-block").length;
        var lastid = $(".gallery-block:last").attr("id");
        var split_id = lastid.split("-");
        var nextindex = Number(split_id[2]) + 1;
        $(".gallery-block:last").after(`<div class='row mt-4 gallery-block' id='gallery-block-${nextindex}'></div>`);
        $("#gallery-block-" + nextindex).append(htmlTemplate(nextindex));
        $('#imageDesc-' + nextindex).summernote({height: 155, focus: true});
        //alert(total_element);
    }

    function deleteBlock(index) {
        var id = index;
        if (id != 1) {
            $("#gallery-block-" + id).remove();
        }
    }

    function modelMessageCall(title, data){
        $("#myModal").modal();
        $("#myModal .modal-title").html(title);
        $("#myModal .modal-body").html(data);
    }

    function listGallery() {
        location.href = './gallery.php';
    }

    function htmlTemplate(index) {
        var template = `
                <div class="col-1 offset-11 mt-2 text-right">
                    <span onclick="deleteBlock(${index})"><i class="text-danger fas fa-times"></i></span>
                </div>
                <div class="col-4">
                    <div class="mb-3"> 
                        <label for="title">Image alt name</label>
                        <input type="text" id="image-alt-${index}" name="imageAlt-${index}" class="form-control" placeholder="Enter Image Name">
                    </div>
                    <label for="title">Image preview</label>
                    <div>
                        <img id="image-pre-${index}" src="./../assets/images/temp/no-image.jpg" width="100%" height="200" alt="">
                    </div>
                    <div class="mt-2 custom-file">
                        <input type="hidden" id="image-name-${index}" name="imageName-${index}" value="">
                        <input id="image-${index}" type="file" name="image-${index}" class="custom-file-input" accept="image/*" 
                        id="customFile-${index}" onchange="imageUpload(event, ${index})">
                        <label class="custom-file-label" for="customFile-${index}">Choose file</label>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="imageTitle-${index}">Image Title</label>
                        <input type="text" id="imageTitle-${index}" name="imageTitle-${index}" class="form-control" 
                        placeholder="Enter Image Title">
                    </div>
                    <div class="form-group">
                        <label for="imageDesc-${index}">Image Description</label>
                        <textarea type="text" id="imageDesc-${index}" name="imageDesc-${index}" class="form-control"
                        placeholder="Enter Image Description" rows="4"></textarea>
                    </div>
                </div>`;
        return template;
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