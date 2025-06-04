# 📘 Proyecto Final - Desarrollo y Técnicas de Aplicaciones Web

**Equipo:** #1  
**Tema:** Registro de Vehículos

---

## 🔧 Requisitos del Proyecto

Este proyecto Laravel incluye:

- ✅ CRUD completo con control de permisos y validaciones.
- ✅ Uso de LocalStorage y SessionStorage.
- ✅ Eventos JavaScript (click, submit, etc.).
- ✅ Consumo de API externa con `axios` y visualización en interfaz.
- ✅ Uso de Bootstrap para diseño y validaciones.

---

## 🛠️ Pasos para ejecutar el proyecto

---

### 📥 Paso 1: Clonar el repositorio

```bash
git clone https://github.com/Doisaac/proyecto-dtw.git

```
---

### 📦 Paso 2: Instalar dependencias de PHP

Luego, se deben instalar las dependencias de PHP utilizando Composer:

```bash
composer install
```
---

### 🧶 Paso 3: Instalar dependencias de Node

A continuación, se deben instalar las dependencias de Node.js ejecutando:

```bash
npm install
```
---
### 🛢️ Paso 4: Migrar la base de datos

Es necesario crear una base de datos llamada `laravel` en MySQL. Para ello, se puede ejecutar el siguiente comando:

```bash
CREATE DATABASE laravel;
```
Después de crear la base de datos, se debe ejecutar la migración con el siguiente comando:

```bash
php artisan migrate
```

🔐 **Configurar archivo `.env`**

Es importante verificar que el archivo `.env` tenga la siguiente configuración para conectar la base de datos correctamente:

```env
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD= [ingrese la contraseña de su gestor de base de datos]
```
Si se tiene contraseña, agrégala después de DB_PASSWORD= 

---

### 🔄 Paso 5: Llenar la base de datos con usuarios

Después de migrar las tablas, se debe llenar la tabla de usuarios con datos de ejemplo ejecutando el siguiente comando:


```bash
php artisan db:seed
```
Esto insertará los usuarios en la tabla `users`, los usuarios creados son:

- **Administrador:**
  - Usuario: `admin`
  - Contraseña: `1234`

- **Usuario normal:**
  - Usuario: `usuario`
  - Contraseña: `1234`

---

### ▶️ Paso 6: Iniciar el servidor

Una vez instaladas las dependencias, se puede iniciar el servidor ejecutando el siguiente comando:

```bash
php artisan serve
```

Por lo que ahora se puede acceder al proyecto desde la web usando los siguientes datos de inicio de sesión:

-**Usuario administrador:** Usuario: `admin`, Contraseña: `1234`
- **Usuario normal:** Usuario: `usuario`, Contraseña: `1234`
  
---




## 👥 Integrantes del Grupo
|            **Nombre**                            | **Carnet** |
|--------------------------------------------------|------------|
| **Hazel Azucena Calderón Bonilla**               | `CB22014`  |
| **Douglas Isaac Barrera Magaña**                 | `BM22025`  |
| **Ricardo Enrique Heredia Ramos**                | `HR21024`  |
| **Gabriel Omar Calderón Calderón**               | `CC22060`  |
| **Fernando José Rosales Valdes**                 | `RV19012`  |
