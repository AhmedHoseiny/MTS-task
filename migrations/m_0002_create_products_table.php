<?php

class m_0002_create_products_table
{
    public function up()
    {
        "CREATE TABLE products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                price FLOAT NOT NULL,                                
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
    }

    public function down()
    {
        "DROP TABLE products;";
    }
}
