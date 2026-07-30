<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'], $_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        $imageName = '';
        $selectStmt = mysqli_prepare($conn, "SELECT product_image FROM product WHERE id = ?");
        if ($selectStmt) {
            mysqli_stmt_bind_param($selectStmt, 'i', $id);
            mysqli_stmt_execute($selectStmt);
            mysqli_stmt_bind_result($selectStmt, $imageName);
            mysqli_stmt_fetch($selectStmt);
            mysqli_stmt_close($selectStmt);
        }

        $deleteStmt = mysqli_prepare($conn, "DELETE FROM product WHERE id = ?");
        if ($deleteStmt) {
            mysqli_stmt_bind_param($deleteStmt, 'i', $id);
            mysqli_stmt_execute($deleteStmt);

            if (mysqli_stmt_affected_rows($deleteStmt) > 0) {
                $message = 'Product deleted successfully.';
                if (!empty($imageName) && file_exists(__DIR__ . '/uploads/' . $imageName)) {
                    @unlink(__DIR__ . '/uploads/' . $imageName);
                }
            } else {
                $message = 'No product found with the selected ID.';
            }

            mysqli_stmt_close($deleteStmt);
        } else {
            $message = 'Failed to prepare delete statement.';
        }
    } else {
        $message = 'Invalid product ID for deletion.';
    }
}

$query = "SELECT id, product_name, product_price, product_type, product_image, product_qty FROM product";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        img { max-width: 120px; height: auto; display: block; }
        .message { margin-bottom: 16px; padding: 12px; background: #f0f8ff; border: 1px solid #b3d4fc; }
        .actions a { margin-right: 12px; }
        .delete-button { padding: 6px 10px; color: #fff; background: #d9534f; border: none; cursor: pointer; }
        .delete-button:hover { background: #c9302c; }
    </style>
</head>
<body>
    <h1>Delete Product</h1>

    <?php if ($message !== ''): ?>
        <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['product_price']); ?></td>
                        <td><?php echo htmlspecialchars($row['product_type']); ?></td>
                        <td>
                            <?php if (!empty($row['product_image'])): ?>
                                <img src="uploads/<?php echo htmlspecialchars($row['product_image']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['product_qty']); ?></td>
                        <td>
                            <form method="post" onsubmit="return confirm('Delete this product?');">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" name="delete" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products available for deletion.</p>
    <?php endif; ?>

    <div class="actions">
        <a href="product.php">Add New Product</a>
        <a href="display_product.php">View Products</a>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
