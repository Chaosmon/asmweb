<?php
require_once 'connectDB.php';
$conn = connectDB();
$sql = "select * from category";
$category = mysqli_query($conn, $sql);
function findProByCat($id)
{
  global $conn;
  $sql = "select proName, proId, proCateID from product where proCateID=" . $id;
  $pro = mysqli_query($conn, $sql);
  return $pro;
}
$sql = "select * from product";
$allPros = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
  <title>MWS Aiko Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home_format.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    #menu ul {
    list-style-type: none;
    background: grey;
    text-align: center;
    }

    .jumbotron {
      margin-bottom: 0;
    }

    footer {
      background-color: #CCC;
      padding: 25px;
    }

    .jumbotron {
      background: white;
    }

    .jumbotron {
      padding-top: 0px;
      padding-bottom: 0px;
      font-style: italic;
    }

    footer {
      background-color: white;
      padding: 0px;
    }

    .container {
      text-align: center;
    }

    .notication {
      text-align: center;
      font-weight: bold;
      color: green;
    }

    .h1,.h2,.h3,h1,h2,h3 {
      margin-top: 20px;
      margin-bottom: 25px;
    }

    .panel-primary>.panel-heading {
      color: #333;
      background-color: #666;
      border-color: #999999;
      font-weight: bold;
    }

    .panel-primary>.panel-footer {
      font-weight: bold;
    }

    #sale {
      color: red;
    }

    #productview{
      text-align: center;
    }

  </style>
</head>

<body>
  <div class="jumbotron">
    <div class="container text-center">
      <!-- <h1><a href="index.php"><img src="" alt=""></a></h1> -->
      <p>
        <h1>MWS Aiko Book</h1>
        <h4>New Comic Update Every Day</h4>
      </p>
    </div>
  </div>

  <div id="menu">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="listview.php">LIST VIEW</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      <li><a href="admin.php">(ADMIN)</a></li>
    </ul>
  </div>

  <div class="notication">
    <h2>Comic Hot</h2>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">TOP 1 - solo leveling</div>
          <div class="panel-body"><img src="src/img/solo leveling.jpg" class="img-responsive"  alt="Image"></div>
          <div class="panel-footer" id="sale">$ 10 (SALE!)</div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">TOP 2 - sword art online</div>
          <div class="panel-body"><img src="src/img/sword art online.jpg" class="img-responsive"  alt="Image"></div>
          <div class="panel-footer"> $ 12</div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">TOP 3 - Doraemon</div>
          <div class="panel-body"><img src="src/img/doraemon.jpg" class="img-responsive"  alt="Image"></div>
          <div class="panel-footer">$ 10</div>
        </div>
      </div>
    </div>
  </div><br>
  
  <!--SAMPLE PRODUCTS-->
  <div class="notication">
    <h2>All  New Products!</h2>
  </div>
  <div id="productview">
    <div class="body">
      <div class="dropdown">
        <button class="dropbtn">CATEGORY</button>
        <div class="dropdown-content">
          <div class="content">
            <?php
            while ($row = $category->fetch_assoc()) {
              echo "  <a href='index.php?cateId=" . $row["cateId"] . "'>
              <option value=\"" . $row["cateId"] . "\">" . $row["cateName"] . "</option> </a>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- PRODUCTS -->
    <div class="row">
      <?php
      if (isset($_GET["cateId"])) {
        $cateId = $_GET["cateId"];
        $sql2 = "select proId,proCateID,proImage,proName,proCost from product where proCateID=" . $cateId;
      } else {
        $sql2 = "select proId,proCateID,proImage,proName,proCost from product";
      }
      // echo $sql2;
      $product = mysqli_query($conn, $sql2);
      while ($row = $product->fetch_assoc()) {
        echo   '
        <div id="category" class="col-sm-4" >
          <a href="productdetail.php?proId=' . $row["proId"] . '">
        <div>
          <div><img src="' . $row["proImage"] . '"style="width:65%" style="length:25%" ></div>
          <div>' . $row["proName"] . '</div>
          <div>' . $row["proCost"] . ' $</div>
        </div></a></div>';
      } ?>
    </div>
    <!-- FOOTER-->
    <footer class="container-fluid text-center">
      <hr>
      <p>© 2020 MWS Aiko Book.</p>
      </form>
    </footer>

</body>
</html>