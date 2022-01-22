<?php

$conn=mysqli_connect('localhost','ali',999999999,'movies');
if(!$conn){
    echo "Connection Error".mysqli_connect_error();
}
//index begin
$josndata = '
    { name:opsa, birth_date:8/7/2020, city:lattakia }
    ,{ name:omar, birth_date:12/12/1980, city:barshalona }
    { name:danial, birth_date:23/2/1989, city:ankara }
    ,{ name:ali, birth_date:27/11/2020, city:lybia }';  
    //insert begin
    // Insert data Query
    $sql = "INSERT INTO movie (id,movie_name,category_id, image_movie,director,actors) 
    VALUES (7,'movie7',1,'imges/images (11).jpg','asem','$josndata')";
    if ($conn->query($sql) === TRUE) {
      echo "Insert your JSON record successfully";
    } else{
      //  echo "error";
    }

 //select begin
//write A Query
$getCategory='SELECT id,category_name,date_created,is_deleted FROM category';//make A Query & GetResult
$getDistinctCategory='SELECT distinct category_name FROM category';
//$getMovie='SELECT * FROM movie';
$resultCategory=mysqli_query($conn,$getCategory);//Fetch The Resulting Rows As An Array
$resultDistinctCategory=mysqli_query($conn,$getDistinctCategory);
$resultMovie=mysqli_query($conn,'SELECT * FROM movie WHERE is_deleted=0');
$categorys=mysqli_fetch_all($resultCategory,MYSQLI_ASSOC);//MYSQLI_ASSOCIATIVE
$movies=mysqli_fetch_all($resultMovie,MYSQLI_ASSOC);
$distinctCategorys=mysqli_fetch_all($resultDistinctCategory,MYSQLI_ASSOC);
mysqli_free_result($resultCategory);//free result from Memory
mysqli_free_result($resultDistinctCategory);
mysqli_free_result($resultMovie);
//close connection on DB
// print_r($pizzas);
//print_r(explode(',',$pizzas[0]['ingredients']));
 //$ingr=explode(',',$pizzas[0]['ingredients']);
//pizza not exist
// if( isset($_POST["categoryDetails"])){
//     $valuee="close";
//  }else{
//     $valuee="";
//  }
//  if(isset($_POST["submitnameCategory"])){
//     $valuee="open";
//  }else{
//     $valuee="";
//  }
//  if(isset($_POST["closePopup"])){
//     $valuee="open";
//  }else{
//     $valuee="";
//  }

if(empty($categorys)){
    echo "<h1 class='center red-text'>Not Exist Any Type Of Categorys !!!</h1>";
}else if(empty($movies)){
    echo "<h1 class='center red-text'>Not Exist Any Type Of Movies !!!</h1>";
    // print_r($category);
    // print_r($movie);
}
$descriptionCategory=["tragedy"=>"tragedy is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"comedy"=>"comedy is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"hostorical"=>"hostorical is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"action"=>"action is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"horrifying,terrifying"=>"horrifying,terrifying is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"terrible,frighting"=>"terrible,frighting is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"dramatical"=>"dramatical is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"imaginary"=>"imaginary is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"funny"=>"funny is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                     ,"social"=>"social is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
];
//  if($actual_link=='http://localhost/Reven%20project/index.php?closePopup=#popup1'){echo'background-color:blue';} else {echo'ss';}
//  echo $_GET['closePopup'];
//index end





//print_r($_POST);echo $_POST['fname'];
//contactUS begin
 if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $Number_children=$_POST['Number_children'];
        $birthday=$_POST['birthday'];
        $malefemale=$_POST['male_female'];
        $marriednotmarried=$_POST['married_notmarried'];
        $sqluser = "INSERT INTO users VALUES ('$fname','$email','$password','$Number_children','$birthday','$malefemale','$marriednotmarried')";
        if ($conn->query($sqluser) === TRUE) {
            echo "Insert your JSON record successfully";
        }else{
            echo "error";}
}else{
    echo "nonClicked";}
//contactUS begin


//movieUpoad begin

//movieUpoad end
//movieInformation begin
if(isset($_GET['id'])){//يعني هل الرقم ممرر بالمسار وهل جبت الصفحه
    //echo "sddfsdf".$_GET['id'];
$id=mysqli_real_escape_string($conn,$_GET['id']);
$querygetID="SELECT * FROM movie WHERE id =$id";//when you use ' ' give an error
//make A querygetID & GetResult
$resultID=mysqli_query($conn,$querygetID);
//Fetch The Resulting Rows As An Array
$movie=mysqli_fetch_assoc($resultID);//For One Row
//print_r($movie);
mysqli_free_result($resultID);//free result from Memory
mysqli_close($conn);//close connection on DB
//print_r($pizza);
//}else{
//    echo "<h1>The List Pizza Is Empty</h1>";
}else{
   //echo "<h1>The List Movie Is Empty</h1>";
}
//movieInformation end

 header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
 header("Pragma: no-cache"); // HTTP 1.0.
 header("Expires: 0"); // Proxies.
// if (in_array(@$_SERVER['REMOTE_ADDR'], 
//     array('127.0.0.1', '::1', '127.0.0.1'))) { 
//     apcu_clear_cache(); 
//     echo "<script>alert('success!')</script>"; 
// }
// else { 
//     die('No valid IP'); 
// } 
?>
