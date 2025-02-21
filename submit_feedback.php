<?php

require 'config.php';

$Name=$_POST["name"];
$Email=$_POST["email"];
$Feedback=$_POST["feedback"];

$sql="INSERT INTO feedback VALUES('$Name','$Email','$Feedback')";

if($con->query($sql))
{
    
    echo "<script>
    alert('Feedback successfully inserted.');
    window.location.href = 'feedback.php';
</script>";
}

$con->close();

?>





    

    


    

    

