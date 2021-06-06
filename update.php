<?php

require('config/db_connect.php');
 if(isset($_POST['submit'])){
    echo $_POST['id'];
    $id_to_update = $_POST['id'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $ingridients = $_POST['ingridients'];
    
    $sql = "UPDATE pizza SET title='$title', ingridients='$ingridients', email='$email' WHERE id= $id_to_update ";

    if(mysqli_query($conn,$sql)){
      header('Location:index.php');
    }else{
      echo 'error'.mysqli_error($conn);
    }

}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql = "SELECT * FROM pizza WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $pizza = mysqli_fetch_assoc($result);


    mysqli_free_result($result);
    mysqli_close($conn);
}

/*  if(isset($_POST('submit'))){
    $id_to_update = mysqli_real_escape_string($conn,$_POST['id']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $ingridients = mysqli_real_escape_string($conn,$_POST['ingridients']);
    $sql = "UPDATE pizza SET title=$title, ingridients=$ingridients, email=$email WHERE id=$id_to_update" ;

    if(mysqli_query($conn,$sql)){
      header('Location:index.php');
    }else{
      echo 'error'.mysqli_error($conn);
    }

}*/




?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<section class="container white-text">
  <h4 class="center">update pizza</h4>
  <form action="update.php" method="POST" class="white">
    <label>Your email</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($pizza['email'])?>">
    <label>Pizza title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($pizza['title'])?>">
    <label>Ingridients (Comma separated)</label>
    <input type="text" name="ingridients" value="<?php echo  htmlspecialchars($pizza['ingridients'])?>">
    <div class="center">
    <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">submit</button>
    </div>
    

  </form>
</section>

<?php include('templates/footer.php') ?>
    

</html>
