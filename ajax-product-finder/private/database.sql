CREATE TABLE sector(
	id INT AUTO_INCREMENT PRIMARY KEY,
	sector_name VARCHAR(255)
);
CREATE TABLE sector_childs(
	id INT AUTO_INCREMENT PRIMARY KEY,
	sector_child_name VARCHAR(255),
	sector_id INT,
	FOREIGN KEY (sector_id) REFERENCES sector(id)
);
CREATE TABLE product_types(
	id INT AUTO_INCREMENT PRIMARY KEY,
	sector_child_id INT,
	product_name VARCHAR(255),
	product_short_description VARCHAR(255)
	FOREIGN KEY (sector_child_id) REFERENCES sector_childs(id)
);
CREATE TABLE products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_type INT,
    product_name VARCHAR(255),
    product_short_description VARCHAR(255),
    product_thumbnail VARCHAR(255),
    FOREIGN KEY (product_type) REFERENCES product_type(id)
);