<?php
$pageTitle = 'Add Lecturers';
require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include __DIR__ . './inc/header.php';

?>
<!-- Page content -->
<div class="page-content">
    <!-- Sidebar -->
    <?php include __DIR__.'./inc/sidebar.php'?>
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">ADD LECTURERS</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="add_users.php" class="breadcrumb-item">Add lecturers</a>

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
                        <h5></h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="add_lec">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-user-plus mr-2"></i> Lecturer Infomation</legend>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Title:</label>
                                                    <select name="title" id="title" class="form-control">
                                                        <option value="">--Select Title --</option>
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Miss.">Miss.</option>
                                                        <option value="Dr.">Dr.</option>
                                                        <option value="Prof.">Prof.</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First name:</label>
                                                    <input type="text" placeholder="First Name" name="firstname" id="firstname" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last name:</label>
                                                    <input type="text" placeholder="Last Name" name="lastname" id="lastname" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" placeholder="email" name="email" id="email" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone #:</label>
                                                    <input type="text" placeholder="Phone No" name="phoneno" id="phoneno" class="form-control" maxlength="10">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group">
                                                <label class="d-block">Gender:</label>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="gender" value="Male" class="form-input-styled" checked data-fouc>
                                                        Male
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="gender" value="Female" class="form-input-styled" data-fouc>
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Status:</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="">-- Select Status --</option>
                                                        <option value="senior lecture">senior lecturer</option>
                                                        <option value="Junior Lecturer">Junior Lecturer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department:</label>
                                                    <select name="department" id="department" class="form-control">
                                                        <option value="">-- Select Department --</option>
                                                        <option value="Computer Science Department">Computer Science Department</option>
                                                    </select>
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
$("#firstname,#lastname").keydown((e)=>{
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