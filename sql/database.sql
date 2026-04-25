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
