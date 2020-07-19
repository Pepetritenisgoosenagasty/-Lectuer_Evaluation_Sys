<?php
$pageTitle = 'List of Class Reps.';
require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$sql = 'SELECT * FROM class_reps';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">LIST OF ALL CLASS REPS.</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="list_of_users.php" class="breadcrumb-item">List of Reps.</a>
                        </div>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
                <!-- DataTable configuration -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <a href="add_classreps.php" class="btn btn-primary">Add Class Reps.</a>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Index No.</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>level</th>
                                <th>Programme</th>
                                <th>session</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->firstname . " " . $row->lastname ?></td>
                                <td><?= $row->indexNo ?></td>
                                <td><?= $row->gender ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->phoneno ?></td>
                                <td><span class="badge badge-info"><?= $row->level ?></span></td>
                                <td><?= $row->course ?></td>
                                <td><?= $row->session ?></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="d-flex ml-3">
                                                    <i class="icon-copy mt-2"></i>
                                                    <input type="button" value="Edit" class="dropdown-item edit_reps" id="<?= $row->id ?>">
                                                </div>
                                                <div class="d-flex ml-3">
                                                    <i class="icon-trash mt-2"></i>
                                                    <input type="button" value="Delete" class="dropdown-item delete_reps" id="<?= $row->id ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /DataTable configuration -->
                <div id="modal_form_vertical" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="icon-copy"></i> Edit Class Rep</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="edit_Classreps">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>First Name:</label>
                                                <input type="text" class="form-control" name="first_name" id="first_name">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Last Name: </label>
                                                <input type="text" class="form-control" name="last_name" id="last_name" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Index No.: </label>
                                                <input type="text" class="form-control" name="index" id="index" maxlength="9">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" id="email">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Phone No#:</label>
                                                <input type="text" class="form-control" name="phoneno" id="phoneno" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Faculty:</label>
                                                <input type="text" class="form-control" name="faculty" id="faculty">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Department:</label>
                                                <input type="text" class="form-control" name="department" id="department">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Level:</label>
                                                <input type="text" class="form-control" name="level" id="level" maxlength="3">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Session:</label>
                                                <input type="text" class="form-control" name="session" id="session">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Course:</label>
                                                <input type="hidden" class="form-control" name="reps_id" id="reps_id">
                                                <input type="text" class="form-control" name="course" id="course">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn bg-primary" >Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
$("#first_name,#last_name, #faculty, #department, #session, #course").keydown((e)=>{
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
