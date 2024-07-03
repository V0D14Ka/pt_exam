FROM ubuntu:latest 

ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY . /var/www/html

RUN apt-get update && apt-get install apache2 php libapache2-mod-php php-mysql -y
RUN a2enmod rewrite 

CMD [ "/usr/sbin/apache2ctl", "-D", "FOREGROUND" ]