                        <?php

$dbc=mysqli_connect("localhost","root","1234","admin");
if(isset($_POST['register_btn']))
{   $title=mysqli_real_escape_string($dbc,$_POST['title']);
    $body=mysqli_real_escape_string($dbc,$_POST['body']);
  
   
            $sql="INSERT INTO post(title,body) VALUES('$title','$body')";
              mysqli_query($dbc,$sql);  
          header("Location: http://127.0.0.1:8000/home");
die();
  
}

  

?>
