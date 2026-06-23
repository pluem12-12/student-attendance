FROM php:8.2-cli

# ติดตั้ง Node.js (สำหรับหน้าบ้าน Vite) และส่วนเสริม PHP
RUN apt-get update -y && apt-get install -y \
    libzip-dev unzip libpq-dev curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# โหลดโปรแกรม Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# กำหนดโฟลเดอร์ทำงานและก๊อปปี้โค้ด
WORKDIR /app
COPY . .

# 1. ติดตั้งแพ็กเกจระบบหลังบ้าน (PHP)
RUN composer install --no-dev --optimize-autoloader

# 2. ติดตั้งแพ็กเกจระบบหน้าบ้าน (CSS/JS) และสั่งประกอบร่าง (Build)
RUN npm install
RUN npm run build

# คำสั่งสำหรับเริ่มเซิร์ฟเวอร์
CMD php artisan serve --host=0.0.0.0 --port=10000