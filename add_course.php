<?php
$pageTitle = 'Add Course';
require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include __DIR__ . './inc/header.php';



    $sql = 'SELECT * FROM venues';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $venues = $stmt->fetchAll();  

    $sql = 'SELECT * FROM lectuerers';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $lecs = $stmt->fetchAll(); 
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">ADD COURSE</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="add_users.php" class="breadcrumb-item">Add course</a>

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
                        <form id="course_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-book mr-2"></i> Course</legend>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Course Title: <sup class="text-danger">*</sup></label>
                                                    <input type="text" placeholder="Course Name" class="form-control" name="course_title" id="course_title">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Course Code: <sup class="text-danger">*</sup></label>
                                                    <input type="text" placeholder="Course Code" class="form-control" name="course_code" id="course_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Faculty: <sup class="text-danger">*</sup></label>
                                                    <select class="form-control" name="faculty" id="course_faculty">
                                                        <option value="">-- Select Faculty --</option>
                                                        <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Department: <sup class="text-danger">*</sup></label>
                                                    <select class="form-control" name="department" id="department">
                                                        <option value="">-- Select Department --</option>
                                                        <option value="Department of Computer Science">Department of Computer Science</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Session: <sup class="text-danger">*</sup></label>
                                                    <select name="session" id="session" class="form-control" >
                                                        <option value="">-- Select a Session --</option>
                                                        <option value="Full-Time(Morning)">Full-Time(Morning)</option>
                                                        <option value="Part-Time(Evening)">Part-Time(Evening)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Level: <sup class="text-danger">*</sup></label>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lecturer: <sup class="text-danger">*</sup></label>
                                                    <select name="lecturer" id="lecturer" class="form-control">
                                                        <option value="">-- Select Lecturer --</option>
                                                        <?php foreach ($lecs as $lec): ?>
                                                            <option value="<?= $lec->firstname . ' ' . $lec->lastname?>"><?= $lec->firstname . ' ' . $lec->lastname ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Venue: <sup class="text-danger">*</sup></label>
                                                    <select name="venue" id="venue" class="form-control">
                                                        <option value="">-- Select Venue --</option>
                                                        <?php foreach ($venues as $venue): ?>
                                                            <option value="<?= $venue->code ?>"><?= $venue->name ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Credit Unit: <sup class="text-danger">*</sup></label>
                                                    <input type="number" name="unit" id="unit" class="form-control" placeholder="Credit Unit">
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Credit Hour:</label>
                                                    <input type="number" name="hour" id="hour" class="form-control" placeholder="Credit Hour">
                                                </div>
                                            </div> -->
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="btn_submit">Submit <i class="icon-paperplane ml-2"></i></button>
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
$("#course_title").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});

$("#date, #contact").keydown((e)=>{
if(e.which > 64 && e.which < 91)
{
e.preventDefault();
}
});

$('#imginp').on('blur', function(e) {
   console.log($('#imginp').val())
});

$('#contact').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#contact').val(number);
});


$('#phone_number').on('blur', function(e) {
   const regex = /^\D*(\d{3})\D*(\d{3})\D*(\d{4})\D*$/g;
  const number =  $(this).val().replace(regex,  '($1) $2-$3');
  $('#phone_number').val(number);
});
</script>