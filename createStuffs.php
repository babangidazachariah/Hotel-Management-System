<?php
		$db = mysql_connect("localhost","root") or die ('Unable to connect. Check your connection parameters.');
		$sql= "CREATE DATABASE IF NOT EXISTS Hotel";
		mysql_query($sql, $db) or die(mysql_error($db));
		//make sure our recently created database is the active one
		
		mysql_select_db('Hotel', $db) or die(mysql_error($db));
		
		//Wines
		$sql ="CREATE TABLE IF NOT EXISTS tblWines (
			wineID INTEGER NOT NULL AUTO_INCREMENT,
			wineCategory INTEGER NOT NULL,
			wineName VARCHAR(20),
			winePrice INTEGER,
			winePicture VARCHAR(35),
			
			
			PRIMARY KEY (wineID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		$sql ="CREATE TABLE IF NOT EXISTS tblWineCategory (
			wineID INTEGER NOT NULL AUTO_INCREMENT,
			wineCategory VARCHAR(20) NOT NULL,
			
			
			PRIMARY KEY (wineID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		//Restaurants
		$sql ="CREATE TABLE IF NOT EXISTS tblFood (
			foodID INTEGER NOT NULL AUTO_INCREMENT,
			foodCategory INTEGER NOT NULL,
			foodName VARCHAR(20),
			foodPrice DOUBLE,
			foodPicture VARCHAR(35),
			
			
			PRIMARY KEY (foodID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		$sql ="CREATE TABLE IF NOT EXISTS tblFoodCategory (
			foodID INTEGER NOT NULL AUTO_INCREMENT,
			foodCategory VARCHAR(20) NOT NULL,
			
			
			PRIMARY KEY (foodID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		//Accounts
		
		$sql ="CREATE TABLE IF NOT EXISTS tblIntegratedAccounts (
			accID INTEGER NOT NULL AUTO_INCREMENT,
			bank VARCHAR(20) NOT NULL,
			cardType VARCHAR(20)  NOT NULL,
			cardName VARCHAR(100)  NOT NULL,
			cardNumber VARCHAR(30)  NOT NULL,
			cardSsn VARCHAR(30)  NOT NULL,
			experyDate DATE NOT NULL,
			balance DOUBLE NOT NULL,
			
			PRIMARY KEY (accID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
				//purchases
		
		$sql ="CREATE TABLE IF NOT EXISTS tblPurchasedItems (
			purchaseID INTEGER NOT NULL AUTO_INCREMENT,
			cardNumber VARCHAR(30)  NOT NULL,
			purchasedItems VARCHAR(255)  NOT NULL,
			
			roomCategory VARCHAR(30)  NOT NULL,
			floor VARCHAR(30)  NOT NULL,
			room VARCHAR(30)  NOT NULL,
			
			status INT NOT NULL,
			
			PRIMARY KEY (purchaseID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		

		//Rooms
		
		$sql ="CREATE TABLE IF NOT EXISTS tblRooms (
			roomID INTEGER NOT NULL AUTO_INCREMENT,
			category VARCHAR(20) NOT NULL,
			floor VARCHAR(10)  NOT NULL,
			room VARCHAR(15),
			price DOUBLE,
			status INTEGER NOT NULL,
			customerID VARCHAR(30),
			arrivalDate DATE,
			numberOfDays INTEGER,
			
			PRIMARY KEY (roomID)
			)
			ENGINE=MyISAM
			";
		mysql_query($sql, $db) or die(mysql_error($db));
		
		$query = "SELECT * FROM tblRooms WHERE floor = 'First'";
		$numOfRows = mysql_query($query,$db);
		if(mysql_num_rows($numOfRows) < 1)
		{
			$sql ="INSERT INTO tblRooms (category, floor, room, price, status) VALUES ('Presidential Suits', 'First', 'Room One',15000, 0), 
				('Presidential Suits', 'First', 'Room Two',15000, 0),('Presidential Suits', 'First', 'Room Three',15000, 0),('Presidential Suits', 'First', 'Room Four',15000, 0),
				('Presidential Suits', 'Second', 'Room One',15000, 0), 
				('Presidential Suits', 'Second', 'Room Two',15000, 0),('Presidential Suits', 'Second', 'Room Three',15000, 0),('Presidential Suits', 'Second', 'Room Four',15000, 0),
				('Royal Suits', 'First', 'Room One',15000, 0), 
				('Royal Suits', 'First', 'Room Two',15000, 0),('Royal Suits', 'First', 'Room Three',15000, 0),('Royal Suits', 'First', 'Room Four',15000, 0),
				('Royal Suits', 'Second', 'Room One',15000, 0), 
				('Royal Suits', 'Second', 'Room Two',15000, 0),('Royal Suits', 'Second', 'Room Three',15000, 0),('Royal Suits', 'Second', 'Room Four',15000, 0),
				('Regular Suits', 'Second', 'Room One',15000, 0), 
				('Regular Suits', 'First', 'Room One',15000, 0), 
				('Regular Suits', 'First', 'Room Two',15000, 0),('Regular Suits', 'First', 'Room Three',15000, 0),('Regular Suits', 'First', 'Room Four',15000, 0),
				('Regular Suits', 'Second', 'Room One',15000, 0),
				('Regular Suits', 'Second', 'Room Two',15000, 0),('Regular Suits', 'Second', 'Room Three',15000, 0),('Regular Suits', 'Second', 'Room Four',15000, 0),
				('Regular Suits', 'Second', 'Room One',15000, 0), 
				('Prestigious Suits', 'First', 'Room One',15000, 0), 
				('Prestigious Suits', 'First', 'Room Two',15000, 0),('Prestigious Suits', 'First', 'Room Three',15000, 0),('Prestigious Suits', 'First', 'Room Four',15000, 0),
				('Prestigious Suits', 'Second', 'Room One',15000, 0),
				('Prestigious Suits', 'Second', 'Room Two',15000, 0),('Prestigious Suits', 'Second', 'Room Three',15000, 0),('Prestigious Suits', 'Second', 'Room Four',15000, 0)
				";
				
				mysql_query($sql, $db);
			}
			
			
			$query = "SELECT * FROM tblIntegratedAccounts WHERE cardNumber = '987654321'";
			$numOfRows = mysql_query($query,$db);
			if(mysql_num_rows($numOfRows) < 1)
			{
				$sql ="INSERT INTO tblIntegratedAccounts (bank, cardType, cardName, cardSsn, cardNumber, experyDate, balance) VALUES ('FirstBank', 'verve', 'Broy','123456789','123456789','2014-08-02', 100000000), 
				('ZennethBank', 'verve', 'Broy','987654321', '987654321','2013-08-02', 1000000)
				";
		
				mysql_query($sql, $db);
			}
			
			$query = "SELECT * FROM tblWines WHERE wineName = 'Chateau'";
			$numOfRows = mysql_query($query,$db);
			if(mysql_num_rows($numOfRows) < 1)
			{
				$sql ="INSERT INTO tblWines (wineCategory, wineName, winePrice, winePicture) VALUES 
				(1, 'Borne Dry Red', 20000,'GhostlyWines_bonedryred.jpg'), 
				(1, 'Cockfighter Ghost', 15000,'GhostlyWines_cockfighter.jpg'),
				(1, 'Ghostly White', 20000,'GhostlyWines_ghostly_white.jpg'), 
				(2, 'Ahmnio', 25000,'greek_red_wine_ahmnio.jpg'),
				(2, 'Ahnejos', 20500,'greek_red_wine_ahnejos.jpg'),
				(2, 'Syrah', 20000,'greek_red_wine_syrah.jpg'),
				(2, 'Chateau', 20000,'greek_red_wine_chateau.jpg'),
				(3, 'H Lanvin and Fills', 20000,'hlanvin.jpg'),
				(3,'Adele Cuvee', 20000,'adele.jpg'),
				(3,'Morton Black Label', 20000,'morton.jpg'),
				(3,'Laurent Perrier', 20000,'launrentperrier.jpg')
				";
		
				mysql_query($sql, $db);
			}
			
			$query = "SELECT * FROM tblWineCategory WHERE wineCategory = 'Champaign'";
			$numOfRows = mysql_query($query,$db);
			if(mysql_num_rows($numOfRows) < 1)
			{
				$sql ="INSERT INTO tblWineCategory (wineCategory) VALUES ('Ghostly Wine'), ('Greek Red Wine'),('Champaign')
				";
		
				mysql_query($sql, $db);
			}
			
			$query = "SELECT * FROM tblFoodCategory WHERE foodCategory = 'Beverages'";
			$numOfRows = mysql_query($query,$db);
			if(mysql_num_rows($numOfRows) < 1)
			{
				$sql ="INSERT INTO tblFoodCategory (foodCategory) VALUES ('Fruit Juice'), ('Exotic Delight'),('Beverages'),('Decafenated Coffee'),('Hearty Breakfast'),('Main Dish'),('Pepper Soup')
				";
		
				mysql_query($sql, $db);
			}
			
			
			$query = "SELECT * FROM tblFood WHERE foodName = 'Pineaple'";
			$numOfRows = mysql_query($query,$db);
			if(mysql_num_rows($numOfRows) < 1)
			{
				$sql ="INSERT INTO tblFood (foodCategory, foodName, foodPrice, foodPicture) VALUES 
				(1, 'Apple Juice', 200,'applejuice.jpg'), 
				(1, 'Orange Juice', 200,'orangejuice.jpg'),
				(1, 'Pineaple Juice', 200,'pineaplejuice.jpg'),
				(1, 'Mixed Juice', 200,'mixedjuice.jpg'), 
				
				(2, 'Fruit Plater', 500,'fruitplater.jpg'),
				(2, 'Fruit Salad', 500,'fruitsalad.jpg'),
				(2, 'Pawpaw', 500,'pawpaw.jpg'),
				(2, 'Pineaple', 500,'pineaple.jpg'),
				
				(3, 'Tea', 300,'tea.jpg'),
				(3,'Nescafe', 300,'nescafe.jpg'),
				(3,'Coffee', 300,'coffee.jpg'),
				
				(4, 'Hot Chocolate', 300,'hotchocolate.jpg'),
				(4,'Hot Milk', 300,'hotmilk.jpg'),
				
				(5,'Baked Beans', 300,'bakedbeans.jpg'),
				(5,'Beef Sousage', 300,'beefsousage.jpg'),
				(5,'Cheese Omelet', 300,'cheeseomelet.jpg'),
				(5,'Chicken Sousage', 300,'chickensousage.jpg'),
				(5,'Onions Omelet', 300,'onionsomelet.jpg'),
				(5,'Scrambled Eggs', 300,'scrambledeggs.jpg'),
				
				(6,'Eba', 500,'eba.jpg'),
				(6,'Pounded Yam', 500,'poundedyam.jpg'),
				(6,'Tuwon Shikafa', 500,'tuwonshinkafa.jpg'),
				
				
				(7,'Cow Meat', 600,'cowmeat.jpg'),
				(7,'Croaker Fish', 600,'croakerfish.jpg'),
				(7,'Cat Fish', 600,'catfish.jpg')
				";
		
				mysql_query($sql, $db);
			}
			