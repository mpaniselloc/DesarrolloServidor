# LibroSphere - Sistema de Gestión de Biblioteca

Aplicación web desarrollada en **PHP** siguiendo el patrón **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**. Permite el inicio de sesión con roles, el registro de nuevos usuarios, la consulta de un catálogo de libros cargado desde XML, la compra de libros y un panel de administración (ERP) para gestionar clientes y pedidos almacenados en una base de datos **MySQL**.

---

## 🚀 Características Principales

- **Autenticación contra base de datos:**
  - Usuarios almacenados en la tabla `usuarios` con contraseñas cifradas en **SHA-256**.
  - Comparación segura de contraseñas con `hash_equals()`.
- **Roles de usuario:**
  - **Administrador (`admin`):** accede al panel ERP con los módulos de gestión.
  - **Usuario estándar:** accede al catálogo de libros y puede realizar compras.
- **Control de sesión:**
  - Sesiones nativas de PHP (`$_SESSION`).
  - Cierre automático de la sesión tras **30 minutos**.
  - Las páginas de gestión y compra redirigen al inicio si no hay sesión o el rol no es el adecuado.
- **Catálogo de libros (XML):**
  - Lectura de `model/datos/libreria.xml` con **SimpleXML** (título, autor, categoría, ISBN, edición, promoción, fecha y portada).
- **Compra de libros:**
  - Botón *Comprar* en cada libro del catálogo que genera un pedido en la tabla `pedidos`.
  - El pedido se registra siempre a nombre del usuario de la sesión.
- **Registro de usuarios:**
  - Formulario de alta con pantalla de confirmación y opción de corregir datos.
  - Clasificación por categoría de edad (*Joven* / *Senior*).
  - Control de nick repetido.
- **Panel de administración (ERP):**
  - **Gestión de Clientes:** listado, modificación (nombre y edad) y eliminación de usuarios. El usuario `admin` no se puede eliminar.
  - **Gestión de Pedidos:** listado, modificación y eliminación de pedidos.
  - **Gestión de Libros:** módulo pendiente de implementar.
- **Acceso a datos seguro:**
  - Clase `BaseDatos` con conexión única (*singleton*) mediante **mysqli** y **consultas preparadas** para evitar inyección SQL.

---

## 📁 Estructura del Proyecto

```text
DesarrolloServidor/
├── index.php                    # Punto de entrada: login o panel según el rol
├── alta.php                     # Guarda el nuevo usuario en la BD
├── Altaformulario.php           # Confirmación de los datos de registro
├── comprar.php                  # Formulario y proceso de compra de un libro
├── gestionClientes.php          # Gestión de clientes (solo admin)
├── gestionPedidos.php           # Gestión de pedidos (solo admin)
├── config.ini                   # Datos de conexión a la base de datos
├── controlador/
│   ├── libreriaControlador.php  # Catálogo de libros
│   ├── pedidoControlador.php    # Compras y gestión de pedidos
│   └── usuarioControlador.php   # Login, alta y gestión de usuarios
├── model/
│   ├── bdmodel.php              # Clase BaseDatos (conexión y consultas preparadas)
│   ├── libreriaModel.php        # Lectura del XML de libros
│   ├── pedidoModel.php          # Consultas de la tabla pedidos
│   ├── usuarioModel.php         # Consultas de la tabla usuarios
│   └── datos/libreria.xml       # Catálogo de libros
├── vista/
│   ├── adminVista.php           # Panel ERP del administrador
│   ├── userVista.php            # Catálogo de libros
│   ├── altaVista.php            # Resultado del registro
│   ├── comprarVista.php         # Formulario de compra
│   ├── pedidoRealizadoVista.php # Confirmación de compra
│   ├── GestionClientesVista.php # Tabla de clientes
│   ├── editarUsuarioVista.php   # Formulario de edición de cliente
│   ├── GestionPedidosVista.php  # Tabla de pedidos
│   └── editarPedidoVista.php    # Formulario de edición de pedido
├── sesiones/controlSesiones/
│   ├── validarSesion.php        # Valida el login e inicia la sesión
│   └── cerrarSesion.php         # Cierra la sesión
└── includes/
    ├── cabecera.html / pie.html # Cabecera y pie comunes
    ├── login.php                # Formulario de acceso
    ├── form.php                 # Formulario de registro
    ├── funciones.php            # Funciones auxiliares
    ├── styles.css               # Estilos
    └── img/                     # Portadas de los libros e iconos
```

---

## 🗄️ Base de Datos

La conexión se configura en `config.ini`:

```ini
servidor = localhost
usuario = root
pasw =
baseDatos = biblioteca
```

Script para crear la base de datos con las tablas que usa la aplicación y los usuarios de prueba:

```sql
CREATE DATABASE IF NOT EXISTS biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE biblioteca;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  edad INT NOT NULL,
  nick_usuario VARCHAR(50) NOT NULL UNIQUE,
  contrasena CHAR(64) NOT NULL          -- SHA-256 en hexadecimal
);

CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  isbn VARCHAR(20) NOT NULL,
  fecha DATE NOT NULL,
  usuario VARCHAR(50) NOT NULL
);

INSERT INTO usuarios (nombre, edad, nick_usuario, contrasena) VALUES
  ('Administrador', 30, 'admin', SHA2('abcdef', 256)),
  ('Usuario',       25, 'user',  SHA2('123456', 256));
```

---

## 🔑 Credenciales de Prueba

| Rol               | Usuario | Contraseña | Vista asignada        |
| :---------------- | :------ | :--------- | :-------------------- |
| **Administrador** | `admin` | `abcdef`   | Panel ERP LibroSphere |
| **Usuario**       | `user`  | `123456`   | Catálogo de libros    |

También se pueden crear usuarios nuevos desde el enlace **Nuevo Registro** de la pantalla de acceso.

---

## 🛠️ Requisitos Técnicos

- **Servidor web:** Apache (XAMPP, WAMP o LAMP).
- **PHP:** 8.0 o superior con las extensiones `mysqli` y `SimpleXML`.
- **Base de datos:** MySQL o MariaDB.
- **Navegador:** Chrome, Firefox, Edge o Safari.

---

## ⚙️ Instalación y Puesta en Marcha

1. **Copiar el proyecto** en el directorio del servidor:
   - **XAMPP (Windows):** `C:\xampp\htdocs\DesarrolloServidor`
   - **Linux:** `/var/www/html/DesarrolloServidor` o `/opt/lampp/htdocs/DesarrolloServidor`
2. **Iniciar Apache y MySQL** desde el panel de control de XAMPP.
3. **Crear la base de datos** ejecutando el script SQL anterior en phpMyAdmin (`http://localhost/phpmyadmin`).
4. **Revisar `config.ini`** si el usuario o la contraseña de MySQL son distintos.
5. **Abrir en el navegador:**
   ```text
   http://localhost/DesarrolloServidor/
   ```

---

## 📌 Asignatura y Créditos

- **Proyecto:** Desarrollo de Aplicación Web - LibroSphere
- **Módulo:** Desarrollo Web en Entorno Servidor (DWES)
- **Autor:** Marc Panisello Chiva
