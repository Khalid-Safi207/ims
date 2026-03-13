<?php
require_once '../classes/Product.php';
$product = new Product();
// Get the input data from the request body

header('Content-Type: application/json');

// Create a new product
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $product->name = $data['name'];
    $product->price = $data['price'];
    $product->quantity = $data['quantity'];
    $result = $product->create();
    echo json_encode($result);
}

// Get all products or a specific product by ID or search by name
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!isset($_GET['id']) && !isset($_GET['search'])) {
        $result = $product->getAll();
        echo json_encode($result);
    } 
    if(isset($_GET['id'])) {
        $product->id = $_GET['id'];
        $result = $product->getById();
        echo json_encode($result);
    }
    if(isset($_GET['search'])) {
        $name = $_GET['search'];
        $result = $product->search($name);
        echo json_encode($result);
    }
}
//  Update a product
if($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $product->id = $data['id'];
    $product->name = $data['name'];
    $product->price = $data['price'];
    $product->quantity = $data['quantity'];
    $result = $product->update();
    echo json_encode($result);
}

// Delete a product
if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $product->id = $data['id'];
    $result = $product->delete();
    echo json_encode($result);
}