<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
	//if ( isset($_SESSION['user'])!="" ) {
	//	header("Location: home.php");
	//	exit;
	//}
$res=mysql_query("SELECT * FROM userlog WHERE user_id=".$_SESSION['user']);
$userrow=mysql_fetch_array($res);

?>


<!DOCTYPE html>
<html>
<head>
	<title>income</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">ESEM</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="home.php">HOME</a></li>
    <li><a href="income.php">INCOME</a></li>
    <li><a href="#">EXPENCE</a></li>
    <li><a href="total.php">TOTAL</a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">
    	<li><a href="#"><span class="glyphicon glyphicon-user"></span>HI,&nbsp;<?php echo $userrow['fname'];?></a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>


<div class="container"> 
      <div id="login-form">
    <form action="" method="post">

        <div class="col-md-12">

        <div class="form-group">
                <h2 class="">Expence Chart</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            




            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="month"  class="form-control" placeholder="Enter Month" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            

            

            


            

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="houserent"  class="form-control" placeholder="Enter House Rent Expence" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="bazar"  class="form-control" placeholder="Enter Shopping Expence" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="education" class="form-control" placeholder="Enter Education Expence"  maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="other" class="form-control" placeholder="Enter Other Expence" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <hr />
            </div>

            <div class="form-group">
            <input type="submit" name="edit" value="Edit" class="btn btn-block btn-primary">
        	</div>

        	<div class="form-group">

       			<a href="expenceview.php" class="btn btn-block btn-primary">View</a>
 			</div>

            <div class="form-group">

                <a href="expence.php" class="btn btn-block btn-primary">Insert</a>
            </div>






        </div>
        </form>
        </div>
        </div>



<?php
$uid=$month=$houserent=$bazar=$education=$other="";
if(isset($_POST['edit']))
{
	$uid=$_SESSION['user'];
	$month=$_POST['month'];
	$houserent=$_POST['houserent'];
	$bazar=$_POST['bazar'];
	$education=$_POST['education'];
	
	$other=$_POST['other'];

	$update="UPDATE expence set 
				month='$month',
				houserent='$houserent',
				bazar='$bazar',
				education='$education',
				other1='$other'
				WHERE user_id=$uid";

	$res1=mysql_query($update) or die("Error:".mysql_error());

}


?>




</body>
</html>