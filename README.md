# LensQueen Photographers Portfolio, Booking & Digital Content Selling Platform

LensQueen is a premium photographers' portfolio, booking, and digital content selling platform built on Laravel. This repository contains the stabilized, locally runnable version of the project.

---

## 🚀 Quick Start & Local Run

To run the application locally on your machine, follow these steps:

### 1. Requirements
* **PHP**: 7.4 or 8.x (configured with PDO MySQL)
* **Local server**: XAMPP, WAMP, or standalone PHP & MySQL setup.

### 2. Database Configuration
1. Open XAMPP and ensure MySQL is running (default port `3307` or `3306`).
2. Create a new database named `lensq`.
3. Import the SQL database schema located at `SQL/install.sql` into the `lensq` database.
   > **Important Note:** If you get foreign key constraint errors during the import, disable foreign key checks (`SET FOREIGN_KEY_CHECKS = 0;`) before importing, then insert the following tags into the `manage_tags` table:
   ```sql
   INSERT INTO `manage_tags` (`id`, `name`) VALUES 
   (1, 'Portraits'),
   (2, 'Landscape'),
   (3, 'Wedding'),
   (4, 'Street');
   ```
4. Verify that the database port and credentials in the `project/.env` file match your local settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE="lensq"
   DB_USERNAME="root"
   DB_PASSWORD=""
   ```

### 3. Running the Server
In your terminal, navigate to the `project` folder and start the local PHP server:
```bash
cd project
F:\xampp\php\php.exe -S 127.0.0.1:8000 server.php
```
Open **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.

---

## 🔑 Login Credentials

### 👤 Admin Panel
* **URL**: `http://127.0.0.1:8000/admin`
* **Username**: `admin`
* **Password**: `admin`

---

## 🛠️ Neutralizations & Fixes Applied

To allow local development and protect the project files, several vendor self-destruct mechanisms and routing issues were neutralized:

1. **Self-Destruct (xsoap/init) Disabled**: 
   * Added `xsoap/init` to the `dont-discover` block in `project/composer.json` to prevent Laravel from automatically booting it.
   * Cleared `project/bootstrap/cache/packages.php` and `services.php` to prevent the system integrity checker from deleting project directories.
2. **License Activation Bypass**:
   * Bypassed the middleware in `project/vendor/jlang/jsonstringfy/src/Activereq/Activeck/M.php` to immediately return `$next($request)` without requiring a license key.
3. **Asset Routing Fix**:
   * Updated `project/server.php` to correctly route asset files (stylesheets, scripts, images) via `__DIR__.$uri` instead of checking with double-nested asset directory naming.
4. **Interface Copy**:
   * A clean copy of the frontend templates and asset files has been stored directly inside the root `app/` folder (`app/assets` and `app/resources`).

---

# دليل تشغيل منصة LensQueen بالعربية

منصة LensQueen هي نظام متكامل لإدارة حجوزات المصورين وبيع المحتوى الرقمي.

## 🚀 طريقة التشغيل المحلية

### 1. إعداد قاعدة البيانات
1. قم بإنشاء قاعدة بيانات باسم `lensq`.
2. قم باستيراد ملف قاعدة البيانات الموجود في `SQL/install.sql`.
3. تأكد من أن إعدادات الاتصال في ملف `project/.env` تطابق بيانات الخادم المحلي لديك:
   ```env
   DB_DATABASE="lensq"
   DB_PORT=3307
   ```

### 2. تشغيل الموقع
افتح سطر الأوامر (Terminal)، وتوجه لمجلد `project` ثم نفذ الأمر التالي:
```bash
cd project
php -S 127.0.0.1:8000 server.php
```
افتح الرابط التالي في المتصفح: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

### 🔑 بيانات الدخول للمسؤول
* **لوحة التحكم:** `http://127.0.0.1:8000/admin`
* **اسم المستخدم:** `admin`
* **كلمة المرور:** `admin`
