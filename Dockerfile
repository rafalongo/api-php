RUN if command -v a2enmod >/dev/null 2>&1; then \
        a2enmod rewrite headers \
    ;

docker-php-ext-install pdo pdo_sqlite pdo_mysql mysqli;
