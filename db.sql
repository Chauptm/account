use accounts;
CREATE TABLE SignUp (
  id int primary key auto_increment ,
  email varchar(255) not null unique,
  username varchar(45) not null unique,
  first_name varchar(45) not null ,
  last_name varchar(45) not null,
  avatar varchar(255),
  job_title varchar(225) ,
  company_name varchar(225) ,
  password varchar(45) not null,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  verification_code text,
  index index_id (id),
  unique index index_username (username),
  unique index index_email (email)
)ENGINE=InnoDB;