# LibroSphere - Sistema de Gestión de Biblioteca

Aplicación web desarrollada en **PHP** siguiendo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**. Permite la autenticación de usuarios mediante roles, la gestión de sesiones con control de inactividad, el registro de nuevos usuarios con validación de datos y la visualización de un catálogo de libros alimentado desde un archivo XML.

---

## 🚀 Características Principales

- **Control de Acceso y Roles de Usuario:**
  - **Administrador (`admin`):** Acceso al panel de gestión / ERP.
  - **Usuario Estándar (`user`):** Acceso al catálogo interactivo de libros.
- **Seguridad y Control de Sesión:**
  - Manejo de sesiones nativas de PHP (`$_SESSION`).
  - Cierre de sesión automático por inactividad tras 30 minutos.
  - Protección de rutas y vistas contra acceso directo sin autenticación previa.
- **Catálogo de Libros mediante XML:**
  - Carga y parseo dinámico de datos bibliográficos desde `libreria.xml` usando **SimpleXML**.
- **Registro de Usuarios con POO:**
  - Uso de la clase `Usuario` con encapsulación (atributos privados, _getters_ y _setters_).
  - Clasificación automática por categorías según la edad introducida.
  - Vista de confirmación previa de los datos introducidos.

---

## 📁 Estructura del Proyecto (MVC)

```text
biblioteca/
├── assets/                  # Hojas de estilo CSS e imágenes del proyecto
│   ├── styles.css           # Estilos visuales de la aplicación
│   ├── ERP.png              # Imagen del panel de administración
│   └── portada.jpg
├── controllers/             # Controladores (Lógica de la aplicación)
│   ├── librosController.php # Conecta el modelo de libros con la vista del catálogo
│   └── validarlogin.php     # Valida credenciales, inicia sesión y redirige según rol
├── models/                  # Modelos y lógica de datos
│   ├── libreria.xml         # Fuente de datos con el catálogo de libros
│   ├── libros.php           # Modelo para la lectura y gestión del XML
│   ├── usuario.php          # Clase Usuario (POO con tipado y métodos)
│   └── validarDatos.php     # Funciones de validación de datos y credenciales
├── views/                   # Vistas (Interfaz de usuario)
│   ├── confirmarRegistro.php # Resumen de confirmación tras registrar un usuario
│   ├── header.php           # Cabecera compartida (logo, navegación)
│   ├── index.php            # Panel principal tras login (catálogo o ERP según rol)
│   ├── loginform.php        # Formulario de acceso
│   └── nuevoUsuario.php     # Formulario para el alta de nuevos usuarios
├── index.php                # Punto de entrada público de la aplicación
└── README.md                # Documentación del proyecto
```

---

## 🔑 Credenciales de Prueba

Para probar el inicio de sesión existen los siguientes usuarios configurados en el sistema:

| Rol                  | Usuario | Contraseña | Vista asignada           |
| :------------------- | :------ | :--------- | :----------------------- |
| **Administrador**    | `admin` | `abcdef`   | Panel ERP LibroSphere    |
| **Lector / Usuario** | `user`  | `123456`   | Catálogo de Libros (XML) |

---

## 🛠️ Requisitos Técnicos

- **Servidor Web:** Apache (incluido en XAMPP, WAMP o LAMP).
- **PHP:** Versión 8.0 o superior (con soporte para la extensión `SimpleXML` y sesiones activas).
- **Navegador Web:** Chrome, Firefox, Edge o Safari.

---

## ⚙️ Instalación y Puesta en Marcha

1. **Ubicar el proyecto en el servidor:**
   Copia o clona la carpeta `biblioteca` dentro del directorio raíz de documentos de tu servidor local:
   - **En XAMPP (Windows):** `C:\xampp\htdocs\biblioteca`
   - **En Linux:** `/var/www/html/biblioteca` o `/opt/lampp/htdocs/biblioteca`

2. **Iniciar el servidor Apache:**
   - Abre el panel de control de **XAMPP** y haz clic en **Start** en el servicio de **Apache**.

3. **Abrir en el navegador:**
   Accede a la siguiente dirección URL:
   ```text
   http://localhost/biblioteca/
   ```

---

## 📌 Asignatura y Créditos

- **Proyecto:** Desarrollo de Aplicación Web - LibroSphere
- **Módulo:** Desarrollo Web en Entorno Servidor (DWES)
