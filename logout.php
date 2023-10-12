<?php

session_start();

unset($_SESSION['ID']);
unset($_SESSION['Username']);
unset($_SESSION['Firstname'] );
unset($_SESSION["Lastname"]);
unset($_SESSION["Tel"]);
unset($_SESSION["Userlevel"]);

//unset($_SESSION["shopping_cart"]);  
{
    echo "<script>
    alert('ออกจากระบบ ');
    window.location.replace('index.php');
    </script>";

}?>