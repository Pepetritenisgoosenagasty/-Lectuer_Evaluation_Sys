<?php
$pageTitle = 'Add Class Reps.';
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
    <div class="content-wrapper mt-5">
        <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">ADD CLASS REPS.</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="add_users.php" class="breadcrumb-item">Add Class Reps.</a>

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
                        <form id="class_reps_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-user-plus mr-2"></i> Personal Infomation</legend>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First name:</label>
                                                    <input type="text" placeholder="First Name" class="form-control" name="firstname" id="firstname">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last name:</label>
                                                    <input type="text" placeholder="Last Name" class="form-control" name="lastname" id="lastname">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Index Number:</label>
                                                    <input type="text" placeholder="Index Number" class="form-control" name="index" id="index" maxlength="9">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" placeholder="email" class="form-control" name="email" id="email">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone #:</label>
                                                    <input type="text" placeholder="Phone Number" class="form-control" name="phoneNo" id="phoneNo" maxlength="10">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group">
                                                <label class="d-block">Gender:</label>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="gender"  value="Male" class="form-input-styled" checked>
                                                        Male
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="gender" value="Female" class="form-input-styled" >
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Faculty:</label>
                                                    <select name="faculty" id="faculty" class="form-control">
                                                        <option value="">-- Select Faculty --</option>
                                                        <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department:</label>
                                                    <select name="department" id="department" class="form-control">
                                                        <option value="">-- Select Department --</option>
                                                        <option value="Computer Science">Computer Science</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Programme:</label>
                                                   <select name="course" id="course" class="form-control">
                                                        <option value="">-- Select Programme --</option>
                                                        <option value="Computer Science">Computer Science</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Session:</label>
                                                    <select name="session" id="session" class="form-control">
                                                        <option value="">-- Select a Session --</option>
                                                        <option value="Full-Time(Morning)">Full-Time (Morning)</option>
                                                        <option value="Part-Time(Evening)">Part-Time (Evening)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Level:</label>
                                                    <select name="level" id="level" class="form-control">
                                                        <option value="">-- Select a Level --</option>
                                                        <option value="100">100</option>
                                                        <option value="200">200</option>
                                                        <option value="300">300</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Password:</label>
                                                    <input type="password" placeholder="Password" class="form-control" name="password" id="password">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                     <p class="pass_error text-danger"></p>
                                                    <label>Confirm Password:</label>
                                                    <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" id="cpassword">
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

$("#phoneNo").keydown((e)=>{
if(e.which > 64 && e.which < 91)
{
e.preventDefault();
}
});

$('#imginp').on('blur', function(e) {
   console.log($('#imginp').val())
});

$('#phoneNo').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#phoneNo').val(number);
});


$('#phoneNo').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#phone_number').val(number);
});
</script>
