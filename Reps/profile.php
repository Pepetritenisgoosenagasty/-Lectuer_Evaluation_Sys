<?php
$pageTitle = 'Profile';
include __DIR__ . './inc/header.php'; 

$sql = 'SELECT * FROM class_reps WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$row = $stmt->fetch(); 



?>
<!-- Page content -->
<div class="page-content">
    <!-- Sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="" class="breadcrumb-item">Profile</a>

                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
        <!-- Content area -->
        <div class="content">
          <!-- 2 columns form -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                            <div class="row ml-5">
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-user mr-2"></i> Personal details</legend>
                                         <div class="card-img-actions d-inline-block ml-5">
                                             <img class="img-fluid rounded-circle" src="img/images/atu.png" width="170" height="170" alt="">
                                             <div class="mt-3">
                                                 <p><strong>Name: <?= $row->firstname ?></strong></p>
                                                 <p><strong>Index Number: <?= $row->indexNo ?></strong></p>
                                                 <p><strong>Gender:  <?= $row->gender ?></strong></p>
                                                 <p><strong>Email:  <?= $row->email ?></strong></p>
                                                 <p><strong>Session:  <?= $row->session ?></strong></p>
                                                 <p><strong>Level:  <?= $row->level ?></strong></p>
                                                 <p><strong>Phone:  <?= $row->phoneno ?></strong></p>
                                                 <p><strong>Programme:  <?= $row->course ?></strong></p>
                                                 <p><strong>Department:  <?= $row->department ?></strong></p>
                                             </div>
                                         </div>
                        
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                  <form id="edit_profile">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i>Edit Personal details</legend>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First name:</label>
                                                    <input type="text" name="firstname" id="firstname"  class="form-control" value="<?= $row->firstname ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last name:</label>
                                                    <input type="text" name="lastname" id="lastname"  class="form-control" value="<?= $row->lastname ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Index No.:</label>
                                                    <input type="text" name="index" id="index" class="form-control" value="<?= $row->indexNo ?>" maxLength="9">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Gender:</label>
                                                    <input type="text"name="gender" id="gender" class="form-control" value="<?= $row->gender ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text"name="email" id="email" class="form-control" value="<?= $row->email ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone #:</label>
                                                    <input type="text" name="phoneno" id="phoneno" class="form-control" value="<?= $row->phoneno ?>" maxLength="10">
                                                    <input type="text"  value="<?= $row->id ?>" name="pro_id" id="pro_id" style="display: none;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Session:</label>
                                                    <input type="text"name="session" id="session" class="form-control" value="<?= $row->session ?>">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>level:</label>
                                                    <input type="text"name="level" id="level" class="form-control" value="<?= $row->level ?>" maxLength="3">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-key mr-2"></i> Change Password
                                         <span class="text-danger"><strong>(Ignore this field if you don`t want to change password)</strong></span>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>New Password:</label>
                                                    <input type="password" class="form-control" placeholder="New Password" name="password" id="password">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Confirm Password:</label>
                                                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword">
                                                   <p id="msg" class="text-danger"><strong></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary edit_pro">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /2 columns form -->
        </div>
        <!-- /content area -->
        <!-- Footer -->
        <?php include __DIR__.'./inc/footer.php' ?>
        <!-- /footer -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</div>

<script>
  $('#edit_profile').on('submit', function(e) {
    e.preventDefault();
    var pro_id = $('#pro_id').val();

    password = $('#password').val();
    cpassword = $('#cpassword').val();

    if (cpassword !== password) {
       $("#msg").text("Password does not match");
    } else {
      $.ajax({
        url:'update.php',
        method:'Post',
        data: $("#edit_profile").serialize(),
        success: function (data) {
           alert("Updated Successfully");
           window.location.reload();
        }
    });
    }
});   
  $("#firstname,#lastname, #gender,#session").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});

$("#phoneno, #level").keydown((e)=>{
if(e.which > 64 && e.which < 91)
{
e.preventDefault();
}
});


$('#phoneno').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#phoneno').val(number);
});


$('#phoneno').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#phone_number').val(number);
});
</script>
