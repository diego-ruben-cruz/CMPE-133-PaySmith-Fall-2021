<?php
session_start();
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "appusers");
// check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Free mobile app HTML landing page template to help you build a great online presence for your app which will convert visitors into users">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>PaySmith - Free website App Landing Page Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="images/logo.png" >
    <style>

    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body {
  margin: 0;
  padding: 0;
  width: 100%;
  height:100%;
  font-family: 'Open Sans', sans-serif;
  background: #092756;
  background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}

input {
  width: 100%;
  margin-bottom: 10px;
  background: rgba(0,0,0,0.3);
  border: none;
  outline: none;
  padding: 10px;
  font-size: 13px;
  color: #fff;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
  border: 1px solid rgba(0,0,0,0.3);
  border-radius: 4px;
  box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
  -webkit-transition: box-shadow .5s ease;
  -moz-transition: box-shadow .5s ease;
  -o-transition: box-shadow .5s ease;
  -ms-transition: box-shadow .5s ease;
  transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
main-navigation .navigation-logo img {
    height: auto;
    position: absolute;
    left: 0;
}
.dropdown {
  float: right;
  overflow: hidden;
  position: relative;
  right: 50px;
  font-size: 23px;
}

.dropdown .dropbtn {
  font-size: 18px;
  border: none;
  outline: none;
  color: black;
  padding:20px 20px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 20px 20px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.container {
  min-height: 80vh;

  width: 100%;
}
.header {
  height: 30px;
  width: 100%;
}
h1 {
  margin: 0;
  text-align: center;
  font-family: "heading";
  padding-top: 10px;
}
.budget-section {
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  width: 100%;
  min-height: 160px;
  font-weight: 900;
}
.budget-list {
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  width: 100%;
  height: 70px;
  font-size: 20px;
}
.exp-amount {
  color: #b80c09;
}
.amount {
  color: #317b22;
}
.col {
  width: 40%;
  text-align: center;
  text-transform: capitalize;
}
.col p {
  font-size: 40px;
  padding-top: 5px;
  margin: 0;
}
.toggle {
  position: fixed;
  right: 0;
  bottom: 18px;
}
.toggle button {
  border: none;
  border-radius: 600px;
  background: #04458f;
  padding: 14px 20px;
  color: #ffffff;
  font-size: 30px;
  margin: 10px 50px 0 0;
  cursor: pointer;
}
/* modal form */
.budget-form {
  width: 100%;
  min-height: 200px;
}
form {
  margin: 10px 0 20px 10px;
  min-height: 100px;
}
input {
  width: 60%;
  padding: 8px 0;
  border-radius: 6px;
  border: 1px solid gray;
  margin: 20px 0;
  padding-left: 5px;
  color: #495057;
}
.budget-list .exp p {
  color: #b80c09;
  font-size: 18px;
}
#displayExpenses {
  width: 100%;
  display: none;
}
.expValue {
  display: flex;
  justify-content: space-around;
  height: 40px;
  font-weight: 900;
  text-align: center;
}
#expTitleName {
  width: 40%;
}
#expValueAmount {
  width: 40%;
}
#edite_delete {
  width: 40%;
}
#edite_delete img {
  cursor: pointer;
}
#edite_delete button {
  margin-left: 1px;
  background: none;
  border: none;
}
.budget-form button {
  background: rgb(1, 83, 1);
  border: none;
  border-radius: 6px;
  color: #ffffff;
  padding: 10px 40px;
  cursor: pointer;
  text-transform: capitalize;
  font-size: 16px;
  font-weight: 400;
}
#bug {
  font-size: 14px;
  background: none;
  color: #04458f;
  margin: 0px 0px 15px 10px;
  text-align: justify;
  padding: 0;
}
#expense-form {
  width: 100%;
  display: none;
}
#editForm {
  display: none;
  width: 100%;
}
#editForm button {
  background: #b80c09;
  border: none;
  border-radius: 6px;
  color: #ffffff;
  padding: 10px 30px;
  cursor: pointer;
  text-transform: capitalize;
  font-size: 16px;
  font-weight: 400;
}
.expense-form button {
  background: #b80c09;
  border: none;
  border-radius: 6px;
  color: #ffffff;
  padding: 10px 30px;
  cursor: pointer;
  text-transform: capitalize;
  font-size: 16px;
  font-weight: 400;
}
/* The Modal (background) */
.modal {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
  animation-name: fadeIn;
  animation-duration: 0.4s;
  text-transform: capitalize;
  font-weight: 600;
}

/* Modal Content */
.modal-content {
  position: fixed;
  top: 40%;
  left: 25%;
  background-color: Grey;
  width: 50%;
  min-height: 40px;
  animation-name: slideIn;
  animation-duration: 0.4s;
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
  color: #000;
}
.modal-header {
  padding: 2px 16px;
  border-bottom: 2px solid gray;
}
.modal-body {
  padding: 2px 16px;
}

/* Add Animation */
@keyframes slideIn {
  from {
    top: -300px;
    opacity: 0;
  }
  to {
    top: 0;
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

    </style>

</head>

    <!-- end of preloader -->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">PaySmith</a> -->

        <!-- Image Logo -->
        <a class="navigation-logo" href="index.php"><img src="images/logo.png"  alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault"  >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="menu.php">Budget Mangement</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="">Crowdfund</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="">Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="logout.php" >Logout</a>
                </li>

            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->

<br>
<br>
<br>
    <div class="dropdown >
        <?php (isset($_SESSION['id'])) ?>
            <button class="dropbtn"> Welcome <?php echo $_SESSION['name']; ?> </button>
    </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="container">
      <div >
        <h1>Budget Management</h1>

      </div>
      <br>
      <div class="budget-section">
        <div class="budget col col-md col-sm">
          <h2>budget</h2>
          <br>
          <img src="images/money-bag.svg" width="40" alt=""  />
          <br>
          <p class="amount">$ <span id="budgetAmount">0</span></p>

        </div>
        <div class="expenses col col-md col-sm">
          <h2>expenses</h2>
          <br>
          <img src="images/accounting.svg" width="40" alt=""  />
          <br>
          <p class="exp-amount">$ <span id="expensesAmount">0</span></p>
        </div>
        <div class="balance col col-md col-sm">
          <h2>balance</h2>
          <br>
          <img src="images/law.svg" width="40" alt=""  />
          <br>
          <p class="amount bala">$ <span id="balanceAmount">0</span></p>
        </div>
      </div>
      <div id="displayExpenses">
        <div class="budget-list">
          <div class="col">
            <h4>expense title</h4>
          </div>
          <div class="col">
            <h4>expense value</h4>
          </div>
          <div class="col"></div>
        </div>
        <div id="expValue"></div>
      </div>
    </div>
    <div class="toggle">
      <button id="myBtn" type="button">+</button>
    </div>

    <!-- The Modal -->
       <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content">
           <div class="modal-header">
             <span class="close">&times;</span>
             <h2>Budget Form</h2>
           </div>
           <div class="modal-body">
             <div class="budget-form" id="budgetform">
               <form id="addForm">
                 <label for=""> Make a budget</label> <br />
                 <input type="number" id="number" /> <br />
                 <button type="submit">Add Budget</button>
               </form>
             </div>

             <div class="expense-form" id="expense-form">
               <form action="" id="expForm">
                 <div class="">
                   <label for="">please enter your expense</label> <br />
                   <input type="text" id="expName" />
                 </div>
                 <div class="">
                   <label for="">please enter expense amount</label> <br />
                   <input type="number" id="expNumber" />
                 </div>
                 <button type="submit" id="submitExpen">Add expense</button>
               </form>
               <button onclick="callBudget()" id="bug">
                 Back to add budget ->
               </button>
             </div>

             <div class="edit-form" id="editForm">
               <form action="" id="saveEdit">
                 <div class="">
                   <label for="">Edit your expense</label> <br />
                   <input type="text" id="editExpName" />
                 </div>
                 <div class="">
                   <label for="">Edit expense amount</label> <br />
                   <input type="number" id="editExpNumber" />
                 </div>
                 <button type="submit">Save changes</button>
               </form>
             </div>
           </div>
         </div>
       </div>




    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script src="js/main.js"></script>
</body>
</html>
