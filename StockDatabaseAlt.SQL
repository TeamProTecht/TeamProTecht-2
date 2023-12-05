-- Creating the Location table
CREATE TABLE Location (
    Location_ID INT PRIMARY KEY,
    Shelf VARCHAR(255),
    Row INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Item table
CREATE TABLE Item (
    Item_ID INT PRIMARY KEY,
    Quantity INT,
    ItemName VARCHAR(255) NOT NULL,
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
