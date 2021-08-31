
INSERT INTO Users VALUES (10001, 'Hassan Shahzad', '12345', 'M', 65, 65, 19, 62, '2000 Calories', 10001, 10001);
INSERT INTO Users VALUES (10002, 'Sana Ali', '12346', 'F', 48, 48, 19, 55, '2400 Calories', 10002, 10002);
INSERT INTO Users VALUES (10003, 'Azka Khurram', '12347', 'F', 60, 60, 55, 62, '3200 Calories', 10003, 10003);
INSERT INTO Users VALUES (10004, 'Zeeshan Ikram', '12348', 'M', 75, 67, 19, 78, '2600 Calories', 10004, 10004);


INSERT INTO Plan VALUES (10001, 'Loss');
INSERT INTO Plan VALUES (10002, 'Gain');
INSERT INTO Plan VALUES (10003, 'Loss');
INSERT INTO Plan VALUES (10004, 'Gain');

INSERT INTO Exercise VALUES ('Squats', 'Thigh', 'Gym Mat', '3' );
INSERT INTO Exercise VALUES ('Biceps', 'Arm', 'Dumbells', '3' );
INSERT INTO Exercise VALUES ('Pushups', 'Arm, Chest', 'Gym Mat', '3' );
INSERT INTO Exercise VALUES ('Pullups', 'Arm, Back', 'Metal Rod', '3' );
INSERT INTO Exercise VALUES ('Plank', 'Abdomen', 'Gym Mat', '1' );
INSERT INTO Exercise VALUES ('Crunches', 'Abdomen', 'Gym Mat', '3' );

INSERT INTO Contain VALUES (10001, 'Squats', 'Monday');
INSERT INTO Contain VALUES (10001, 'Crunches', 'Tuesday');
INSERT INTO Contain VALUES (10001, 'Plank', 'Wednesday');
INSERT INTO Contain VALUES (10002, 'Bicpes', 'Monday');
INSERT INTO Contain VALUES (10002, 'Pushups', 'Wednesday');
INSERT INTO Contain VALUES (10003, 'Crunches', 'Saturday');
INSERT INTO Contain VALUES (10004, 'Squats', 'Saturday');
INSERT INTO Contain VALUES (10004, 'Pushups', 'Sunday');

INSERT INTO Progress VALUES (10001, 60, 65, 18.5);
INSERT INTO Progress VALUES (10002, 85, 53, 18);
INSERT INTO Progress VALUES (10003, 40, 58, 18.7);
INSERT INTO Progress VALUES (10004, 32, 74, 19);

