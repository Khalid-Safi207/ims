
// GET ELEMENTS
const createContainer = document.getElementById("create-container");
const newBtn = document.getElementById("newBtn");
const createBtnClose = document.querySelector("#create-container .btn-close");
const updateBtnClose = document.querySelector("#update-container .btn-close");

// Open Create Form
newBtn.onclick = () => {
    createContainer.style.left = '50%';

}
// Close Create Form
createBtnClose.onclick = () => {
    createContainer.style.left = '-100%';
}


// Open Update Form (SHOW PRODUCT INFORMATION IN UPDATE FORM)
function openUpdateForm(id) {

    // Get Product Information From Database
    fetch(`.././private/api/productApi.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            const updateContainer = document.getElementById("update-container");
            updateContainer.style.left = '50%';
            document.getElementById("update-id").value = id;
            loader.style.display = 'flex';

            // Populate the update form with the retrieved data

            document.getElementById("update-pro-name").value = data.name;
            document.getElementById("update-pro-price").value = data.price;
            document.getElementById("update-pro-quantity").value = data.quantity;
            loader.style.display = 'none';
        })
        .catch(e => {
            loader.style.display = 'none';
            swal.fire({
                title: "Error!",
                text: "Failed to fetch product information.",
                icon: "error",
                confirmButtonText: "OK"
            })
        });
}

// CLOSE UPDATE FORM
updateBtnClose.onclick = () => {
    const updateContainer = document.getElementById("update-container");
    updateContainer.style.left = '-100%';
}