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


