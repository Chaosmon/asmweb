<?php
require_once 'connectDB.php';
$conn = connectDB();
$sql = "select proId, proCateID, proImage, proName, proCost from product where proId=" . $_GET["proId"];
$pros = mysqli_query($conn, $sql);
$pro = "";
while ($row = $pros->fetch_assoc()) {
  $pro = $row;
}
$sql = " select * from category";
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
  <title>MWS Aiko Comic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
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
      color: red;
    }

    .h1,.h2,.h3,h1,h2,h3 {
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

    #sale {
      color: red;
    }

    .itemactive {
      margin:0px 460px 0px;
    }
  </style>
</head>

<body>
  <div class="jumbotron">
    <div class="container text-center">
      <!-- <h1><a href="index.php"><img alt=""></a></h1> -->
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

  <div class="row">
      <div class="well well-small">
        <div class="row-fluid">
          <div class="span5">
            <div id="myCarousel" class="carousel slide cntr">
              <div class="carousel-inner">
                <div class="itemactive" style="text-align: center; width:400px"><a href="#"><img src="src/<?php echo $pro["proImage"] ?>" /></a></div>
              </div>
            </div>
          </div>


          <div class="span7" style="text-align: center;">
            <h3></h3>
            <h3>Product Name: <?php echo $pro["proName"] ?></h3>
            <h3>Product Price: $<?php echo number_format($pro["proCost"], 0, ",", ".") ?></h3>
            <hr class="soft" />

            <h4>Product Detail:</h4>
            <p>These are the comic books we sell.</p>
          </div>
        </div>
        </table>
      </div>
    </div>
  </div>

</body>
<footer class="container-fluid text-center">
  <p>© 2020 Aiko Book.</p>
  </form>
</footer>

</html>