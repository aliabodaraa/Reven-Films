

<?php include('config/db_connect.php');//for conn
 require("template/header.php"); ?>

 <!-- carousal begin-->
 <div class="slideshow-container container">
    <?php
    if(!empty($movies)){
     foreach($movies as $key=>$movie){?>
        <div class="mySlides fade">
                    <img src="<?php echo $movie['image_movie'] ?>" style="width:100%   ; max-height: 400px;">
            <div class="text">  <h1 style type=border font-size: 57px;"><?php echo $movie['movie_name'];?></h1>
                        <p><?php echo $movie['description']; ?></p>
                        <p class="director">
                            <?php 
                            echo "<b>director: </b> ".$movie['director']; 
                            ?>
                        </p>
                        <div class="numbertext" style="color: #f2f2f2;
    font-size: 23px;
    padding: 15px 2px;
    position: absolute;
    top: -244px;"><?php echo ++$key ."/".count($movies) ?></div>
                        <p class="actors" style="display: inline-block;">
                        <b>actors: </b> 
                        <?php 
                            foreach (explode(',',$movie['actors']) as $key=>$value) {
                                echo "<span>".$value.", </span>";
                            }?>
                        </p> 
                        <p><?php echo "<b>year: </b> ".$movie['year'] ?></p></div>
        </div>
    <?php }}else{
        echo "<h1 style='color:red;text-align:center;'>Have Non Movies</h1>";
    } ?>
</div>
<br>

<div style="text-align:center">
    <?php 
        foreach ($movies as $movie) {
        echo "<span class='dot'></span> ";
        }?>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
         


<div class="container">
    
<h1 style="text-align:left">Categorys</h1>
    <div class="box">
        <button class="button" onclick="location.href='#popup1'" name="categoryDetails">Category Details</button>
        <a name="" id="" class="button" onclick="(window.print());">Print</a>
    </div>
</div>
<!-- Modal begin-->
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Categorys details</h2>
		<a id="close" class="close"  href="#">&times;</a>
		<div class="content">
			please enter <b>Category Name<b> to know info about it.
		</div>
        <form name="form" action="<?php echo 'http://localhost/Reven%20project/index.php?#popup1';?>" method="GET" class="form-group">
       
                        <input type="text" class="form-control" name="getInput" id="cat" value="<?php if(isset($_GET['submitnameCategory'])) {echo $_GET['getInput'];} ?>" aria-describedby="helpId" placeholder="enter name of category to Know information about it">
                        <p id="helpId" class="form-text text-muted">
                            <?php  
                                if(isset($_GET['getInput'])){
                                    if($_GET['getInput']=="action"){
                                        echo $descriptionCategory["action"];
                                        }elseif ($_GET['getInput']==="hostorical") {
                                            echo $descriptionCategory["hostorical"];
                                        }elseif ($_GET['getInput']==="comedy") {
                                            echo $descriptionCategory["comedy"];
                                        }elseif ($_GET['getInput']=="tragedy") {
                                            echo $descriptionCategory["tragedy"];
                                        }elseif ($_GET['getInput']=="horrifying,terrifying") {
                                            echo $descriptionCategory["horrifying,terrifying"];
                                        }elseif ($_GET['getInput']=="terrible,frighting") {
                                            echo $descriptionCategory["terrible,frighting"];
                                        }elseif ($_GET['getInput']=="dramatical") {
                                            echo $descriptionCategory["dramatical"];
                                        }elseif ($_GET['getInput']=="imaginary") {
                                            echo $descriptionCategory["imaginary"];
                                        }elseif ($_GET['getInput']=="funny") {
                                            echo $descriptionCategory["funny"];
                                        }elseif ($_GET['getInput']=="social") {
                                            echo $descriptionCategory["social"];
                                        }else{
                                            echo 'Sorry category '."'".$_GET['getInput']."'".'<span class="text-danger"> not exist</span>';
                                        }
                                }else{
                                    echo "error in ";
                                } ?>
                        <p>
                        <button name="submitnameCategory" id="submitnameCategory" class=" button">submit</button>
                        
                    </form>
	</div>
</div>
<script>
const inputContent=document.getElementById('cat');
const descriptionCategoryContent=document.getElementById('helpId');
document.getElementById('close').onclick=()=>{inputContent.value='';
                                              descriptionCategoryContent.innerHTML='';}
</script>
<!-- Modal end-->

<div class="container movies">
   <h1 style="text-align:left">Some Of Varient Movies</h1>
    <?php if(!empty($categorys)){?>
    <?php foreach($movies as $movie){?>

        <div class="column-movie" style="display: inline;" >
                <div class="card">
                    <a href="movieInformation.php?id=<?php echo $movie['id'];?>" class="brand-text">
                    <img src="<?php echo $movie['image_movie'] ?>" alt="Jane" style="width:100%;max-height: 117px;" class="img-thumbnail">
                    </a>
                    <div style="padding: 0 12px;">
                        <a href="movieInformation.php?id=<?php echo $movie['id'];?>" class="brand-text">
                            <h2><?php echo $movie['movie_name'] ?></h2>  
                        </a>
                        <p class="title"><?php echo $movie['movie_name']." "."(".$categorys[$movie['category_id']]['category_name'].")" ?></p>
                        <p>
                            <?php 
                            if (strlen(substr($movie['description'], 50))>0){
                            echo substr($movie['description'],0,50) . "...";}; 
                            ?>
                        </p>
                        <p><?php echo $movie['year'] ?></p>
                        <p>  <a href="movieInformation.php?id=<?php echo $movie['id'];?>" class="brand-text"><button class="button">Contact</button> </a></p>
                    </div>
                </div>
        </div>
    </a>
    <?php  }}else{
        echo "<h1 style='color:red;text-align:center;'>Have Non Movies</h1>";
    } ?>
</div>



<?php require("template/footer.php"); ?>





