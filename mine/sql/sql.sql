create database mine;
use mine;
create table users(
    user_id int(3) unsigned not null auto_increment,
    name varchar(40) not null,
    email varchar(40) not null,
    pass varchar(40) not null,
    registration_date timestamp,
    primary key(user_id),
    key email(email)
);

create table contents(
    content_id int(4) unsigned not null auto_increment,
    content varchar(300) default null,
    image_name varchar(255) default NULL,
    primary key(content_id)
);

create table user_content_associations(
    uca_id int(4) unsigned not null auto_increment,
    user_id int(3) unsigned not null,
    content_id int(4) unsigned not null,
    publish_date timestamp not null,
    likes int(3) unsigned not null default 0,
    primary key(uca_id)
);

create table page_views(
    pv_id int(3) unsigned not null auto_increment,
    page_title varchar(40) not null,
    quantity int(3) unsigned not null default 0,
    primary key(pv_id)
);

create table suggestions(
    sug_id int(3) unsigned not null auto_increment,
    suggestion varchar(255) not null,
    publish_date timestamp,
    likes int(3) not null default 0,
    who varchar(100) default NULL,
    primary key(sug_id)
);
