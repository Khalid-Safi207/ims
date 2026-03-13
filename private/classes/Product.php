<?php
// Get the database connection
require_once '../config/Database.php';
// Get the Validation File
require_once '../config/Validator.php';

// Start Product class For CRUD operations
class Product {
    public $id;
    public $name;
    public $price;
    public $quantity;
    private $conn;
    private $validator;
    // Constructor to initialize the database connection
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->validator = new Validator();
    }

    // Validate the input data
    public function checkIdValidation() {
        if(isset($this->id)){
            if($this->validator->validateId($this->id)['is_valid']){
                return $this->validator->validateId($this->id);
            }else{
                return $this->validator->validateId($this->id);
            }
        }       
    }
    public function checkNameValidation(){
        if($this->validator->validateName($this->name)['is_valid']){
            return $this->validator->validateName($this->name);
        }else{
            return $this->validator->validateName($this->name);
        }
    } 
    public function checkPriceValidation(){
        if($this->validator->validatePriceAndQuantity($this->price)['is_valid']){
            return $this->validator->validatePriceAndQuantity($this->price);
        }else{
            return $this->validator->validatePriceAndQuantity($this->price);
            
        }
    }
    public function checkQuanValidation(){
         if($this->validator->validatePriceAndQuantity($this->quantity)['is_valid']){
            return $this->validator->validatePriceAndQuantity($this->quantity);
        }else{
            return $this->validator->validatePriceAndQuantity($this->quantity);
        }
    }

   


    // ****************************** //
    // ****************************** //
    // *****CRUD FUNCTIONS START***** //
    // ****************************** //
    // ****************************** //


    // Get all products 

    public function getAll() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById() {
        if($this->checkIdValidation()['is_valid']){
            $this->id = $this->checkIdValidation()['value'];
            // Prepare the SQL statement
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            // Execute the statement
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return $this->checkIdValidation();
        }
    }
    // Search for products by name
    public function search($name) {
        $sql = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$name%";
        $stmt->bindParam(':name', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    


    // Create a new product
    public function create() {
        if($this->checkNameValidation()['is_valid']) {
            if($this->checkPriceValidation()['is_valid']) {
                if($this->checkQuanValidation()['is_valid']) {
                    $this->name = $this->checkNameValidation()['value'];
                    $this->price = $this->checkPriceValidation()['value'];
                    $this->quantity = $this->checkQuanValidation()['value'];
                    // Prepare the SQL statement
                    $sql = "INSERT INTO products (name, price, quantity) VALUES (:name, :price, :quantity)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':name', $this->name);
                    $stmt->bindParam(':price', $this->price);
                    $stmt->bindParam(':quantity', $this->quantity);
                    // Execute the statement
                    if($stmt->execute()) {
                        return ['success' => true, 'message' => 'Product created successfully'];
                    }else{
                        return ['success' => false, 'message' => 'Failed to create product'];
                    }
                }
                else{
                    return $this->checkQuanValidation();
                }
            }
            else{
                return $this->checkPriceValidation();
            }
        }
        else{
            return $this->checkNameValidation();
        }
    }

    // Update a product
    public function update(){
          if($this->checkNameValidation()['is_valid']) {
            if($this->checkPriceValidation()['is_valid']) {
                if($this->checkQuanValidation()['is_valid']) {
                    if($this->checkIdValidation()['is_valid']) {
                        $this->name = $this->checkNameValidation()['value'];
                        $this->price = $this->checkPriceValidation()['value'];
                        $this->quantity = $this->checkQuanValidation()['value'];
                        $this->id = $this->checkIdValidation()['value'];
                        // Prepare the SQL statement
                        $sql = "UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id = :id";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(':name', $this->name);
                        $stmt->bindParam(':price', $this->price);
                        $stmt->bindParam(':quantity', $this->quantity);
                        $stmt->bindParam(':id', $this->id);
                        // Execute the statement
                        if($stmt->execute()) {
                            return ['success' => true, 'message' => 'Product updated successfully'];
                        }else{
                            return ['success' => false, 'message' => 'Failed to update product'];
                        }
                    }
                    else{
                        return $this->checkIdValidation();
                    }
                }
                else{
                    return $this->checkQuanValidation();
                }
            }
            else{
                return $this->checkPriceValidation();
            }
        }
        else{
            return $this->checkNameValidation();
        }
        
    }

    // Delete a product
    public function delete(){
        
        if($this->checkIdValidation()['is_valid']) {
            $this->id = $this->checkIdValidation()['value'];
            // Prepare the SQL statement
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            // Execute the statement
            if($stmt->execute()) {
                return ['success' => true, 'message' => 'Product deleted successfully'];
            }else{
                return ['success' => false, 'message' => 'Failed to delete product'];
            }
        }
        else{
            return $this->checkIdValidation();
        }
    }


     
    // ****************************** //
    // ****************************** //
    // *****CRUD FUNCTIONS END******* //
    // ****************************** //
    // ****************************** //


}