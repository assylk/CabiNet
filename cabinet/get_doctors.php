<?php
include('doctor/includes/dbconnection.php');
if(!empty($_POST["sp_id"])) 
{
$spid=$_POST["sp_id"];
$sql=$dbh->prepare("SELECT * FROM tbldoctor WHERE Specialization=:spid");
$sql->execute(array(':spid' => $spid));	
?>
<li value=""><input name="itemselected" value="Doctor"></option>

    <?php
while($row =$sql->fetch())
{
?>
<li value="<?php echo $row["ID"]; ?> "><input value="<?php echo $row["FullName"]; ?>" name="itemselected"></option>
    <?php
}
}
?>