<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post Form - nicesnippets.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <style>
   .error{ color:red; } 
  </style>
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-6 mt-3 offset-md-3">
            <div class="card">
               <div class="card-header bg-dark text-white">
                  <h6>laravel 6 Ajax Form Submission Example - nicesnippets.com</h6>
               </div>
               <div class="card-body">
                  <form id="post-form" method="post" action="javascript:void(0)">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Name<span class="text-danger">*</span></label>
                              <input type="text" name="name" placeholder="Enter name" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('name') }}</span>
                           </div>
                        </div>
                     </div>                     
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Email<span class="text-danger">*</span></label>
                              <input type="email" name="email" placeholder="Enter email" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('email') }}</span>
                           </div>
                        </div>
                     </div>                     
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Phone<span class="text-danger">*</span></label>
                              <input type="text" name="phone" placeholder="Enter phone" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('phone') }}</span>
                           </div>
                        </div>
                     </div>
<!--                      <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Body<span class="text-danger">*</span></label>
                              <textarea class="form-control" rows="3" name="body" placeholder="Enter Body Text"></textarea>
                              <span class="text-danger">{{ $errors->first('body') }}</span>
                           </div>
                        </div>
                     </div> -->
                     <div class="row">
                        <div class="col-md-12">
                           <button type="submit" id="send_form" class="btn btn-block btn-success">Submit</button>
                        </div>   
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<script>
   if ($("#post-form").length > 0) {
    $("#post-form").validate({
      
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
      email: {
        required: true,
        maxlength: 250
      },
      phone: {
        required: true,
        maxlength: 25
      }
    },
    messages: {
      name: {
        required: "Please Enter Name",
        maxlength: "Your name maxlength should be 50 characters long."
      },
      email: {
        required: "Please Enter Email",
        maxlength: "Your email maxlength should be 250 characters long."
      },      
      phone: {
        required: "Please Enter Phone Number",
        maxlength: "Your phone maxlength should be 25 characters long."
      },
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: '/save-form' ,
        type: "POST",
        data: $('#post-form').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
 
            document.getElementById("post-form").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>
</html>