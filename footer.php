<style>
    a {
        text-decoration: none;
    }
</style>
<div class="row p-5 m-0" style="background-color: #ec407a;">

<div class="container">
  <div class="row row-cols-2">
    <div class="col">
    <?php
            include('config/db.php');
            $teac = $conn->prepare('SELECT * From contact where id_con = 1');
            $teac->execute();
            $teacs = $teac->fetch();

            if (!$teacs) {
                
            }else{
              
                echo '<h2 class="text-white">'.$teacs['name'].'</h2>'.'<br>';
                echo '<h8 class="text-white">'.'<i class="fa-solid fa-phone"> :'.'</i>'.' '.$teacs['tol'].'</h8>'.'<br>';
                echo '<h8 class="text-white">'.'<i class="fa-solid fa-envelope"> :'.'</i>'.' '.$teacs['email'].'</h8>'.'<br>';
                
                echo '<div class="row"><a href='.$teacs['facebook'].'><h8 class="text-white">'.'<i class="fa-brands fa-facebook"> :'.'</i>'.' '.$teacs['facebook'].'</h8></a></div>';
               
  ?>
  
    </div>
    <div class="col">
    <div class="col-sm-12">
    <div class="card" style="width: 38rem; ">
      <?php echo $teacs['map']?>
    </div>
    </div>
    <?php } ?>
  </div>
</div>
</div>
