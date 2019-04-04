USE heroku_9bd6986b3a0fe57;


INSERT INTO User
(user_id, first_name, last_name, email, password, isActive)
VALUES (1, 'Melanie', 'Jones', 'melaniejones@outlook.com', 'password', 1);  

#adding YMCA as a provider
INSERT INTO User
(user_id, first_name, last_name, email, password, isActive)
VALUES (2, 'Happy', 'Day', 'happyday@ymca.com', 'password', 1);

INSERT INTO CampProvider
(provider_id, company_name, website, address_1, city, state, zipcode)
VALUES (1, 'Treasure Valley Family YMCA', 'https://www.ymcatvidaho.org/', 'Multiple Locations', 'Boise', 'ID', '83713');

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (1, 1, 1);

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (2, 2, 1);


#fill the attributes for the different sorting categories
INSERT INTO Category
(category_id, category_name)
VALUES(1, 'STEM');

INSERT INTO Category
(category_id, category_name)
VALUES(2, 'Academic');

INSERT INTO Category
(category_id, category_name)
VALUES(3, 'Sports & Aquatics');

INSERT INTO Category
(category_id, category_name)
VALUES(4, 'Nature');

INSERT INTO Category
(category_id, category_name)
VALUES(5, 'Cooking & Health');

INSERT INTO Category
(category_id, category_name)
VALUES(6, 'Art');

INSERT INTO Category
(category_id, category_name)
VALUES(7, 'Dance');

INSERT INTO Category
(category_id, category_name)
VALUES(8, 'Music');

INSERT INTO Category
(category_id, category_name)
VALUES(9, 'Theater');

INSERT INTO Category
(category_id, category_name)
VALUES(10, 'Imaginative Play');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(1, 'Girls Only');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(2, 'Boys Only');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(3, 'Gifted'); 

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(4, 'Special Needs');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(5, 'Before/After Care');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(6, 'Scholarship Available');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(7, 'AM');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(8, 'PM');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(9, 'Full Day');

INSERT INTO Attribute
(attribute_id, attribute_name)
VALUES(10, 'Overnight');

INSERT INTO Age
(age_id, age_name)
VALUES(1, '0-4');

INSERT INTO Age
(age_id, age_name)
VALUES(2, '5-7');

INSERT INTO Age
(age_id, age_name)
VALUES(3, '8-11');

INSERT INTO Age
(age_id, age_name)
VALUES(4, '12+');
 
#start adding the YMCA Camps and Sessions

INSERT INTO Camp
(camp_id, provider_id, camp_name, camp_location, address_1, city, state, zipcode, description)
VALUES(1, 1 , 'YMCA Tennis Lessons', 'South Meridian YMCA', '5155 S Hillsdale Ave', 'Meridian', 'ID', '83642', 'Join our 
instructors to learn more about this life-long sport that can be played at any age with any level of knowledge! Athletes will be
paired with others of similar abilities in an environment that challenges them through drills, in order to better understand the rules
and strategies of the game.');

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost)
VALUES(1, 1, DATE '2019-06-17', DATE '2019-06-27', 1, '$45 Member / $70 Non-Member'); 

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost)
VALUES(2, 1, DATE '2019-07-08', DATE '2019-07-18', 1, '$45 Member / $70 Non-Member');

INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(1, 3, 1); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(1, 6, 1); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(2, 7, 1); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(1, 1, 1); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(2, 2, 1);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(3, 3, 1);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(4, 4, 1);   

INSERT INTO Camp
(camp_id, provider_id, camp_name, camp_location, address_1, city, state, zipcode, description)
VALUES(2, 1 , 'Junior Adventure Camp', 'Horsethief Reservoir', '301 Cascade Rd', 'Cascade', 'ID', '83611', 'YMCA Camp at 
Horsethief Reservoir immerses children in a community where making friends is natural, exploring new interests is encouraged,
and discovering inner strengths is guaranteed. Y Camp teaches self-reliance, instills a love for nature and the outdoors, and builds
character and leadership - all amidst the fun of archery, campfires, canoeing, friends, mentorships, mountain biking, ropes course,
and so much more. Give your camper the Best Summer Ever at YMCA Camp at Horsethief Reservoir.');

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost)
VALUES(3, 2, DATE '2019-06-09', DATE '2019-06-14', 1, '$480 Member / $590 Non-Member'); 

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost, session_notes)
VALUES(4, 2, DATE '2019-06-30', DATE '2019-07-03', 1, '$325 Member / $395 Non-Member', 'This session is shorter than others
due to holiday, and pricing is adjusted accordingly');

INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(2, 4, 2); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(3, 6, 2); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(4, 10, 2); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(5, 3, 2);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(6, 4, 2);   

INSERT INTO Camp
(camp_id, provider_id, camp_name, description)
VALUES(3, 1 , 'Little Chefs Camp', 'Campers will learn the basics of nutrition using the concept of "Eating a Rainbow" to get the 
proper nutrition to grow healthy and strong. Campers will learn how to cook and construct basic recipes using ingredients they are 
familiar with as well as some that are new to their palate');

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost, camp_location, address_1, city, state, zipcode)
VALUES(5, 3, DATE '2019-06-17', DATE '2019-06-21', 1, '$64 Member / $99 Non-Member', 'Downtown YMCA', '1050 W State St', 'Boise', 'ID', '83702'); 

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost, camp_location, address_1, city, state, zipcode)
VALUES(6, 3, DATE '2019-06-24', DATE '2019-06-28', 1, '$62 Member / $95 Non-Member', 'Caldwell YMCA', '3720 S Indiana Ave', 'Caldwell', 'ID', '83605');

INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(3, 5, 3); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(5, 6, 3); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(6, 7, 3); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(7, 1, 3);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(8, 2, 3);      

-- adding Boise School of Rock as a Provider --

INSERT INTO User
(user_id, first_name, last_name, email, password, isActive)
VALUES (3, 'Rock', 'On', 'rockon@boiserockschool.com', 'password', 1);

INSERT INTO CampProvider
(provider_id, company_name, website, address_1, city, state, zipcode)
VALUES (2, 'Boise Rock School', 'https://www.boiserockschool.com/', '1404 W Idaho St', 'Boise', 'ID', '83702');

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (3, 1, 2);

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (4, 3, 2);

INSERT INTO Camp
(camp_id, provider_id, camp_name, description, camp_location, address_1, city, state, zipcode)
VALUES(4, 2 , 'Recording Arts Camp with Audiolab', 'One of our most popular camps! Learn how to make cool records in a week! 
This camp will take at place at the famed Audiolab recording studio in Boise. You learn everything from microphone techniques 
to mixing and mastering. This camp is led by Boise Rock School teachers and Audiolab owner Steve Fulton. It will be epic! Open 
to students age 8-18 of all skill levels', 'Audio Lab', '3640 Osage St', 'Garden City', 'ID', '83714' );

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost)
VALUES(7, 4, DATE '2019-07-15', DATE '2019-07-19', 1, '$165'); 


INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(4, 8, 4); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(7, 7, 4); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(9, 3, 4);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(10, 4, 4);

-- adding Discovery Center as a Provider --

INSERT INTO User
(user_id, first_name, last_name, email, password, isActive)
VALUES (4, 'For', 'Science', 'forscience@discoverycenter.com', 'password', 1);

INSERT INTO CampProvider
(provider_id, company_name, website, address_1, city, state, zipcode)
VALUES (3, 'Discovery Center of Idaho', 'https://www.dcidaho.org/', '131 Myrtle St', 'Boise', 'ID', '83702');

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (5, 1, 3);

INSERT INTO Admin
(admin_id, user_id, provider_id)
VALUES (6, 4, 3);

INSERT INTO Camp
(camp_id, provider_id, camp_name, description)
VALUES(5, 3 , 'All Girls Coding Camp', 'Join a community of strong, passionate girls and mentors as you learn the 
basics of coding. Learn about future opportunities in STEM fields and the relevance of computer science in our world today. 
Computer skills necessary but no previous coding experience needed.');

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost)
VALUES(8, 5, DATE '2019-07-08', DATE '2019-07-12', 1, 'Non-Members $110/ Members $99'); 

INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(5, 1, 5); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(8, 7, 5); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(9, 1, 5); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(11, 3, 5);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(12, 4, 5);

INSERT INTO Camp
(camp_id, provider_id, camp_name, description)
VALUES(6, 1, 'Battlebots Camp', 'Kids will build robots, motorized cars, hydraulic lifts, and more, all with mini motors and battery packs.
At the end of the camp kids will get the opportunity to battle their creations.');

INSERT INTO Session 
(session_id, camp_id, start_date, end_date, isActive, cost, camp_location, address_1, city, state, zipcode)
VALUES(9, 6, DATE '2019-06-03', DATE '2019-06-07', 1, '$114 Member / $174 Non-Member', 'Downtown YMCA', '1050 W State St', 'Boise', 'ID', '83702'); 

INSERT INTO CampCategory
(catrc_id, category_id, camp_id)
VALUES(6, 1, 6); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(10, 7, 6); 

INSERT INTO CampAttribute
(atrc_id, attribute_id, camp_id)
VALUES(11, 6, 6); 

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(13, 2, 6);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(14, 3, 6);

INSERT INTO CampAge
(agc_id, age_id, camp_id)
VALUES(15, 3, 5);