CREATE TYPE role AS ENUM ('Admin', 'Manager', 'Regular User');
CREATE TABLE user_roles(
    name role NOT NULL PRIMARY KEY,
    description TEXT
);
INSERT INTO user_roles VALUES ('Admin', 'This is the Admin role. You have control over everything.'),
('Manager', 'This is the Manager role. You assign tasks to Regular Users.'),
('Regular User', 'This is the Regular User role. This is a standard role for everyone.');

CREATE TABLE users(

    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    email varchar(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id role NOT NULL REFERENCES user_roles(name) DEFAULT 'Regular User',
    created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()

);

CREATE ROLE "Admin";
CREATE ROLE "Manager"; 
CREATE ROLE "Regular User";

--

GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO "Admin";
GRANT SELECT, INSERT, UPDATE ON ALL TABLES IN SCHEMA public TO "Manager";
GRANT SELECT ON ALL TABLES IN SCHEMA public TO "Regular User";

-- 

CREATE OR REPLACE FUNCTION create_pg_user()
RETURNS TRIGGER AS $$
BEGIN
    EXECUTE format('CREATE USER %I WITH PASSWORD %L', NEW.username, NEW.password);
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- 

CREATE TRIGGER create_pg_user_on_insert
BEFORE INSERT ON users
FOR EACH ROW
EXECUTE FUNCTION create_pg_user();

-- 

CREATE OR REPLACE FUNCTION assign_role()
RETURNS TRIGGER AS $$
BEGIN
    -- Revoke all roles first to ensure clean state
    EXECUTE format('REVOKE "Admin", "Manager", "Regular User" FROM %I', NEW.username);
    
    -- Grant the appropriate role based on the role_id
    CASE NEW.role_id
        WHEN 'Admin' THEN
            EXECUTE format('GRANT Admin TO %I', NEW.username);
        WHEN 'Manager' THEN
            EXECUTE format('GRANT Manager TO %I', NEW.username);
        WHEN 'Regular User' THEN
            EXECUTE format('GRANT "Regular User" TO %I', NEW.username);
        -- 'Regular User' gets no additional privileges
    END CASE;
    
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- 

CREATE TRIGGER assign_role_on_insert
AFTER INSERT ON users
FOR EACH ROW
EXECUTE FUNCTION assign_role();


