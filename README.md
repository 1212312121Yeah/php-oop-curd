Project Test for BJC company by bas chaiwat s. (2022-02-13)

1. Install database
2. Create table name "md-service"
3. Create Column and insert data
    "
        CREATE TABLE `md_service` (
        `id` int(10) NOT NULL,
        `company_code` varchar(255) DEFAULT NULL,
        `name` varchar(255) DEFAULT NULL,
        `asset_desc` varchar(255) DEFAULT NULL,
        `image` varchar(255) DEFAULT NULL,
        `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    "
4. Create primary key column
    "
        ALTER TABLE `md_service`
        ADD PRIMARY KEY (`id`);
    "
5. Create AUTO INCREMENT column
    "
        ALTER TABLE `md_service`
        MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
    "
6. Add Project to directory in web server solution stack or docker LAMP stack 
7. Run web server or run command php "php -S localhost:80"
8. Config database in db.php file