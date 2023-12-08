INSERT INTO Location (Shelf, Row) VALUES
(1, 'A'),
(2, 'A'),
(3, 'A'),
(4, 'A'),
(5, 'A'),
(6, 'A'),
(7, 'A'),
(8, 'A'),
(9, 'A'),
(1, 'B'),
(2, 'B'),
(3, 'B'),
(4, 'B'),
(5, 'B'),
(6, 'B'),
(7, 'B'),
(8, 'B'),
(9, 'B'),
(1, 'C'),
(2, 'C'),
(3, 'C'),
(4, 'C'),
(5, 'C'),
(6, 'C'),
(7, 'C'),
(8, 'C'),
(9, 'C'),
(1, 'D'),
(2, 'D'),
(3, 'D'),
(4, 'D'),
(5, 'D'),
(6, 'D'),
(7, 'D'),
(8, 'D'),
(9, 'D'),
(1, 'E'),
(2, 'E'),
(3, 'E'),
(4, 'E'),
(5, 'E'),
(6, 'E'),
(7, 'E'),
(8, 'E'),
(9, 'E');

INSERT INTO Item (ItemName, Quantity, ItemDesc, Price, Img, Location_ID) VALUES
('iPhone 15', 146, 'The new iPhone 15 from Apple', 999.99, 'iPhone15.jpg', 1),
('iPhone 15+', 146, 'The new iPhone 15+ from Apple', 1199.99, 'iPhone15+.jpg', 2),
('iPhone 15 Pro', 146, 'The new iPhone 15 Pro from Apple', 1199.99, 'iPhone15Pro.jpg', 3),
('iPhone 15 Pro Max', 146, 'The new iPhone 15 Pro Max from Apple', 1299.99, 'iPhone15ProMax.jpg', 4),
('Pixel 8', 146, 'The new Pixel 8 by google', 699.99, 'Pixel8.jpg', 5);

INSERT INTO Warranty (WarrantyDetails, Item_ID) VALUES
('12 Months', 1),
('24 Months', 1),
('36 Months', 1),
('12 Months', 2),
('24 Months', 2),
('36 Months', 2),
('12 Months', 3),
('24 Months', 3),
('36 Months', 3),
('12 Months', 4),
('24 Months', 4),
('36 Months', 4),
('12 Months', 5),
('24 Months', 5),
('36 Months', 5);

INSERT INTO Brand (BrandName, Item_ID) VALUES
('Apple', 1),
('Apple', 2),
('Apple', 3),
('Apple', 4),
('Google', 5);

INSERT INTO Users (Username, Password, Fore_name, Second_Name, Last_Name, Address_User) VALUES
('john_doe', 'password123', 'John', 'Michael', 'Doe', '123 Main St'),
('jane_smith', 'password456', 'Jane', 'Elizabeth', 'Smith', '456 Elm St'),
('will_brown', 'password789', 'William', 'George', 'Brown', '789 Oak St'),
('emily_white', 'password101', 'Emily', 'Anne', 'White', '101 Maple St'),
('david_jones', 'password102', 'David', 'Lee', 'Jones', '102 Pine St'),
('sarah_johnson', 'password103', 'Sarah', 'Marie', 'Johnson', '103 Birch St'),
('michael_wilson', 'password104', 'Michael', 'Andrew', 'Wilson', '104 Cedar St'),
('lisa_moore', 'password105', 'Lisa', 'Renee', 'Moore', '105 Spruce St'),
('robert_taylor', 'password106', 'Robert', 'James', 'Taylor', '106 Ash St'),
('laura_martin', 'password107', 'Laura', 'Michelle', 'Martin', '107 Cherry St');

INSERT INTO Basket (User_ID) VALUES
(1),
(2),
(3),
(4);

INSERT INTO Orders (Basket_ID, User_ID, Address_Order, Order_Status) VALUES
(1, 1, '123 Main St', 'Pending'),
(2, 1, '123 Main St', 'Pending'),
(3, 2, '456 Elm St', 'Pending');

INSERT INTO BasketItem (Basket_ID, Item_ID, Quantity) VALUES
(1, 1, 3),
(1, 2, 3),
(1, 5, 2),
(2, 1, 3),
(2, 3, 4),
(2, 2, 5),
(3, 1, 10);
