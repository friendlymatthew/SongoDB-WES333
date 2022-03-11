
## Start Server using XAMPP
[server](http://localhost:8080/phpmyadmin)

## Create Database and name it music-db

## PASTE THESE SQL QUERIES

### Creating Users Table with username and password field
#### primary key: username
```sql
CREATE TABLE users (username VARCHAR(255) PRIMARY KEY, password varchar(255));

INSERT INTO users(username, password) VALUES ("Amelia-Earhart", "Youaom139&yu7");
INSERT INTO users(username, password) VALUES ("Otto", "StarWars2*");
```

### Creating Ratings Table with id, username, song, rating
#### primary key: id, foreign key: username and song

```sql
CREATE TABLE ratings (id INTEGER PRIMARY KEY AUTO_INCREMENT, username varchar(255) FOREIGN KEY on delete cascade, song varchar(255), rating INTEGER);

INSERT INTO ratings(username, song, rating) VALUES ("Amelia-Earhart", "Freeway", 3);
INSERT INTO ratings(username, song, rating) VALUES ("Amelia-Earhart", "Days of Wine and Roses", 4);
INSERT INTO ratings(username, song, rating) VALUES ("Otto", "Days of Wine and Roses", 5);
INSERT INTO ratings(username, song, rating) VALUES ("Amelia-Earhart", "These Walls", 4);
```


### Creating Artists Table with song, artist
#### Primary key: song
```sql
CREATE TABLE artists (song VARCHAR(255) PRIMARY KEY, artist varchar(255));

INSERT INTO artists(song, artist) VALUES ("Freeway","Aimee Mann");
INSERT INTO artists(song, artist) VALUES ("Days of Wine and Roses","Bill Evans");
INSERT INTO artists(song, artist) VALUES ("These Walls","Kendrick Lamar");
```
