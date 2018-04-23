                      <?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '1234', 'admin');

$input = filter_input_array(INPUT_POST);

$title = mysqli_real_escape_string($connect, $input["title"]);
$body = mysqli_real_escape_string($connect, $input["body"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE post 
 SET title = '".$title."', 
 body = '".$body."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM post 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>

    