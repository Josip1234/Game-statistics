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