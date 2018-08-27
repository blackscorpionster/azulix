create table BUNELI_USER
(
  cod_user int not null,
  txt_name varchar(100) not null,
  txt_surname varchar(100) not null,
  txt_email varchar(100) not null,
  txt_pass varchar(33) not null,
  mob_number varchar(25),
  dat_singup date not null,
  dat_singaway date null,
  cod_state tinyint not null,
  cod_country varchar(3) not null,
  img_user	varchar(100)
);


--

alter table BUNELI_USER add com_file varchar(50);


alter table BUNELI_USER add code BIGINT;

alter table BUNELI_USER add pass_recovery_email varchar(100) null;
--


create table BUNELI_STATE
(
  cod_state tinyint,
  txt_state varchar(25)
);

create table BUNELI_APP
(
	cod_app	tinyint,
	txt_name	varchar(25),
	cod_state tinyint,
	dat_begin date,
	dat_end date
);

create table BUNELI_OPTION
(
  cod_app tinyint,
  cod_option mediumint,
  txt_option varchar(25),
  url_validate varchar(200),
  url_execute varchar(200),
  url_draw varchar(200),
  opt_menu tinyint,
  opt_father_menu mediumint,
  img_option	varchar(100),
  pop_up tinyint,
  txt_command   varchar(100)
);

alter table BUNELI_OPTION rename to option;

-- alter table BUNELI_OPTION add pop_up tinyint;

create table BUNELI_COUNTRY
(
	cod_country  varchar(3),
	txt_country  varchar(150)
);

create table BUNELI_MESSAGES
(
    cod_app     tinyint,
    cod_message varchar(15),
    cod_language varchar(3),
    txt_message varchar(120),
    ind_application tinyint
);

-- alter table buneli_messages add ind_application number

create table BUNELI_LANGUAGES
(
    cod_language    varchar(3),
    txt_language    varchar(30)
);

create table BUNELI_OPTION_DICTIONARY
(
    txt_option      varchar(25),
    cod_language    varchar(3),
    txt_translation varchar(25)
);


alter table BUNELI_USER add constraint buneli_user_pk primary key (cod_user);

alter table BUNELI_STATE add constraint buneli_state_pk primary key (cod_state);

alter table BUNELI_APP add constraint buneli_app_pk primary key (cod_app);

alter table BUNELI_OPTION add constraint buneli_option primary key (cod_app,cod_option);

alter table BUNELI_COUNTRY add constraint buneli_country primary key (cod_country);

alter table BUNELI_MESSAGES add constraint buneli_messages_pk primary key (cod_app,cod_message,cod_language);

alter table BUNELI_LANGUAGES add constraint buneli_languages_pk primary key (cod_language);

create unique index buneli_user_idx01 on BUNELI_USER(txt_email);

alter table BUNELI_OPTION_DICTIONARY add constraint buneli_ipdi_pk primary key (txt_option,cod_language);

--




-------------


create table JSON_CONTACT_TYPE
(
    cod_type    tinyint,
    txt_name    varchar(30)
);

-- drop table Json_contact

create table JSON_CONTACT
(
    cod_user_host   integer,
    cod_user_guest  integer,
    cod_state       tinyint,
    fec_start       date,
    link_message    varchar(50),
    cod_type        tinyint
);

alter table JSON_CONTACT_TYPE add constraint Json_contype_pk primary key (cod_type);

alter table JSON_CONTACT add constraint Json_contact_pk primary key (cod_user_host,cod_user_guest);


-- drop table json_message

create TABLE JSON_MESSAGE
(
    fec_message datetime,
    from_user   integer,
    to_user  integer,
    txt_message varchar(178),
    ind_read tinyint
);

ALTER TABLE JSON_MESSAGE RENAME TO MESSAGE;


alter table JSON_MESSAGE add constraint JSON_MESSAGE_PK primary key (fec_message,from_user,to_user);

create index Json_message_idx01 on JSON_MESSAGE (to_user);

create index Json_message_idx02 on JSON_MESSAGE (fec_message,from_user,to_user);


-- *** I need to convert this entire to PG

ALTER TABLE JSON_MESSAGE ALTER COLUMN fec_message SET DATA TYPE TIMESTAMP WITHOUT TIME ZONE;