CREATE TABLE user_info (
    user_id UUID NOT NULL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    account_password varchar(255) NOT NULL,
    last_active_time TIMESTAMP NOT NULL,
    creation_time TIMESTAMP NOT NULL
);

CREATE TABLE day (
    given_day DATE NOT NULL PRIMARY KEY,
    user_id UUID NOT NULL REFERENCES user_info(user_id),
    updated_time TIMESTAMP NOT NULL,
    creation_time TIMESTAMP NOT NULL
);

CREATE TABLE activity (
    activity_id UUID NOT NULL PRIMARY KEY,
    user_id UUID NOT NULL REFERENCES user_info(user_id),
    given_day DATE NOT NULL REFERENCES day(given_day),
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    productive BOOLEAN NOT NULL,
    activity_type VARCHAR(36),
    notes TEXT
);