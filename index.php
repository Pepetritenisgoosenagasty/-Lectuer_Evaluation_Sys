<?php
$pageTitle = 'Dashboard';
 require_once 'core/init.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include __DIR__ . './inc/header.php';


    $sql = 'SELECT * FROM venues';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $venues = $stmt->rowCount();  

    $sql = 'SELECT * FROM users';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $users = $stmt->rowCount();  

    $sql = 'SELECT * FROM class_reps';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $reps = $stmt->rowCount();

    $sql = 'SELECT * FROM lectuerers';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $lecs = $stmt->rowCount();

    $sql = 'SELECT * FROM courses';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $courses = $stmt->rowCount();

    $sql = 'SELECT * FROM results WHERE results.status = "Lectures Held"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $held = $stmt->rowCount(); 

    $sql = 'SELECT * FROM results WHERE results.status = "Lectures was not Held"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $notheld = $stmt->rowCount();  

    $sql = 'SELECT * FROM results WHERE results.status = "Lectures Postponed"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $pos = $stmt->rowCount();  
?>

    <!-- Page content -->
    <div class="page-content">
        <!-- Sidebar -->
    <?php include __DIR__.'./inc/sidebar.php'?> 
    <!-- Main content -->
        <div class="content-wrapper mt-5">
            <!-- Content area -->
            <div class="content">
                 <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Simple text stats with icons -->
                        <div class="card card-body">
                            <div class="row text-center">
                                <div class="col-3">
                                    <p><i class="icon-users2 icon-2x d-inline-block text-info"></i></p>
                                    <h5 class="font-weight-semibold mb-0"><?= $users ?></h5>
                                    <span class="text-muted font-size-sm">users</span>
                                </div>

                                <div class="col-3">
                                    <p><i class="icon-man icon-2x d-inline-block text-warning"></i></p>
                                    <h5 class="font-weight-semibold mb-0"><?= $lecs ?></h5>
                                    <span class="text-muted font-size-sm">Lecturers</span>
                                </div>

                                <div class="col-3">
                                    <p><i class="icon-graduation icon-2x d-inline-block text-success"></i></p>
                                    <h5 class="font-weight-semibold mb-0"><?= $reps ?></h5>
                                    <span class="text-muted font-size-sm">Class Reps.</span>
                                </div>
                                <div class="col-3">
                                    <p><i class="icon-books icon-2x d-inline-block text-dark"></i></p>
                                    <h5 class="font-weight-semibold mb-0"><?= $courses ?></h5>
                                    <span class="text-muted font-size-sm">Courses</span>
                                </div>
                            </div>
                        </div>
                        <!-- /simple text stats with icons -->

                        </div>
                    </div>
                        <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-blue-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><?= $pos ?></h3>
                                    <span class="text-uppercase font-size-xs">Lectures Postponed</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-undo icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                         <div class="card card-body bg-danger-400 has-bg-image">
                            <div class="media">
                                <div class="media-body text-center">
                                    <h3 class="mb-0"><?= $notheld ?></h3>
                                    <span class="text-uppercase font-size-xs">Lectures Not Held</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-exclamation icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-green-400 has-bg-image">
                            <div class="media">
                                <div class="media-body text-center">
                                    <h3 class="mb-0"><?= $held ?></h3>
                                    <span class="text-uppercase font-size-xs">Lectures Held</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-book icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-enter6 icon-3x opacity-75"></i>
                                </div>

                                <div class="media-body text-center">
                                    <h3 class="mb-0"><?= $venues ?></h3>
                                    <span class="text-uppercase font-size-xs">No# of venues</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /simple statistics -->

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- Calendar widget -->
                        <div class="card">
                            <div class="form-control-datepicker border-0"></div>
                        </div>
                        <!-- /calendar widget -->
                        </div>
                       <!--  -->
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




