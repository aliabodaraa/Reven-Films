
<?php require("template/header.php");?>
<?php include('config/db_connect.php');//for conn?>
<?php  
    function  createConfirmationmbox() {  
        echo '<script type="text/javascript"> ';  
        echo ' function openulr(newurl) {';  
        echo '  if (confirm("Are you sure you want to open Delete This Movie")) {';  
        echo '    document.location = newurl;';  
        echo '  }';  
        echo '}';  
        echo '</script>';  
    }  
  ?> 
<div class="container">
<a href="javascript:openulr('#');" class="button1"> Open new URL </a>
<?php
$conn=mysqli_connect('localhost','ali',999999999,'movies');
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
//select begin
//write A Query
$resultMovie=mysqli_query($conn,'SELECT * FROM movie');
$movies=mysqli_fetch_all($resultMovie,MYSQLI_ASSOC);
//select all movie
 foreach($movies as $key=>$movie){

         if(isset($_POST['delete'.$movie['id']])) {
          $idMovie=$movie['id'];
                $sql ="UPDATE `movie` SET `is_deleted` = 1 where id = '$idMovie' ";
                  if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert warning'>
                    <span class='closebtn'>&times;</span>  
                    <strong>Success Deleting</strong> Successful Deleting .
                  </div>";
                  } else{
                      echo "error delete";
                  }
            }
         if(isset($_POST['retrieve'.$movie['id']])) {
          $idMovie=$movie['id'];
                $sql ="UPDATE `movie` SET `is_deleted` = 0 where id = '$idMovie' ";
                  if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert success'>
                    <span class='closebtn'>&times;</span>  
                    <strong>Success Retrieving</strong> Successful Retrieving .
                  </div>";
                  } else{
                      echo "error retrieve";
                  }
            }
            if(isset($_POST['update'.$movie['id']])) {
              if(isset($_POST['movie_name'])){
                $idMovie=$movie['id'];
                $movie_nameinput=$_POST['movie_name'];
                $director=$_POST['director'];
                $actors=$_POST['actors'];
                $yearinput=$_POST['year'];
                $image_movieinput=$_POST['image_movie'];
                $category_idinput=$_POST['category_idinput'];
                $date_createdinput=$_POST['date_created'];
              }
              $sql ="UPDATE `movie` SET
              `movie_name` = '$movie_nameinput', 
              `year` = '$yearinput',
              `director`='$director',
              `actors`='$actors',
              `date_created` = '$date_createdinput',
              `category_id` = '$category_idinput', 
              `image_movie` = '$image_movieinput' 
                where id = '$idMovie' ";
                if ($conn->query($sql) === TRUE) {
                  echo "<div class='alert info'>
                  <span class='closebtn'>&times;</span>  
                  <strong>Success Updating</strong> Updating Done.
                </div>";
                } else{
                    echo "error update";
                }
          }
        }
            ?>
          <table>
            <tr style="color:black;">
              <th>number</th>
              <th>movie name</th>
              <th>category name</th>
              <th>year</th>
              <th>created_date</th>
              <th>Director</th>
              <th>Actors</th>
              <th>image_movie</th>
              <th>is_deleted</th>
              <th>more options</th>
            </tr>
          <?php foreach($movies as $key=>$movie){?>
              <tr>
              <form method = "POST" action = "<?php $_PHP_SELF ?>">
                  <td><?php echo $movie['id']; ?></td>
                  <td><input type="text" name="movie_name" value="<?php echo $movie['movie_name']; ?>"></td>
                  <td>
                    <select class="form-control" name="category_idinput" value="<?php if(isset($_POST['update'.$movie['id']])) echo $_POST['category_idinput'];else echo '';?>">
                      <!-- the value in select tag not essential becouse statment in line 59 -->
                        <?php foreach($categorys as $cat){?>
                          <option value="<?php echo $cat['id'];?>" <?php if($cat['id']==$movie['category_id']) echo "selected";else echo "";?>>
                             <?php echo $cat['category_name'];?>
                          </option> 
                        <?php }?>
                    </select>
                 </td>
                  <td><input type="number" name="year" value="<?php echo $movie['year']; ?>"></td>
                  <td><input type="date" name="date_created" value="<?php echo $movie['date_created']; ?>"></td>
                  <td><input type="text" name="director" value="<?php echo $movie['director'];?>"></td>
                  <td><textarea rows="4" cols="40" type="text" name="actors"><?php echo $movie['actors'];?></textarea></td>
                  <td><input type="text" name="image_movie" value="<?php echo $movie['image_movie']; ?>"></td>
                  <td><?php echo $movie['is_deleted']; ?></td>
                  <td>
                    <div class="btn-group" style="display: flex;">
                    <?php createConfirmationmbox(); ?>
                      <a onclick="javascript:openulr('#');">
                          <?php if($movie['is_deleted']==1){?>
                              <input name = "retrieve<?php echo $movie['id'] ?>" type = "submit" class="button retrieve"
                              value = "Retrieve"  script="event.stopPropagation()">
                          <?php }else{?>
                              <input name = "delete<?php echo $movie['id'] ?>" type = "submit"  class="button"
                              value = "Delete" script="event.stopPropagation()">
                          <?php }?>
                       </a>
                       <a onclick="javascript:openulr('#');">
                              <input name = "update<?php echo $movie['id'] ?>" type = "submit" class="button"
                              value = "update"  script="event.stopPropagation()" >
                       </a>
                      <a href='http://localhost//Reven%20project/movieInformation.php?id=<?php echo $movie['id']; ?>' class="button" style="font-size: 1em;padding: 8px;color: #fff;border: 2px solid #999;border-radius: 4px;text-decoration: none;cursor: pointer;transition: all 0.3s ease-out;margin: 3px;height: 42px;">Show</a>
                      <!-- href="javascript:openulr('#'); -->
                    </div>
                    <!-- onclick="window.location='#popup2'" -->
                  </td>
                </form>
              </tr>
          <?php  }?>
        </table>
                      <!-- <div id="popup2" class="overlay">
                        <div class="popup">
                          <h2>Here i am</h2>
                          <a class="close" href="#">&times;</a>
                            <div class="content">
                              Thank to pop me out of that button, but now i'm done so you can close this window.
                            </div>
                            <div style="display:inline-block">
                             <button type="" class="button" style="background-color: #ff0505;border: 1px solid #ff0505;">Confirm</button>
                            </div>
                        </div>
                      </div> -->
</div>
<script>
var close = document.getElementsByClassName("closebtn");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>