-- 1. Datenbank "people" erzeugen 
create database people;

-- 2. Datenbankschema verwenden
use people;

-- 3. Tabelle erzeugen
create table birthdays (id numeric, name varchar(100), day date);

-- 4. Abfrageindex erstellen
create unique index birthdays_name on birthdays(name) ; 

