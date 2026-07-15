<?php

$conn = mysqli_connect("localhost","root","","productdb");

if(!$conn)
{
    die("Connection Failed");
}

if(isset($_POST['save']))
{

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type = $_POST['product_type'];
    $product_qty = $_POST['product_qty'];

    $image = $_FILES['product_image']['name'];
    $temp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($temp, "uploads/".$image);

    $sql = "INSERT INTO product(product_name, product_price, product_type, product_image, product_qty)
            VALUES('$product_name', '$product_price', '$product_type', '$image', '$product_qty')";

    if(mysqli_query($conn, $sql))
    {
        echo "Product Added Successfully";
    }
    else
    {
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>

<h2>Product Form</h2>

<form method="POST" enctype="multipart/form-data">

    Product Name :
    <input type="text" name="product_name" required>
    <br><br>

    Product Price :
    <input type="number" name="product_price" required>
    <br><br>

    Product Type :
    <select name="product_type" required>
        <option value="">Select Product</option>
        <option>Electronics</option>
        <option>Mobile</option>
        <option>Laptop</option>
        <option>Computer</option>
        <option>Accessories</option>
        <option>Clothes</option>
        <option>Shoes</option>
    </select>
    <br><br>

    Product Image :
    <input type="file" name="product_image" required>
    <br><br>

    Product Quantity :
    <input type="number" name="product_qty" required>
    <br><br>

    <input type="submit" name="save" value="Save Product">

</form>

</body>
</html>

