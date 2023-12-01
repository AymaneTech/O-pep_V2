create table article (
                         article_id int auto_increment primary key,
                         article_title varchar(255),
                         content varchar(1500),
                         article_image mediumblob,
                         created_at datetime DEFAULT current_timestamp(),

                         author_id int,
                         foreign key (author_id) references users (user_id),
                         theme_id int,
                         foreign key (theme_id) references theme (theme_id)
);

create table theme (
                       theme_id int auto_increment primary key,
                       theme_name varchar(255),
                       theme_image mediumblob
);

create table tags (
                      tag_id int auto_increment primary key,
                      tag_name varchar(255),
                      theme_id int,
                      foreign key (theme_id) references theme (theme_id)
);
