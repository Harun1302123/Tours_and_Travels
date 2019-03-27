<?php
	require("../Model/saveSpotData.php");
    session_start(); 
    if (!isset($_SESSION['username'])) {
        header('location: ../View/signIn.php');
        
    }
    if (isset($_GET['logout'])) {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../View/signIn.php");
        
    }
    $uploader=$_SESSION['username'];
	$target_dir = "../Model/Uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $spotname ="";
    $spotarea ="";
    $spotregion="";
    $spotregion123="";
    $placetype = "";
	$description="";
    $spotimage = "";
    
    $ok=1;
    global $ok1;
    $ok1=1;



	
	
	if(isset($_POST["submit"])) {
        if (!empty($_POST['sname'])) {
            $spotname = $_POST['sname'];
        }
        elseif (empty($_POST['sname'])) {
            echo"<p>Spot Name is required.</p>";
            $ok=0;
            
        }
		
		
        if (!empty($_POST['sarea'])) {
			$spotarea = $_POST['sarea'];
        }
        elseif (empty($_POST['sarea'])) {
            echo"<p>Spot Area is required.</p>";
            $ok=0;
            
        }

		
        if (!empty($_POST['sregion'])) {
                $spotregion123 = $_POST['sregion'];
                $spotregion123=strtolower($spotregion123);
                $spotregion123=ucfirst($spotregion123);
                if($spotregion123=="Dhaka")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Chittagong")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Rangpur")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Khulna")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Barishal")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Rajshahi")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Sylhet")
                {
                    $spotregion=$spotregion123;
                }
                else if($spotregion123=="Mymensingh")
                {
                    $spotregion=$spotregion123;
                }
                else
                {
                    echo"<p>Wrong SpotRegion</p>";
                    $ok=0;
                    
                }
                    
        }
        elseif (empty($_POST['sregion'])) {
            echo"<p>Spot Region is required.</p>";
            $ok=0;
            
        }

        if (!empty($_POST['splacetype'])) {
            $placetype = $_POST['splacetype'];
        }
        elseif (empty($_POST['splacetype'])) {
            echo"<p>Place Type is required.</p>";
            $ok=0;
            
        }
		
		if (!empty($_POST['sdescription'])) {
            $description = $_POST['sdescription'];
        }
        elseif (empty($_POST['sdescription'])) {
            echo"<p>Description is required.</p>";
            $ok=0;
           
        }
		
		

        if (!empty($_FILES['fileToUpload']['name'])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check == false) {
                echo"<p>File is not an image.</p>";
                $ok=0;
                   
            }
            elseif (file_exists($target_file)) {
                echo"<p>This image is already exists.</p>";
                $ok=0;
                
            }
            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo"<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $ok=0;
                
            }
            elseif($_FILES["fileToUpload"]["size"] > 1000000) {
                echo"<p>Sorry, your file is too large.</p>";
                $ok=0;
                
            }
            else {
                $spotimage = $_FILES['fileToUpload']['name'];
                
            }
        }
        elseif (empty($_FILES['fileToUpload']['name'])) {
            echo"<p>spot Image is required.</p>";
            $ok=0;
            
        }
    }

	
	
	if ($ok == 1) {
        //writetoTEXT();

        $sql2 = "INSERT INTO spotdata (username, sname, sarea, sregion, splacetype, sdescription, spotimage)
VALUES ('$uploader','$spotname','$spotarea','$spotregion','$placetype','$description','$spotimage')";


saveSpotData($sql2);

if ($ok1 == 1) 
{
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

echo"<p>Upload Successful. Back to your Profile. <a href='../View/profile.php'>Click</a> Here.</p>";
}
else{
    echo"<p>Upload failed.</p>";
}
}
    else
    {
        echo"<p>Upload failed.</p>";
    }
?>