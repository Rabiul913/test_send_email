<?php
  if(isset($_GET["page"])){

    $page=$_GET["page"];
    // echo "<script>alert('ho')</script>";
    if($page=="/"){
        include("pages/default.php");
    }elseif($page=="deal"){
        include("pages/deal.php");
    }

}