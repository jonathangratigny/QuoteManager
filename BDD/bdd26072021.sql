#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


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
        h1cr_net_weight   Int NOT NULL ,
        h1cr_volume       Float NOT NULL
	,CONSTRAINT h1_crate_PK PRIMARY KEY (h1cr_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: IS PACKED IN
#------------------------------------------------------------

CREATE TABLE IS_PACKED_IN(
        h1cr_id Int NOT NULL ,
        h1_id   Int NOT NULL
	,CONSTRAINT IS_PACKED_IN_PK PRIMARY KEY (h1cr_id,h1_id)

	,CONSTRAINT IS_PACKED_IN_h1_crate_FK FOREIGN KEY (h1cr_id) REFERENCES h1_crate(h1cr_id)
	,CONSTRAINT IS_PACKED_IN_h1_project0_FK FOREIGN KEY (h1_id) REFERENCES h1_project(h1_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: project_container
#------------------------------------------------------------

CREATE TABLE project_container(
        ct_id         Int NOT NULL ,
        h1_id         Int NOT NULL ,
        h1_ct_type    Varchar (20) NOT NULL ,
        h1_ct_length  Int NOT NULL ,
        h1_ct_width   Int NOT NULL ,
        h1_ct_height  Int NOT NULL ,
        h1_ct_payload Int NOT NULL
	,CONSTRAINT project_container_PK PRIMARY KEY (ct_id,h1_id)

	,CONSTRAINT project_container_container_default_value_FK FOREIGN KEY (ct_id) REFERENCES container_default_value(ct_id)
	,CONSTRAINT project_container_h1_project0_FK FOREIGN KEY (h1_id) REFERENCES h1_project(h1_id)
)ENGINE=InnoDB;

