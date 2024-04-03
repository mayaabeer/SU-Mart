create database shopping;
use shopping;

drop table if exists products;
create table products
(
    item_code varchar(20) not null,
    item_name varchar(150) not null,
    brand_name varchar(50) not null,
    model_number varchar(30) not null,
    weight varchar(20),
    dimension varchar(50),
    description text,
    category varchar(50),
    quantity smallint not null,
    price decimal(7,2),
    imagename varchar(50)
);

drop table if exists productfeatures;
create table productfeatures
(
    item_code varchar(20) not null,
    feature1 varchar(255),
    feature2 varchar(255),
    feature3 varchar(255),
    feature4 varchar(255),
    feature5 varchar(255),
    feature6 varchar(255)
);

drop table if exists cart;
create table cart
(
    cart_sess char(50) not null,
    cart_itemcode varchar(50) not null,
    cart_quantity smallint not null,
    cart_item_name varchar(100),
    cart_price decimal(7,2)
);

drop table if exists customers;
create table customers
(
    email_address varchar(50) not null primary key,
    password varchar(50) not null,
    complete_name varchar(50),
    address_line1 varchar(255),
    address_line2 varchar(255),
    city varchar(50),
    state varchar(50),
    zipcode varchar(50),
    country varchar(50),
    cellphone_no varchar(15)
);

drop table if exists orders;
create table orders
(
    order_no int(6) not null auto_increment primary key,
    order_date date,
    email_address varchar(50),
    customer_name varchar(50),
    shipping_address_line1 varchar(255),
    shipping_address_line2 varchar(255),
    shipping_city varchar(50),
    shipping_state varchar(50),
    shipping_country varchar(50),
    shipping_zipcode varchar(10)
);

drop table if exists orders_details;
create table orders_details
(
    order_no int(6) not null,
    item_code varchar(20) not null,
    item_name varchar(100) not null,
    quantity smallint not null,
    price decimal(7,2)
);

drop table if exists payment_details;
create table payment_details 
(
    order_no int(6) not null,
    order_date date,
    amount_paid decimal(7,2),
    email_address varchar(50),
    customer_name varchar(50),
    payment_type varchar(20),
    name_on_card varchar(30),
    card_number varchar(20),
    expiration_date varchar(10)
);


