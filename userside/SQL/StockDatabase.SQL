-- Creating the Location table
CREATE TABLE Location (
    Location_ID INT AUTO_INCREMENT,
    Shelf Int,
    Row VARCHAR(255),
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (Location_ID)
);

-- Creating the Item table
CREATE TABLE Item (
    Item_ID INT AUTO_INCREMENT,
    ItemName VARCHAR(255) NOT NULL,
    Quantity INT,
    ItemDesc text NOT NULL,
    Price decimal(7,2) NOT NULL,
    Img text NOT NULL,
    Location_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Location_ID) REFERENCES Location(Location_ID),
    PRIMARY KEY (Item_ID)
);

-- Creating the User table
CREATE TABLE Users (
    User_ID INT AUTO_INCREMENT,
    Username VARCHAR(255),
    Password VARCHAR(255),
    Fore_name VARCHAR(255),
    Second_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Address_User VARCHAR(255),
    PRIMARY KEY (User_ID)
);

-- Creating the Basket table
CREATE TABLE Basket (
    Basket_ID INT AUTO_INCREMENT,
    User_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (Basket_ID),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);

-- Create the BasketItem table
CREATE TABLE BasketItem (
    BasketItem_ID INT AUTO_INCREMENT,
    Basket_ID INT,
    Item_ID INT,
    Quantity INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (BasketItem_ID),
    FOREIGN KEY (Basket_ID) REFERENCES Basket(Basket_ID),
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID)
);


-- Creating the Order table
CREATE TABLE Orders (
    Order_ID INT AUTO_INCREMENT,
    Basket_ID INT,
    User_ID INT,
    Address_Order VARCHAR(255),
    Order_Status VARCHAR(255),
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Basket_ID) REFERENCES Basket(Basket_ID),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID),
    PRIMARY KEY (Order_ID)
);

-- Creating the Warranty table
CREATE TABLE Warranty (
    Warranty_ID INT AUTO_INCREMENT,
    WarrantyDetails TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID),
    PRIMARY KEY (Warranty_ID)
);

-- Creating the Brand table
CREATE TABLE Brand (
    Brand_ID INT AUTO_INCREMENT,
    BrandName TEXT,
    Item_ID INT,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Item_ID) REFERENCES Item(Item_ID),
    PRIMARY KEY (Brand_ID)
);

CREATE TABLE ContactUs (
    ContactUs_ID INT AUTO_INCREMENT,
    Name VARCHAR(255),
    Email VARCHAR(255),
    Message TEXT,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ContactUs_ID)
);

