create database invited_vote;

use invited_vote;

create table vote(
  email varchar(200),
  token varchar(200),
  vote  numeric
);

create unique index vote_email on vote(email);
