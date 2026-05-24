# Aplikasi Mini CRUD dengan MySQLi (OOP Style)

## Deskripsi
Aplikasi web sederhana untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data produk. Menggunakan **MySQLi OOP** dan **prepared statement** untuk keamanan.

## Style MySQLi yang Digunakan
- **Object-oriented style**: `new mysqli()`, `$conn->prepare()`, `bind_param()`, `execute()`.
- Keuntungan: Kode lebih terstruktur, mudah diintegrasikan dengan OOP lainnya, dan mendukung exception handling.

## Struktur Database
```sql
CREATE DATABASE db_crud;
USE db_crud;

CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
