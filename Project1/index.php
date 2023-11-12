<?php
    $connect=mysqli_connect("localhost","root","","project1");
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dept=$_POST['dept'];
    $img=$_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    $pass=$_POST['pass'];

    $upload=move_uploaded_file($tmp_name,"img_folder/".$img);
    if($upload){
    $query="INSERT INTO datatable (name, email, phone, dept, image, password) VALUES ('$name','$email','$phone','$dept','$img','$pass')";
    $insert=mysqli_query($connect,$query);
  }else{
    echo "data upload failed";
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
    <h2>Insert Data</h2>
    <div class="container">
        <form action=""method="POST" enctype="multipart/form-data">
            <input type="text"name="name"placeholder="username"><br>
            <input type="email"name="email"placeholder="email"><br>
            <input type="text"name="phone"placeholder="phone"><br>
            <select name="dept">
                <option>EEE</option>
                <option>CSE</option>
                <option>SWE</option>
            </select><br>
            <input type="file"name="img"><br>
            <input type="password"name="pass"placeholder="password"><br>
            <button type="submit"name="submit">Submit</button><br>         
        </form>
        </div>

        <h2>DATA FETCH OR READ</h2>
        <div class="container">
        <form action="" method="post">
            <input type="text"name="search_name"placeholder="Enter search name..."style="width:70%">
            <button name="search_btn" style="width:20%">Search</button>
        </form>

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
            <th>Show</th>
       
        <?php
            $search_name='';
            if(isset($_POST['search_btn'])){
                $search_name=$_POST['search_name'];
            }
            $read="SELECT * FROM datatable WHERE name LIKE '%$search_name%' ORDER BY id desc";
            $query=mysqli_query($connect,$read);
            
            $i=1;
           while($row=mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['dept'];?></td>
                <td><img src="img_folder/<?php echo $row['image'];?>" alt=""style="width: 100px;height: 100px;"></td>
                <td><?php echo $row['password'];?></td>
                <td><a href="edit.php?idno=<?php echo $row['id']?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure?')" href="delete.php?idno=<?php echo $row['id']?>&imgid=<?php echo $row['image'];?>">Delete</a></td>
                <td><a href="show.php?idno=<?php echo $row['id']?>">Show</a></td>
            </tr>
        <?php
        $i++;
            }
        ?>
       
         </table>
         </div>
</body>
</html>