<?php
$pageTitle = 'Profile';
require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
include __DIR__ . './inc/header.php';



    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();
    $rows = $stmt->fetch();  
?>
<!-- Page content -->
<div class="page-content">
    <!-- Sidebar -->
    <?php include __DIR__.'./inc/sidebar.php'?>
    <!-- Main content -->
    <div class="content-wrapper mt-5">
        <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Profile Page</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="add_users.php" class="breadcrumb-item">Profile</a>

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
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-user mr-2"></i> Personal details</legend>
                                         <div class="card-img-actions d-inline-block ml-5">
                                             <img class="img-fluid rounded-circle" src="img/images/atu.png" width="170" height="170" alt="">
                                             <div class="mt-3">
                                                 <p><strong>Name: <?= $rows->firstname . ' ' . $rows->lastname ?></strong></p>
                                                 <p><strong>Gender: <?= $rows->gender ?></strong></p>
                                             <p><strong>Email: <?= $rows->email ?></strong></p>
                                             <p><strong>Phone: <?= $rows->phoneno ?></strong></p>
                                             </div>
                                         </div>
                        
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                  <form id="edit_profile" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i>Edit Personal details</legend>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First name:</label>
                                                    <input type="text" name="firstname" id="firstname" value="<?= $rows->firstname ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last name:</label>
                                                    <input type="text" name="lastname" id="lastname" value="<?= $rows->lastname ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Gender:</label>
                                                    <input type="text" name="gender" id="gender" value="<?= $rows->gender ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text"name="email" id="email" value="<?= $rows->email ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone #:</label>
                                                    <input type="text" name="phoneno" id="phoneno" value="<?= $rows->phoneno ?>" class="form-control" maxLength="10">
                                                    <input type="text"  value="<?= $rows->id ?>" name="pro_id" id="pro_id" style="display: none;">
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
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
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
$("#firstname,#lastname, #gender").keydown((e)=>{
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
  $('#phoneno').val(number);
});
</script>