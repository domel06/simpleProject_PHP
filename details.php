<?php
include('config/db_connect.php');



if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $sql = "DELETE  FROM pizza WHERE id=$id_to_delete";

   if( mysqli_query($conn,$sql)){
    header('Location:index.php');
   }else{
       echo 'errro'.mysqli_error($conn);
   }

   
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    //sql
    $sql = "SELECT * FROM pizza WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    //fetch the row 
    $pizza = mysqli_fetch_assoc($result);

    //free memory
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<div class="container center">
    <?php if($pizza):?>
        <h4> <?php echo $pizza['title']?></h4>
        <p>Created by:<?php echo $pizza['email'] ?></p>
        <p>Created at date:<?php echo $pizza['created_at'] ?></p>
        <p>ingridients:<?php echo $pizza['ingridients'] ?></p>
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>
       <a href="update.php?id=<?php echo $pizza['id']?>" class="brand-text">UPDATE</a>
        
        

    <p><?php else:?></p>
       <p>no such pizza exist</p>
    <p><?php endif;?></p>
</div>

<?php include('templates/footer.php') ?>

</html>

