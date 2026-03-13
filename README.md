# Inventory Management System (IMS)

![IMS Screenshot](./screenshots/index.png)

## Overview

Inventory Management System (IMS) is a **Full-Stack web application** built with **PHP (OOP), MySQL, JavaScript, and Bootstrap**.  
The system allows users to **manage products**, perform **CRUD operations**, and search products with a clean, interactive interface enhanced by **SweetAlert** notifications.

This project demonstrates **modular backend architecture, REST-like API, and responsive frontend design**, making it suitable for learning full-stack development or showcasing in a CV.

---

## Features

- **Product Management (CRUD)**:
  - Create, Read, Update, Delete products
  - Search products by name
- **REST-like API**: All operations handled via `productApi.php` with JSON responses
- **User-friendly Frontend**:
  - Interactive UI with **Bootstrap**
  - SweetAlert notifications for actions
  - Loading animations for better UX
- **Database**:
  - MySQL database stores product information
  - Easy to expand for future features
- **OOP PHP**: Backend built using Object-Oriented Programming

---

## Technologies Used

| Layer | Technology |
|-------|------------|
| Backend | PHP (OOP) |
| Database | MySQL |
| Frontend | HTML, CSS, JavaScript, Bootstrap |
| Notifications | SweetAlert2 |
| Data Exchange | JSON via REST-like API |

---

## Installation

1. **Clone the repository:**

```bash
git clone https://github.com/Khalid-Safi207/ims.git
```

2. **Create MySQL database:**

```sql
CREATE DATABASE ims;
```

3. **Import the database schema:**

```sql
USE ims;
SOURCE database/ims_schema.sql;
```

4. **Configure database connection:**

- Open `private/classes/Database.php`  
- Set your `host`, `username`, `password`, and `database name`

5. **Run the project**:

- Place project in your web server root (XAMPP, WAMP, or similar)  
- Open in browser: `http://localhost/ims/public/`

---

## API Endpoints (REST-like)

All product operations are handled via **`private/api/productApi.php`** using HTTP methods:

| Operation | Method | URL |
|-----------|--------|-----|
| Get all products | GET | `productApi.php` |
| Get product by ID | GET | `productApi.php?id=1` |
| Search product | GET | `productApi.php?search=mouse` |
| Create product | POST | `productApi.php` |
| Update product | PUT | `productApi.php` |
| Delete product | DELETE | `productApi.php` |

**Request/Response format:** JSON  

```json
{
  "id": 1,
  "name": "Laptop",
  "price": 1200,
  "quantity": 5
}
```

---

## Folder Structure

```
ims/
│
├─ private/
│   ├─ classes/          # PHP classes (Product, Database)
│   └─ api/              # REST-like API files
│
├─ public/               # Frontend files (HTML, JS, CSS)
├─ database/             # SQL schema file
├─ screenshots/          # Project screenshots
└─ README.md
```

---

## How to Use

1. **View Products:** Go to the dashboard to see all products.  
2. **Add Product:** Fill in the form and submit to create a new product.  
3. **Edit Product:** Click edit button on a product row to modify it.  
4. **Delete Product:** Click delete button and confirm action via SweetAlert.  
5. **Search Products:** Use the search bar to find products by name.  

All actions communicate with `productApi.php` using **JSON requests and responses**.

---

## Why This Project is Important

- Demonstrates **Full-Stack development skills**: Frontend + Backend + Database  
- Uses **OOP PHP**, a professional coding standard  
- Implements **REST-like API** for data exchange  
- Interactive and responsive **UI/UX**  
- Suitable for **portfolio/CV** to showcase real-world skills

---

## Future Improvements

- Convert `productApi.php` into a **full RESTful API** with proper endpoints (`/api/products/{id}`)  
- Add **HTTP status codes** for all responses  
- Implement **Authentication & Authorization (JWT)**  
- Add **Pagination & Filters** for large datasets  
- Expand system to include **Categories, Users, Orders, Reports**

---

## Author

**Khalid Safi**  
- GitHub: [Khalid-Safi207](https://github.com/Khalid-Safi207)  
- Email: your-email@example.com  

---

## License

This project is licensed under the **MIT License**.
