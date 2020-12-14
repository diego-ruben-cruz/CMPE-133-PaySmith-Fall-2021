<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "appusers");
// check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
error_reporting(0);
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$userid=$_SESSION['id'];
    $dateexpense=$_POST['dateexpense'];
     $item=$_POST['item'];
     $costitem=$_POST['costitem'];
    $query=mysqli_query($conn, "insert into transactions (UserID,date,item,cost) value('$userid','$dateexpense','$item','$costitem')");
if($query){
echo "<script>alert('Transaction has been added');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}

}
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PaySmith || Add Transaction</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles2.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
              <!--
                  <div class="profile-userpic">
                  <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
              </div>
              -->
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
                  <em class="fa fa-navicon">&nbsp;</em>Transactions <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-1">
                      <li><a class="" href="add-expense.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Add Transaction
                      </a></li>
                      <li><a class="" href="manage-expense.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Edit Transaction(s)
                      </a></li>

                  </ul>

              </li>

    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                  <em class="fa fa-navicon">&nbsp;</em>Transaction Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-2">
                      <li><a class="" href="expense-datewise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Day-to-Day
                      </a></li>
                      <li><a class="" href="expense-monthwise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Month-to-Month
                      </a></li>
                      <li><a class="" href="expense-yearwise-reports.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Year-to-Year
                      </a></li>

                  </ul>
              </li>


              <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                  <em class="fa fa-navicon">&nbsp;</em> Crowdfunds <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-3">
                      <li><a class="" href="add-crowdfund.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Add Crowdfund
                      </a></li>
                      <li><a class="" href="manage-crowdfund.php">
                          <span class="fa fa-arrow-right">&nbsp;</span> Edit Crowdfund(s)
                      </a></li>

                  </ul>


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
				<li class="active">Transaction</li>
			</ol>
		</div><!--/.row-->




		<div class="row">
			<div class="col-lg-12">



				<div class="panel panel-default">
					<div class="panel-heading">Transaction</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">

							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Date of Transaction</label>
									<input class="form-control" type="date" value="" name="dateexpense" required="true">
								</div>
								<div class="form-group">
									<label>Item</label>
									<input type="text" class="form-control" name="item" value="" required="true">
								</div>

								<div class="form-group">
									<label>Cost of Item</label>
									<input class="form-control" type="text" value="" required="true" name="costitem">
								</div>

								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Add</button>
								</div>


								</div>

							</form>
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
<?php }  ?>
