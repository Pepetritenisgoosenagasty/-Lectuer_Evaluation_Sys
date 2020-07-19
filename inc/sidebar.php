<!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user mt-3">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="img/images/atu.png" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body ">
                                <div class="media-title font-weight-semibold">Quality Assurance</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-pin font-size-sm"></i> &nbsp; Barnes Rd, Accra <br>
                                    <i class="icon-phone font-size-sm"></i> &nbsp; 030 268 0369
                                </div>
                            </div>

                            <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link 
                            <?php if ($pageTitle == 'Dashboard') {
                                echo('active');
                            } ?>">
                                <i class="icon-home4"></i>
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                         <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'Venues') {
                                echo('active');
                            } ?>">
                            <i class="icon-copy"></i> <span>Venue</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="venues.php" class="nav-link active">List of Venues</a></li>
                            </ul>
                        </li>
                         <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'Lecturers') {
                                echo('active');
                            } ?>">
                            <i class="icon-users"></i> <span>Lecturers</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="lectuers.php" class="nav-link active">List of Lecturers</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'Courses') {
                                echo('active');
                            } ?>">
                            <i class="icon-book"></i> <span>Courses</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="courses.php" class="nav-link active">List of Courses</a></li>
                            </ul>
                        </li>
                       
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'List of Class Reps.') {
                                echo('active');
                            } ?>">
                            <i class="icon-users"></i> <span>Class Reps</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="class_reps.php" class="nav-link active">List of Class Reps</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'Reports') {
                                echo('active');
                            } ?>">
                            <i class="icon-chart"></i> <span>Reports</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="reports.php" class="nav-link active">Daily</a></li>
                            </ul>
                        </li>

                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Personal Profile</div> <i class="icon-menu" title="Forms"></i></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link 
                            <?php if ($pageTitle == 'Profile') {
                                echo('active');
                            } ?>"><i class="icon-user-plus"></i> <span>Profile</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="profile.php" class="nav-link active">Edit Profile</a></li>
                            </ul>
                        </li>
                       
                        <!-- /forms -->
                        <!-- /page kits -->

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
            
        </div>
        <!-- /main sidebar -->