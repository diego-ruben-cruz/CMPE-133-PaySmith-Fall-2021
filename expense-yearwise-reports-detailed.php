<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "appusers");
// check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pay Smith || Yearwise Expense Report</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles2.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="menu.php"><span>PaySmith</span></a>

            </div>

        </div>
        <!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
          <div class="profile-sidebar">
              <div class="profile-userpic">
                  <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
              </div>
              <div class="profile-usertitle">
                  <?php
  $uid=$_SESSION['id'];
  $ret=mysqli_query($conn,"select fname from customers where id='$uid'");
  $row=mysqli_fetch_array($ret);
  $name=$row['fname'];

  ?>
                  <div class="profile-usertitle-name"><?php echo $name; ?></div>
                  <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
              </div>
              <div class="clear"></div>
          </div>
          <div class="divider"></div>

          <ul class="nav menu">
              <li class="active"><a href="menu.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>



              <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                  <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-1">
                      <li><a class="" href="add-expense.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                      </a></li>
                      <li><a class="" href="manage-expense.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                      </a></li>

                  </ul>

              </li>

    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                  <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-2">
                      <li><a class="" href="expense-datewise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                      </a></li>
                      <li><a class="" href="expense-monthwise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                      </a></li>
                      <li><a class="" href="expense-yearwise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                      </a></li>

                  </ul>
              </li>





              <li><a href="user-profile.php"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
  <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

          </ul>
      </div>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Yearwise Expense Report</li>
			</ol>
		</div><!--/.row-->




		<div class="row">
			<div class="col-lg-12">



				<div class="panel panel-default">
					<div class="panel-heading">Yearwise Expense Report</div>
					<div class="panel-body">

						<div class="col-md-12">

<?php
$fdate=$_POST['fromdate'];
 $tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<h5 align="center" style="color:blue">Yearwise Expense Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <tr>
              <th>S.NO</th>
              <th>Year</th>
              <th>Expense Amount</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
$userid=$_SESSION['id'];
$ret=mysqli_query($conn,"SELECT year(date) as rptyear,SUM(cost) as totalyear FROM transactions  where (date BETWEEN '$fdate' and '$tdate') && (UserID='$userid') group by year(date)");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                  <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['rptyear'];?></td>
                  <td><?php  echo $ttlsl=$row['totalyear'];?></td>


                </tr>
                <?php
                $totalsexp+=$ttlsl;
$cnt=$cnt+1;
}?>

 <tr>
  <th colspan="2" style="text-align:center">Grand Total</th>
  <td><?php echo $totalsexp;?></td>
 </tr>

                                    </table>




						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->

		</div><!-- /.row -->
	</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>
<?php } ?>
