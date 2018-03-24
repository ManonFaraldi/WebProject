create database if not exists JGG_site character set utf8 collate utf8_unicode_ci;
use JGG_site;

grant all privileges on JGG_site.* to '_user'@'localhost' identified by 'secret';
