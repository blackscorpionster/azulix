/*DROP FUNCTION FN_GETMESSAGES(
    pty_app  INT,
    pty_lang varchar(3),
    pty_codmsg varchar[]
);*/

CREATE OR REPLACE FUNCTION FN_GETMESSAGES
(
    pty_app  INT,
    pty_lang varchar(3),
    pty_codmsg varchar[]
)
RETURNS TABLE (
  TXT_MESSAGE varchar,
  COD_MESSAGE varchar
) AS
$BODY$

    select  txt_message AS TXT_MESSAGE, cod_message AS COD_MESSAGE
    from    APP_MESSAGE
    where   cod_app 		= pty_app
    and     cod_language 	= pty_lang
    and     cod_message 	= ANY(pty_codmsg)
	;
	
$BODY$
LANGUAGE SQL STABLE;



SELECT * FROM FN_GETMESSAGES(1, 'eng', '{"log_in", "user_text", "pass_txt"}'::varchar[]);

/*


    select  txt_message TXT_MESSAGE
    from    APP_MESSAGE
    where   cod_app 		= 1
    and     cod_language 	= 'eng'
    and     cod_message 	= 'login'

    select  txt_message TXT_MESSAGE
    from    APP_MESSAGE
    where   cod_app 		= 1
    and     cod_language 	= 'eng'
    and     cod_message 	= ANY('{"log_in", "user_text", "pass_txt"}'::varchar[])

    */