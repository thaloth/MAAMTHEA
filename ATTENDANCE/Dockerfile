FROM dunglas/frankenphp:php8.3

RUN install-php-extensions mysqli pdo_mysql

COPY . /app/public
COPY Caddyfile /app/Caddyfile

WORKDIR /app/public

CMD ["frankenphp", "run", "--config", "/app/Caddyfile", "--adapter", "caddyfile"]
