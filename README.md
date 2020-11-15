# ORM-Doctrine
doctrine

1) run setup.sql 
2) create all lines with Mysql workbench. (you must create schema "app10db", use it, create tables.)
3) open command line inside the project directory
4) php composer.phar dump-autoload
5) vendor\bin\doctrine orm:schema-tool:update --force --dump-sql (if you use windows CMD)
6) vendor/bin/doctrine orm:schema-tool:update --force --dump-sql (if you use git bash / mac / linux terminals)
7) open "http://localhost/app10/" in your browser.

