DROP FUNCTION IF EXISTS FN_APPOPTIONS(
    IN pty_app INT,
	IN pty_lang VARCHAR(3)
);

CREATE OR REPLACE FUNCTION FN_APPOPTIONS
(
    IN pty_app INT,
	IN pty_lang VARCHAR(3)
)
RETURNS TABLE (COD_APP SMALLINT, 
		TXT_NAME VARCHAR, 
		COD_STATE SMALLINT, 
		DAT_BEGIN DATE, 
		DAT_END DATE,
		COD_OPTION INTEGER, 
		TXT_OPTION  VARCHAR, 
		URL_VALIDATE  VARCHAR, 
		URL_EXECUTE  VARCHAR, 
		URL_DRAW  VARCHAR, 
		OPT_MENU SMALLINT, 
		OPT_FATHER_MENU INT, 
		ICON  VARCHAR,  
		POP_UP SMALLINT,
		TXT_COMMAND  VARCHAR
		) AS
$BODY$
		
	SELECT  a.cod_app::SMALLINT as COD_APP, 
		a.txt_name as TXT_NAME, 
		a.cod_state::SMALLINT as COD_STATE, 
		a.dat_begin as DAT_BEGIN, 
		a.dat_end as DAT_END,
		b.cod_option::INTEGER as COD_OPTION, 
		COALESCE(c.txt_translation,b.txt_option) as TXT_OPTION, 
		b.url_validate as URL_VALIDATE, 
		b.url_execute as URL_EXECUTE, 
		b.url_draw as URL_DRAW, 
		b.opt_menu::SMALLINT as OPT_MENU, 
		b.opt_father_menu::INTEGER as OPT_FATHER_MENU, 
		b.img_option as ICON, 
		b.pop_up::SMALLINT as POP_UP,
		b.txt_command as TXT_COMMAND
	FROM    APP a,
		OPTION b
		LEFT JOIN OPTION_DICTIONARY C 
		ON  (	c.cod_language = pty_lang
			and c.txt_option = b.txt_option )
	where   a.cod_app = pty_app
	and     b.cod_app = a.cod_app
ORDER BY b.cod_option
	;

$BODY$
LANGUAGE SQL STABLE
ROWS 100;

SELECT * FROM FN_APPOPTIONS(1, 'eng');