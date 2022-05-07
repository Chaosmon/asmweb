<?php
require_once 'connectDB.php';
$conn = connectDB();
$sql = "select proId, proCateID, proImage, proName, proCost from product";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
    <title>MWS Aiko Book | Product Manage</title>
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
        td{
            text-align: center;
        }
        button{
            margin-bottom: 10px;
            text-align: center;
        }
    </style>

<body>
<button><a href="ManageProduct.php">BACK TO ADMIN PRODUCT PAGE</a></button>
    <h1>PRODUCT MANAGE</h1>
    
    <p>This is Function of Adminstrator to Insert, Edit, Delete for Product.</p>
    <button><a href="adding_product.php">CLICK HERE TO INSERT NEW PRODUCT</a></button>
    <table style="width:100%" border="1">
        <tr>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Cost ($)</th>
            <th></th>
            <th></th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['proId'] ?> </td>
                    <td><?php echo $row['proCateID'] ?></td>
                    <td><img src="<?php echo $row['proImage'] ?>" style="width:200px" ;></td>
                    <td><?php echo $row['proName'] ?></td>
                    <td><?php echo $row['proCost'] ?></td>
                    <td><a href="delete_product.php?id=<?php echo $row['proId'] ?>">DELETE</a></td>
                    <td><a href="adding_product.php?id=<?php echo $row['proId'] ?>">EDIT</a></td>

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