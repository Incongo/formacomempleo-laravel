# 🧩 Portal de Empleo – Laravel 10

Aplicación web desarrollada en Laravel 10 que permite la gestión completa de ofertas de empleo, empresas, candidatos y postulaciones.  
Incluye autenticación, roles, dashboards personalizados, subida de archivos, filtros avanzados y panel de administración.

## 🚀 Características principales

### 👥 Roles de usuario

- Administrador
- Empresa
- Candidato

Cada rol tiene su propio dashboard y permisos.

## 🏗️ Tecnologías utilizadas

- Laravel 10
- PHP 8+
- MySQL
- TailwindCSS
- Blade Components
- Jetstream + Sanctum
- Alpine.js
- Storage público para fotos y CVs

## 📁 Estructura del proyecto

app/
├── Http/
│ ├── Controllers/
│ │ ├── AdminController.php
│ │ ├── EmpresaController.php
│ │ ├── CandidatoController.php
│ │ ├── OfertaController.php
│ │ └── PostulacionController.php
│ └── Middleware/
├── Models/
│ ├── User.php
│ ├── Empresa.php
│ ├── Candidato.php
│ ├── Oferta.php
│ └── Postulacion.php
resources/
├── views/
│ ├── admin/
│ ├── empresa/
│ ├── candidato/
│ ├── ofertas/
│ └── components/
routes/
├── web.php
└── api.php

## 🔐 Sistema de roles

El sistema utiliza un campo "role" en la tabla users con valores: admin, empresa, candidato.  
Cada rol tiene su propio middleware: role:admin, role:empresa, role:candidato.

## 📝 Funcionalidades implementadas

### ✔ Registro personalizado

- Registro separado para empresa y candidato.
- Validación completa.
- Creación automática de modelos relacionados.

### ✔ Gestión de ofertas (empresa)

- Crear, editar, eliminar.
- Ver detalle de oferta.
- Ver candidatos inscritos.
- Cambiar estado de postulaciones.
- Vista responsive con grid de 3 columnas en PC.

### ✔ Gestión de postulaciones

- El candidato puede postularse con mensaje.
- La empresa puede ver CV, mensaje, aceptar o rechazar.
- Modal con detalles del candidato.

### ✔ Dashboard empresa

- Ofertas activas
- Total de ofertas
- Candidatos inscritos
- Pendientes / aceptadas / rechazadas

### ✔ Dashboard candidato

- Ofertas disponibles
- Postulaciones realizadas
- Filtros por estado y fecha
- Vista responsive en grid

### ✔ Dashboard administrador

- Ofertas activas globales
- Total de postulaciones
- Pendientes / aceptadas / rechazadas

## 📤 Subida de archivos

El candidato puede subir foto y CV.  
Los archivos se guardan en:

storage/app/public/fotos  
storage/app/public/cv

Crear enlace público:

php artisan storage:link

## 🔍 Filtros implementados

### Empresa

- Estado
- Fecha desde / hasta
- Palabras clave (mensaje o CV)

### Candidato

- Estado
- Fecha desde / hasta

## 🧪 Pendiente de implementar

- Panel completo de administración
- Notificaciones por email
- Chat empresa–candidato
- Gráficas estadísticas
- Buscador global
- Paginación
- Favoritos
- Ofertas destacadas

## ⚙️ Instalación

git clone <repo>  
cd proyecto  
composer install  
npm install && npm run build  
cp .env.example .env  
php artisan key:generate  
php artisan migrate  
php artisan storage:link  
php artisan serve

## 👨‍💻 Autor

Proyecto desarrollado por Pablo.

## 📜 Licencia

MIT
