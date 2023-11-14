-- Insert statements

-- Inserting into User
INSERT INTO Users (User_ID, UserName, Created_at) VALUES (1, 'JohnDoe', CURRENT_TIMESTAMP);

-- Inserting into Location
INSERT INTO Location (Location_ID, Shelf, Row, Created_at) VALUES (1, 'A1', 1, CURRENT_TIMESTAMP);

-- Inserting into Warranty
INSERT INTO Warranty (Warranty_ID, WarrantyDetails, Created_at) VALUES (1, '2-year limited warranty', CURRENT_TIMESTAMP);

-- Inserting into Brand
INSERT INTO Brand (Brand_ID, BrandName, Created_at) VALUES (1, 'TechBrand', CURRENT_TIMESTAMP);

-- Inserting into Type
INSERT INTO Type (Type_ID, TypeName, Created_at) VALUES (1, 'Electronics', CURRENT_TIMESTAMP);

-- Inserting into SerialNumber, assuming all foreign keys already exist in their tables
INSERT INTO SerialNumber (Serial_ID, SerialNumberValue, Location_ID, Type_ID, Brand_ID, Warranty_ID, User_ID, Created_at)
VALUES (1, 'SN123456789', 1, 1, 1, 1, 1, CURRENT_TIMESTAMP);

-- Inserting into Item, assuming the SerialNumber already exists
INSERT INTO Item (Item_ID, SerialNumber, Quantity, Created_at) VALUES (1, 1, 10, CURRENT_TIMESTAMP);

-- Select statements

-- Selecting all users
SELECT * FROM Users;

-- Selecting a location by ID
SELECT * FROM Location WHERE Location_ID = 1;

-- Selecting warranty details
SELECT * FROM Warranty WHERE Warranty_ID = 1;

-- Selecting brand information
SELECT * FROM Brand WHERE Brand_ID = 1;

-- Selecting types of items
SELECT * FROM Type WHERE Type_ID = 1;

-- Selecting serial numbers and related information
SELECT * FROM SerialNumber WHERE Serial_ID = 1;

-- Selecting items
SELECT * FROM Item WHERE Item_ID = 1;

-- Update statements

-- Updating a user's name
UPDATE Users SET UserName = 'JaneDoe', Updated_at = CURRENT_TIMESTAMP WHERE User_ID = 1;

-- Updating location details
UPDATE Location SET Shelf = 'B2', Row = 2, Updated_at = CURRENT_TIMESTAMP WHERE Location_ID = 1;

-- Updating warranty details
UPDATE Warranty SET WarrantyDetails = '3-year extended warranty', Updated_at = CURRENT_TIMESTAMP WHERE Warranty_ID = 1;

-- Update brand name
UPDATE Brand SET BrandName = 'TechBrandNew', Updated_at = CURRENT_TIMESTAMP WHERE Brand_ID = 1;

-- Delete statements (Caution: these will remove data!)

-- Deleting a user
DELETE FROM Users WHERE User_ID = 1;

-- Deleting a location
DELETE FROM Location WHERE Location_ID = 1;

-- Deleting a warranty record
DELETE FROM Warranty WHERE Warranty_ID = 1;

-- Deleting a brand
DELETE FROM Brand WHERE Brand_ID = 1;
