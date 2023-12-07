-- Creating the Location table
CREATE TABLE Location (
    Location_ID INT PRIMARY KEY,
    Shelf Int,
    Row VARCHAR(255),
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Item table
CREATE TABLE Item (
    Item_ID INT PRIMARY KEY,
    ItemName VARCHAR(255) NOT NULL,
    Quantity INT,
    ItemDesc text NOT NULL,
    Price decimal(7,2) NOT NULL,
    Img text NOT NULL,
    Location_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Location_ID) REFERENCES Location(Location_ID)
);

-- Creating the Warranty table
CREATE TABLE Warranty (
    Warranty_ID INT PRIMARY KEY,
    WarrantyDetails TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);

-- Creating the Brand table
CREATE TABLE Brand (
    Brand_ID INT PRIMARY KEY,
    BrandName TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);

INSERT INTO Location (Location_ID, Shelf, Row) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 3, 'A'),
(4, 4, 'A'),
(5, 5, 'A'),
(6, 6, 'A'),
(7, 7, 'A'),
(8, 8, 'A'),
(9, 9, 'A'),
(10, 1, 'B'),
(11, 2, 'B'),
(12, 3, 'B'),
(13, 4, 'B'),
(14, 5, 'B'),
(15, 6, 'B'),
(16, 7, 'B'),
(17, 8, 'B'),
(18, 9, 'B'),
(19, 1, 'C'),
(20, 2, 'C'),
(21, 3, 'C'),
(22, 4, 'C'),
(23, 5, 'C'),
(24, 6, 'C'),
(25, 7, 'C'),
(26, 8, 'C'),
(27, 9, 'C'),
(28, 1, 'D'),
(29, 2, 'D'),
(30, 3, 'D'),
(31, 4, 'D'),
(32, 5, 'D'),
(33, 6, 'D'),
(34, 7, 'D'),
(35, 8, 'D'),
(36, 9, 'D'),
(37, 1, 'E'),
(38, 2, 'E'),
(39, 3, 'E'),
(40, 4, 'E'),
(41, 5, 'E'),
(42, 6, 'E'),
(43, 7, 'E'),
(44, 8, 'E'),
(45, 9, 'E');


INSERT INTO Item (Item_ID, ItemName, Quantity, ItemDesc, Price, Img, Location_ID) VALUES
(1, 'iPhone 15', 146, 'The new iPhone 15 from Apple', 999.99, 'iPhone15.jpg', 1),
(2, 'iPhone 15+', 146, 'The new iPhone 15+ from Apple', 1199.99, 'iPhone15+.jpg', 2),
(3, 'iPhone 15 Pro', 146, 'The new iPhone 15 Pro from Apple', 1199.99, 'iPhone15Pro.jpg', 3),
(4, 'iPhone 15 Pro Max', 146, 'The new iPhone 15 Pro Max from Apple', 1299.99, 'iPhone15ProMax.jpg', 4),
(5, 'Pixel 8', 146, 'The new Pixel 8 by google', 699.99, 'Pixel8.jpg', 5);
