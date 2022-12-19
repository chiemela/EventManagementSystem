CREATE TABLE `event`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `first_name` VARCHAR(225) NOT NULL , 
    `last_name` VARCHAR(225) NOT NULL , 
    `phone` VARCHAR(225) NOT NULL , 
    `email` VARCHAR(1035) NOT NULL , 
    `password` VARCHAR(1035) NOT NULL , 
    `address` VARCHAR(1035) NOT NULL , 
    `location` VARCHAR(225) NOT NULL , 
    `role` VARCHAR(25) NULL , 
    `last_updated_datetime` DATETIME NULL , 
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `event`.`service` (
    `service_id` INT NOT NULL AUTO_INCREMENT , 
    `service_name` VARCHAR(225) NOT NULL , 
    `service_cost` DECIMAL(12, 2) NOT NULL , 
    `service_type` VARCHAR(225) NOT NULL , 
    `service_description` VARCHAR(1035) NOT NULL , 
    `service_availability_status` VARCHAR(1035) NOT NULL ,
    `service_last_updated_datetime` DATETIME NULL , 
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`service_id`)
) ENGINE = InnoDB;

CREATE TABLE `event`.`booking` (
    `booking_id` INT NOT NULL AUTO_INCREMENT ,
    `user_id` INT NOT NULL ,
    `booking_service_id` DECIMAL(12, 2) NOT NULL , 
    `booking_date` DATE NOT NULL , 
    `booking_time` VARCHAR(225) NOT NULL ,
    `booking_creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`booking_id`) ,
    CONSTRAINT `user_id` FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `event`.`payments` (
    `payments_id` INT NOT NULL AUTO_INCREMENT ,
    `transaction_ref` VARCHAR(50) NOT NULL , 
    `customer_id` INT NOT NULL ,
    `booking_id` INT NOT NULL ,
    `service_id` INT NOT NULL ,
    `transaction_status` VARCHAR(225) NOT NULL , 
    `transaction_creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`payments_id`) ,
    CONSTRAINT `customer_id` FOREIGN KEY (customer_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE ,
    CONSTRAINT `booking_id` FOREIGN KEY (booking_id) REFERENCES booking (booking_id) ON DELETE CASCADE ON UPDATE CASCADE ,
    CONSTRAINT `service_id` FOREIGN KEY (service_id) REFERENCES service (service_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;



// for testing
CREATE TABLE `event`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `first_name` VARCHAR(225) NOT NULL , 
    `last_name` VARCHAR(225) NOT NULL , 
    `phone` VARCHAR(225) NOT NULL , 
    `email` VARCHAR(1035) NOT NULL , 
    `password` VARCHAR(1035) NOT NULL , 
    `address` VARCHAR(1035) NOT NULL , 
    `location` VARCHAR(225) NOT NULL , 
    `role` VARCHAR(25) NULL , 
    `last_updated_datetime` DATETIME NULL , 
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `event`.`service` (
    `service_id` INT NOT NULL AUTO_INCREMENT , 
    `service_name` VARCHAR(225) NOT NULL , 
    `service_cost` DECIMAL(12, 2) NOT NULL , 
    `image` varchar(75) NOT NULL , 
    `service_availability_status` VARCHAR(1035) NOT NULL ,
    `service_last_updated_datetime` DATETIME NULL , 
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`service_id`)
) ENGINE = InnoDB;

CREATE TABLE `event`.`booking` (
    `booking_id` INT NOT NULL AUTO_INCREMENT ,
    `user_id` INT NOT NULL ,
    `transaction_ref` VARCHAR(150) NOT NULL , 
    `booking_service_id` VARCHAR(150) NOT NULL ,
    `booking_cost` DECIMAL(12, 2) NOT NULL , 
    `booking_date` DATE NOT NULL , 
    `booking_time` VARCHAR(225) NOT NULL ,
    `number_of_person` INT NOT NULL ,
    `transaction_status` VARCHAR(225) NOT NULL , 
    `booking_creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`booking_id`)
) ENGINE = InnoDB;
