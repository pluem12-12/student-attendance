FROM php:8.2-cli

# ติดตั้งส่วนเสริมและระบบฐานข้อมูลให้ PHP
RUN apt-get update -y && apt-get install -y \
    libzip-dev unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# โหลดโปรแกรม Composer เข้ามาในเซิร์ฟเวอร์
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# กำหนดโฟลเดอร์ทำงานหลักและก๊อปปี้โค้ดขึ้นไป
WORKDIR /app
COPY . .

# ติดตั้งแพ็กเกจของ Laravel
RUN composer install --no-dev --optimize-autoloader

# คำสั่งสำหรับเริ่มเซิร์ฟเวอร์เมื่ออัปโหลดเสร็จ
CMD php artisan serve --host=0.0.0.0 --port=10000