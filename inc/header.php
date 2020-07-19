<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $pageTitle ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="inc/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="inc/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="inc/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="inc/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="inc/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="inc/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="inc/global_assets/js/main/jquery.min.js"></script>
    <script src="inc/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
    <script src="inc/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="inc/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="inc/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="inc/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="inc/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="inc/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="inc/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="inc/global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="inc/global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>

     <!-- Theme JS files -->
    <script src="inc/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="inc/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="inc/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <!-- Theme JS files -->
    <script src="inc/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="inc/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="inc/global_assets/js/demo_pages/datatables_responsive.js"></script>
     <!-- Theme JS files -->
    <script src="inc/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

    <script src="inc/assets/js/app.js"></script>
    <script src="inc/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="inc/global_assets/js/demo_pages/layout_fixed_sidebar_custom.js"></script>
    <script src="inc/global_assets/js/demo_pages/widgets_content.js"></script>
    <script src="inc/global_assets/js/demo_pages/charts/echarts/bars_tornados.js"></script>
    <script src="inc/global_assets/js/demo_pages/charts/echarts/pies_donuts.js"></script>
    <!-- /theme JS files -->
    <script src="inc/main.js"></script>
    <script src="inc/jQuery.print.js"></script>
</head>

<!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="navbar-brand">
            <a href="index.php" class="d-inline-block">
                <img src="img/images/logo.png" alt="" class="ml-5" style="height: 30px; width: 70px;">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>

            </ul>

            <span class="badge bg-success ml-md-3 mr-md-auto">Admin</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="img/images/atu.png" class="rounded-circle mr-2" height="34" alt="">
                        <span><?= $_SESSION['user_email'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="profile.php" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- /main navbar -->
