📋 Requisitos Previos
PHP 7.4+

MySQL 5.7+ o MariaDB 10.2+

Composer (instalado globalmente)

Node.js 14+ (solo necesario si modificas Tailwind CSS)

Servidor web (Apache/Nginx) o PHP built-in server (php spark serve).

🚀 Instalación Paso a Paso

1. Clonar y Configurar el Proyecto

git clone https://github.com/onuez59/theatreFlow.git
cd theatreFlow
cp env .env # Copiar archivo de entorno
composer install # Instalar dependencias de CodeIgniter 4

📂 Estructura Clave

/theatre-flow
├── app/
│ ├── Controllers/ # Cobras.php, Cventas.php
│ ├── Models/ # ObraModel.php, VentaModel.php
│ └── Views/ # Vistas (index, comprar, confirmacion)
├── public/
│ ├── assets/ # Tailwind CSS, imágenes
│ └── index.php # Punto de entrada
├── database/
│ └── theatreflow.sql # Esquema SQL inicial
└── .env # Variables de entorno

⚙️ Configuración Avanzada

1. Configurar URL Base
   Edita app/Config/App.php:
   public $baseURL = 'http://localhost/theatreFlow'; // Cambiar por tu dominio
2. Configuración de Base de Datos
   Ajusta app/Config/Database.php
   public $default = [
   'DSN' => '',
   'hostname' => 'localhost', // Servidor DB
   'username' => 'root', // Usuario
   'password' => '', // Contraseña
   'database' => 'theatreFlow', // Nombre DB
   'DBDriver' => 'MySQLi', // Driver (MySQLi, Postgre, etc.)
   'DBPrefix' => '', // Prefijo de tablas (opcional)
   'port' => 3306, // Puerto
   ];
3. En la ruta app/database se encuentra el archivo sql para restaurar la Bd.
   -theatreflow.sql

📌 Notas de Producción
Cambia CI_ENVIRONMENT a production en .env.

📜 Licencia
MIT License - Libre para uso y modificación.
