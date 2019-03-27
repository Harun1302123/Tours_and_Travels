<?php
require("../Model/loadUserData.php");
  $cred=array();
  $sql="select * from userdata where username='".$_POST["username"]."'";
  loadData($sql);
  $flag=0;

  foreach($cred as $a){
  if($_POST["username"]==$a["un"] && $_POST["email"]==$a["email"])
  {
    $flag=1;
    
  }
  
  
}
if($flag==1)
{
mysql_connect("localhost","root","");
mysql_select_db("database");
$email=$_REQUEST["email"];
$query=mysql_query("select * from userdata where email='$email'");
$row=mysql_fetch_array($query);
//include("PHPMailerAutoload.php");
require("../Model/PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "toursandtravels12345@gmail.com";
  $mail->Password = "tour12345678";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "toursandtravels12345@gmail.com";
  $mail->FromName = "ToursandTravels";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "ToursandTravels Service";
  $mail->Body = "<i>This is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   header("location:../View/signIn.php");
  }
}
else
{
  echo"<p>Username and Email doesn't matched. <a href='../View/forgetPassword.php'>Try Again</a></p>";
}

?>