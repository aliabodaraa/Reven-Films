<?php include('config/db_connect.php');//for conn?>
<?php require("template/header.php"); ?>
 <div class="container center" >
    <div class="movie" style="width: 100%">
            <img src="<?php echo $movie['image_movie'] ?>" alt="Jane" style="width: 70%;float: left;" >
            <div style="width: 30%;float: right;overflow: overlay;padding: 22px;height: 100%;text-align: center;">
                    <h1><?php echo $movie['movie_name'] ?></h1>
                    <p class="category_nam"><?php echo "<b>category_name : </b>".$categorys[$movie['category_id']]['category_name'];?></p>
                    <p>
                        <?php 
                        echo "<b>description: </b> ".$movie['description']; 
                        ?>
                    </p>
                    <p class="director">
                        <?php 
                        echo "<b>director: </b> ".$movie['director']; 
                        ?>
                    </p>
                    <ul class="actors" style="display: inline-block;">
                    <b>actors: </b> 
                     <?php 
                         foreach (explode(',',$movie['actors']) as $key=>$value) {
                            echo "<li style='list-style: square;'>".$value."<br> </li>";
                         }?>
                    </ul> 
                    <p><?php echo "<b>year: </b> ".$movie['year'] ?></p>
                    <p>
                        <a href="movieUpload.php?id=<?php echo $movie['id'];?>" class="button">
                          Download <?php echo $movie['movie_name'] ?> 
                        </a>
                    </p>
            </div>    
     </div>
</div>
<?php require("template/footer.php"); ?>