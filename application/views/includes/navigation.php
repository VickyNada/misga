<body class="">
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="<?= base_url(); ?>assets/img/profile_small.jpg" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                                <span class="block m-t-xs font-bold"> <?php echo ($userInfo[0]->first_name . " " . $userInfo[0]->last_name); ?></span>

                                <?php
                                $role = ($userInfo[0]->role);
                                if ($role == 1) {
                                    echo "Admin";
                                } else if ($role == 2){
                                    echo "Standard User";
                                } else if ($role == 3){
                                    echo "Customer";
                                } else if ($role == 4){
                                    echo "Farmer";
                                } else if ($role == 5){
                                    echo "Delivery person";
                                }

                                ?>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                <li><a class="dropdown-item" href="<?= base_url() . 'index.php/consumer/editConsumer' ?>">Profile</a></li>
                                
                                <li class="dropdown-divider"></li>

                            </ul>
                        </div>
                        <div class="logo-element">
                            KVO
                        </div>
                    </li>
                    <li id="dashboard_head">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url() . 'index.php/dashboard/index' ?>" id="dashboard1">Dashboard </span></a></li>
                            <li><a href="<?= base_url() . 'index.php/storage/dashboard' ?>">Storage Dashboard</a></li>
                        </ul>
                    </li>

                    <?php
                    if ($role == 1) { ?>
                    <li>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">User Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url() . 'index.php/usermanagement/index' ?>">General Users</a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Persons Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url() . 'index.php/consumer/customer' ?>">Customer</a></li>
                            <li><a href="<?= base_url() . 'index.php/consumer/index' ?>">Farmer</a></li>
                            <li><a href="<?= base_url() . 'index.php/consumer/delivery' ?>">Delivery Users</a></li>

                            </ul>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Inventory</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url() . 'index.php/inventory/index' ?>">Inventory Master</a></li>
                            <li><a href="<?= base_url() . 'index.php/storage/index' ?>">Storage</a></li>
                            
                            <li><a href="<?= base_url() . 'index.php/unit/index' ?>">Unit of Measurement</a></li>
                            <li><a href="<?= base_url() . 'index.php/category/index' ?>">Category</a></li>
                      
                            <li><a href="<?= base_url() . 'index.php/inbound/index' ?>">Receiving Goods</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-car"></i> <span class="nav-label">Manage Delivery</span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url() . 'index.php/delivery/Delivery' ?>">On Going Delivery</a></li>
                                <li><a href="<?= base_url() . 'index.php/delivery/allDelivery' ?>">All Delivery</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Krish Villa Organic.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= base_url(); ?>assets/img//a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= base_url(); ?>assets/img//a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= base_url(); ?>assets/img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php if ($role == 1 || $role == 2) { ?>
                                <a href="<?= base_url() . 'index.php/adminlogin/logout' ?>">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url() . 'index.php/login/logout' ?>">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            <?php } ?>
                        </li>
                    </ul>

                </nav>
            </div>