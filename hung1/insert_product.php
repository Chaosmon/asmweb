<?php
require_once 'connectDB.php';

$conn = connectDB();

	
        $controlUpdate = $_POST['controlUpdate'];
        $proid = $_POST['proId'];
	    $proCateID = $_POST['proCateID'];
//	   	$proImage = $_POST['proImage'];
		
		$pname = $_POST['proName'];
	echo 'pro Cost ='.$_POST['proCost'];
		$proCost= $_POST['proCost'];
       
$uploads_dir='img';
//	$nameImg="";
            if($_FILES){
                //Get the name of the uploaded file
                $name = $_FILES['proImage']['name'];
                //Move the file to the server
                move_uploaded_file($_FILES['proImage']['tmp_name'],"$uploads_dir/$name");  
				$proImage ="$uploads_dir/$name";
            }

//		$strUpImge =  $nameImg != "" ? "proImage='$nameImg',": "";
        $new_date=date('Y-m-d'); 
        if ($controlUpdate == 1) {
            $sql = "UPDATE product SET proCateID=$proCateID, proName='$pname', proCost = $proCost WHERE proId=$proid";
        } else {
            $sql = "INSERT INTO	product(proId, proCateID, proImage, proName, proCost) values($proid, $proCateID, '$proImage', '$pname', $proCost)";
        }
		
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:select_product.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    

mysqli_close($conn);


?>
