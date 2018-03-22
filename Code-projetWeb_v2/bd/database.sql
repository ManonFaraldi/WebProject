create database if not exists GJG_site character set utf8 collate utf8_unicode_ci;
use GJG_site;

grant all privileges on GJG_site.* to '_user'@'localhost' identified by 'secret';
