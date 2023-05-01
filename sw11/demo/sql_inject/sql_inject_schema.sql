create database sql_inject;

use sql_inject;

create table reports (user varchar(100), text varchar(1000), date_from date);

insert into reports (user, text, date_from) values ('eve', 'Der geheime Report von Eve: ...', '2019-11-01');
insert into reports (user, text, date_from) values ('eve', 'Der geheime Report von Eve (2): ...', '2017-03-04');
insert into reports (user, text, date_from) values ('alice', 'Der geheime Report von Alice: ...', '2018-07-21');
insert into reports (user, text, date_from) values ('bob', 'Der geheime Report von Bob: ...', '2013-03-04');
insert into reports (user, text, date_from) values ('bob', 'Der geheime Report von Bob (2): ...', '2016-01-23');
