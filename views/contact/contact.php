<div class="container mt-5 w-50">
    <div class="text-center"><h2>Contact Us</h2></div>
    <div>
        <form id="contact-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name <span class="text-danger">*</span></label>
                <input id="name" name="name" type="text" class="form-control">
                <div id="name-err" class="text-danger" style="display: none;">Required</div>
            </div>
            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input id="email" name="email" type="email" class="form-control">
                <div id="email-err" class="text-danger" style="display: none;">Required</div>
            </div>
            <div class="form-group">
                <label for="">Subject <span class="text-danger">*</span></label>
                <input id="subject" name="subject" type="text" class="form-control">
                <div id="subject-err" class="text-danger" style="display: none;">Required</div>
            </div>
            <div class="form-group">
                <label for="">Message <span class="text-danger">*</span></label>
                <textarea id="message" name="message" class="form-control" name="" id="" rows="4"></textarea>
                <div id="message-err" class="text-danger" style="display: none;">Required</div>
            </div>
            <div class="form-group text-center">
                <button id="contact-submit" type="submit" class="form-control btn btn-success w-50">save</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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