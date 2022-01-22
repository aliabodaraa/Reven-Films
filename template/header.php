<?php
session_start();
//$_SESSION['name1']='ali';

if( isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name1']);//unset ||Remove Single session variable
    //session_unset();
}
$name=$_SESSION['name1'] ?? "unname"; //no coalescing
//unset($_SESSION['name1']);

//get cookie
$gender=$_COOKIE['gender'] ??'unknown';





?>
<!-- Here, if you want to control it through HTML: do like below Option 1:

<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
  
And if you want to control it through PHP: do it like below Option 2:

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

AND Option 2 IS ALWAYS BETTER in order to avoid proxy based caching issue. -->
<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" /> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
<script src="js/index.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css?version=1.001">
<script>
       (function print() {//for print the page
            window.print();
         });

        
         
 </script>

 <style>
.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #999;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #999;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
/* for open popup */
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 139px auto;
    padding: 35px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
/* alert begin */
.alert {
  padding: 20px;
  margin-bottom: 3px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
/* alert end*/
 </style>
</head>
<body class="whitesmpke">
    <?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    //echo $actual_link;
    ?>

    <!-- <h5 style="border-radius: 3px;
    margin-top: 17px;
    position: absolute;
    margin-left: 30px;
    background-color: #f2d384;
    padding: 5px 20px;">Hello <?php echo htmlspecialchars($name);?></h5>
    <p style="border-radius: 3px;
    margin-top: 17px;
    position: absolute;
    margin-left: 490px;
    background-color: #f2d384;
    padding: 5px 20px;"><?php echo htmlspecialchars($gender);?></p> -->


<div class="header" style="    z-index: 999999;">
<span class="date"><?php
echo  date("l")." - ".date("Y-m-d")." - ". date("h:i:sa") ;
?></span>
  <a href="#default" class="logo">Reven Download</a>
  <marquee >You Can Dowonload Films By easy</marquee>
  <div class="header-right">
    <a href="http://localhost//Reven%20project/index.php" style="<?php if($actual_link=='http://localhost//Reven%20project/index.php'){echo'background-color: #00cdff;color:white;';}?>">Home</a>
    <a href="http://localhost//Reven%20project/contactUs.php" style="<?php if($actual_link=='http://localhost//Reven%20project/contactUs.php'){echo'background-color: #00cdff;color:white;';} ?>">Contact Us</a>
    <a  href="http://localhost//Reven%20project/aboutUs.php" style="<?php if($actual_link=='http://localhost//Reven%20project/aboutUs.php'){echo'background-color: #00cdff;color:white;';} ?>">aboutUs</a>
      <a  href="http://localhost//Reven%20project/list_movies.php" style="<?php if($actual_link=='http://localhost//Reven%20project/list_movies.php'){echo'background-color: #00cdff;color:white;';} ?>">Admin</a>
  </div>
</div>

