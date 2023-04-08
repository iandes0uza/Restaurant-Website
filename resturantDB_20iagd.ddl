drop database if exists restaurantDB;
create database restaurantDB;

USE restaurantDB;

create table restaurant(
	name varchar(50) not null,
	url varchar(200) not null,
	street varchar(50),
	city varchar(50),
	pc char(6),
    primary key (name));

create table employee(
	id integer not null,
	firstInitial varchar(50) not null,
	lastInitial varchar(50) not null,
    primary key (id));
	
create table customer(
	email varchar(50) not null,
	paswrd varchar(20) not null,
    credit decimal(10, 2) not null,
	firstName varchar(50),
	lastName varchar(50),
	phoneNum char(10) not null,
	street varchar(50),
	city varchar(50),
	pc char(6),
    primary key (email));

create table chefRole(
    id integer not null,
    credentials varchar(50) not null,
    primary key (id, credentials),
    foreign key (id) references employee(id) on delete cascade);

create table deliveryRole(
    id integer not null,
    primary key (id),
    foreign key (id) references employee(id) on delete cascade);

create table serverRole(
    id integer not null,
    primary key (id),
    foreign key (id) references employee(id) on delete cascade);

create table managementRole(
    id integer not null,
    primary key (id),
    foreign key (id) references employee(id) on delete cascade);

create table schedule(    
    id integer not null,
    workDay date,
    startTime time,
    endTime time,
    primary key (id, workDay),
    foreign key (id) references employee(id) on delete cascade);
	
create table orders(
	id integer not null,
	customerEmail varchar(50) not null,
	total decimal(7, 2) not null,
	tip decimal(5,2) not null,
    dpID integer not null,
	primary key (id, customerEmail),
	foreign key (customerEmail) references customer(email) on delete cascade,
	foreign key (dpID) references deliveryRole(id) on delete cascade);
	
create table purchaseHistory(
	orderId integer not null,
	customerEmail varchar(50),
	paymentDate date not null,
	paymentTime time not null,
	primary key (customerEmail, paymentDate, paymentTime),
    foreign key (orderId) references orders(id) on delete cascade,
	foreign key (customerEmail) references customer(email) on delete cascade);

create table menuItems(
    name varchar(20) not null,
    price decimal(5, 2) not null,
	resName varchar(50) not null,
	primary key (name, resName),
	foreign key (resName) references restaurant(name) on delete cascade);

create table orderedItems(
    name varchar(20) not null,
    orderId integer not null,
    restaurant varchar(50),
    primary key (name, orderId, restaurant),
    foreign key (name) references menuItems(name) on delete cascade,
    foreign key (restaurant) references menuItems(resName) on delete cascade,
    foreign key (orderId) references orders(id) on delete cascade);


insert into restaurant values
    ('Ian''s Waffles', 'waffles.com', '789 Working Rd', 'Mississauga', 'L5M1N1'),
    ('BurgerJoint', 'burgerjoint.com', '456 Laundering St', 'Belleville', 'K8N2T8'),
    ('Pizza and Drugs', 'pizzaNdrugs.ca', '9381 Commerce Ct', 'Toronto', 'M5J1E6'),
    ('Dairy King', 'dairyking.com', '279 Hill St', 'Thunder Bay', 'P0T1K0'),
    ('Osmows (but better)', 'notosmows.com', '1290 Copyright Blvd', 'Georgetown', 'L7G1V1'),
    ('CampusTwoStop', 'campus2stop.ca', '29323 Side Road South', 'Barrie', 'L0L2N0');

insert into menuItems values
    ('Waffles', '11.99', 'Ian''s Waffles'), ('Nutella Waffles', '13.99', 'Ian''s Waffles'), ('Strawberry Waffles', '12.99', 'Ian''s Waffles'),
    ('Milkshake', '5.35', 'Ian''s Waffles'), ('Maple Waffles', '12.49', 'Ian''s Waffles'), ('Vegan Waffles', '13.49', 'Ian''s Waffles'),
    ('Orange Juice', '1.99', 'Ian''s Waffles'), ('Nestea', '1.99', 'Ian''s Waffles'),
    ('Angus Burger', '8.96', 'BurgerJoint'), ('Vegan Burger', '10.97', 'BurgerJoint'), ('Spicy Burger', '8.99', 'BurgerJoint'),
    ('Steak Burger', '9.69', 'BurgerJoint'), ('Cheese Burger', '8.35', 'BurgerJoint'), ('Tall Drink', '3.38', 'BurgerJoint'),
    ('Short Drink', '2.25', 'BurgerJoint'), ('Fries', '3.99', 'BurgerJoint'),
    ('Hawaiian Pizza', '21.96', 'Pizza and Drugs'), ('Veggie Pizza', '21.96', 'Pizza and Drugs'), ('BBQ Pizza', '22.96', 'Pizza and Drugs'),
    ('Pepperoni Pizza', '19.96', 'Pizza and Drugs'), ('Canadian Pizza', '21.96', 'Pizza and Drugs'), ('Crack', '670.99', 'Pizza and Drugs'),
    ('Cheese Pizza', '18.96', 'Pizza and Drugs'), ('Acid', '400.94', 'Pizza and Drugs'),
    ('Chicken Fingers', '8.69', 'Dairy King'), ('Chocolate IceCream', '4.99', 'Dairy King'), ('Hurricane', '6.49', 'Dairy King'),
    ('Fries', '4.96', 'Dairy King'), ('Hot Dog (Premium)', '5.99', 'Dairy King'), ('Hot Dog', '5.39', 'Dairy King'),
    ('Vanilla IceCream', '4.99', 'Dairy King'), ('Starberry IceCream', '4.99', 'Dairy King'),
    ('Beef Shawarma', '12.96', 'Osmows (but better)'), ('Chicken Shawarma', '12.99', 'Osmows (but better)'),
    ('Lamb Shawarma', '13.96', 'Osmows (but better)'), ('Falafel Shawarma', '11.99', 'Osmows (but better)'),
    ('Fries', '4.99', 'Osmows (but better)'), ('Falafel', '6.35', 'Osmows (but better)'),
    ('Chicken Salad', '14.96', 'Osmows (but better)'), ('Veggie Salad', '12.96', 'Osmows (but better)'),
    ('Twinkies', '4.99', 'CampusTwoStop'), ('Mountain Dew', '1.69', 'CampusTwoStop'), ('Coca-Cola', '1.69', 'CampusTwoStop'),
    ('Rice Krispy', '0.99', 'CampusTwoStop'), ('RedBull', '2.69', 'CampusTwoStop'), ('Pepsi', '1.69', 'CampusTwoStop'),
    ('Chocolate Bar', '0.99', 'CampusTwoStop'), ('Hot Dog', '1.99', 'CampusTwoStop');

insert into employee values
    ('1', 'Ian', 'DeSouza'), ('2', 'Artie', 'Lomonaco'), ('3', 'Aidan', 'Brady'), ('4', 'Maxwell', 'Henderson'),
    ('5', 'Tony', 'Jajcanin'), ('6', 'Andrew', 'Masucci'), ('7', 'Connor', 'Bosy'), ('8', 'Bartek', 'Puzio'),
    ('9', 'Emily', 'Machado'), ('10', 'Nyla', 'Lyder'), ('11', 'Avery', 'Bond'), ('12', 'Karolina', 'Grujic'),
    ('13', 'LeBron', 'James'), ('14', 'Nariag', 'Manjikan'), ('15', 'Ning', 'Lu'), ('16', 'Emily', 'Bacon'),
    ('17', 'Anthony', 'Rozzeba'), ('18', 'Ali', 'Bekheet'), ('19', 'Sarah', 'Goldin'), ('20', 'Kyle', 'Dulce'),
    ('21', 'Simon', 'Yung'), ('22', 'Terry', 'Su'), ('23', 'Aaron', 'Moise'), ('24', 'Babe', 'Ruth'),
    ('25', 'Kobe', 'Bryant'), ('26', 'Maggie-Mae', 'Burr'), ('27', 'Ryan', 'Soth'), ('28', 'Devin', 'Chawla'),
    ('29', 'Vic', 'Evans');

insert into chefRole values
    ('1', ''),
    ('2', ''),
    ('11', ''),
    ('3', ''),
    ('12', ''),
    ('13', ''),
    ('14', ''),
    ('15', '');

insert into deliveryRole values
    ('4'), ('5'), ('6'), ('7'),
    ('8'), ('9'), ('10');

insert into serverRole values
    ('16'), ('20'), ('21'), ('23'),
    ('24'), ('27'), ('28');

insert into managementRole values
    ('17'), ('18'), ('19'), ('22'),
    ('25'), ('26'), ('29');

insert into schedule values
    ('1', '2023-02-01', '10:00:00', '18:00:00'), ('2', '2023-02-01', '08:00:00', '16:00:00'), ('3', '2023-02-02', '10:00:00', '18:00:00'),
    ('4', '2023-02-03', '08:00:00', '16:00:00'), ('5', '2023-02-03', '09:00:00', '17:00:00'), ('6', '2023-02-03', '08:00:00', '16:00:00'),
    ('7', '2023-02-03', '09:00:00', '17:00:00'), ('8', '2023-02-04', '10:00:00', '18:00:00'), ('9', '2023-02-04', '08:00:00', '16:00:00'),
    ('10', '2023-02-04', '09:00:00', '17:00:00'), ('11', '2023-02-03', '09:00:00', '17:00:00'), ('12', '2023-02-02', '10:00:00', '18:00:00'),
    ('13', '2023-02-01', '09:00:00', '17:00:00'), ('14', '2023-02-03', '08:00:00', '16:00:00'), ('15', '2023-02-03', '09:00:00', '17:00:00'),
    ('16', '2023-02-03', '10:00:00', '18:00:00'), ('17', '2023-02-05', '08:00:00', '16:00:00'), ('18', '2023-02-05', '08:00:00', '16:00:00'),
    ('19', '2023-02-05', '10:00:00', '18:00:00'), ('20', '2023-02-03', '08:00:00', '16:00:00'), ('21', '2023-02-05', '08:00:00', '16:00:00'),
    ('22', '2023-02-04', '10:00:00', '18:00:00'), ('23', '2023-02-04', '08:00:00', '16:00:00'), ('24', '2023-02-02', '08:00:00', '16:00:00'),
    ('25', '2023-02-02', '10:00:00', '18:00:00'), ('26', '2023-02-05', '09:00:00', '17:00:00'), ('27', '2023-02-05', '08:00:00', '16:00:00'),
    ('28', '2023-02-01', '10:00:00', '18:00:00'), ('29', '2023-02-04', '09:00:00', '17:00:00');
    
insert into customer values
    ('zach@donovan.ca', 'nerd', 5.00, 'Zach', null, 1234567890, null, null, null),
    ('evan@wray.ca', 'nerd', 5.00, 'Evan', 'Wray', 1234567890, null, null, null),
    ('daniel@joseph.com', 5.00, 'nerd', 'Daniel', 'Joseph', 1234567890, null, null, null),
    ('ian@desouza.com', 'nerd', 5.00, 'Ian', 'DeSouza', 1234567890, null, null, null),
    ('vid@grujic.ca', 'nerd', 5.00, 'Vid', null, 1234567890, null, null, null),
    ('luka@gobovic.com', 'nerd', 5.00, 'Luka', 'Gobovic', 1234567890, null, null, null),
    ('sophia@lazzaro.com', 'nerd', 5.00, 'Sophia', 'Lazzaro', 1234567890, null, null, null);

insert into orders values
    ('1', 'zach@donovan.ca', '300.97', '0', '8'),
    ('2', 'sophia@lazzaro.com', '417.51', '7.65', '4'),
    ('3', 'evan@wray.ca', '472.46', '5.35', '4'),
    ('4', 'luka@gobovic.com', '651.18', '7.31', '6'),
    ('5', 'vid@grujic.ca', '730.14', '0', '9'),
    ('6', 'daniel@joseph.com', '126.42', '1.19', '8');

insert into purchaseHistory values
    ('1', 'zach@donovan.ca', '2023-02-01', '21:14:41'),
    ('2', 'sophia@lazzaro.com', '2023-02-02', '17:16:48'),
    ('3', 'evan@wray.ca', '2023-02-02', '08:31:43'),
    ('4', 'luka@gobovic.com', '2023-02-03', '09:36:12'),
    ('5', 'vid@grujic.ca', '2023-02-03', '12:45:23'),
    ('6', 'daniel@joseph.com', '2023-02-03', '03:24:25');

insert into orderedItems values
    ('Nutella Waffles', '1', 'Ian''s Waffles'),
    ('Angus Burger', '2', 'BurgerJoint'),
    ('Hawaiian Pizza', '3', 'Pizza and Drugs'),
    ('Hurricane', '4', 'Dairy King'),
    ('Chicken Shawarma', '5', 'Osmows (but better)'),
    ('Twinkies', '6', 'CampusTwoStop');
	
