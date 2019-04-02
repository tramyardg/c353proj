- [x] refactor book table to have categories as enum
- [x] create account page for employee
- [x] integrate employee registration backend in the front end
- [x] login page for employee
- [ ] index page for employee
- [x] implement book backend
- [ ] view single book page
- [x] display book per category in customer index landing page
- [ ] implement authors backend
- [ ] associate authors with book

https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon
https://stackoverflow.com/questions/2435216/how-to-create-comma-separated-list-from-array-in-php
https://www.codeofaninja.com/2014/09/php-shopping-cart-tutorial-using-cookies.html

INSERT INTO publisher_orders(
    shipment_id,
    publisher_id,
    book_id,
    qty_ordered,
    date_received
)
SELECT
    shipment_id,
    publisher_id,
    book_id,
    qty_ordered,
    date_requested
FROM
    shipments
WHERE
    publisher_id = 1;
    
    ## table use for fulfilling employee/bookstore orders
    ## receive order means updating the status to shipped (nothing more than that)
    ## one-to-one relationship with shipments
    ## so I think when a bookstore employee orders a book
    ## it will be inserted in shipments (1) and publisher_orders (2)
    ## when a publisher updates a publisher_orders row,
    ## the entry that corresponds the shipment will be updated as well
    ## field to be updated in bookstore side: status, date received
    # CREATE TABLE IF NOT EXISTS `publisher_orders`
    # (
    #   `publisher_order_id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    #   `publisher_id`       INT(4)             NOT NULL,
    #   `book_id`            INT(4)             NOT NULL,
    #   `shipment_id`        INT(4)             NOT NULL,                        ## use to update the shipment in the bookstore
    #   `qty_ordered`        INT                NOT NULL,                        ## quantity ordered by employee/bookstore
    #   `date_shipped`       DATE                          DEFAULT '0000-00-00', ## will be updated when publisher updates the status to SHIPPED
    #   `date_received`      DATE,                                               ## the date when the employee/bookstore made a request
    #   `status`             ENUM ('PROCESSING','SHIPPED') DEFAULT 'PROCESSING', ## publisher will update the status
    #   FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
    #   FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`shipment_id`),
    #   FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`)
    # );