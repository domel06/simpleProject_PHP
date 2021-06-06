<?php 

require('config/db_connect.php');
//creating the query
$sql = 'SELECT title,ingridients,id FROM pizza ORDER BY created_at';

//exctution of the query 
$result = mysqli_query($conn,$sql);

//fetching and storing  the values in associative array

$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
// freeing result from the memory
mysqli_free_result($result);
//closing connection
mysqli_close($conn);
//printing the values
//print_r(explode(',',$pizzas[1]['ingridients']));


?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<h4 class="center white-text">pizzas</h4>
<div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza): ?>
         <div class="col s6 md3">
             <div class="card z-depth-0">
                 <img src="img/pizza.png" alt="pizza pic" class="pizza">
                 <div class="card-content center">
                     <h6><?php echo $pizza['title']?></h6>
                     <ul>
                     <div><?php foreach(explode(',',$pizza['ingridients']) as $ing): ?>
                        <li><?php echo $ing ?></li>
                     <?php endforeach;?></div>
                     </ul>
                 </div>
                 <div class="card-action right-align">
                     <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                 </div>


             </div>
         </div>
        <?php endforeach;?>
    </div>
</div>

<?php include('templates/footer.php') ?>
    

</html>
