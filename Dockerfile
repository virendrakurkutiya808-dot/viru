FROM php:8.2-apache
COPY ./var/wwww/html/
EXPOSE 80
CMD ["apache2-foreround"]
