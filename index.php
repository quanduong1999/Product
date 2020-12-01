<?php
    $connect = mysqli_connect('localhost','root','','mydatabase');
    mysqli_query($connect,'SET NAMES UTF8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>ProductID</td>
            <td>Product_desc</td>
            <td>Cost</td>
            <td>Weight</td>
            <td>Numb</td>
            <td>Xử lý</td>
        </tr>

        <?php
            $query = "SELECT * From Products";
            $result = mysqli_query($connect,$query);
            if(mysqli_num_rows($result) > 0){
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)){
                    $i++;
                    $proid = $row['ProductID'];
                    $prodesc = $row['Product_desc'];
                    $cost = $row['Cost'];
                    $weight = $row['Weight'];
                    $numb = $row['Numb'];
                    echo "<tr>";
                    echo "<td>$proid</td>";
                    echo "<td>$prodesc</td>";
                    echo "<td>$cost</td>";
                    echo "<td>$weight</td>";
                    echo "<td>$numb</td>";
                    echo "<td><a href='delete.php?id=$proid'>Xóa</a> | <a href='update.php?id=$proid'>Sửa</a></td>";
                    echo "</tr>";
                }
            }
            else{
                echo "chưa có dữ liệu";
            }
        ?>
    </table>

    <form method="post">
        <table>
            <tr>
                <td colspan="2">ProductID: </td>
<!--                <td><input type="text" name="productid"></td>-->
            </tr>
            <tr>
                <td>Product_desc: </td>
                <td><input type="text" name="productdesc"></td>
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
                <td colspan="2"><input type="submit" name="insert" value="Thêm mới"></td>
            </tr>
        </table>
    </form>


    <?php
        if(isset($_POST['insert'])){
            $proid = $_POST['productid'];
            $prodesc = $_POST['productdesc'];
            $cost = $_POST['cost'];
            $weight = $_POST['weight'];
            $numb = $_POST['numb'];
            $query = "INSERT INTO Products VALUE('$proid','$prodesc','$cost','$weight','$numb')";
            mysqli_query($connect,$query) ;
            header('location:index.php');
        }
    ?>
</body>
</html>