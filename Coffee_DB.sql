CREATE TABLE `product_category` (
  `ProductCategory_Id` int(100) NOT NULL,
  `ProductCategory_Name` varchar(100) NOT NULL,
  `Active` bit(1) NOT NULL,
  Primary Key (`ProductCategory_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Inserting data for table `product_category`

INSERT INTO `product_category` (`ProductCategory_Id`, `ProductCategory_Name`, `Active`) VALUES
(100, 'Flavered Coffee', b'1'),
(200, 'Decaf Flavered Coffee', b'1'),
(300, 'Decaffeinated ', b'1'),
(400, 'Espresso ', b'1'),
(500, 'Half-Caffeinated ', b'1'),
(600, 'Samplers ', b'1'),
(700, 'Signature Blends ', b'1'),
(800, 'Organic + Fair Trade ', b'1'),
(900, 'Chicory ', b'1'),
(1000,'Best Sellers',b'1');

-- --------------------------------------------------------

CREATE TABLE `product_detail` (
  `product_id` int(100) NOT NULL,
  `ProductCategory_Id` int(100) NOT NULL,
  `Price` decimal(65,0) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Product_image` varchar(100) NOT NULL,
  `Description` varchar(500) CHARACTER SET koi8u COLLATE koi8u_bin NOT NULL,
  `Size` varchar(10) NOT NULL, -- modified
  `prod_quan` int(4) NOT NULL,
  `Active` char(5) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shippingCharge` decimal(10,0) NOT NULL DEFAULT '0',
    Primary Key (`Product_id`),
    FOREIGN KEY (`ProductCategory_Id`) REFERENCES product_category (`ProductCategory_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- inserting data for table `product_detail`


INSERT INTO `product_detail` (`Product_id`, `ProductCategory_Id`, `Price`, `name`, `Product_image`, `Description`, `Size`, `prod_quan`, `Active`, `date_added`, `shippingCharge`) VALUES
(101, 100, '15.2', 'Caramel Royale Flavored Coffee', '1477539476.jpg', 'creamy caramel flavoring with just a hint of vanilla', 'lb', 100, '1', '2017-10-31 03:37:56', '0'),
(102, 100, '25.2', 'Chocolate Flavored Coffee', '1477539606.jpg', 'Chocolate is one of the great flavors of the world, and when added to our light roast coffee beans  it all translates to just one thing...delicious', 'lb', 100, '1', '2017-10-31 03:40:06', '0'),
(201, 200, '22.3', 'Decaf Caramel Royale Flavored Coffee ', '1477539668.jpg', ' creamy caramel flavoring with just a hint of vanilla', 'lb', 100, '1', '2017-10-31 03:41:08', '0'),
(202, 200, '30.2', 'Decaf Chocolate Flavored Coffee ', '1477539693.jpg', 'Chocolate is one of the great flavors of the world, and when added to our light roast coffee beans  it all translates to just one thing...delicious', 'lb', 100, '1', '2017-10-31 03:41:33', '0'),
(301, 300, '32.0', 'CO2 Decaf Colombian', '1477539715.jpg', 'Unlike most of our decaf coffees, our CO2 Decaf Colombian beans are decaffeinated using a carbon dioxide process', 'lb', 100, '1', '2017-10-31 03:41:55', '0'),
(302, 300, '28.4', 'CO2 Decaf Dark Brazilian Santos', '1477539740.jpg', ' this blend of 100% Arabica gourmet coffee uses a carbon dioxide (CO2) decaffeination process and features the same sweet, fruity aroma', 'lb', 100, '1', '2017-10-31 03:42:20', '0'),
(401, 400, '21.0', 'CO2 Decaf Espresso ', '1477539761.jpg', 'This 100% Arabica gourmet decaf coffee uses a carbon dioxide (CO2) processing method and features a blend of Italian roasted coffee beans displaying a sweet, floral aroma', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(402, 400, '19.3', 'Italian Roast Espresso ', '1477539978.jpg', 'This signature blend of small batch Italian roasted craft coffee beans from South America and India is a heavy dark roast and produces a rich, full-bodied coffee with a moderate acidity and a big bite', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(501, 500, '18.5', 'Half-Caff Breakfast Blend ', '1477539761.jpg', 'A 50/50 blend of regular and decaffeinated beans, this blend features a balanced body with half the caffeine!', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(502, 500, '23.3', 'Half-Caff Colombian ', '1477539978.jpg', 'A 50/50 blend of regular and decaffeinated Colombian beans, this light roast coffee features a smooth, full body, with half the caffeine.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(601, 600, '77.2', 'Decaf Coffee 5-Pack Sampler ', '1477539761.jpg', 'Created for our decaf-loving friends, this sampler includes some dark decaf and some light decaf. This gift set includes five of our favorite Decaf selections in resealable 1-lb bags', 'packs', 100, '1', '2017-10-31 03:42:42', '0'),
(602, 600, '70.1', 'Decaf Flavored Coffee 5-Pack Sampler ', '1477539978.jpg', 'Featuring our most popular flavored decaf coffees on offer, this gift set includes five resealable 1-lb bags. Enjoy a tasty brew without getting the jitters.', 'packs', 100, '1', '2017-10-31 03:46:18', '0'),
(701, 700, '8.2', '0 Dark 30 Blend ', '1477539761.jpg', 'this incarnation of 0 Dark 30 is not mess hall Java or MRE powder', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(702, 700, '7.1', ' Breakfast Blend', '1477539978.jpg', ' This is a medium-bodied blend of light and dark beans with a hint of acidity and tartness.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(801, 800, '25.6', 'Organic Bali Blue Moon ', '1477539761.jpg', 'It delivers a dry, winey crispness across the palate followed by a long pleasing finish mingling chocolate, vanilla, and exotic spices with just a hint of nuttiness', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(802, 800, '24.2', 'Organic Fair Trade Colombian ', '1477539978.jpg', 'These large beans create a medium bodied and sweet tasting coffee with a rich flavor and aroma', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(901, 900, '6.2', 'Ground Chicory ', '1477539761.jpg', 'Caffeine free with a more "roasted" flavor than regular coffee, it is also more soluble in water, which means you use a lot less of it when brewing', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(1001, 1000,'6.4', 'Italian Roast Espresso ', '1477539761.jpg', ' Displaying a toasty & honeyed aroma and flavor notes reminiscent of cocoa powder and smoky molasses, these gourmet beans are our most popular coffee blend and perfect as an espresso and iced coffee.', 'lb', 100, '1', '2017-10-31 03:42:42', '0'),
(1002, 1000, '7.3', 'Colombian Supremo ', '1477539978.jpg', 'This classic artisan coffee is light roasted in small batches and displays a smooth yet complex body and a bright, sunny acidity', 'lb', 100, '1', '2017-10-31 03:46:18', '0')
(103, 100, '10.3', 'Chocolate Raspberry Flavored Coffee ', '1477539978.jpg', 'This sweet and velvety combination of chocolate and raspberry is one of the original flavored coffees', 'lb', 100, '1', '2017-11-16 03:46:18', '0'),
(104, 100, '12.2', 'French Vanilla Flavored Coffee ', '1477539978.jpg', 'It is a little known fact that French Vanilla is not a vanilla flavor at all, but a term used to describe the French method of making ice cream using egg yolks, cream, and vanilla pods.', 'lb', 100, '1', '2017-11-16 03:46:18', '0'),
(105, 100, '7.2', 'Hot Cocoa Flavored Coffee', '1477539978.jpg', 'Combining the flavors of rich cocoa, marshmallows, and silky whipped cream, this toasty brew is a coffee-lover’s dream', 'lb', 100, '1', '2017-11-16 03:46:18', '0'),
(106, 100, '8.2', 'Peppermint Bark Flavored Coffee ', '1477539978.jpg', ' Heady with mint and only moderately sweet', 'lb', 100, '1', '2017-11-16 03:46:18', '0'),
(203, 200, '11.1', 'Decaf Chocolate Raspberry Flavored Coffee ', '1477539978.jpg', 'This sweet and velvety combination of chocolate and raspberry is one of the original flavored coffees', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(204, 200, '14.2', 'Decaf French Vanilla Flavored Coffee ', '1477539978.jpg', 'It is a little known fact that French Vanilla is not a vanilla flavor at all, but a term used to describe the French method of making ice cream using egg yolks, cream, and vanilla pods', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(205, 200, '20.1', 'Decaf Vermont Maple Crunch Flavored Coffee ', '1477539978.jpg', 'Savory nutty taste that accompanies the Vermont maple flavoring on these light roast beans', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(206, 200, '18.6', 'Decaf Sea Salt Caramel Mocha Flavored Coffee', '1477539978.jpg', 'chocolate covered pretzel drizzled in caramel but without the pretzel', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(303, 300, '11.1', 'CO2 Decaf Espresso ', '1477539978.jpg', 'This 100% Arabica gourmet decaf coffee uses a carbon dioxide (CO2) processing method and features a blend of Italian roasted coffee beans displaying a sweet, floral aroma.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(304, 300, '14.2', 'Decaf Breakfast Blend ', '1477539978.jpg', 'This medium-bodied blend of light and dark beans has just a hint of acidity and tartness. Ideal as a morning cup.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(305, 300, '20.1', 'Decaf Colombian ', '1477539978.jpg', 'Caffeinated or not, Colombian coffee is a good, moderate acid, medium bodied coffee', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(306, 300, '18.6', 'Decaf Costa Rican', '1477539978.jpg', 'This decaffeinated coffee responds nicely to a fuller roast, producing a rich, dark chocolate flavor nuance and aromas of spice and sweet caramel', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(403, 400, '11.1', 'Medium Roast Espresso ', '1477539978.jpg', ' This coffee has a full body and moderate acidity. It is a few shades lighter than our French Roast, and can be used to make a soft and mild espresso.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(404, 400, '14.2', 'Organic Fair Trade Espresso ', '1477539978.jpg', 'Espresso that is complex and strong, with a superior aroma to go along with the rich crema.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(405, 400, '20.1', 'Six Bean Espresso ', '1477539978.jpg', 'This blend is intended especially for espresso, and offers an evenly colored crema, moderate acidity, and a smooth body.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(406, 400, '18.6', 'Super Dark Espresso', '1477539978.jpg', 'This espresso blend is the darkest that we offer. A custom blend of coffee beans roasted until black and oily, this is what espresso is all about: a heavy, hearty, and bittersweet cup', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(503, 500, '11.1', 'Half-Caff Costa Rican', '1477539978.jpg', 'A 50/50 blend of regular and decaffeinated Costa Rican beans. Light roasted and featuring a balanced body with half the caffeine.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(504, 500, '14.2', 'Half-Caff Dark Costa Rican ', '1477539978.jpg', 'A 50/50 blend of regular and decaffeinated Dark Costa Rican beans. Dark roasted and featuring a balanced-to-heavy body with half the caffeine.', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(505, 500, '20.1', 'Half-Caff Dark Sumatra ', '1477539978.jpg', 'A 50/50 blend of regular and decaffeinated Dark Sumatra beans. Dark roasted and featuring a heavy body with half the caffeine!', 'lb', 100, '1', '2017-10-31 03:46:18', '0'),
(506, 500, '18.6', 'Half-Caff French Roast', '1477539978.jpg', 'A 50/50 blend of regular and decaffeinated beans. This French roast blend features a balanced body with half the caffeine!', 'lb', 100, '1', '2017-10-31 03:46:18', '0');
-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertype_id` int(50) NOT NULL,
  `usertype_name` varchar(100) NOT NULL,
  Primary Key (`usertype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Inserting data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'client'), 
(2, 'Employee'),
(3, 'Administrator'),
(4, 'Developer');


--
-- Table structure for table `user`

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `usertype_id` int(50) NOT NULL DEFAULT '1',
  Primary Key (`user_id`),
  FOREIGN KEY (`usertype_id`) REFERENCES usertype (`usertype_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- inserting data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `email_id`, `usertype_id`) VALUES
(1, 'admin001', '12345', 'Admin', 'Admin', 'admin001@gmail.com', 3),
(2, 'emp001', '12345', 'Employee', 'Employee', 'emp001@gmail.com', 2),
(3, 'dev001', '12345', 'Developer', 'Developer', 'dev001@gmail.com', 4),
(4, 'user001', '12345', 'user', 'user', 'user001@client.com', 1),
(5, 'user002', '12345', 'user', 'user', 'user002@gmail.com', 1),
(6, 'sneha', '12345', 'sneha', 'Admin', 'sneha@gmail.com', 3);



CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(20) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `receiver_name` varchar(150) NOT NULL,
  `tot_amount` decimal(10,2) NOT NULL,
    Primary Key (`order_id`),
 FOREIGN KEY (`user_id`) REFERENCES user (`user_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- inserting data for table `customer_order`

INSERT INTO `customer_order` (`order_id`, `order_no`, `user_id`, `order_date`, `shipping_address`, `receiver_name`, `tot_amount`) VALUES
(6123, '123456789087', 4, '2017-05-08 19:14:30', 'Apt test,30 1 Normal Ave, ABC Park, NJ 07650', 'user001', '24.00'),
(6124, '123456789088', 5, '2017-05-08 19:20:59', 'Apt test,34 1 Normal Ave, ABC Park, NJ 0765', 'user002', '20.00'),
(6125, '123456789089', 4, '2017-05-08 19:58:20', 'Apt test,30 1 Normal Ave, ABC Park, NJ 0765', 'user001', '300.00');


CREATE TABLE `order_details` (
  `record_id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `product_id` int(100) NOT NULL,
  `sold_quantity` int(10) NOT NULL,
 Primary Key (`record_id`),
 FOREIGN KEY (`order_no`) REFERENCES customer_order (`order_no`),
 FOREIGN KEY (`product_id`) REFERENCES product_detail (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- inserting data for table `order_details`
--

INSERT INTO `order_details` (`record_id`, `order_no`, `product_id`, `sold_quantity`) VALUES
(15, '123456789087', '102', 1),
(16, '123456789088', '103', 2);
(17, '123456789089', '104', 2);
-- --------------------------------------------------------




--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category` AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail` AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user` AUTO_INCREMENT=14;

  