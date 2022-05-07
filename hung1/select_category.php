<?php
require_once './connectDB.php';
$conn = connectDB();
$sql = "select cateId, cateName, modifyDate from category";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
  <title>MWS Aiko Book | Category Manage</title>
</head>

<style>
  h1 {
    text-align: center;
    font-family: "Times New Roman";
  }
  p{
            text-align: center;
        }
  th {
    text-align: center;
  }

  td {
    text-align: center;
  }
  button{
            margin-bottom: 10px;
            text-align: center;
        }
</style>

<body>
  <button><a href="ManageProduct.php">BACK TO ADMIN PRODUCT PAGE</a></button>
  <h1>CATEGORY MANAGE</h1>
      <p>This is Function of Adminstrator to Insert, Edit, Delete for Category.</p>
      <button><a href="adding_category.php">CLICK HERE TO INSERT NEW CATEGORY</a></button>
      
      <table style="width:100%" border="1">
        <tr>
          <th>Catgory ID</th>
          <th>Category Name</th>
          <th>Modify Date</th>
          <th></th>
          <th></th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row['cateId'] ?> </td>
              <td><?php echo $row['cateName'] ?></td>
              <td><?php echo $row['modifyDate'] ?></td>
              <td><a href="delete_category.php?id=<?php echo $row['cateId'] ?>">Delete</a></td>
              <td><a href="adding_category.php?id=<?php echo $row['cateId'] ?>">Edit</a></td>
            </tr>

        <?php }
        } else {
          echo "0 results";
        }
        mysqli_close($conn);
        ?>
      </table>
</body>

</html>