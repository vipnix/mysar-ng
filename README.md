mysar-ng
========

MySQL Squid Access Report (new generation) ---> Clone off http://sourceforge.net/projects/mysar/

# 1- Install on APACHE:
Alias /mysar /srv/www/htdocs/mysar/www
<Directory "/srv/www/htdocs/mysar/www">
        Options Indexes MultiViews
        Options Indexes FollowSymLinks
        AllowOverride None
        Order allow,deny
        Allow from all
</Directory>

# 2- Install database on MYSQL:
create database mysar;
grant all privileges on mysar.* to mysar@'localhost' identified by 'mysar123';
mysql mysar < mysar.sql 


# 3- Compile Binary importer
cd mysar-web/bin/mysar-binary-importer/
make && make install


# 4- Configure your crontab
# crontab
# MYSAR - logs do squid
* * * * *      root    /usr/bin/mysar > /srv/www/htdocs/mysar/log/mysar-importer.log 2>&1

