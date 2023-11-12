<?php
    $connect=mysqli_connect("localhost","root","","project1");
   $id=$_GET['idno'];
   $read="SELECT * FROM datatable WHERE id=$id";
   $query= mysqli_query($connect,$read);
   $row=mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>BIODATA</h2>
    <div class="container">
        <h3><?php echo $row['name'];?></h3>
<table>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Dept</th>
            <th>Image</th>
            <th>Print</th>
            <tr>
            <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['dept'];?></td>
                <td><img src="img_folder/<?php echo $row['image'];?>" alt=""style="width: 100px;height: 100px;"></td>
                <td><button onclick="window.print()">Print</button></td>
            </tr>

</table>
</div>
</body>
</html>