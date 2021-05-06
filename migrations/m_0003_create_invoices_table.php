<?php

class m_0003_create_invoices_table
{
    public function up()
    {
        "CREATE TABLE invoices(
                id INT AUTO_INCREMENT PRIMARY KEY,
                date DATE NOT NULL,
                quantity INT NOT NULL,                                
                total FLOAT NOT NULL, 
                customer_id INT NOT NULL,                                                       
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                INDEX `customer_id_index` (`customer_id`),                
                FOREIGN KEY (customer_id) REFERENCES customers(id),                      
            )  ENGINE=INNODB;";
    }

    public function down()
    {
        "DROP TABLE invoices;";
    }
}
