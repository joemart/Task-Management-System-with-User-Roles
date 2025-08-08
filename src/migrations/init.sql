CREATE TYPE role AS ENUM ('Admin', 'Manager', 'Regular User');
CREATE TABLE user_roles(
    name role NOT NULL PRIMARY KEY,
    description TEXT
);
INSERT INTO user_roles VALUES ('Admin', 'This is the Admin role. You have control over everything.'),
('Manager', 'This is the Manager role. You have some control over other user''s accounts. '),
('Regular User', 'This is the Regular User role. This is a standard role for everyone.');

CREATE TABLE users(

    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email varchar(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id role NOT NULL REFERENCES user_roles(name) DEFAULT 'Regular User',
    created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()

);





-- Admin user (full access)
CREATE ROLE admin_user WITH LOGIN PASSWORD 'adminpass' SUPERUSER;

-- Editor user (CRUD operations)
CREATE ROLE editor_user WITH LOGIN PASSWORD 'editorpass';

-- Read-only user
CREATE ROLE reader_user WITH LOGIN PASSWORD 'readerpass';

GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO editor_user;
GRANT SELECT ON ALL TABLES IN SCHEMA public TO reader_user;

ALTER DEFAULT PRIVILEGES IN SCHEMA public
GRANT ALL PRIVILEGES ON TABLES TO editor_user;

ALTER DEFAULT PRIVILEGES IN SCHEMA public
GRANT SELECT ON TABLES TO reader_user;