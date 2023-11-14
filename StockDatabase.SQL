-- Creating the User table
CREATE TABLE Users (
    User_ID INT PRIMARY KEY,
    UserName VARCHAR(255),
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP
);

-- Creating the Location table
CREATE TABLE Location (
    Location_ID INT PRIMARY KEY,
    Shelf VARCHAR(255),
    Row INT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP
);

-- Creating the Warranty table
CREATE TABLE Warranty (
    Warranty_ID INT PRIMARY KEY,
    WarrantyDetails TEXT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP
);

-- Creating the Brand table
CREATE TABLE Brand (
    Brand_ID INT PRIMARY KEY,
    BrandName TEXT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP
);

-- Creating the Type table
CREATE TABLE Type (
    Type_ID INT PRIMARY KEY,
    TypeName TEXT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP
);

-- Creating the SerialNumber table
CREATE TABLE SerialNumber (
    Serial_ID INT PRIMARY KEY,
    SerialNumberValue VARCHAR(255),
    Location_ID INT,
    Type_ID INT,
    Brand_ID INT,
    Warranty_ID INT,
    User_ID INT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP,
    FOREIGN KEY (Location_ID) REFERENCES Location(Location_ID),
    FOREIGN KEY (Type_ID) REFERENCES Type(Type_ID),
    FOREIGN KEY (Brand_ID) REFERENCES Brand(Brand_ID),
    FOREIGN KEY (Warranty_ID) REFERENCES Warranty(Warranty_ID),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);

-- Creating the Item table
CREATE TABLE Item (
    Item_ID INT PRIMARY KEY,
    SerialNumber INT,
    Quantity INT,
    Deleted_at TIMESTAMP,
    Updated_at TIMESTAMP,
    Created_at TIMESTAMP,
    FOREIGN KEY (SerialNumber) REFERENCES SerialNumber(Serial_ID)
);