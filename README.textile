mysar-ng
========

MySQL Squid Access Report (new generation) ---> Clone off http://sourceforge.net/projects/mysar/


h1. MYSAR-ng Handbook

h2. Requirements:
<pre>Apache
Mysql
GCC</pre>

h2. Installation:

h3. 1- Install on APACHE:
<pre><code>Alias /mysar /srv/www/htdocs/mysar/www
<Directory "/srv/www/htdocs/mysar/www">
        Options Indexes MultiViews
        Options Indexes FollowSymLinks
        AllowOverride None
        Order allow,deny
        Allow from all
</Directory></code></pre>

h3. 2- Install database on MYSQL:
<pre><code>create database mysar;</code></pre>

<pre><code>grant all privileges on mysar.* to mysar@'localhost' identified by 'mysar123';</code></pre>

<pre><code>mysql mysar < mysar.sql </code></pre>


h3. 3- Compile Binary importer
<pre><code>cd mysar-web/bin/mysar-binary-importer/ ; make && make install</code></pre>


h3. 4- Configure your crontab
<pre><code># crontab
# MYSAR - logs do squid
* * * * *      root    /usr/bin/mysar > /srv/www/htdocs/mysar/log/mysar-importer.log 2>&1</code></pre>
