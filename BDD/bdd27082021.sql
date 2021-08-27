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
        container_df_id      Int  Auto_increment  NOT NULL ,
        container_df_type    Varchar (20) NOT NULL ,
        container_df_length  Int NOT NULL ,
        container_df_width   Int NOT NULL ,
        container_df_height  Int NOT NULL ,
        container_df_payload Int NOT NULL
	,CONSTRAINT container_default_value_PK PRIMARY KEY (container_df_id)
)ENGINE=InnoDB;

INSERT INTO container_default_value (container_df_type, container_df_length, container_df_width, container_df_height, container_df_payload) values ('40HC', 1200, 234, 258, 26580), ('20GP', 590, 234, 228, 28250), ('20FR', 565, 220, 258, 31250), ('40FR', 1165, 220, 258, 39980);


#------------------------------------------------------------
# Table: project
#------------------------------------------------------------

CREATE TABLE project(
        project_id                  Int  Auto_increment  NOT NULL ,
        project_ref                 Varchar (50) NOT NULL ,
        project_final_customer_name Varchar (50) NOT NULL ,
        project_owner_ref           Varchar (50) NOT NULL ,
        project_country_dest        Varchar (50) NOT NULL ,
        project_POL                 Varchar (20) NOT NULL ,
        project_POD                 Varchar (50) NOT NULL ,
        u_id                        Int NOT NULL ,
        sl_id                       Int NOT NULL
	,CONSTRAINT project_PK PRIMARY KEY (project_id)

	,CONSTRAINT project_user_FK FOREIGN KEY (u_id) REFERENCES user(u_id)
	,CONSTRAINT project_shipping_line0_FK FOREIGN KEY (sl_id) REFERENCES shipping_line(sl_id)
)ENGINE=InnoDB;

INSERT INTO project (project_ref, project_final_customer_name, project_owner_ref, project_country_dest, project_POL, project_POD, u_id, sl_id) values ('H1.001443', 'COCA', '20210827-01', 'CANADA', 'LE HAVRE', 'TORONTO', 2, 1), ('H1.001543', 'NATURAL', '20210827-02', 'FIJI', 'LE HAVRE', 'NADI', 3, 1);


#------------------------------------------------------------
# Table: PROJECT_crate
#------------------------------------------------------------

CREATE TABLE project_crate(
        project_crate_id           Int  Auto_increment  NOT NULL ,
        project_crate_ref          Varchar (20) NOT NULL ,
        project_crate_length       Int NOT NULL ,
        project_crate_width        Int NOT NULL ,
        project_crate_height       Int NOT NULL ,
        project_crate_gross_weight Int NOT NULL ,
        project_crate_volume       Float NOT NULL
	,CONSTRAINT PROJECT_crate_PK PRIMARY KEY (project_crate_id)
)ENGINE=InnoDB;

INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID01', 560, 420, 360, 14000, 560*420*360/1000000);

INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID02', 440, 300, 310, 8000, 600*300*310/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID03', 260, 240, 310, 8000, 260*240*310/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID04', 760, 350, 410, 8000, 760*350*410/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID05', 590, 320, 210, 8000, 590*320*210/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID06', 1150, 380, 410, 8000, 1150*380*410/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID07', 650, 310, 320, 8000, 650*310*320/1000000);
INSERT INTO PROJECT_crate (project_crate_ref, project_crate_length, project_crate_width, project_crate_height, project_crate_gross_weight, project_crate_volume) values ('SID08', 980, 160, 380, 8000, 980*160*380/1000000);


#------------------------------------------------------------
# Table: project_container
#------------------------------------------------------------

CREATE TABLE project_container(
        id_project_container Int  Auto_increment  NOT NULL ,
        container_df_id      Int NOT NULL ,
        project_id           Int NOT NULL
	,CONSTRAINT project_container_PK PRIMARY KEY (id_project_container)

	,CONSTRAINT project_container_container_default_value_FK FOREIGN KEY (container_df_id) REFERENCES container_default_value(container_df_id)
	,CONSTRAINT project_container_project0_FK FOREIGN KEY (project_id) REFERENCES project(project_id)
)ENGINE=InnoDB;

INSERT INTO project_container (container_df_id, project_id) values (1,1);

INSERT INTO project_container (container_df_id, project_id) values (4,2);

INSERT INTO project_container (container_df_id, project_id) values (3,2);

INSERT INTO project_container (container_df_id, project_id) values (2,1);

INSERT INTO project_container (container_df_id, project_id) values (4,1);

INSERT INTO project_container (container_df_id, project_id) values (4,2);

INSERT INTO project_container (container_df_id, project_id) values (3,2);

INSERT INTO project_container (container_df_id, project_id) values (4,2);

#------------------------------------------------------------
# Table: IS STUFF IN
#------------------------------------------------------------

CREATE TABLE IS_STUFF_IN(
        id_project_container Int NOT NULL ,
        project_crate_id     Int NOT NULL
	,CONSTRAINT IS_STUFF_IN_PK PRIMARY KEY (id_project_container,project_crate_id)

	,CONSTRAINT IS_STUFF_IN_project_container_FK FOREIGN KEY (id_project_container) REFERENCES project_container(id_project_container)
	,CONSTRAINT IS_STUFF_IN_PROJECT_crate0_FK FOREIGN KEY (project_crate_id) REFERENCES PROJECT_crate(project_crate_id)
)ENGINE=InnoDB;

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (1, 1);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (2, 2);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (3, 3);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (4, 4);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (5, 5);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (6, 6);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (7, 7);

INSERT INTO IS_STUFF_IN (id_project_container, project_crate_id) VALUES (8, 8);
