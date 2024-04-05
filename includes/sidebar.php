<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Super Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Logged In</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" treeview">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
                </a>
            </li>
            <li class=" treeview">
                <a href="caselist.php">
                    <i class="fa fa-dashboard"></i> <span>Case Managment</span> </i>
                </a>
            </li>
            <li class=" treeview">
                <a href="bulkupload.php">
                    <i class="fa fa-dashboard"></i> <span>Staff Managment</span> </i>
                </a>
            </li>

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Manage Staff</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="addstaff.php"><i class="fa fa-arrow-right"></i>Add Staff</a></li>
                    <li><a href="adminlist.php"><i class="fa fa-arrow-right"></i>Admins</a></li>
                    <li><a href="manager.php"><i class="fa fa-arrow-right"></i>Managers</a></li>
                    <li><a href="rmlist.php"><i class="fa fa-arrow-right"></i>Regional Managers</a></li>
                    <li><a href="techlist.php"><i class="fa fa-arrow-right"></i>Technicians</a></li>
                </ul>
            </li> -->


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-arrow-right"></i>Previous Day Reports</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-arrow-right"></i>Previous Month Reports</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-arrow-right"></i>Financial Reports</a></li>
                </ul>
            </li>

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-motorcycle"></i>
                    <span>Two Wheelers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php
                    // Check if there are any rows to display
                    if ($result->num_rows > 0) {
                        // Loop through each row
                        while ($row = $result->fetch_assoc()) {
                            // Output data from each row in the desired format
                            echo "<li><a href='pages/UI/general.html'><i class='fa fa-arrow-right'></i>" . $row["name"] . "</a></li>";
                        }
                    } else {
                        echo "<li>No results found.</li>";
                    }
                    ?>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="main_settings.php"><i class="fa fa-arrow-right"></i>Main Settings</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-arrow-right"></i>Managers</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-arrow-right"></i>Regional Managers</a></li>
                </ul>
            </li> -->


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>