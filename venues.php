<?php
$pageTitle = 'Venues';
require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include __DIR__ . './inc/header.php';



$sql = 'SELECT * FROM venues';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();  
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">LIST OF VENUES</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="courses.php" class="breadcrumb-item">List of Venues</a>

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
                       <a href="add_venue.php" class="btn btn-primary">Add venue</a>
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
                                <th>Name</th>
                                <th>Code</th>
                                <th>location</th>
                                <th class="text-center">Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php foreach ($rows as $row): ?>
                               <tr id="vu_<?= $row->id ?>">
                                   <td><?= $row->id ?></td>
                                   <td><?= $row->name ?></td>
                                   <td><?= $row->code ?></td>
                                   <td><?= $row->location ?></td>
                                   <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="d-flex ml-3">
                                                    <i class="icon-copy mt-2"></i>
                                                    <input type="button" value="Edit" class="dropdown-item edit_venue" id="<?= $row->id ?>">
                                                </div>
                                                <div class="d-flex ml-3">
                                                    <i class="icon-trash mt-2"></i>
                                                    <input type="button" value="Delete" class="dropdown-item delete_venue" id="<?= $row->id ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
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
                                <h5 class="modal-title"><i class="icon-copy"></i> Edit Venue</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form id="edit_venue">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <label>Venue Name:</label>
                                                <input type="text" class="form-control" name="venue_name" id="venue_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Venue Code:</label>
                                                <input type="text" class="form-control" name="venue_code" id="venue_code">
                                                 <input type="hidden" class="form-control" name="venue_id" id="venue_id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Venue Location:</label>
                                                <textarea name="venue_location" id="venue_location" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                     
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn bg-primary" >Update Venue</button>
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
$("#venue_name,#venue_location").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});
</script>