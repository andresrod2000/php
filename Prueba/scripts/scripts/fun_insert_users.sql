CREATE OR REPLACE FUNCTION fun_insert_users(
   wusername users.username%TYPE,
   wpassword users.password%TYPE,
   wemail users.email%TYPE,
   wname users.name%TYPE
)RETURNS BOOLEAN AS
$$
DECLARE
 wid users.uid%TYPE;--este dato llamado"wid" es la id de users 
 BEGIN
    SELECT COALESCE(MAX(a.uid), 0) + 1 INTO wid FROM users AS a;
    IF FOUND AND wid IS NOT NULL THEN
        wid = wid + 1;
    ELSE
        wid = 1;
    END IF;
--Insertar Valores

INSERT INTO users(uid,username,password,email,name)
VALUES(wid,wusername,wpassword,wemail,wname);

    RETURN TRUE;
EXCEPTION
    WHEN OTHERS THEN
        RETURN FALSE;
END;
$$
LANGUAGE PLPGSQL;