CREATE TABLE artist (
  id INTEGER NOT NULL,
  first_name VARCHAR(40),
  surname VARCHAR(40),
  birthday DATE,
  nation VARCHAR(40),
  PRIMARY KEY (id)
);

CREATE TABLE type (
  id INTEGER,
  title VARCHAR(80),
  start_year NUMERIC(4),
  end_year NUMERIC(4),
  PRIMARY KEY (id)
);
CREATE TABLE create_at (
  id INTEGER,
  create_date NUMERIC(2),
  create_month NUMERIC(2),
  create_year NUMERIC(4),
  PRIMARY KEY (id)
);
CREATE TABLE show_at (
  id INTEGER,
  name VARCHAR(40),
  nation VARCHAR(40),
  PRIMARY KEY (id)
);
CREATE TABLE user (
  id INTEGER NOT NULL,
  first_name VARCHAR(40),
  surname VARCHAR(40),
  PRIMARY KEY (id)
);
CREATE TABLE score (
  id INTEGER NOT NULL,
  score FLOAT,
  votes INTEGER DEFAULT 0,
  user_id INTEGER,
  art_id INTEGER,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (art_id) REFERENCES art(id)
);

CREATE TABLE art (
  id INTEGER,
  artistid INTEGER,
  typeid INTEGER,
  create_atid INTEGER,
  show_atid INTEGER,
  PRIMARY KEY (id),
  FOREIGN KEY (artistid) REFERENCES artist(id),
  FOREIGN KEY (typeid) REFERENCES type(id),
  FOREIGN KEY (create_atid) REFERENCES create_at(id),
  FOREIGN KEY (show_atid) REFERENCES show_at(id)
);