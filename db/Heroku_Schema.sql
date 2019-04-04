	#Melanie Jones
	#CS 401, Assignment #5

	CREATE SCHEMA IF NOT EXISTS heroku_9bd6986b3a0fe57;
	USE heroku_9bd6986b3a0fe57;

	#A user can be a parent/guardian (not currently supported), a provider, or a system admin
	CREATE TABLE User (user_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
					   first_name VARCHAR(40) NOT NULL, 
					   last_name VARCHAR(40) NOT NULL, 
					   email VARCHAR(100) NOT NULL, 
					   password VARCHAR(40) NOT NULL, 
					   permissions INTEGER DEFAULT 0, 
					   isActive BOOLEAN DEFAULT 1);

	#A camp provider offers camps
	CREATE TABLE CampProvider (provider_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
							   company_name VARCHAR(100) NOT NULL, 
							   website VARCHAR(150) NOT NULL UNIQUE, 
							   address_1 VARCHAR(100) NOT NULL, 
							   address_2 VARCHAR(100), 
							   city VARCHAR(100) NOT NULL, 
							   state VARCHAR(2) NOT NULL, 
							   zipcode VARCHAR (20) NOT NULL, 
							   isActive BOOLEAN DEFAULT 1);
							   
	#A user might administer more than one camp. i.e. one camp admin might administer camps for West YMCA and Downtown YMCA 				
	CREATE TABLE Admin (admin_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
						user_id INTEGER NOT NULL, provider_id INTEGER NOT NULL, 
						FOREIGN KEY (user_id) REFERENCES User(user_id), 
						INDEX(user_id),
						FOREIGN KEY (provider_id) REFERENCES CampProvider(provider_id), 
						INDEX(provider_id));				
		
	#A camp is an offering by a provider that follows a prescribed schedule. One camp may have many sessions.
		CREATE TABLE Camp (camp_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
						   provider_id INTEGER NOT NULL, 
						   camp_name VARCHAR(100) NOT NULL, 
						
						   camp_location VARCHAR(100),
						   address_1 VARCHAR(100),
						   address_2 VARCHAR(100), 
						   city VARCHAR(100), 
						   state VARCHAR(2), 
						   zipcode VARCHAR (20), 
						   description MEDIUMTEXT NOT NULL, 
						   isActive BOOLEAN DEFAULT 1, 
						   FOREIGN KEY (provider_id) REFERENCES Admin(provider_id), 
						   INDEX(provider_id));
								
	#Camps belong to categories. Examples of categories are STEM, Academic, Sports, Nature, Cooking, Art, Dance, Theater, Music, etc.							
	CREATE TABLE Category (category_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
						   category_name VARCHAR(50) NOT NULL UNIQUE, 
						   isActive BOOLEAN DEFAULT 1);

	#Camps have attributes. Examples of attributes are scholarship available, girls only, boys only, gifted, special needs, before/after care, etc.
	CREATE TABLE Attribute (attribute_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
							attribute_name VARCHAR(50) NOT NULL UNIQUE, 
							isActive BOOLEAN DEFAULT 1);

	#Camps are available to certain age groups. Examples of age groups are 0-4, 5-7, 8-11, 12+
	CREATE TABLE Age (age_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
					  age_name VARCHAR(50) NOT NULL UNIQUE, 
					  isActive BOOLEAN DEFAULT 1);

	#Camps can belong to more than one category
	CREATE TABLE CampCategory(catrc_id INTEGER PRIMARY KEY AUTO_INCREMENT,  
							  category_id INTEGER NOT NULL, 
							  camp_id INTEGER NOT NULL,
							  FOREIGN KEY (category_id) REFERENCES Category(category_id), 
							  INDEX (category_id),
							  FOREIGN KEY (camp_id) REFERENCES Camp(camp_id), 
							  INDEX(camp_id));

	#Camps can have multiple attributes						  
	CREATE TABLE CampAttribute(atrc_id INTEGER PRIMARY KEY AUTO_INCREMENT,  
							   attribute_id INTEGER NOT NULL, 
							   camp_id INTEGER NOT NULL,
							   FOREIGN KEY (attribute_id) REFERENCES Attribute(attribute_id), 
							   INDEX(attribute_id),
							   FOREIGN KEY (camp_id) REFERENCES Camp(camp_id), 
							   INDEX(camp_id));

	#Camps can serve multiple age groups					
	CREATE TABLE CampAge(agc_id INTEGER PRIMARY KEY AUTO_INCREMENT,  
						 age_id INTEGER NOT NULL, 
						 camp_id INTEGER NOT NULL,
						 FOREIGN KEY (age_id) REFERENCES Age(age_id), 
						 INDEX(age_id),
						 FOREIGN KEY (camp_id) REFERENCES Camp(camp_id), 
						 INDEX(camp_id));

	#Camps can have multiple instances, called sessions. Each session has unique start and end date, time, and possibly cost.						  
	CREATE TABLE Session(session_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
						 camp_id INTEGER NOT NULL, 
						 start_date DATE NOT NULL, 
						 end_date DATE NOT NULL, 
						 isActive BOOLEAN DEFAULT 0, 
						 cost VARCHAR(50), 
						 session_notes TINYTEXT,	
						 camp_location VARCHAR(100),
						 address_1 VARCHAR(100),
						 address_2 VARCHAR(100), 
						 city VARCHAR(100), 
						 state VARCHAR(2), 
						 zipcode VARCHAR (20), 
						 FOREIGN KEY (camp_id) REFERENCES Camp(camp_id), INDEX(camp_id));