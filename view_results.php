<?php
$pageTitle = 'View Reports';
 require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$sql = "SELECT class_reps.id,class_reps.firstname,class_reps.lastname,class_reps.session AS sec,class_reps.indexNo,class_reps.gender,class_reps.email, results.*,TIME_FORMAT(start_time, '%h:%i %p') AS stime, TIME_FORMAT(end_time, '%h:%i %p') AS etime FROM class_reps JOIN results ON class_reps.id = results.class_rep_id WHERE results.id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id',$_GET['id']);
    $stmt->execute();
    $res = $stmt->fetch();  


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
                            <a href="list_of_users.php" class="breadcrumb-item">View Reports</a>

                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
        <!-- Content area -->
        <div class="content">
           <!-- DataTable configuration -->
                <div class="card" id='DivIdToPrint'>
                    <div class="card-header header-elements-inline">
            
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-10 mx-auto mb-5">
                    <div class="container-fluid" >
                         <div class="row">
                           <div class="col-md-4 ">
                               <h5>Student`s Name: <?= $res->firstname . ' ' . $res->lastname ?></h5>
                           </div>
                           <div class="col-md-3 ">
                               <h5>Index No.: <?= $res->indexNo ?></h5>
                           </div>
                           <div class="col-md-4">
                               <h5>Programme: <?= $res->programme ?></h5>
                           </div>
                       </div>
                       <div class="row mt-3">
                           <div class="col-md-4 ">
                               <h5>Session: <?= $res->sec ?></h5>
                           </div>
                           <div class="col-md-3 ">
                               <h5>Faculty: <?= strtolower($res->faculty) ?></h5>
                           </div>
                           <div class="col-md-4">
                               <h5>Department: <?= strtolower($res->department) ?></h5>
                           </div>
                       </div>
                        <div class="row mt-3">
                           <div class="col-md-4 ">
                               <h5>Course Title: <?= $res->course_title ?></h5>
                           </div>
                           <div class="col-md-3 ">
                               <h5>Course Code: <?= $res->course_code ?></h5>
                           </div>
                           <div class="col-md-4">
                               <h5>Assigned Venue: <?= $res->assigned_venue ?></h5>
                           </div>
                       </div>
                        <div class="row mt-3">
                           <div class="col-md-4 ">
                               <h5>New Venue: <?= $res->new_venue ?></h5>
                           </div>
                           <div class="col-md-4 ">
                               <h5>Level: <?= $res->level ?></h5>
                           </div>
                           <div class="col-md-4">
                               <h5>Lecturer: <?= $res->lecturer ?></h5>
                           </div>
                       </div>
                       <div class="row mt-3">
                        <div class="col-md-3 ">
                               <h5>Date: <?= $res->ldate ?></h5>
                           </div>
                           <div class="col-md-3 ">
                               <h5>start Time: <?= $res->stime ?></h5>
                           </div>
                           <div class="col-md-2 ">
                               <h5>End Time: <?= $res->etime ?></h5>
                           </div>
                           <div class="col-md-4">
                               <h5>Status: <?= $res->status ?></h5>
                           </div>
                           
                           <a href="" class="btn btn-primary" id='btn' onclick='printDiv();'>Print</a>
                       </div>
                    </div>
                   </div>

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
<script type='text/javascript'>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script> 