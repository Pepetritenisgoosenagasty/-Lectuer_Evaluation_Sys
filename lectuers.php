<?php
$pageTitle = 'Lecturers';
 require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

   $sql = 'SELECT * FROM lectuerers';
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lecturers</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="lectuers.php" class="breadcrumb-item">lecturers</a>

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
                       <a href="add_lecturers.php" class="btn btn-primary">Add Lecturers</a>
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
                                <th>Title</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone #</th>
                                <th>Status</th>
                                <th>Department</th>
                                <th class="text-center">Actions</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->title ?></td>
                                <td><?= $row->firstname ?></td>
                                <td><?= $row->lastname ?></td>
                                <td><?= $row->gender ?></td>
                                <th><?= $row->email ?></th>
                                <td><?= $row->phone_no ?></td>
                                <td><?= $row->status ?></td>
                                <td><?= $row->department ?></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                           <div class="dropdown-menu dropdown-menu-right">
                                                <div class="d-flex ml-3">
                                                    <i class="icon-copy mt-2"></i>
                                                    <input type="button" value="Edit" class="dropdown-item edit_lec" id="<?= $row->id ?>">
                                                </div>
                                                <div class="d-flex ml-3">
                                                    <i class="icon-trash mt-2"></i>
                                                    <input type="button" value="Delete" class="dropdown-item delete_lec" id="<?= $row->id ?>">
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
                                <h5 class="modal-title"><i class="icon-copy"></i> Edit Lecturers</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form id="edit_lec">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label>Title:</label>
                                                <input type="text" class="form-control" name="title" id="title">
                                            </div>
                                             <div class="col-sm-5">
                                                <label>First Name:</label>
                                                <input type="text" class="form-control" name="first_name" id="first_name">
                                            </div>
                                            <div class="col-sm-5">
                                                <label>Last Name: </label>
                                                <input type="text" class="form-control" name="last_name" id="last_name" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Gender:</label>
                                                <input type="text" class="form-control" name="gender" id="gender">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" name="email" id="email">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Phone No#:</label>
                                                <input type="text" class="form-control" name="phoneno" id="phoneno" maxlength="10">
                                                <input type="text" class="form-control" style="display: none;"  name="lec_id" id="lec_id">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>status:</label>
                                                <input type="text" class="form-control" name="status" id="status">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Department:</label>
                                                <input type="text" class="form-control" name="department" id="department">
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
$("#first_name,#last_name,#gender,#status,#department,#title").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});

$("#phoneno").keydown((e)=>{
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
