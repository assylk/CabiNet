<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="assets/images/images.png"
                            alt="avatar" /></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <?php
$eid=$_SESSION['damsid'];
$sql="SELECT FullName,Email from  tbldoctor where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row)
{    
$email=$row->Email;   
$fname=$row->FullName;     
}   ?>
                    <h5><a href="javascript:void(0)" class="username" style="font-size:15px"><?php echo $fname;?></a>
                    </h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <small style="margin-left:-30px"><?php echo $email;?></small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="dashboard.php">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="profile.php">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="change-password.php">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="logout.php">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li class="has-submenu">
                    <a href="dashboard.php">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>

                    </a>

                </li>
                <li>
                    <a href="salle.php">
                        <i class="zmdi zmdi-airline-seat-recline-normal zmdi-hc-lg"></i>
                        <span class="menu-text">Salle D'Attente</span>
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="zmdi zmdi-notifications-active animated infinite pulse zmdi-hc-fw mdc-text-blue"></i>
                        <span class="menu-text">Appointment</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="today-appointment.php"><span class="menu-text">Today's Appointment</span></a></li>
                        <li><a href="approved-appointment.php"><span class="menu-text">Approved Appointment</span></a>
                        </li>
                </li>


            </ul>
            </li>
            <li>
                <a href="ordonnance.php">
                    <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>
                    <span class="menu-text">Ordonnance</span>
                </a>
            </li>
            <li>
                <a href="search.php">
                    <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
                    <span class="menu-text">Search</span>
                </a>
            </li>
            <li>
                <a href="appointment-bwdates.php">
                    <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                    <span class="menu-text">Report</span>
                </a>
            </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>