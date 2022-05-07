<?php
require_once 'connectDB.php';

$conn = connectDB();
?>
<!DOCTYPE html>
<html>
<head>
<title>MWS Aiko Book | Update</title>
<link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
h1{
  text-align: center;
}
p{
  text-align: center;
}
</style>
</head>
<body>

<!--      THIS IS PHP       -->
<?php
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$cateID ="";
$cateName ="";
$proId= "";
$proCateID= "";	
	$proImage="";
$pname="";
$isShow = 0;
$proCost ="";
$isUpdated = 0;
if ($id !="") {
  $sql = "select proId,proCateId, proImage, proName,proCost, isShow from product where proId = $id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)) {
      $proId = $row['proId'];
  $proImage = $row['proImage'];
  $pname = $row['proName'];
  $proCost = $row['proCost'];
      $isShow = $row['isShow'];
  }
  $isUpdated = 1;
}

$sql = "select * from category";
$category = mysqli_query($conn, $sql);
?>
<button><a href="select_product.php">BACK TO PRODUCT PAGE</a></button>
<h1>PRODUCT MANAGE</h1>
<p>This is Function of Adminstrator to Insert, Edit, Delete for Product.</p>
<p></p>
<div class="container">
  <form action="insert_product.php" enctype="multipart/form-data" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
  <div class="row">
    <div class="col-25">
      <label for="proId">Product ID:</label>
    </div>
    <div class="col-75">
      <input type="text" id="proId" name="proId" value="<?php echo $proId?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="Type that Product ID">
    </div>
  </div>
	  <div class="row">
    <div class="col-25">
		
      <label for="proCateId">Choose Product Category:</label>
    </div>
    <div class="col-75">
      <select type="text" id="proCateID" name="proCateID" value="<?php echo $proCateID?>" placeholder="proCate ID..">
		<?php
    	while ($row = $category->fetch_assoc()){
			echo"
				<option value=\"".$row["cateId"]."\">".$row["cateName"]."</option>
			";
		}
    ?>
		</select>
    </div>
  </div>
	  <div class="row">
    <div class="col-25">
      <label for="proImage">Upload Product Image:</label>
    </div>
    <div class="col-75">
      <p></p>
      <input type="file" id="proImage" name="proImage" value="<?php echo $proImage?>"  >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="proName">Product Name:</label>
    </div>
    <p></p>
    <div class="col-75">
      <input type="text" id="proName" name="proName" value="<?php echo $pname?>" placeholder="Type Name of that Product">
    </div>
  </div>	
  <p></p>

	<div class="row">
    <div class="col-25">
      <label for="proCost">Product Cost ($ ...):</label>
    </div>
    <div class="col-25">
    <p></p>
    <input type="number" name="proCost" value="<?php echo $proCost?>" placeholder="Type Price of that Product">
    </div>
  </div>  
  
  <div class="row">
    <input type="submit" name="submit" value="Update" />
  </div>
  </form>
</div>

</body>
</html>
<?php 
	mysqli_close($conn);

?>
