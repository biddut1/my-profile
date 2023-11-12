<?php
   $connect=mysqli_connect("localhost","root","","project1");
   $id=$_GET['idno'];
   $read="SELECT * FROM datatable WHERE id=$id";
   $query= mysqli_query($connect,$read);
   $row=mysqli_fetch_array($query);



   if(isset($_POST['edit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $dept=$_POST['dept'];
     $img=$_FILES['img']['name'];
     $tmp_name=$_FILES['img']['tmp_name'];
     $pass=$_POST['pass'];

     $upload=move_uploaded_file($tmp_name,"img_folder/".$img);
    if($upload){
    $update="UPDATE datatable SET name='$name', email='$email', phone='$phone', dept='$dept', image='$img', password='$pass' where id=$id";
    $query=mysqli_query($connect,$update);
    if($query){
        echo"<script>alert('Data updated')</script>";
    }else{
        echo"<script>alert('Data update failed')</script>";
    }
}else{
    echo"<script>alert('Data update failed')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Profile</h2>
    <div class="container">
        <form action=""method="POST" enctype="multipart/form-data">
            <input type="text"value="<?php echo $row['name']?>"name="name"placeholder="username"><br>
            <input type="email"value="<?php echo $row['email']?>"name="email"placeholder="email"><br>
            <input type="text"value="<?php echo $row['phone']?>"name="phone"placeholder="phone"><br>
            <select name="dept">
                <option>EEE</option>
                <option>CSE</option>
                <option>SWE</option>
            </select><br>
            <input type="file"name="img"><br>
            <input type="password"name="pass"placeholder="password"><br>
            <button type="submit"name="edit">Submit</button><br>         
        </form>
        </div>
        
        <h2>DATA FETCH OR READ</h2>
        <div class="container">
        <table>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Dept</th>
            <th>Image</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
       
        <?php
            $read="SELECT * FROM datatable";
            $query=mysqli_query($connect,$read);
            
            
           while($row=mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['dept'];?></td>
                <td><img src="img_folder/<?php echo $row['image'];?>" alt=""style="width: 100px;height: 100px;"></td>
                <td><?php echo $row['password'];?></td>
                <td><a href="edit.php?idno=<?php echo $row['id']?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure?')" href="delete.php?idno=<?php echo $row['id']?>&imgid=<?php echo $row['image'];?>">Delete</a></td>
            </tr>
        <?php
            }
        ?>
         </table>
</body>
</html>