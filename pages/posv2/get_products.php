<?php
include '../connection.php';

// Check if a category ID is specified (including the 'all' case)
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    if ($category_id === 'all') {
        // Load all products
        $sql = "SELECT * FROM tblproduct";
    } else {
        // Load products for the specified category
        $sql = "SELECT * FROM tblproduct WHERE cat_id = $category_id";
    }

    $result = $con->query($sql);

    if ($result) {
        $products = array();

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        echo json_encode($products);
    } else {
        echo 'Error in fetching products: ' . $con->error;
    }
} else {
    echo 'Category ID is not specified.';
}

$con->close();
?>
