<?php

class m_0001_create_customers_table
{
    public function up()
    {
        "CREATE TABLE customers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL UNIQUE,
                address VARCHAR(255) NOT NULL,                                
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
    }

    public function down()
    {
        "DROP TABLE customers;";
    }
}
