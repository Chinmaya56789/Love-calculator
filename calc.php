<!DOCTYPE html>
<html>
<head>
	<title>Funnychintu</title>
		<link rel="icon" type="image/gif" href="image/favicon.png">
	  <meta charset="UTF-8">
	  <meta name="description" content="Try your luck .This love calculator is made considering all horoscopic factors .Just click and enjoy it">
	  <meta name="keywords" content="Funnychintu, funny, chintu, lovecalculator, fungames, love, horoscope">
	  <meta name="author" content="Chinmaya Behera">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <!-- <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="mobile-responsive.css">
	  <link rel="stylesheet" type="text/css" href="cong.css">
	  <style type="text/css">
	  	@media only screen and (max-width: 500px)
	{
		.para
		{
			font-size: 12px;
		}
		.input
		{
			height: 90%;
		}
	}
	.btn
	{
	background-color: rgba(235,90,100,.8);
	display: block;
	margin: 0 25%;
	height: 35px;
	}
	.btn:hover
	{
    background-color: rgba(235,90,100,.4);
	}

	  </style>

</head>
<body>
	<?php 
session_start();

$new_con= mysqli_connect('localhost','root');
mysqli_select_db($new_con,'lovecalc');

$male = $_POST["male"];
$female = $_POST["female"];
  $check ="select * from lovers where male = '$male'and female = '$female' ";
  $check_res = mysqli_query($new_con,$check);
  $check_res_row = mysqli_num_rows($check_res);
  if ($check_res_row == 1)
  {
  	$qres= " select love from lovers where male = '$male' and female ='$female' ";
  	$resu = mysqli_query($new_con,$qres);
  	$resul = mysqli_fetch_assoc($resu);
  	$result = $resul["love"];
  }
  else
  {
  	$result= rand(0,100);
  	$enter = "insert into lovers(male,female,love) values('$male' , '$female','$result' )";
    mysqli_query($new_con,$enter);
  }
  if ($result >60) 
  {
  	$color ="green";
  }
  elseif ($result >=30 && $result<=60) 
  {
  	$color = "blue";
  }
  else
  {
    $color = "red";
  }
 ?>
<div class="header" >
		<div class="logo">
			<img src="image/logo.png">
		</div>
		<div class="title">
			<p>Love Calculator</p>
		</div>
		<div class="dev">
			<a href="">
				<div class="face">
					<div class="face-1">
						<p>admin</p>
					</div>
					<div class="face-2">
						<img src="image/me.jpg">
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="content">
		<div class="intro">
			<h3> Instructions</h3>
			<ol>
				<li>Green :Favourable - Should be an excellent love match. &#128525;</li>
				<li>Blue :May be good but both of need to continue to work on the relationship. &#128515;</li>
				<li>Red : Can be hard to make this relationship progress smoothly. &#128566;</li>
			</ol>
		</div>
		<div class="form">
			<div class="input" style="margin-top: 0;">	
				<div class="cong" >
					<p style="font-size: 25px;"> Congratulations !</p>
				</div>
				<div class="para">
					<p>We found a unique result for this couple : <br> <span style="color: rgba(300,0,0,.7); font-weight: bold;"> <?php echo"$male" ?> and <?php echo"$female" ?></span></p>
				</div>
				<div class="result">
					<p>
						Result : <br><span style="font-size: 50px;color: <?php echo $color;  ?> "><?php echo "$result %"; ?></span>
					</p><br>
					<button style="position: relative;margin-left: auto;margin-right: auto;display:block;"  onclick="window.location.href = 'index.html';" class="btn" >New Entry</button>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p style="display: inline;">&copy All copyrights reserved , Chinmaya Behera 2019 </p>
		<a href="https://www.facebook.com/chinmaya.behera.5686" class="fa fa-facebook"></a>
		<a href="" class="fa fa-instagram"></a>
		<a href="" class="fa fa-github"></a>
		<p style="float: right;margin-right: 10px;">Contact me-</p>
	</div>
</body>
</html>