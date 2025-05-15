# Proyecto con Docker
# Prueba de Video, envio de cambios al repositorio

Este proyecto utiliza Docker para gestionar un entorno de desarrollo con **MySQL**, **phpMyAdmin** y un servidor web para PHP.

## 🚀 Requisitos Previos
Asegúrate de tener instalados:
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## 📦 Instalación y Configuración
1. Clona el repositorio en tu máquina local:
   ```bash
   mkdir SIGVA
   git clone https://github.com/farkot09/SIGVA.git
   cd SIGVA
   ```

2. Construye y levanta los contenedores:
   ```bash
   docker-compose up -d --build
   ```

3. Verifica que los contenedores están corriendo:
   ```bash
   docker ps
   ```

4. Accede a **A la App** para iniciar sesion:
   - URL: [http://localhost/?page=login&action=login](http://localhost/?page=login&action=login)


5. Accede a **phpMyAdmin** para administrar la base de datos:
   - URL: [http://localhost:8080](http://localhost:8080)
   - Usuario: `root`
   - Contraseña: `root`

## 📂 Estructura del Proyecto
```
📦 tu_repositorio
├── 📂 src              # Código fuente del proyecto PHP
│   ├── index.php       # Archivo principal
│   ├── controllers     # Controladores
│   ├── models          # Modelos de la base de datos
│   └── views           # Vistas
├── 📄 docker-compose.yml  # Configuración de Docker
├── 📄 Dockerfile       # Configuración del servidor web
└── 📄 README.md        # Este archivo
```

## 🔄 Reiniciar Contenedores
Si necesitas reiniciar los contenedores, usa:
```bash
docker-compose down && docker-compose up -d --build
```

## 🛠 Solución de Problemas
### 1️⃣ Error de conexión a MySQL: `SQLSTATE[HY000] [2002] No such file or directory`
🔹 **Solución:** Asegúrate de que la variable de host en `Database.php` es **mysql** y no `localhost`.
```php
private $host = "mysql";
```
### 2️⃣ Advertencias de sesión activa en PHP
🔹 **Solución:** Antes de `session_start()`, verifica si ya hay una sesión activa:
```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

---

📌 Ahora ya puedes comenzar a desarrollar en tu entorno Dockerizado. 🚀

