<?php
session_start();
include "../connection.php";

if (isset($_POST['product_id'], $_POST['user_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['userid'];
    $quantity = $_POST['quantity'];

    // Fetch the product information from the database
    $productQuery = $con->prepare("SELECT qty FROM tblproduct WHERE id = ?");
    $productQuery->bind_param("i", $product_id);
    $productQuery->execute();
    $productQuery->bind_result($available_quantity);
    $productQuery->fetch();
    $productQuery->close();

    // Check if the requested quantity is within the available quantity
    if ($available_quantity >= $quantity) {
        // Check if a row with the same product and transno=NULL exists
        $stmt = $con->prepare("SELECT id, quantity FROM tblorder WHERE user_id = ? AND product_id = ? AND transno IS NULL");
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $stmt->bind_result($existing_order_id, $existing_quantity);
        $stmt->fetch();
        $stmt->close();

        if ($existing_order_id) {
            // If a row with transno=NULL exists, check if the new quantity is within the available quantity
            $new_quantity = $existing_quantity + $quantity;

            if ($available_quantity >= $new_quantity) {
                // Quantity is available, update the quantity in the cart
                $stmt = $con->prepare("UPDATE tblorder SET quantity = ? WHERE id = ?");
                $stmt->bind_param("ii", $new_quantity, $existing_order_id);

                if ($stmt->execute()) {
                    echo json_encode(array('status' => 'success', 'message' => 'Quantity in the cart updated successfully.'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Failed to update the quantity in the cart.'));
                }

                $stmt->close();
            } else {
                // Insufficient quantity
                echo json_encode(array('status' => 'error', 'message' => 'Insufficient stock for the requested quantity of this product.'));
            }
        } else {
            // If no matching row with transno=NULL exists, insert a new record
            $stmt = $con->prepare("INSERT INTO tblorder (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);

            if ($stmt->execute()) {
                echo json_encode(array('status' => 'success', 'message' => 'Product added to the cart successfully.'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Failed to add the product to the cart.'));
            }

            $stmt->close();
        }
    } else {
        // Insufficient quantity
        echo json_encode(array('status' => 'error', 'message' => 'Insufficient stock for the requested quantity of this product.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Missing required data'));
}
?>
