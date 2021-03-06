﻿CREATE OR REPLACE FUNCTION FN_GETMESSAGE
(
    pty_app  INT,
    pty_lang varchar(3),
    pty_codmsg varchar(15)
)
RETURNS VARCHAR(120) AS
$BODY$
DECLARE 
        lvc_message varchar(120);
BEGIN

        lvc_message = null;

    select  txt_message TXT_MESSAGE
	INTO	lvc_message
    from    APP_MESSAGE
    where   cod_app 		= pty_app
    and     cod_language 	= pty_lang
    and     cod_message 	= pty_codmsg
	;
	
	return lvc_message;

END;
$BODY$
LANGUAGE PLPGSQL;