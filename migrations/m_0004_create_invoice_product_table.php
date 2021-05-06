<?php

class m_0004_create_invoice_product_table
{
    public function up()
    {
        "CREATE TABLE invoice_product(
                invoice_id INT NOT NULL ,
                product_id INT NOT NULL,
                quantity INT NOT NULL,                                
                total FLOAT NOT NULL,
                PRIMARY KEY (invoice_id, product_id)),
                FOREIGN KEY (invoice_id) REFERENCES invoices(id),
                FOREIGN KEY (product_id) REFERENCES products(id),
            )  ENGINE=INNODB;";
    }

    public function down()
    {
        "DROP TABLE invoice_product;";
    }
}
