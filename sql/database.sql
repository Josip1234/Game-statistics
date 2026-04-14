create database game_statistics char set utf8mb4 collate utf8mb4_general_ci;
create user 'gamer'@'localhost' identified by 'gamer123';
grant all privileges on game_statistics.* to 'gamer'@'localhost';