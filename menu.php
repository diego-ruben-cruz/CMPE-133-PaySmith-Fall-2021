<?php
session_start();
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
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu Dashboard</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles2.css" rel="stylesheet">
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
              <!--
                  <div class="profile-userpic">
                  <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
              </div>
              -->
              <div class="profile-usertitle">
                  <?php
  $uid=$_SESSION['id'];
  $ret=mysqli_query($conn,"select fname from customers where ID='$uid'");
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
      				<li class="active">Dashboard</li>
      			</ol>
      		</div><!--/.row-->

      		<div class="row">
      			<div class="col-lg-12">
      				<h1 class="page-header">Dashboard</h1>
      			</div>
      		</div><!--/.row-->




      		<div class="row">
      			<div class="col-xs-6 col-md-3">

      				<div class="panel panel-default">
      					<div class="panel-body easypiechart-panel">
      <?php
      //Today Expense
      $userid=$_SESSION['id'];
      $tdate=date('Y-m-d');
      $query=mysqli_query($conn,"select sum(cost)  as todaysexpense from transactions where (date)='$tdate' && (UserID='$userid');");
      $result=mysqli_fetch_array($query);
      $sum_today_expense=$result['todaysexpense'];
       ?>

      						<h4>Today</h4>
      						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent"><?php if($sum_today_expense==""){
      echo "0";
      } else {
      echo $sum_today_expense;
      }

      	?></span></div>
      					</div>
      				</div>
      			</div>
      			<div class="col-xs-6 col-md-3">
      				<div class="panel panel-default">
      					<?php
      //Yestreday Expense
      $userid=$_SESSION['id'];
      $ydate=date('Y-m-d',strtotime("-1 days"));
      $query1=mysqli_query($conn,"select sum(cost)  as yesterdayexpense from transactions where (date)='$ydate' && (UserID='$userid');");
      $result1=mysqli_fetch_array($query1);
      $sum_yesterday_expense=$result1['yesterdayexpense'];
       ?>
      					<div class="panel-body easypiechart-panel">
      						<h4>Yesterday</h4>
      						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent"><?php if($sum_yesterday_expense==""){
      echo "0";
      } else {
      echo $sum_yesterday_expense;
      }

      	?></span></div>
      					</div>
      				</div>
      			</div>
      			<div class="col-xs-6 col-md-3">
      				<div class="panel panel-default">
      					<?php
      //Weekly Expense
      $userid=$_SESSION['id'];
       $pastdate=  date("Y-m-d", strtotime("-1 week"));
      $crrntdte=date("Y-m-d");
      $query2=mysqli_query($conn,"select sum(cost)  as weeklyexpense from transactions where ((date) between '$pastdate' and '$crrntdte') && (UserID='$userid');");
      $result2=mysqli_fetch_array($query2);
      $sum_weekly_expense=$result2['weeklyexpense'];
       ?>
      					<div class="panel-body easypiechart-panel">
      						<h4>Last 7 Days</h4>
      						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>"><span class="percent"><?php if($sum_weekly_expense==""){
      echo "0";
      } else {
      echo $sum_weekly_expense;
      }

      	?></span></div>
      					</div>
      				</div>
      			</div>
      			<div class="col-xs-6 col-md-3">
      				<div class="panel panel-default">
      					<?php
      //Monthly Expense
      $userid=$_SESSION['id'];
       $monthdate=  date("Y-m-d", strtotime("-1 month"));
      $crrntdte=date("Y-m-d");
      $query3=mysqli_query($conn,"select sum(cost)  as monthlyexpense from transactions where ((date) between '$monthdate' and '$crrntdte') && (UserID='$userid');");
      $result3=mysqli_fetch_array($query3);
      $sum_monthly_expense=$result3['monthlyexpense'];
       ?>
      					<div class="panel-body easypiechart-panel">
      						<h4>Last 30 days</h4>
      						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent"><?php if($sum_monthly_expense==""){
      echo "0";
      } else {
      echo $sum_monthly_expense;
      }

      	?></span></div>
      					</div>
      				</div>
      			</div>

      		</div><!--/.row-->
      			<div class="row">
      			<div class="col-xs-6 col-md-3">
      				<div class="panel panel-default">
      					<?php
      //Yearly Expense
      $userid=$_SESSION['id'];
       $cyear= date("Y");
      $query4=mysqli_query($conn,"select sum(cost)  as yearlyexpense from transactions where (year(date)='$cyear') && (UserID='$userid');");
      $result4=mysqli_fetch_array($query4);
      $sum_yearly_expense=$result4['yearlyexpense'];
       ?>
      					<div class="panel-body easypiechart-panel">
      						<h4>Current Year</h4>
      						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent"><?php if($sum_yearly_expense==""){
      echo "0";
      } else {
      echo $sum_yearly_expense;
      }

      	?></span></div>


      					</div>

      				</div>

      			</div>

      		<div class="col-xs-6 col-md-3">
      				<div class="panel panel-default">
      					<?php
      //Yearly Expense
      $userid=$_SESSION['id'];
      $query5=mysqli_query($conn,"select sum(cost)  as totalexpense from transactions where UserID='$userid';");
      $result5=mysqli_fetch_array($query5);
      $sum_total_expense=$result5['totalexpense'];
       ?>
      					<div class="panel-body easypiechart-panel">
      						<h4>Total Expenses</h4>
      						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense==""){
      echo "0";
      } else {
      echo $sum_total_expense;
      }

      	?></span></div>


      					</div>

      				</div>

      			</div>


      		</div>


      	<script src="js/jquery-1.11.1.min.js"></script>
      	<script src="js/bootstrap.min.js"></script>
      	<script src="js/chart.min.js"></script>
      	<script src="js/chart-data.js"></script>
      	<script src="js/easypiechart.js"></script>
      	<script src="js/easypiechart-data.js"></script>
      	<script src="js/bootstrap-datepicker.js"></script>
      	<script src="js/custom.js"></script>
      	<script>
      		window.onload = function () {
      	var chart1 = document.getElementById("line-chart").getContext("2d");
      	window.myLine = new Chart(chart1).Line(lineChartData, {
      	responsive: true,
      	scaleLineColor: "rgba(0,0,0,.2)",
      	scaleGridLineColor: "rgba(0,0,0,.05)",
      	scaleFontColor: "#c5c7cc"
      	});
      };
      	</script>

      </bodyphp
      </html>
      </html>
      <?php } ?>
