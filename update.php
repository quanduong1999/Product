<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <table>
        <tr>
            <td>ProductID: </td>
            <td><input type="text" name="productid"value="<?php $_GET['id']?>" ></td>
        </tr>
        <tr>
            <td>Product_desc: </td>
            <td><input type="text" name="productdesc" ></td>
        </tr>
        <tr>
            <td>Cost: </td>
            <td><input type="text" name="cost"></td>
        </tr>
        <tr>
            <td>Weight: </td>
            <td><input type="text" name="weight"></td>
        </tr>
        <tr>
            <td>Numb: </td>
            <td><input type="text" name="numb"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="update" value="Cập nhật"></td>
        </tr>
    </table>
    <?php
    $connect = mysqli_connect('localhost','root','','mydatabase');
    mysqli_query($connect,'SET NAMES UTF8');
        if(isset($_POST['update'])){
            $proid = $_GET['id'];
            $prodesc = $_POST['productdesc'];
            $cost = $_POST['cost'];
            $weight = $_POST['weight'];
            $numb = $_POST['numb'];
            $query = "UPDATE Products SET Product_desc ='$prodesc', Cost = '$cost', Weight = '$weight', Numb = '$numb' WHERE ProductID = '$proid'";
            mysqli_query($connect,$query) or die("Cập nhật không thành công");
            header('location:index.php');
        }
    ?>
</form>
</body>
</html>