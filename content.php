<?php 

include('config/db_connect.php');
$email = '';

$title = '';

$ingridients='';
$errors = array('email' => '','title'=>'','ingridients'=>'');

if(isset($_POST['submit'])){

 if(empty($_POST['email'])){
  $errors['email'] ='email required';
 }else{
   $email = $_POST['email'];
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email'] ='email must be of the correct addres';
  }else{}
 }
 
 if(empty($_POST['title'])){
  $errors['title']= 'title required';
}else{
 $title = $_POST['title'];
 if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
  $errors['title']= "title must be letters and spaces only";

 }else{}
}

if(empty($_POST['ingridients'])){
  $errors['ingridients']= 'atleast on ingridient is required';
}else{
  $ingridients = $_POST['ingridients'];
  if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingridients)){
    $errors['ingridients']= 'the list must be comma list';}

}


if(array_filter($errors)){
  echo 'the form has an erro';
}else{
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $ingridients = mysqli_real_escape_string($conn,$_POST['ingridients']);
  //creating sql string
  $sql = "INSERT INTO pizza(title,ingridients,email) VALUES('$title','$ingridients','$email')";

  //save to db and check
  if(mysqli_query($conn,$sql)){
    //success
    header('Location:index.php');
  }else{
    //fail to read
    echo 'error'.mysqli_error($conn);
  }
  
}
}
//print_r($errors);

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<section class="container white-text">
  <h4 class="center">add pizza</h4>
  <form action="content.php" method="POST" class="white">
    <input type="hidden" name="id_to_update" value="<?php echo $pizza['id']?>">
    <label>Your email</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
    <div class="red-text"><?php echo  $errors['email'];?></div>
    <label>Pizza title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
    <div class="red-text"><?php echo $errors['title'];?></div>
    <label>Ingridients (Comma separated)</label>
    <input type="text" name="ingridients" value="<?php echo  htmlspecialchars($ingridients)?>">
    <div class="red-text"><?php echo $errors['ingridients'];?></div>
    <div class="center">
    <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">submit</button>
    </div>
    

  </form>
</section>

<?php include('templates/footer.php') ?>
    

</html>
