-- Genera los insert y los update  de todas las tablas y con sus triggers
CREATE OR REPLACE FUNCTION fun_audit_tablas() RETURNS "trigger" AS
$BODY$
 BEGIN 
   IF TG_OP = 'INSERT' THEN
      NEW.usr_insert = CURRENT_USER;
      NEW.fec_insert=  CURRENT_TIMESTAMP;
     END IF;
     IF TG_OP = 'UPDATE' THEN 
      NEW.usr_update = CURRENT_USER;
      NEW.fec_update=  CURRENT_TIMESTAMP;
     END IF;
     RETURN NEW;
     END;
$BODY$
LANGUAGE PLPGSQL;

CREATE OR REPLACE TRIGGER tri_act_tab_users
 BEFORE INSERT OR UPDATE ON users
 FOR EACH ROW
 EXECUTE PROCEDURE fun_audit_tablas();