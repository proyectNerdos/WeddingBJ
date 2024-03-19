# DEVSM 2024.3.3
ALTER TABLE cf_cash_flows
ADD COLUMN subtotal_number FLOAT NULL,
ADD COLUMN iva_number FLOAT NULL,
ADD COLUMN percepcion_number FLOAT NULL;

ALTER TABLE cf_cash_flow_details
MODIFY COLUMN product_quantity FLOAT NULL,
MODIFY COLUMN consumed_quantity FLOAT NULL;

# DEVMC 2024.2.3
CREATE TABLE `services` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `uuid` CHAR(36) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `price` DECIMAL(8,2) NOT NULL,
    `status` TINYINT(1) NOT NULL DEFAULT '1',
    `deleted_at` TIMESTAMP NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `services_uuid_unique` (`uuid`)
) ENGINE=InnoDB;

ALTER TABLE cf_cash_flows
ADD COLUMN service_details JSON NULL;

ALTER TABLE cf_cash_flow_details
MODIFY COLUMN product_id INT NULL;

ALTER TABLE cf_cash_flow_details
ADD COLUMN service_id INT NULL;

ALTER TABLE cf_cash_flows
ADD COLUMN client_id INT NULL,
ADD COLUMN client_name VARCHAR(255) NULL;

CREATE INDEX client_id_index ON cf_cash_flows (client_id);

ALTER TABLE cf_cash_flows
ADD COLUMN operator_hours INT NULL,
ADD COLUMN helper1_hours INT NULL,
ADD COLUMN helper2_hours INT NULL;


# SM 02.02.24
INSERT INTO product_units_of_measure (name, is_predefined)
VALUES ('Centimetro cuadrado (cm2)', 1);

# SM20 24.1.30
ALTER TABLE employees MODIFY email VARCHAR(255) NULL;


# 2024.1.28
ALTER TABLE `users` ADD `google_id` VARCHAR(255) NULL;

# 2024.1.27
ALTER TABLE `cf_cash_flow_details`
ADD `product_quantity` INT NULL,
ADD `measurement_unit_id` INT NULL,
ADD `consumed_quantity` INT NULL,
ADD `consumed_measurement_unit_id` INT NULL;

# 2024.1.25 
CREATE TABLE `cf_cash_flow_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `cash_flow_id` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`cash_flow_id`) REFERENCES `cf_cash_flows`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `cf_cash_flow_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `cash_flow_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `cost_price_pesos_ex_tax` float(20,2) DEFAULT NULL,
  `cost_price_pesos_in_tax` float(20,2) DEFAULT NULL,
  `sale_price_pesos_ex_tax` float(20,2) NOT NULL,
  `sale_price_pesos_in_tax` float(20,2) DEFAULT NULL,
  `quantity` int NOT NULL,
  `discount` float(20,2) DEFAULT NULL,
  `net_discount` float(8,2) DEFAULT NULL,
  `net_tax` float(20,2) DEFAULT NULL,
  `subtotal` float(20,2) DEFAULT NULL,
  `subtotal_with_tax` float(20,2) DEFAULT NULL,
  `total` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
# 2024.1.25 






ALTER TABLE cf_cash_flows
ADD COLUMN amount_usd DECIMAL(10, 2) NULL;


ALTER TABLE cf_cash_flows
ADD COLUMN invoice_number VARCHAR(255) NULL,
ADD COLUMN remittance_number VARCHAR(255) NULL;

ALTER TABLE cf_cash_flows
ADD COLUMN employee_sec1_id INT NULL,
ADD INDEX employee_sec1_id_index (employee_sec1_id),
ADD COLUMN employee_sec2_id INT NULL,
ADD INDEX employee_sec2_id_index (employee_sec2_id);


<!-- /devmc 2024.1.8  -->
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `lote` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `thumbsnail` varchar(255) DEFAULT NULL,
  `thumbsnail_filename` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_uuid_unique` (`uuid`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cf_cash_flows`
ADD COLUMN `employee_id` INT(11) NULL,
ADD INDEX `employee_id` (`employee_id`);
