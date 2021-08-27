#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE Quote_Manager;
USE Quote_Manager;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        u_id        Int  Auto_increment  NOT NULL ,
        u_email     Varchar (100) NOT NULL ,
        u_firstname Varchar (50) NOT NULL COMMENT "user is connecting with email and pw only, firstname is for ux only"  ,
        u_password  Varchar (20) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (u_id)
)ENGINE=InnoDB;

INSERT INTO user (u_email, u_firstname, u_password) values ('Maiar@test.fr', 'Maiar', ''), ('Valar@test.fr', 'Valar', ''), ('Olorin@test.fr', 'Olorin', ''), ('Morgoth@test.fr', 'Morgoth', '');


#------------------------------------------------------------
# Table: shipping_line
#------------------------------------------------------------

CREATE TABLE shipping_line(
        sl_id        Int  Auto_increment  NOT NULL ,
        sl_name      Varchar (50) NOT NULL ,
        sl_firstname Varchar (50) NOT NULL ,
        sl_lastname  Varchar (50) NOT NULL ,
        sl_email     Varchar (100) NOT NULL ,
        sl_phone     Varchar (50) NOT NULL
	,CONSTRAINT shipping_line_PK PRIMARY KEY (sl_id)
)ENGINE=InnoDB;

insert into shipping_line (sl_name,sl_firstname,sl_lastname,sl_email,sl_phone) values ('CMA CGM','Nico', 'Batman','sales@shipping1.fr','0123456789');
insert into shipping_line (sl_name,sl_firstname,sl_lastname,sl_email,sl_phone) values ('HAPPAG LLOYD','T', 'P','sales@shipping2.fr','0123456798');
insert into shipping_line (sl_name,sl_firstname,sl_lastname,sl_email,sl_phone) values ('MAERSK','Babac', 'Diaw','sales@shipping3.fr','0123456987');
insert into shipping_line (sl_name,sl_firstname,sl_lastname,sl_email,sl_phone) values ('ONE','Flo', 'Pietrus','sales@shipping4.fr','0123459876');


#------------------------------------------------------------
# Table: container_default_value
#------------------------------------------------------------

CREATE TABLE container_default_value(
        ct_id      Int  Auto_increment  NOT NULL ,
        ct_type    Varchar (20) NOT NULL ,
        ct_length  Int NOT NULL ,
        ct_width   Int NOT NULL ,
        ct_height  Int NOT NULL ,
        ct_payload Int NOT NULL
	,CONSTRAINT container_default_value_PK PRIMARY KEY (ct_id)
)ENGINE=InnoDB;

INSERT INTO container_default_value (ct_type, ct_length, ct_width, ct_height, ct_payload) values ('40HC', 1200, 234, 258, 26580), ('20GP', 590, 234, 228, 28250), ('20FR', 565, 220, 258, 31250), ('40FR', 1165, 220, 258, 39980);


#------------------------------------------------------------
# Table: h1_project
#------------------------------------------------------------

CREATE TABLE h1_project(
        h1_id                  Int  Auto_increment  NOT NULL ,
        h1_ref                 Varchar (50) NOT NULL ,
        h1_final_customer_name Varchar (50) NOT NULL ,
        h1_gff_ref             Varchar (50) NOT NULL ,
        h1_country_dest        Varchar (50) NOT NULL ,
        h1_POL                 Varchar (20) NOT NULL ,
        h1_POD                 Varchar (50) NOT NULL ,
        u_id                   Int NOT NULL ,
        sl_id                  Int NOT NULL
	,CONSTRAINT h1_project_PK PRIMARY KEY (h1_id)

	,CONSTRAINT h1_project_user_FK FOREIGN KEY (u_id) REFERENCES user(u_id)
	,CONSTRAINT h1_project_shipping_line0_FK FOREIGN KEY (sl_id) REFERENCES shipping_line(sl_id)
)ENGINE=InnoDB;

INSERT INTO h1_project (h1_ref, h1_final_customer_name, h1_gff_ref, h1_country_dest, h1_POL, h1_POD, u_id, sl_id) values ('H1.001443', 'COCA', '20210827-01', 'CANADA', 'LE HAVRE', 'TORONTO', 2, 1), ('H1.001543', 'NATURAL', '20210827-02', 'FIJI', 'LE HAVRE', 'NADI', 3, 1);

#------------------------------------------------------------
# Table: h1_crate
#------------------------------------------------------------

CREATE TABLE h1_crate(
        h1cr_id           Int  Auto_increment  NOT NULL ,
        h1cr_ref          Varchar (20) NOT NULL ,
        h1cr_length       Int NOT NULL ,
        h1cr_width        Int NOT NULL ,
        h1cr_height       Int NOT NULL ,
        h1cr_gross_weight Int NOT NULL ,
        h1cr_volume       Float NOT NULL
	,CONSTRAINT h1_crate_PK PRIMARY KEY (h1cr_id)
)ENGINE=InnoDB;

INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID01', 560, 420, 360, 14000, 560*420*360/1000000);

INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID02', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID03', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID04', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID05', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID06', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID07', 600, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO h1_crate (h1cr_ref, h1cr_length, h1cr_width, h1cr_height, h1cr_gross_weight, h1cr_volume) values ('SID08', 600, 300, 310, 8000, 600*300*310/1000000);

#------------------------------------------------------------
# Table: project_container
#------------------------------------------------------------

CREATE TABLE project_container(
        id_project_container Int  Auto_increment  NOT NULL ,
        ct_id                Int NOT NULL ,
        h1_id                Int NOT NULL
	,CONSTRAINT project_container_PK PRIMARY KEY (id_project_container)

	,CONSTRAINT project_container_container_default_value_FK FOREIGN KEY (ct_id) REFERENCES container_default_value(ct_id)
	,CONSTRAINT project_container_h1_project0_FK FOREIGN KEY (h1_id) REFERENCES h1_project(h1_id)
)ENGINE=InnoDB;

INSERT INTO project_container (h1_id, ct_id) values (1,3);

INSERT INTO project_container (h1_id, ct_id) values (1,4);

INSERT INTO project_container (h1_id, ct_id) values (1,4);

INSERT INTO project_container (h1_id, ct_id) values (1,2);

INSERT INTO project_container (h1_id, ct_id) values (2,2);

INSERT INTO project_container (h1_id, ct_id) values (2,3);

INSERT INTO project_container (h1_id, ct_id) values (2,4);

INSERT INTO project_container (h1_id, ct_id) values (2,4);

#------------------------------------------------------------
# Table: IS STUFF IN
#------------------------------------------------------------

CREATE TABLE IS_STUFF_IN(
        id_project_container Int NOT NULL ,
        h1cr_id              Int NOT NULL
	,CONSTRAINT IS_STUFF_IN_PK PRIMARY KEY (id_project_container,h1cr_id)

	,CONSTRAINT IS_STUFF_IN_project_container_FK FOREIGN KEY (id_project_container) REFERENCES project_container(id_project_container)
	,CONSTRAINT IS_STUFF_IN_h1_crate0_FK FOREIGN KEY (h1cr_id) REFERENCES h1_crate(h1cr_id)
)ENGINE=InnoDB;

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (1, 1);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (2, 2);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (3, 3);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (4, 4);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (5, 5);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (6, 6);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (7, 7);

INSERT INTO IS_STUFF_IN (id_project_container, h1cr_id) VALUES (8, 8);