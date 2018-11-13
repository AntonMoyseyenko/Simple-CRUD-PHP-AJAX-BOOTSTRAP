use mysql;
drop database if exists dbUsers;
create database dbUsers;
use dbUsers;
go

CREATE TABLE tbUsers (
id INT NOT NULL AUTO_INCREMENT,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
);
go

DELIMITER //
create procedure spCreateUser(
in first_name varchar (30),
in last_name varchar (30)
)
begin
if exists (select * from tbUsers where 
firstname = first_name and lastname = last_name) then
select 'User Exists' as User_Status;
else
insert into tbUsers (firstname, lastname) 
values (first_name, last_name);
select 'User created' as User_Status;
end if;
end//
DELIMITER ;
go

DELIMITER //
create procedure spReadUsers()
begin
select * from tbUsers;
end//
DELIMITER ;
go

DELIMITER //
create procedure spUpdateUser(
in user_id int,
in first_name varchar (20),
in last_name varchar (60)
)
begin
update tbUsers 
set firstname = first_name, lastname = last_name
where id = user_id;
select 'User updated' as User_Status;
end//
DELIMITER ;

DELIMITER //
create procedure spDeleteUser(
in user_id int
)
begin
delete from tbUsers where id = user_id;
select 'User deleted' as User_Status;
end//
DELIMITER ;

call spCreateUser ('Joan', 'Jett');
call spCreateUser ('Austin', 'Powers');
call spCreateUser ('Anakin', 'Skywalker');

call spReadUsers;

-- call spUpdateUser (3,'Darth', 'Vader');

-- call spReadUsers;

-- call spDeleteUser (3);

-- call spReadUsers;




