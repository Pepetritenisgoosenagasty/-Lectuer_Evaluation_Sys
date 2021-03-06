<?php
    $pageTitle = 'Courses';
    require_once 'core/init.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }

     $sql = 'SELECT * FROM courses';
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">LIST OF COURSES</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="courses.php" class="breadcrumb-item">List of courses</a>

                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="alert bg-success text-white alert-dismissible text-center" style="display: none;" id="alert">
                 
            </div>
           <!-- DataTable configuration -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                       <a href="add_course.php" class="btn btn-primary">Add course</a>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table datatable-responsive" id="course_tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Lecturer</th>
                                <th>Venue</th>
                                <th>Credit Unit</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                           <?php foreach ($rows as $row): ?>
                               <tr id="tr_<?= $row->id ?>">
                                   <td><?= $row->id ?></td>
                                   <td><?= $row->course_title ?></td>
                                   <td><?= $row->course_code ?></td>
                                   <td><?= $row->lecturer ?></td>
                                   <td><?= $row->venue ?></td>
                                   <td><?= $row->unit ." Hrs" ?></td>
                                   <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="d-flex ml-3">
                                                    <i class="icon-copy mt-2"></i>
                                                    <input type="button" value="Edit" class="dropdown-item edit_course" id="<?= $row->id ?>">
                                                </div>
                                                <div class="d-flex ml-3">
                                                    <i class="icon-trash mt-2"></i>
                                                    <input type="button" value="Delete" class="dropdown-item delete_course" id="<?= $row->id ?>">
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
                 <!-- Vertical form modal -->
                <div id="modal_form_vertical" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="icon-copy"></i> Edit Course</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form id="edit_form">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Course Title:</label>
                                                <input type="text" class="form-control" name="course_title" id="course_title">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Course Code: </label>
                                                <input type="text" class="form-control" name="course_code" id="course_code" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Lecturers:</label>
                                                <input type="text" class="form-control" name="lecturer" id="lecturer">
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
                                            <div class="col-sm-6">
                                                <label>Venue:</label>
                                                <input type="hidden" class="form-control" name="course_id" id="course_id">
                                                <input type="text" class="form-control" name="venue" id="venue">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Credit Unit:</label>
                                                <input type="number" class="form-control" name="unit" id="unit">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn bg-primary" id="update">Update Course</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /vertical form modal -->

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
$("#course_title, #faculty, #lecturer, #department, #session").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});

$("#level, #unit").keydown((e)=>{
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
