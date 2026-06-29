create database game_statistics char set utf8mb4 collate utf8mb4_general_ci;
create user 'gamer'@'localhost' identified by 'gamer123';
grant all privileges on game_statistics.* to 'gamer'@'localhost';
use game_statistics;
select * from users;
drop table game;
select g.id,g.name,g.yearOrRangeOfProduction,g.user_id,u.nickname from game_statistics.game g inner join game_statistics.users u
on g.user_id=u.id;
select * from game;
use game_statistics;
-- need to add in table games additional field and 1 char character 1 or 0 to check if game have sequel if game have sequel 
-- action for sequel will be printed in game index otherwise actions for game statistics will be printed
alter table game modify column have_sequel char(1) null;
alter table game drop column platform_id;
SELECT distinct genre_id FROM game_statistics.game_genre where game_id='1';

SELECT MAX(id) from game_genre where game_id=1 and genre_id =1;
select count(*) as broj_duplikata from game_genre where game_id=1 and genre_id = 1;
delete from game_genre where id = 23;


/* DELIMITER $$
create procedure deleteDuplicatedValues(in game_id bigint, in genre_id bigint)
begin 
declare duplicateNumbers int;
declare idToDelete bigint;
start transaction;
select count(*) into duplicateNumbers from game_genre where game_id=game_id and genre_id=genre_id;
while duplicateNumbers > 1 do 
   if duplicateNumbers > 1 then 
		select MAX(id) into idToDelete from game_genre where game_id=game_id and genre_id =genre_id;
		delete from game_genre where id=  idToDelete;
        set duplicateNumbers = duplicateNumbers-1;
        COMMIT;
	   else 
		set duplicateNumbers = duplicateNumbers+1;
	   rollback;
	   end if;
end while; 
end $$
DELIMITER ;

call deleteDuplicatedValues(1,1);
drop procedure deleteDuplicatedValues;
*/
delete from game_genre where id=3;