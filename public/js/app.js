// GET ELEMENTS
const loader = document.getElementById('loader');
const mainContainer = document.getElementById('main-container');
const productsTable = document.getElementById('products-table');
const searchInp = document.getElementById('search-input');
const createForm = document.getElementById("createForm");
const updateForm = document.getElementById("updateForm");


// GET FUNCTIONS
getAllProducts();
searchInp.addEventListener('input', searchProducts);
createForm.onsubmit = (e) => {
    e.preventDefault();
    createProduct();
};
updateForm.onsubmit = (e) => {
    e.preventDefault();
    updateProduct();
}

// Get All Products
function getAllProducts() {

    loader.style.display = 'flex';
    mainContainer.style.display = 'none';

    return fetch('.././private/api/productApi.php',{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            loader.style.display = 'none';
            mainContainer.style.display = 'block';
            data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.price}</td>
                    <td>${product.quantity}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="openUpdateForm(${product.id})">Edit</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteProduct(${product.id})">Delete</button>
                    </td>
                `;
                productsTable.querySelector('tbody').appendChild(row);
            });
        })
        .catch(error => {
            loader.style.display = 'none';
                swal.fire({
                    title: "Error!",
                    text: "Failed to fetch products.",
                    icon: "error",
                    confirmButtonText: "OK"
                })
            console.error('Error fetching products:', error);
        });
}

// Search In Products
function searchProducts() {
    const query = searchInp.value.toLowerCase();
    fetch('.././private/api/productApi.php?search=' + query,{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }
    )
        .then(response => response.json())
        .then(data => {
            // Clear existing rows
            productsTable.querySelector('tbody').innerHTML = '';

            // Append new rows
            data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.price}</td>
                    <td>${product.quantity}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="openUpdateForm(${product.id})">Edit</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteProduct(${product.id})">Delete</button>
                    </td>
                `;
                productsTable.querySelector('tbody').appendChild(row);
            });
        })
        .catch(error => {
            swal.fire({
                title: "Error!",
                text: "Failed to search products.",
                icon: "error",
                confirmButtonText: "OK"
            })
            console.error('Error searching products:', error);
        });
}

// Create Product
function createProduct() {
    const name = document.getElementById("product-name");
    const price = document.getElementById("product-price");
    const quantity = document.getElementById("product-quantity");

    fetch('.././private/api/productApi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: name.value,
            price: price.value,
            quantity: quantity.value
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal.fire({
                title: "Success!",
                text: data.message,
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                location.reload();
            });
        } else {
            // Handle errors (validation or other)
            const errorMsg = data.error_message || data.message || 'An error occurred';
            swal.fire({
                title: "Error!",
                text: errorMsg,
                icon: "error",
                confirmButtonText: "OK"
            })
        }
    })

}

// Update Product
function updateProduct() {
    fetch('.././private/api/productApi.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: document.getElementById("update-id").value,
            name: document.getElementById("update-pro-name").value,
            price: document.getElementById("update-pro-price").value,
            quantity: document.getElementById("update-pro-quantity").value
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal.fire({
                title: "Success!",
                text: data.message,
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                location.reload();
            });
        } else {
            const errorMsg = data.error_message || data.message || 'An error occurred';
            swal.fire({
                title: "Error!",
                text: errorMsg,
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    })
    .catch(error => {
        swal.fire({
            title: "Error!",
            text: "Failed to update product.",
            icon: "error",
            confirmButtonText: "OK"
        });
        console.error('Error updating product:', error);
    });
}

// Delete Product
function deleteProduct(id){
    swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('.././private/api/productApi.php', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal.fire({
                            title: "Success!",
                            text: data.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        const errorMsg = data.error_message || data.message || 'An error occurred';
                        swal.fire({
                            title: "Error!",
                            text: errorMsg,
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                })
                .catch(error => {
                    swal.fire({
                        title: "Error!",
                        text: "Failed to delete product.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                    console.error('Error deleting product:', error);
                });
            }
        });
}