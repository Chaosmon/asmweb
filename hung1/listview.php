<?php
require_once './connectDB.php';
$conn = connectDB();
$sql = " select * from category where cateName='RAINCOATS'";
$cats = mysqli_query($conn, $sql);
function findProByCat($id)
{
	global $conn;
	$sql = "select * from product where proCateID=" . $id;
	$pro = mysqli_query($conn, $sql);
	return $pro;
}
$sql = "select * from product";
$allPros = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MWS Aiko Book | All Products Available</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
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
      background-color: #f2f2f2;
      padding: 25px;
    }

    .jumbotron{
      background : white;
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
.container{
  text-align: center;
}
.notication{
  text-align: center;
  font-weight: bold;
  color: red;
}
.h1, .h2, .h3, h1, h2, h3 {
    margin-top: 20px;
    margin-bottom: 25px;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #1f568b;
    border-color: #1f568b;
    font-weight: bold;
}
.panel-primary>.panel-footer {
font-weight: bold;
}

#sale{
  color: red;
}

  </style>
</head>

<body>
  <div class="jumbotron">
    <div class="container text-center">
      <!-- <h1><a href="index.php"><img src="" alt=""></a></h1> -->
      <h1>MWS Aiko Book</h1>
      <p><h4> New Comic Update Every Day</h4></p>
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

  <div class="container">    
  <h2 style="font-weight: bold;">ALL PRODUCTS AVAILABLE</h2>
  <div id="product">
          <?php
            while ($row = $allPros->fetch_assoc()) {
              echo "
              <div class=\"row-fluid\">	  
                <div class=\"span2\">
                  <a href=\"productdetail.php?proId=" . $row["proId"] . "\"><img src=\"" . $row["proImage"] . "\" alt=\"floral set 1\" width=\"158\" height=\"165\"/></a>
                </div>

                <div class=\"span6\">
                  <h4>" . $row["proName"] . "</h4>
                </div>
                  <div class=\"span4 alignR\">
                  <form class=\"form-horizontal qtyFrm\">
                  <h4 class=\"product_price\">$ " . number_format($row["proCost"], 0, ",", ".") . " </h4>
                  <div class=\"btn-group\">
                    <a href=\"#\" class=\"defaultBtn\"><span class=\" icon-shopping-cart\"></span>Add To Cart</a>
                    </div>
                    <a href=\"productdetail.php?proId=" . $row["proId"] . "\" class=\"shopBtn\">View Detail</a>
                    <p>______________________________________________</p>
                  </div>
              </div>";
            }
          ?>
  </div>

  <!-- FOOTER-->
  <footer class="container-fluid text-center">
    <p>© 2020 MWS Aiko Book.</p>
    </form>
  </footer>
</body>
</html>