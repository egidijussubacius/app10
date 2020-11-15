# ORM-Doctrine
doctrine
1) Download and paste all files to C:\Program Files\Ampps\www\app10
2) run setup.sql 
3) create all lines with Mysql workbench. (you must create schema "app10db", use it, create tables.)
4) open command line inside the project directory
5) php composer.phar dump-autoload
6) vendor\bin\doctrine orm:schema-tool:update --force --dump-sql (if you use windows CMD)
7) vendor/bin/doctrine orm:schema-tool:update --force --dump-sql (if you use git bash / mac / linux terminals)
8) open "http://localhost/app10/" in your browser.

