-- Creating the Location table
CREATE TABLE Location (
    Location_ID INT PRIMARY KEY,
    Shelf VARCHAR(255),
    Row INT,
    Deleted_at TIMESTAMP NULL,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Warranty table
CREATE TABLE Warranty (
    Warranty_ID INT PRIMARY KEY,
    WarrantyDetails TEXT,
    Deleted_at TIMESTAMP NULL,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Brand table
CREATE TABLE Brand (
    Brand_ID INT PRIMARY KEY,
    BrandName TEXT,
    Deleted_at TIMESTAMP NULL,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Type table
CREATE TABLE Type (
    Type_ID INT PRIMARY KEY,
    TypeName TEXT,
    Deleted_at TIMESTAMP NULL,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Item table
CREATE TABLE Item (
    Item_ID INT PRIMARY KEY,
    SerialNumber INT,
    Quantity INT,
    ItemName VARCHAR(255) NOT NULL,
    Location_ID INT,
    Type_ID INT,
    Brand_ID INT,
    Warranty_ID INT,
    Deleted_at TIMESTAMP NULL,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Location_ID) REFERENCES Location(Location_ID),
    FOREIGN KEY (Type_ID) REFERENCES Type(Type_ID),
    FOREIGN KEY (Brand_ID) REFERENCES Brand(Brand_ID),
    FOREIGN KEY (Warranty_ID) REFERENCES Warranty(Warranty_ID),
);
