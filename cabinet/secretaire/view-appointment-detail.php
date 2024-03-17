<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  { 
    $eid=$_GET['editid'];
    $aptid=$_GET['aptid'];
    $status=$_POST['status'];


      $sql= "update tblappointment set Status=:status where ID=:eid";
    $query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);


$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
 echo '<script>alert("Status has been updated")</script>';
 echo "<script>window.location.href ='view-appointment-detail.php?editid='$editid'&&aptid='$aptid''</script>";
}
 if(isset($_POST['submitmodif']))
  { 
    $eid=$_GET['editid'];
    $aptid=$_GET['aptid'];
    $name=$_POST['name'];
   $cin=$_POST['cin'];
      $email=$_POST['email'];

      $sql= "update tblappointment set Name=:name,MobileNumber=:cin,Email=:email where ID=:eid";
    $query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':cin',$cin,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
 echo '<script>alert("Email ,CIN and FullName has been updated")</script>';
 echo "<script>window.location.href ='view-appointment-detail.php?editid='$editid'&&aptid='$aptid''</script>";
}






  ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>DAMS|| View Appointment Detail</title>

    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css assets/css/app.min.css -->
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
    Breakpoints();
    </script>

</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->



    <?php include_once('includes/header.php');?>

    <?php include_once('includes/sidebar.php');?>



    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <!-- DOM dataTable -->
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title" style="color: blue">Appointment Details</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <?php
                  $eid=$_GET['editid'];
$sql="SELECT * from tblappointment  where ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <table border="1" class="table table-bordered mg-b-0">
                                        <tr>
                                            <th>Appointment Number</th>
                                            <td><?php  echo $aptno=($row->AppointmentNumber);?></td>
                                            <th>Patient Name</th>
                                            <td><?php  echo $row->Name;?></td>
                                        </tr>

                                        <tr>
                                            <th>Mobile Number</th>
                                            <td><?php  echo $row->MobileNumber;?></td>
                                            <th>Email</th>
                                            <td><?php  echo $row->Email;?></td>
                                        </tr>
                                        <tr>
                                            <th>Appointment Date</th>
                                            <td><?php  echo $row->AppointmentDate;?></td>
                                            <th>Appointment Time</th>
                                            <td><?php  echo $row->AppointmentTime;?></td>
                                        </tr>

                                        <tr>
                                            <th>Apply Date</th>
                                            <td><?php  echo $row->ApplyDate;?></td>
                                            <th>Appointment Final Status</th>

                                            <td colspan="4"> <?php  $status=$row->Status;
    
if($row->Status=="")
{
  echo "Not yet updated";
}

if($row->Status=="Approved")
{
 echo "Your appointment has been approved";
}


if($row->Status=="Cancelled")
{
  echo "Your appointment has been cancelled";
}



     ;?></td>
                                        </tr>
                                        <tr>

                                            <th>Remark</th>
                                            <?php if($row->Remark==""){ ?>

                                            <td colspan="3"><?php echo "Not Updated Yet"; ?></td>
                                            <?php } else { ?> <td colspan="3"> <?php  echo htmlentities($row->Remark);?>
                                            </td>
                                            <?php } ?>

                                        </tr>
                                        <tr>

                                            <th>Ordannance</th>
                                            <?php if($row->Ordannance==""){ ?>

                                            <td colspan="3"><?php echo "Not Updated Yet"; ?></td>
                                            <?php } else { ?> <td colspan="3">
                                                <?php  echo htmlentities($row->Ordannance);?>
                                            </td>
                                            <?php } ?>

                                        </tr>
                                        <?php $cnt=$cnt+1;}} ?>

                                    </table>
                                    <br>


                                    <?php 

if ($status=="Approved"||$status=="Cancelled"||$status=="" ){
?>
                                    <p align="center" style="padding-top: 20px">
                                        <button class="btn btn-primary waves-effect waves-light w-lg"
                                            data-toggle="modal" data-target="#myModal">Take Action</button>
                                    </p>

                                    <p align="center" style="padding-top: 20px">
                                        <button class="btn btn-primary waves-effect waves-light w-lg"
                                            data-toggle="modal" data-target="#myModalModify">Modify
                                            Informations</button>
                                    </p>

                                    <?php } ?>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-hover data-tables">

                                                        <form method="post" name="submit">



                                                            <tr>
                                                                <th>Status :</th>
                                                                <td>

                                                                    <select name="status" class="form-control wd-450">
                                                                        <option value="Approved" selected="true">
                                                                            Approved</option>
                                                                        <option value="Cancelled">Cancelled</option>

                                                                    </select>
                                                                </td>
                                                            </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Update</button>

                                                    </form>


                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal fade" id="myModalModify" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modify
                                                        Informations</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-hover data-tables">

                                                        <form method="post" name="submitmodif">

                                                            <tr>
                                                                <th>Full Name :</th>
                                                                <td>
                                                                    <input type="text" name="name"
                                                                        placeholder="Ecrire Full Name"
                                                                        class="form-control wd-450">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>CIN :</th>
                                                                <td>
                                                                    <input type="text" name="cin"
                                                                        placeholder="Ecrire Numero Carte d'identité"
                                                                        class="form-control wd-450">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Email :</th>
                                                                <td>

                                                                    <input type="email" name="email"
                                                                        placeholder="Ecrire Email"
                                                                        class="form-control wd-450">
                                                                </td>
                                                            </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submitmodif"
                                                        class="btn btn-primary">Update</button>

                                                    </form>


                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div><!-- .widget-body -->


                            </div><!-- .widget -->
                        </div><!-- END column -->


                    </div><!-- .row -->
            </section><!-- .app-content -->
        </div><!-- .wrap -->
        <!-- APP FOOTER -->
        <?php include_once('includes/footer.php');?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <!-- APP CUSTOMIZER -->
    <?php include_once('includes/customizer.php');?>


    <!-- build:js assets/js/core.min.js -->
    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->

    <!-- build:js assets/js/app.min.js -->
    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
</body>
</html>
<?php }  ?>