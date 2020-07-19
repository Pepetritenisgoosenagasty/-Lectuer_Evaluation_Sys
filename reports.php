<?php
$pageTitle = 'Reports';
 require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$sql = "SELECT class_reps.id,class_reps.firstname,class_reps.lastname,class_reps.indexNo, results.*,TIME_FORMAT(start_time, '%h:%i %p') AS stime, TIME_FORMAT(end_time, '%h:%i %p') AS etime FROM class_reps JOIN results ON class_reps.id = results.class_rep_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();  


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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">REPORTS</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.PHP" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="list_of_users.php" class="breadcrumb-item">List of Reports</a>

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
                                <th>Reps Full Name</th>
                                <th>Index No.</th>
                                <th>Programme</th>
                                <th>Department</th>
                                <th>Course Title</th>
                                <th>Level</th>
                                <th>Venue</th>
                                <th>Lecturer</th>
                                <th>Date</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($res as $re): ?>
                                <tr>
                                    <td><?= $re->firstname . ' '. $re->lastname ?></td>
                                    <td><?= $re->indexNo ?></td>
                                    <td><?= $re->programme ?></td>
                                    <td><?= $re->department ?></td>
                                    <td><?= $re->course_title ?></td>
                                    <td><?= $re->level ?></td>
                                    <td><?= $re->assigned_venue ?></td>
                                    <td><?= $re->lecturer ?></td>
                                    <td><?= $re->ldate ?></td>
                                    <td><?= $re->stime ?></td>
                                    <td><?= $re->etime ?></td>
                                    <td><?= $re->status ?></td>
                                     <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                           <div class="dropdown-menu dropdown-menu-right">
                                                <div class="d-flex ml-3">
                                                    
                                                   <a href="view_results.php?<?= 'id='.$re->id ?>" class="btn btn-default"><i class="icon-eye"></i> View Results</a>
                                                </div>
                                                <div class="d-flex ml-3">
                                                    <a href="delete_result.php?<?= 'id='.$re->id ?>" class="btn btn-default text-danger"><i class="icon-trash"></i> Delete</a>
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
