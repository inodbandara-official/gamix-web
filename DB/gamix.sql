-- Database Name : gamix

-- User Table
CREATE TABLE User (
    UserID INT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(20),
    Address VARCHAR(255),
    IsAdmin BOOLEAN,
    RegisterDate DATE
);

-- Seller Table
CREATE TABLE Seller (
    SellerID INT PRIMARY KEY,
    ShopName VARCHAR(100) NOT NULL,
    ShopAddress VARCHAR(255) NOT NULL,
    SellerEmail VARCHAR(100) UNIQUE NOT NULL,
    PhoneNumber VARCHAR(20)
);

-- Product Table
CREATE TABLE Product (
    ProductID INT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Type VARCHAR(50) NOT NULL,
    Cod BOOLEAN,
    ProductCondition VARCHAR(50) NOT NULL,
    Quantity INT NOT NULL,
    Status VARCHAR(50) NOT NULL,
    ReorderLevel INT NOT NULL,
    WarrentyPeriod VARCHAR(50),
    WarrentyPolicy VARCHAR(255),
    Weight FLOAT,
    SalePrice FLOAT NOT NULL,
    RegularPrice FLOAT NOT NULL,
    Length FLOAT,
    Width FLOAT,
    Height FLOAT,
    ShortDesc VARCHAR(100),
    LongDesc VARCHAR(255),
    Tag VARCHAR(255),
    ImgPath VARCHAR(255),
    SellerID INT,
    FOREIGN KEY (SellerID) REFERENCES Seller(SellerID),
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

-- Category Table
CREATE TABLE Category (
    CategoryID INT PRIMARY KEY,
    CategoryName VARCHAR(50) NOT NULL
);

-- Order Table
CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    Price FLOAT NOT NULL,
    Quantity INT NOT NULL,
    OrderStatus VARCHAR(50) NOT NULL,
    OrderDate DATE NOT NULL,
    PhoneNumber VARCHAR(20),
    PaymentMethod VARCHAR(50) NOT NULL,
    DeliveryAddress VARCHAR(255) NOT NULL,
    DeliveryDate DATE NOT NULL,
    PaymentStatus VARCHAR(50) NOT NULL,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    SellerID INT,
    FOREIGN KEY (SellerID) REFERENCES Seller(SellerID)
);

-- Review Table
CREATE TABLE Review (
    ReviewID INT PRIMARY KEY,
    ReviewDesc VARCHAR(255) NOT NULL,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    ProductID INT,
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID),
    OrderID INT,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
);

-- Wishlist Table
CREATE TABLE Wishlist (
    WishlistID INT PRIMARY KEY,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- ProductWishlist Table
CREATE TABLE ProductWishlist (
    ProductID INT,
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID),
    WishlistID INT,
    FOREIGN KEY (WishlistID) REFERENCES Wishlist(WishlistID),
    PRIMARY KEY (ProductID, WishlistID)
);

-- ProductOrder Table
CREATE TABLE ProductOrder (
    ProductID INT,
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID),
    OrderID INT,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    PRIMARY KEY (ProductID, OrderID)
);

-- Dummy Data for User Table
INSERT INTO User (UserID, FirstName, LastName, Email, Password, PhoneNumber, Address, IsAdmin, RegisterDate) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '123456', '070 1234567', 'Colombo', TRUE, '2022-12-01'),
(2, 'Jane', 'Doe', 'jane123@gmail.com', '123456', '071 3462891', 'Galle', FALSE, '2023-01-05'),
(3, 'John', 'Smith', 'smith345@gmail.com', '123456', '072 1234567', 'Kandy', FALSE, '2023-05-10')
;

-- Dummy Data for Seller Table
INSERT INTO Seller (SellerID, ShopName, ShopAddress, SellerEmail, PhoneNumber) VALUES
(1, 'ABC Shop', 'Kandy', 'abc@gmail.com', '071 1234567'),
(2, 'XYZ Shop', 'Colombo', 'xyz@gmail.com', '070 1294567'),
(3, 'PQR Shop', 'Galle', 'pqr@gmail.com', '075 1234567')
;

-- Dummy Data for Category Table
INSERT INTO Category (CategoryID, CategoryName) VALUES
(1, 'Gaming Consoles'),
(2, 'Gaming Accessories'),
(3, 'Gaming Laptops')
;

-- Dummy Data for Product Table
INSERT INTO Product (ProductID, Name, Type, Cod, ProductCondition, Quantity, Status, ReorderLevel, WarrentyPeriod, WarrentyPolicy, Weight, SalePrice, RegularPrice, Length, Width, Height, ShortDesc, LongDesc, Tag, ImgPath, SellerID, CategoryID)
VALUES
(1, 'PlayStation 5', 'Console', TRUE, 'New', 30, 'Available', 5, '1 Year', 'Standard Warranty', 5.0, 499.99, 599.99, 16, 8, 4, 'Next-gen gaming console', 'Experience immersive gaming with the latest PlayStation', 'Gaming, Console', '/img/ps5.jpg', 1, 1),
(2, 'Gaming Laptop - ROG Strix', 'Laptop', TRUE, 'New', 20, 'Available', 3, '2 Years', 'Extended Warranty available', 2.5, 1499.99, 1799.99, 15, 10, 1, 'High-performance gaming laptop', 'ROG Strix series for ultimate gaming experience', 'Gaming, Laptop', '/img/rog-laptop.jpg', 2, 3),
(3, 'Gaming Mouse - G Pro X', 'Accessory', TRUE, 'New', 50, 'Available', 10, '6 Months', 'No Warranty for wear and tear', 0.2, 49.99, 69.99, NULL, NULL, NULL, 'Pro gaming mouse for precision', 'Designed for professional gamers for accuracy and speed', 'Gaming, Accessories', '/img/g-pro-x-mouse.jpg', 2, 2),
(4, 'Gaming Keyboard - G Pro X', 'Accessory', TRUE, 'New', 40, 'Available', 8, '6 Months', 'No Warranty for wear and tear', 0.5, 99.99, 129.99, NULL, NULL, NULL, 'Pro gaming keyboard for speed', 'Designed for professional gamers for speed and comfort', 'Gaming, Accessories', '/img/g-pro-x-keyboard.jpg', 2, 2),
(5, 'Xbox Series X', 'Console', TRUE, 'New', 25, 'Available', 5, '1 Year', 'Standard Warranty', 5.0, 499.99, 599.99, 16, 8, 4, 'Next-gen gaming console', 'Experience immersive gaming with the latest Xbox', 'Gaming, Console', '/img/xbox-series-x.jpg', 1, 1),
(6, 'Gaming Laptop - Predator Helios', 'Laptop', TRUE, 'New', 15, 'Available', 3, '2 Years', 'Extended Warranty available', 2.5, 1499.99, 1799.99, 15, 10, 1, 'High-performance gaming laptop', 'Predator Helios series for ultimate gaming experience', 'Gaming, Laptop', '/img/predator-laptop.jpg', 2, 3),
(7, 'Gaming Mouse - G Pro', 'Accessory', TRUE, 'New', 60, 'Available', 10, '6 Months', 'No Warranty for wear and tear', 0.2, 49.99, 69.99, NULL, NULL, NULL, 'Pro gaming mouse for precision', 'Designed for professional gamers for accuracy and speed', 'Gaming, Accessories', '/img/g-pro-mouse.jpg', 2, 2),
(8, 'Gaming Keyboard - G Pro', 'Accessory', TRUE, 'New', 50, 'Available', 8, '6 Months', 'No Warranty for wear and tear', 0.5, 99.99, 129.99, NULL, NULL, NULL, 'Pro gaming keyboard for speed', 'Designed for professional gamers for speed and comfort', 'Gaming, Accessories', '/img/g-pro-keyboard.jpg', 2, 2)
;

-- Dummy Data for Orders Table
INSERT INTO Orders (OrderID, Price, Quantity, OrderStatus, OrderDate, PhoneNumber, PaymentMethod, DeliveryAddress, DeliveryDate, PaymentStatus, UserID, SellerID) VALUES
(1, 499.99, 1, 'Delivered', '2023-05-15', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-20', 'Paid', 2, 1),
(2, 1499.99, 1, 'Delivered', '2023-05-20', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-25', 'Paid', 2, 2),
(3, 49.99, 1, 'Delivered', '2023-05-25', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-30', 'Paid', 2, 2),
(4, 99.99, 1, 'Delivered', '2023-05-30', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-05', 'Paid', 2, 2),
(5, 499.99, 1, 'Delivered', '2023-06-05', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-10', 'Paid', 2, 1),
(6, 1499.99, 1, 'Delivered', '2023-06-10', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-15', 'Paid', 2, 2),
(7, 49.99, 1, 'Delivered', '2023-06-15', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-20', 'Paid', 2, 2),
(8, 99.99, 1, 'Delivered', '2023-06-20', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-25', 'Paid', 2, 2)
;

-- Dummy Data for Review Table
INSERT INTO Review (ReviewID, ReviewDesc, UserID, ProductID, OrderID) VALUES
(1, 'Great product', 2, 1, 1),
(2, 'Excellent laptop', 2, 2, 2),
(3, 'Good mouse', 2, 3, 3),
(4, 'Nice keyboard', 2, 4, 4),
(5, 'Great product', 2, 5, 5),
(6, 'Excellent laptop', 2, 6, 6),
(7, 'Good mouse', 2, 7, 7),
(8, 'Nice keyboard', 2, 8, 8)
;

-- Dummy Data for Wishlist Table
INSERT INTO Wishlist (WishlistID, UserID) VALUES
(1, 2),
(2, 3),
(3, 2),
(4, 3),
(5, 2),
(6, 3),
(7, 2),
(8, 3)
;

-- Dummy Data for ProductWishlist Table
INSERT INTO ProductWishlist (ProductID, WishlistID) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4)
;

-- Dummy Data for ProductOrder Table
INSERT INTO ProductOrder (ProductID, OrderID) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(4, 7),
(5, 8),
(6, 8),
(7, 8),
(8, 8)
;



