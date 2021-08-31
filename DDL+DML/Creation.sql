create Table Users
(
	User_id number (5),
	Name varchar2(50) NOT NULL,
	CNIC number(13) NOT NULL UNIQUE,
	Gender varchar(1),
	Height number NOT NULL CHECK (Height>0),
	Weight number NOT NULL CHECK (Weight>0),
	BMI number,
	Goal_weight number NOT NULL,
	nutritional_intake varchar2(100),
	Plan_id number(5),
	Progress_id number(5),
	Primary Key(User_id),
	FOREIGN KEY (Plan_id) REFERENCES Plan(Plan_id),
	FOREIGN KEY (Progress_id) REFERENCES Progress(Progress_id)
);

create Table Plan 
(
	Plan_id number(5),
	Plan_type varchar2 (50) NOT NULL,
	Primary Key(Plan_id)
);

create Table Exercise  
(
	Name varchar2 (50) ,
	Muscle varchar2 (50) NOT NULL,
	Equipment varchar2 (50),
	Optimal_sets number (4) NOT NULL,
	Primary Key(Name)
);

create Table Contain
(
	Plan_id number(5), 
	Name varchar2(50),
	Day varchar2(10),
	FOREIGN KEY (Plan_id) REFERENCES Plan(Plan_id),
	FOREIGN KEY (Name) REFERENCES Exercise(Name),
	constraint C1_pk primary key(Plan_id, Name)	
);

create Table Progress
(
	Progress_id Number(5),
	Targets_fulfilled Number ,
	Weight_change Number,
	BMI_change Number,
	Primary Key(Progress_id)
);
	
	
	
	
	
	
	