<link href="css/admin.css" rel="stylesheet" />
<?php

    include('db.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM `menu` WHERE id = $id";

    mysqli_query($conn, $sql);

    if($conn->query($sql) === TRUE){
        echo "Course Deleted Successfully";
    }else{
        echo "Error in Deleting Course";
    }

    header('location:index.php');
   
?>