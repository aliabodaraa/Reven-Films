<?php include('config/db_connect.php');//for conn?>
<?php require("template/header.php");
?>

<?php  

?>
<h3>Contact Form</h3>

<div class="container">
  <form action="" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." onkeyup="var start = this.selectionStart;
                                                                                  var end = this.selectionEnd;
                                                                                  this.value = this.value.toUpperCase();
                                                                                  this.setSelectionRange(start, end);">
    <label for="lname"> E-mail</label>
    <input type="text" id="email" name="email" placeholder="Your Email..">

    <label for="lname"> password</label>
    <input type="text" id="password" name="password" placeholder="*****">

    <label for="Number_children">Number_children</label>
    <select id="Number_children" name="Number_children">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>>
    </select>
 
    <div class= form-check-inline">
        <label for="birthday">Birthday</label><br>
        <input type="date" id="birthday" name="birthday"><br><br>
</div>
<div class="form-check form-check-inline">
          <label for="male_female">Male/Female</label><br>
          <input type="radio" id="male" name="male_female" value="male">
          <label for="html">male</label>
          <input type="radio" id="female" name="male_female" value="female">
          <label for="female">female</label><br><br>
</div>
<div class="form-check form-check-inline">
          <label for="married_notmarried">married/Not married</label><br>
          <input type="radio" id="married" name="married_notmarried" value="married">
          <label for="married">married</label>
          <input type="radio" id="notmarried" name="married_notmarried" value="notmarried">
          <label for="notmarried">notmarried</label><br><br>
 </div>    
    <input type="submit" name="submit" value="Submit">
  </form>
</div>