<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "house_super");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id = $_GET['rm'];
 
// Attempt insert query execution
$sql = "DELETE FROM component WHERE id = '$id'";
if(mysqli_query($link, $sql)){
    echo "Records removed successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

header('Location: app.php');

?>