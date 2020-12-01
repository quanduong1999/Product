
<?php
    $connect = mysqli_connect('localhost','root','','mydatabase');
    mysqli_query($connect,'SET NAMES UTF8');
    if(isset($_GET['id'])){
        $proid = $_GET['id'];
        $query = "DELETE FROM Products WHERE ProductID='$proid'";
        mysqli_query($connect,$query);
    }
    header('location:index.php');
?>