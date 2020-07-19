<?php 
session_start();
require_once '../config/config.php';
require_once '../libraries/Database.php';

$db = new Database();

$msg = '';
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   

    if ($_POST['index'] !== '') {
         $sql = 'SELECT * FROM class_reps WHERE indexNo = :index';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'index' => $_POST['index'],
        ]);
        $count = $stmt->rowCount();
        if ($count > 0) {
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            if (password_verify($_POST['password'], $row->password)) {
                    $_SESSION['user_id'] = $row->id;
                    $_SESSION['user_email'] = $row->email;
                    $_SESSION['user_name'] = $row->firstname;
                   

                    header("Location:dashboard.php");
            } else {
               $msg = "Wrong password";
            }
        }
    } else {
            $msg = "Wrong Index Number";
    }
    } else {
        $msg = "Email is Index Number";
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="inc/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="inc/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="inc/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->
        <style>
            body {
                height: 100vh;
                 background-image:linear-gradient(rgba(52, 73, 94,.9),rgba(52, 73, 94,.9)),  url("img/images/banner.jpg");
                background-repeat: no-repeat;
                background-position: 50% 50%;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <!-- Login form -->
        <div class="container" style="opacity: .7;">
            <div class="row">
                <div class="col-4 mx-auto " style="margin-top: 100px;">
                    <?php if ($msg !== ''): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error!</strong> <?= $msg ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php endif ?>
                    <div class="card card-body">
            <div class="text-center mb-3">
                <a href="#" class="d-inline-block mt-1 mb-3">
                    <img src="img/images/atu.png" class="rounded-circle img-fluid" width="120" height="120" alt="">
                </a>
                <h5 class="mb-0">Login to your account</h5>
                <div class="text-muted">Enter your credentials below</div>
            </div>
            <form method="post">
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Enter your index No." name="index" maxlength="9">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                   <!--  <a href="login_password_recover.html">Forgot password?</a> -->
                    <button type="submit" class="btn btn-primary btn-block ml-auto">Sign in <i class="icon-arrow-right ml-2"></i></button>
                </div>
            </form>
        </div>
                </div>
            </div>
        </div>
        <!-- /login form -->

        <!-- Core JS files -->
    <script src="inc/global_assets/js/main/jquery.min.js"></script>
    <script src="inc/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->
    </body>
</html>