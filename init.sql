
CREATE TABLE users(
    id integer generated always as identity primary key,
    first varchar(50),
    last varchar(50)
);

INSERT INTO users (first, last) values ('Test', '1234'), ('Test 2', '5678');

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