CREATE DATABASE IF NOT EXISTS symfony_db_test;
CREATE USER  IDENTIFIED with 'root';
GRANT ALL PRIVILEGES ON symfony_db_test.* TO 'root' WITH GRANT OPTION;