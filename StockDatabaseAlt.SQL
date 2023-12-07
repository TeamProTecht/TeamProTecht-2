-- Creating the Location table
CREATE TABLE `Location` (
    Location_ID INT PRIMARY KEY,
    Shelf VARCHAR(255),
    Row INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the Item table
CREATE TABLE `Item` (
    Item_ID INT PRIMARY KEY,
    ItemName VARCHAR(255) NOT NULL,
    Serial_Number INT,
    Stock INT,
    Price INT,
    Location_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Location_ID) REFERENCES Location(Location_ID)
);

-- Creating the User table
CREATE TABLE `User` (
    User_ID INT PRIMARY KEY,
    Username VARCHAR(255),
    Password VARCHAR(255),
    Fore_name VARCHAR(255),
    Second_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Address_User VARCHAR(255)
);

-- Creating the Basket table
CREATE TABLE `Basket` (
    Basket_ID INT PRIMARY KEY,
    Item_ID INT,
    Quantity INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);

-- Creating the Order table
CREATE TABLE `Order` (
    Order_ID INT PRIMARY KEY,
    Basket_ID INT,
    User_ID INT,
    Address_Order VARCHAR(255),
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Basket_ID) REFERENCES Basket(Basket_ID),
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);

-- Creating the Warranty table
CREATE TABLE `Warranty` (
    Warranty_ID INT PRIMARY KEY,
    WarrantyDetails TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);

-- Creating the Brand table
CREATE TABLE `Brand` (
    Brand_ID INT PRIMARY KEY,
    BrandName TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);
