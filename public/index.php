<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <!-- Loader CSS -->
    <link rel="stylesheet" href="./css/loader.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
     <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Loader  -->
    <div class="loader" id="loader"></div>

    <!-- Start Main Container -->
    <div class="container mt-5" id="main-container">
        <h1 class="mb-4">Inventory Management System</h1>
        <p class="lead">Welcome to the Inventory Management System! This is a simple system to manage your inventory.</p>
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-primary" id="newBtn"><i class="fa-solid fa-plus"></i> Create Product</button>
            <input type="text" class="form-control w-25" placeholder="Search products..." id="search-input">
        </div>
        <table class="table table-striped mt-4" id="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <!-- End Main Container -->

    <!-- Start Create Container -->
    <div class="create-container bg-light p-4 rounded" id="create-container">
        <div class="d-flex justify-content-between">
            <h3>Create Product</h3>
            <div class="btn btn-close"></div>
        </div>
        <form  id="createForm">
            <label for="product-name">Product Name</label>
            <input type="text" class="form-control" id="product-name" placeholder="Enter product name" required>
            <label for="product-price" class="mt-3">Price</label>
            <input type="number" min="0" step="0.01" class="form-control" id="product-price" placeholder="Enter product price" required>
            <label for="product-quantity" class="mt-3">Quantity</label>
            <input type="number" min="0" class="form-control" id="product-quantity" placeholder="Enter product quantity" required>
            <button type="submit" class="btn btn-success mt-4">Create</button>
        </form>
    </div>
    <!-- End Create Container -->
     
    <!-- Start Update Container -->
    <div class="update-container bg-light p-4 rounded" id="update-container">
        <div class="d-flex justify-content-between">
            <h3>Update Product</h3>
            <div class="btn btn-close"></div>
        </div>
        <form  id="updateForm">
            <label for="update-id">Product ID</label>
            <input type="number" class="form-control" id="update-id" readonly>
            <label for="product-name" class="mt-3">Product Name</label>
            <input type="text" class="form-control" id="update-pro-name" placeholder="Enter product name" required>
            <label for="product-price" class="mt-3">Price</label>
            <input type="number" class="form-control" id="update-pro-price" placeholder="Enter product price" required>
            <label for="product-quantity" class="mt-3">Quantity</label>
            <input type="number" class="form-control" id="update-pro-quantity" placeholder="Enter product quantity" required>
            <button type="submit" class="btn btn-success mt-4" id="update-btn">Update</button>
        </form>
    </div>
    <!-- Start Update Container -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Control JS -->
    <script src="./js/control.js"></script>
    <!-- App JS -->
    <script src="./js/app.js"></script>
</body>
</html>