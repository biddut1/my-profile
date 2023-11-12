<?php
 $connect=mysqli_connect("localhost","root","","project1");
 $id=$_GET['idno'];
 $imgid=$_GET['imgid'];
 $delete="DELETE FROM datatable WHERE id=$id";
 $query= mysqli_query($connect,$delete);
 if($query){
    unlink("img_folder/".$imgid);
    header("location:index.php");
}else{
    echo"<script>alert('Data Delete failed')</script>";
 }
?>