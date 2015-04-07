CREATE TABLE antecedentes_de_donante (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cmv (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, cmv_diagnostico_id INT NOT NULL, tipo TINYINT NOT NULL, cmv_droga_id INT NOT NULL, dias_tratamiento SMALLINT DEFAULT 0 NOT NULL, efecto_secundario VARCHAR(255), INDEX trasplante_id_idx (trasplante_id), INDEX cmv_diagnostico_id_idx (cmv_diagnostico_id), INDEX cmv_droga_id_idx (cmv_droga_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cmv_diagnostico (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cmv_drogas (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cmv_uso_enfermedades (cmv_id INT, cmv_emfermedades_id INT, PRIMARY KEY(cmv_id, cmv_emfermedades_id)) ENGINE = INNODB;
CREATE TABLE cmv_emfermedades (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE complicaciones_tipos (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE complicaciones_tipos_valores (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, complicacion_tipo_id INT NOT NULL, INDEX complicacion_tipo_id_idx (complicacion_tipo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE consulta (id INT AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, sentencia TEXT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE consulta_campo (id INT AUTO_INCREMENT, nombre VARCHAR(45) NOT NULL, nombre_visible VARCHAR(45) NOT NULL, consulta_id INT NOT NULL, tipo_id INT, INDEX consulta_id_idx (consulta_id), INDEX tipo_id_idx (tipo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE consulta_campo_tipo (id INT AUTO_INCREMENT, nombre VARCHAR(45) NOT NULL, tipo VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE donante (id INT AUTO_INCREMENT, identificador VARCHAR(20) UNIQUE, tipo_donante VARCHAR(10) NOT NULL, sexo_donante VARCHAR(1) NOT NULL, edad_donante TINYINT, enastab_hemod TINYINT, donante_causa_muerte_id INT NOT NULL, cr_p FLOAT(18, 2) DEFAULT 0, otros VARCHAR(255), grupo_sanguineo VARCHAR(2) NOT NULL, relacion_filiar VARCHAR(13) DEFAULT 'sin relacion', peso INT, altura FLOAT(18, 2), INDEX donante_causa_muerte_id_idx (donante_causa_muerte_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE donante_antecedentes (donante_id INT, antecedente_de_donante_id INT, PRIMARY KEY(donante_id, antecedente_de_donante_id)) ENGINE = INNODB;
CREATE TABLE donante_causa_muerte (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE donante_organos (donante_id INT, organo_id INT, PRIMARY KEY(donante_id, organo_id)) ENGINE = INNODB;
CREATE TABLE donante_serol (donante_id INT, serol_id INT, serol_valor_id INT NOT NULL, INDEX serol_valor_id_idx (serol_valor_id), PRIMARY KEY(donante_id, serol_id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_cmv (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, igg_cmv TINYINT DEFAULT 0, igm_cmv TINYINT DEFAULT 0, pcr_cmv TINYINT DEFAULT 0, ag_pp65 TINYINT DEFAULT 0, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_counter (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, object_class VARCHAR(128) NOT NULL, object_id INT NOT NULL, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_ecg (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, rs_ecg VARCHAR(8) NOT NULL, hvi_ecg VARCHAR(8) NOT NULL, onda_q_ecg VARCHAR(8) NOT NULL, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_eco_cardio (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, fevi_normal TINYINT DEFAULT 0, insuf_hipodiast TINYINT DEFAULT 0, iao TINYINT DEFAULT 0, eao TINYINT DEFAULT 0, im TINYINT DEFAULT 0, em TINYINT DEFAULT 0, ip TINYINT DEFAULT 0, ep TINYINT DEFAULT 0, it TINYINT DEFAULT 0, et TINYINT DEFAULT 0, derrame TINYINT DEFAULT 0, calcif_valvular TINYINT DEFAULT 0, hvi TINYINT DEFAULT 0, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_ecodopler (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, estructura VARCHAR(4) NOT NULL, dilatacion TINYINT DEFAULT 0, colecciones TINYINT DEFAULT 0, eje_arterial VARCHAR(4) NOT NULL, eje_venoso VARCHAR(4) NOT NULL, arteria_renal VARCHAR(4) NOT NULL, vena_renal VARCHAR(4) NOT NULL, anast_venosa VARCHAR(4) NOT NULL, anast_renosa VARCHAR(4) NOT NULL, indice FLOAT(18, 2) DEFAULT 0, otros VARCHAR(255), INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_ecografia (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, diametros VARCHAR(45), dilatacion TINYINT, litiasin TINYINT, vejiga VARCHAR(255) DEFAULT NULL, espesor INT, otros TEXT, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_examenes (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, evolucion_trasplante_examenes_tipo_id INT NOT NULL, tipo VARCHAR(11) NOT NULL, comentario VARCHAR(255), INDEX trasplante_id_idx (trasplante_id), INDEX evolucion_trasplante_examenes_tipo_id_idx (evolucion_trasplante_examenes_tipo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_examenes_tipo (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_marvirales (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, hsv TINYINT, aghbs VARCHAR(13) NOT NULL, hbsac VARCHAR(13) NOT NULL, hbcac VARCHAR(13) NOT NULL, hvc VARCHAR(13) NOT NULL, hiv VARCHAR(13) NOT NULL, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_nutricion (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, talla SMALLINT UNSIGNED, peso_deseado TINYINT DEFAULT 0, estructura_osea VARCHAR(8) NOT NULL, impresion VARCHAR(11) NOT NULL, peso_real TINYINT DEFAULT 0, p_tricipital INT DEFAULT 0, p_tricipital_p VARCHAR(6) NOT NULL, p_subescapular INT DEFAULT 0, p_subescapular_p VARCHAR(6) NOT NULL, sum_pliegues INT DEFAULT 0, p_sum_pliegues VARCHAR(6) NOT NULL, cf_brazo SMALLINT DEFAULT 0, p_cf_brazo VARCHAR(6) NOT NULL, cf_musc_brazo SMALLINT DEFAULT 0, p_cf_musc_brazo VARCHAR(6) NOT NULL, area_brazo SMALLINT DEFAULT 0, area_musc_brazo SMALLINT DEFAULT 0, p_area_musc_brazo VARCHAR(6) NOT NULL, area_grasa_brazo SMALLINT DEFAULT 0, p_area_grasa_brazo VARCHAR(6) NOT NULL, r_cintura_cadera SMALLINT DEFAULT 0, diag_nutricional VARCHAR(13) NOT NULL, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_para_clinica (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, pas FLOAT(18, 2) DEFAULT 0, pad FLOAT(18, 2) DEFAULT 0, diuresis FLOAT(18, 2) DEFAULT 0, peso FLOAT(18, 2) DEFAULT 0, urea FLOAT(18, 2) DEFAULT 0, creatinina FLOAT(18, 2) DEFAULT 0, ht FLOAT(18, 2) DEFAULT 0, hb FLOAT(18, 2) DEFAULT 0, gb FLOAT(18, 2) DEFAULT 0, plaquetas FLOAT(18, 2) DEFAULT 0, sodio FLOAT(18, 2) DEFAULT 0, potasio FLOAT(18, 2) DEFAULT 0, cloro FLOAT(18, 2) DEFAULT 0, calcio FLOAT(18, 2) DEFAULT 0, fosforo FLOAT(18, 2) DEFAULT 0, glicemia FLOAT(18, 2) DEFAULT 0, uricemia FLOAT(18, 2) DEFAULT 0, prot_u FLOAT(18, 2) DEFAULT 0, ccreatinina FLOAT(18, 2) DEFAULT 0, curea FLOAT(18, 2) DEFAULT 0, na_u FLOAT(18, 2) DEFAULT 0, ku FLOAT(18, 2) DEFAULT 0, cya_pv FLOAT(18, 2) DEFAULT 0, cya_pp FLOAT(18, 2) DEFAULT 0, fk_p FLOAT(18, 2) DEFAULT 0, mfm_p FLOAT(18, 2) DEFAULT 0, eve_p FLOAT(18, 2) DEFAULT 0, bd FLOAT(18, 2) DEFAULT 0, bi FLOAT(18, 2) DEFAULT 0, tgo FLOAT(18, 2) DEFAULT 0, tgp FLOAT(18, 2) DEFAULT 0, gammagt FLOAT(18, 2) DEFAULT 0, f_alc FLOAT(18, 2) DEFAULT 0, t_prot FLOAT(18, 2) DEFAULT 0, kptt FLOAT(18, 2) DEFAULT 0, howell FLOAT(18, 2) DEFAULT 0, fibrinogeno FLOAT(18, 2) DEFAULT 0, colesterol FLOAT(18, 2) DEFAULT 0, hdl FLOAT(18, 2) DEFAULT 0, ldl FLOAT(18, 2) DEFAULT 0, r_at FLOAT(18, 2) DEFAULT 0, tg FLOAT(18, 2) DEFAULT 0, hna1c FLOAT(18, 2) DEFAULT 0, albumina FLOAT(18, 2) DEFAULT 0, globulinas FLOAT(18, 2) DEFAULT 0, pthi VARCHAR(10) NOT NULL, otros VARCHAR(255), numpthi FLOAT(18, 2) DEFAULT 0, INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE evolucion_trasplante_txtorax (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, rct INT DEFAULT 0, foco TINYINT, lateralizado VARCHAR(9) NOT NULL, derrame_pleural TINYINT, lateral_derrame VARCHAR(9) NOT NULL, secuelas TINYINT, otros VARCHAR(255), INDEX trasplante_id_idx (trasplante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE germenes (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE induccion (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE infeccion (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE injerto_evolucion (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, tm TINYINT DEFAULT 0, tm_cual VARCHAR(255), gp_de_novo TINYINT DEFAULT 0, recidiva_gp_de_novo TINYINT DEFAULT 0, ra TINYINT DEFAULT 0, rc TINYINT DEFAULT 0, ra_tratamiento_id INT NOT NULL, en_trasplante TINYINT DEFAULT 0, INDEX trasplante_id_idx (trasplante_id), INDEX ra_tratamiento_id_idx (ra_tratamiento_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE injerto_evolucion_pbr (injerto_evolucion_id INT, resultado_pbr_id INT, PRIMARY KEY(injerto_evolucion_id, resultado_pbr_id)) ENGINE = INNODB;
CREATE TABLE inmunosupresores (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE medicaciones (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE nefropatia (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE organos (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente_causa_muerte (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente_causa_perdida_injerto (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente_muerte (id INT AUTO_INCREMENT, paciente_id INT UNIQUE, causa_muerte_id INT NOT NULL, fecha_muerte DATE NOT NULL, transplante_funcionando TINYINT DEFAULT 0, INDEX paciente_id_idx (paciente_id), INDEX causa_muerte_id_idx (causa_muerte_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente_perdida_injerto (id INT AUTO_INCREMENT, paciente_id INT NOT NULL, paciente_causa_perdida_injerto_id INT NOT NULL, fecha_perdida DATE NOT NULL, paciente_pre_trasplante_id INT NOT NULL, INDEX paciente_id_idx (paciente_id), INDEX paciente_pre_trasplante_id_idx (paciente_pre_trasplante_id), INDEX paciente_causa_perdida_injerto_id_idx (paciente_causa_perdida_injerto_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente_pre_trasplante (id INT AUTO_INCREMENT, paciente_id INT NOT NULL, the INT UNIQUE NOT NULL, fecha_ingreso_lista DATE NOT NULL, fecha_egreso DATE, modalidad_d VARCHAR(11) NOT NULL, diabetes VARCHAR(8) NOT NULL, imc VARCHAR(14) NOT NULL, origen VARCHAR(4) NOT NULL, pbr TINYINT DEFAULT 0, hta TINYINT DEFAULT 0, obesidad TINYINT DEFAULT 0, dislipemia TINYINT DEFAULT 0, tabaquismo TINYINT DEFAULT 0, iam TINYINT DEFAULT 0, ave TINYINT DEFAULT 0, revasc_cardio TINYINT DEFAULT 0, meses_en_lista SMALLINT DEFAULT 0, INDEX paciente_id_idx (paciente_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE pacientes (id INT AUTO_INCREMENT, the INT NOT NULL, ci VARCHAR(12) NOT NULL, nombre VARCHAR(50) NOT NULL, apellido VARCHAR(50) NOT NULL, num_fnr MEDIUMINT NOT NULL, raza VARCHAR(15) NOT NULL, sexo VARCHAR(1) NOT NULL, fecha_nacimiento DATE NOT NULL, fecha_dialisis DATE, sin_dialisis VARCHAR(2) DEFAULT 'NO' NOT NULL, nefropatia_id INT NOT NULL, grupo_sanguineo VARCHAR(2) NOT NULL, INDEX nefropatia_id_idx (nefropatia_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE ratratamiento (id INT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE resultado_pbr (id INT AUTO_INCREMENT, grado VARCHAR(50) NOT NULL, criterio VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE serol (id INT AUTO_INCREMENT, tipo VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE serol_valor (id INT AUTO_INCREMENT, serol_id INT NOT NULL, valor VARCHAR(50) NOT NULL, INDEX serol_id_idx (serol_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante (id INT AUTO_INCREMENT, paciente_pre_trasplante_id INT NOT NULL, fecha DATE NOT NULL, numero_de_transplantes_realizados INT DEFAULT 0, donante_id INT NOT NULL, inestab_hemodial TINYINT(1) DEFAULT '0', rinhon VARCHAR(10) NOT NULL, anomalia_vascular TINYINT(1) DEFAULT '0', numero_arterias VARCHAR(1) NOT NULL, numero_venas VARCHAR(1) NOT NULL, ureter VARCHAR(5) NOT NULL, numero_compatibilidad_ab MEDIUMINT, numero_compatibilidad_dr MEDIUMINT, numero_incompatibilidad_ab MEDIUMINT, numero_incompatibilidad_dr MEDIUMINT, autoac TINYINT(1) DEFAULT '0', pra_max VARCHAR(10), pra_tr VARCHAR(20), trans_previas TINYINT(1) DEFAULT '0', numero_transf TINYINT DEFAULT 0, embarazo VARCHAR(9) DEFAULT 'no aplica' NOT NULL, numero_embarazo TINYINT DEFAULT 0, liquido_perfusion VARCHAR(12) NOT NULL, tq_de_banco TINYINT(1) DEFAULT '0', lado_implante VARCHAR(12) NOT NULL, anast_venosa VARCHAR(17) NOT NULL, anast_arterial VARCHAR(17) NOT NULL, anast_ureteral VARCHAR(9) NOT NULL, t_isq_cal_min MEDIUMINT DEFAULT 0, t_isq_fria_hs MEDIUMINT DEFAULT 0, t_isq_fria_min MEDIUMINT DEFAULT 0, t_isq_tibia_hs MEDIUMINT DEFAULT 0, reperfusion VARCHAR(7) NOT NULL, sangrado_i_op TINYINT(1) DEFAULT '0', lesion_arterial TINYINT(1) DEFAULT '0', lesion_venosa TINYINT(1) DEFAULT '0', necesidad_repefundir TINYINT(1) DEFAULT '0', otras_compl_quirur VARCHAR(250), diuresis_i_op TINYINT(1) DEFAULT '0', cr_inicial FLOAT(18, 2) DEFAULT 0, dia_rec_diuresis SMALLINT DEFAULT 0, dia_rec_funcional SMALLINT DEFAULT 0, dialisis TINYINT DEFAULT 0, num_de_hd SMALLINT DEFAULT 0, comentario VARCHAR(255), fecha_alta DATE, edad_receptor SMALLINT DEFAULT 0, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX paciente_pre_trasplante_id_idx (paciente_pre_trasplante_id), INDEX donante_id_idx (donante_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante_complicaciones_consulta (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, complicacion_id INT NOT NULL, complicacion_class VARCHAR(50) NOT NULL, dias_desde_trasplante INT NOT NULL, meses_desde_trasplante INT NOT NULL, years_desde_trasplante INT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante_complicaciones_infecciosas (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, medicacion_id INT NOT NULL, infeccion_id INT NOT NULL, germen_id INT NOT NULL, internado TINYINT NOT NULL, dias_de_internacion SMALLINT DEFAULT 0, evolucion TINYINT NOT NULL, comentario TEXT, INDEX medicacion_id_idx (medicacion_id), INDEX trasplante_id_idx (trasplante_id), INDEX infeccion_id_idx (infeccion_id), INDEX germen_id_idx (germen_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante_complicaciones_no_infecciosas (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, medicacion_id INT NOT NULL, complicacion_valor_id INT NOT NULL, internado TINYINT NOT NULL, dias_de_internacion SMALLINT DEFAULT 0, evolucion TINYINT NOT NULL, comentario TEXT, INDEX medicacion_id_idx (medicacion_id), INDEX trasplante_id_idx (trasplante_id), INDEX complicacion_valor_id_idx (complicacion_valor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante_induccion (trasplante_id INT, induccion_id INT, PRIMARY KEY(trasplante_id, induccion_id)) ENGINE = INNODB;
CREATE TABLE trasplante_inmunosupresores (trasplante_id INT, inmunosupresores_id INT, PRIMARY KEY(trasplante_id, inmunosupresores_id)) ENGINE = INNODB;
CREATE TABLE trasplante_reoperacion (id INT AUTO_INCREMENT, trasplante_id INT NOT NULL, fecha DATE NOT NULL, descripcion VARCHAR(64), trasplante_complicacion_infeccion_id INT, trasplante_complicacion_no_infeccion_id INT, es_infecciosa TINYINT DEFAULT 0, INDEX trasplante_id_idx (trasplante_id), INDEX trasplante_complicacion_infeccion_id_idx (trasplante_complicacion_infeccion_id), INDEX trasplante_complicacion_no_infeccion_id_idx (trasplante_complicacion_no_infeccion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE trasplante_serol (trasplante_id INT, serol_id INT, serol_valor_id INT NOT NULL, INDEX serol_valor_id_idx (serol_valor_id), PRIMARY KEY(trasplante_id, serol_id)) ENGINE = INNODB;
CREATE TABLE tratamiento (id INT AUTO_INCREMENT, paciente_id INT NOT NULL, medicacion_id INT, dosis VARCHAR(50) DEFAULT '-', fecha_inicio DATE NOT NULL, fecha_fin DATE, INDEX paciente_id_idx (paciente_id), INDEX medicacion_id_idx (medicacion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE version (id INT AUTO_INCREMENT, nombre VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, object_class VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content_relation (md_content_id_first INT, md_content_id_second INT, object_class_name VARCHAR(128) NOT NULL, profile_name VARCHAR(128), PRIMARY KEY(md_content_id_first, md_content_id_second)) ENGINE = INNODB;
CREATE TABLE md_media (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, UNIQUE INDEX md_media_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album (id INT AUTO_INCREMENT, md_media_id INT, title VARCHAR(64) NOT NULL, description VARCHAR(255), type VARCHAR(255) DEFAULT 'Mixed', deleteallowed bool NOT NULL, md_media_content_id INT, counter_content BIGINT DEFAULT 0, UNIQUE INDEX md_media_album_title_index_idx (md_media_id, title), INDEX md_media_content_id_idx (md_media_content_id), INDEX md_media_id_idx (md_media_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album_content (md_media_album_id INT, md_media_content_id INT, object_class_name VARCHAR(128) NOT NULL, priority BIGINT NOT NULL, INDEX md_media_album_content_index_idx (priority ASC), PRIMARY KEY(md_media_album_id, md_media_content_id)) ENGINE = INNODB;
CREATE TABLE md_media_content (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX md_media_content_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_file (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, filetype VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_image (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, type VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_you_tube_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, src VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, username VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, account_active TINYINT DEFAULT '0' NOT NULL, last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport_remember_key (id INT AUTO_INCREMENT, md_passport_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_passport_id_idx (md_passport_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE md_user (id INT AUTO_INCREMENT, email VARCHAR(128) NOT NULL UNIQUE, super_admin TINYINT DEFAULT '0' NOT NULL, deleted_at DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user_profile (id INT AUTO_INCREMENT, name VARCHAR(128), last_name VARCHAR(128), city VARCHAR(128), country_code VARCHAR(2) DEFAULT 'UY', PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE cmv ADD CONSTRAINT cmv_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE cmv ADD CONSTRAINT cmv_cmv_droga_id_cmv_drogas_id FOREIGN KEY (cmv_droga_id) REFERENCES cmv_drogas(id);
ALTER TABLE cmv ADD CONSTRAINT cmv_cmv_diagnostico_id_cmv_diagnostico_id FOREIGN KEY (cmv_diagnostico_id) REFERENCES cmv_diagnostico(id);
ALTER TABLE cmv_uso_enfermedades ADD CONSTRAINT cmv_uso_enfermedades_cmv_id_cmv_id FOREIGN KEY (cmv_id) REFERENCES cmv(id) ON DELETE CASCADE;
ALTER TABLE cmv_uso_enfermedades ADD CONSTRAINT cmv_uso_enfermedades_cmv_emfermedades_id_cmv_emfermedades_id FOREIGN KEY (cmv_emfermedades_id) REFERENCES cmv_emfermedades(id) ON DELETE CASCADE;
ALTER TABLE complicaciones_tipos_valores ADD CONSTRAINT ccci FOREIGN KEY (complicacion_tipo_id) REFERENCES complicaciones_tipos(id) ON DELETE CASCADE;
ALTER TABLE consulta_campo ADD CONSTRAINT consulta_campo_tipo_id_consulta_campo_tipo_id FOREIGN KEY (tipo_id) REFERENCES consulta_campo_tipo(id);
ALTER TABLE consulta_campo ADD CONSTRAINT consulta_campo_consulta_id_consulta_id FOREIGN KEY (consulta_id) REFERENCES consulta(id) ON DELETE CASCADE;
ALTER TABLE donante ADD CONSTRAINT donante_donante_causa_muerte_id_donante_causa_muerte_id FOREIGN KEY (donante_causa_muerte_id) REFERENCES donante_causa_muerte(id);
ALTER TABLE donante_antecedentes ADD CONSTRAINT donante_antecedentes_donante_id_donante_id FOREIGN KEY (donante_id) REFERENCES donante(id) ON DELETE CASCADE;
ALTER TABLE donante_antecedentes ADD CONSTRAINT daai FOREIGN KEY (antecedente_de_donante_id) REFERENCES antecedentes_de_donante(id) ON DELETE CASCADE;
ALTER TABLE donante_organos ADD CONSTRAINT donante_organos_organo_id_organos_id FOREIGN KEY (organo_id) REFERENCES organos(id) ON DELETE CASCADE;
ALTER TABLE donante_organos ADD CONSTRAINT donante_organos_donante_id_donante_id FOREIGN KEY (donante_id) REFERENCES donante(id) ON DELETE CASCADE;
ALTER TABLE donante_serol ADD CONSTRAINT donante_serol_serol_valor_id_serol_valor_id FOREIGN KEY (serol_valor_id) REFERENCES serol_valor(id);
ALTER TABLE donante_serol ADD CONSTRAINT donante_serol_serol_id_serol_id FOREIGN KEY (serol_id) REFERENCES serol(id);
ALTER TABLE donante_serol ADD CONSTRAINT donante_serol_donante_id_donante_id FOREIGN KEY (donante_id) REFERENCES donante(id);
ALTER TABLE evolucion_trasplante_cmv ADD CONSTRAINT evolucion_trasplante_cmv_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_counter ADD CONSTRAINT evolucion_trasplante_counter_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_ecg ADD CONSTRAINT evolucion_trasplante_ecg_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_eco_cardio ADD CONSTRAINT evolucion_trasplante_eco_cardio_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_ecodopler ADD CONSTRAINT evolucion_trasplante_ecodopler_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_ecografia ADD CONSTRAINT evolucion_trasplante_ecografia_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_examenes ADD CONSTRAINT evolucion_trasplante_examenes_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_examenes ADD CONSTRAINT eeei FOREIGN KEY (evolucion_trasplante_examenes_tipo_id) REFERENCES evolucion_trasplante_examenes_tipo(id);
ALTER TABLE evolucion_trasplante_marvirales ADD CONSTRAINT evolucion_trasplante_marvirales_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_nutricion ADD CONSTRAINT evolucion_trasplante_nutricion_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_para_clinica ADD CONSTRAINT evolucion_trasplante_para_clinica_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE evolucion_trasplante_txtorax ADD CONSTRAINT evolucion_trasplante_txtorax_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id);
ALTER TABLE injerto_evolucion ADD CONSTRAINT injerto_evolucion_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE injerto_evolucion ADD CONSTRAINT injerto_evolucion_ra_tratamiento_id_ratratamiento_id FOREIGN KEY (ra_tratamiento_id) REFERENCES ratratamiento(id);
ALTER TABLE injerto_evolucion_pbr ADD CONSTRAINT injerto_evolucion_pbr_resultado_pbr_id_resultado_pbr_id FOREIGN KEY (resultado_pbr_id) REFERENCES resultado_pbr(id);
ALTER TABLE injerto_evolucion_pbr ADD CONSTRAINT injerto_evolucion_pbr_injerto_evolucion_id_injerto_evolucion_id FOREIGN KEY (injerto_evolucion_id) REFERENCES injerto_evolucion(id) ON DELETE CASCADE;
ALTER TABLE paciente_muerte ADD CONSTRAINT paciente_muerte_paciente_id_pacientes_id FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE;
ALTER TABLE paciente_muerte ADD CONSTRAINT paciente_muerte_causa_muerte_id_paciente_causa_muerte_id FOREIGN KEY (causa_muerte_id) REFERENCES paciente_causa_muerte(id);
ALTER TABLE paciente_perdida_injerto ADD CONSTRAINT pppi_1 FOREIGN KEY (paciente_causa_perdida_injerto_id) REFERENCES paciente_causa_perdida_injerto(id);
ALTER TABLE paciente_perdida_injerto ADD CONSTRAINT pppi FOREIGN KEY (paciente_pre_trasplante_id) REFERENCES paciente_pre_trasplante(id) ON DELETE CASCADE;
ALTER TABLE paciente_perdida_injerto ADD CONSTRAINT paciente_perdida_injerto_paciente_id_pacientes_id FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE;
ALTER TABLE paciente_pre_trasplante ADD CONSTRAINT paciente_pre_trasplante_paciente_id_pacientes_id FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE;
ALTER TABLE pacientes ADD CONSTRAINT pacientes_nefropatia_id_nefropatia_id FOREIGN KEY (nefropatia_id) REFERENCES nefropatia(id) ON DELETE CASCADE;
ALTER TABLE serol_valor ADD CONSTRAINT serol_valor_serol_id_serol_id FOREIGN KEY (serol_id) REFERENCES serol(id) ON DELETE CASCADE;
ALTER TABLE trasplante ADD CONSTRAINT trasplante_paciente_pre_trasplante_id_paciente_pre_trasplante_id FOREIGN KEY (paciente_pre_trasplante_id) REFERENCES paciente_pre_trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante ADD CONSTRAINT trasplante_donante_id_donante_id FOREIGN KEY (donante_id) REFERENCES donante(id);
ALTER TABLE trasplante_complicaciones_infecciosas ADD CONSTRAINT ttti FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_complicaciones_infecciosas ADD CONSTRAINT trasplante_complicaciones_infecciosas_infeccion_id_infeccion_id FOREIGN KEY (infeccion_id) REFERENCES infeccion(id);
ALTER TABLE trasplante_complicaciones_infecciosas ADD CONSTRAINT trasplante_complicaciones_infecciosas_germen_id_germenes_id FOREIGN KEY (germen_id) REFERENCES germenes(id);
ALTER TABLE trasplante_complicaciones_infecciosas ADD CONSTRAINT tmmi FOREIGN KEY (medicacion_id) REFERENCES medicaciones(id);
ALTER TABLE trasplante_complicaciones_no_infecciosas ADD CONSTRAINT ttti_1 FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_complicaciones_no_infecciosas ADD CONSTRAINT tmmi_1 FOREIGN KEY (medicacion_id) REFERENCES medicaciones(id);
ALTER TABLE trasplante_complicaciones_no_infecciosas ADD CONSTRAINT tcci FOREIGN KEY (complicacion_valor_id) REFERENCES complicaciones_tipos_valores(id);
ALTER TABLE trasplante_induccion ADD CONSTRAINT trasplante_induccion_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_induccion ADD CONSTRAINT trasplante_induccion_induccion_id_induccion_id FOREIGN KEY (induccion_id) REFERENCES induccion(id);
ALTER TABLE trasplante_inmunosupresores ADD CONSTRAINT trasplante_inmunosupresores_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_inmunosupresores ADD CONSTRAINT tiii FOREIGN KEY (inmunosupresores_id) REFERENCES inmunosupresores(id);
ALTER TABLE trasplante_reoperacion ADD CONSTRAINT ttti_3 FOREIGN KEY (trasplante_complicacion_no_infeccion_id) REFERENCES trasplante_complicaciones_no_infecciosas(id) ON DELETE CASCADE;
ALTER TABLE trasplante_reoperacion ADD CONSTRAINT ttti_2 FOREIGN KEY (trasplante_complicacion_infeccion_id) REFERENCES trasplante_complicaciones_infecciosas(id) ON DELETE CASCADE;
ALTER TABLE trasplante_reoperacion ADD CONSTRAINT trasplante_reoperacion_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_serol ADD CONSTRAINT trasplante_serol_trasplante_id_trasplante_id FOREIGN KEY (trasplante_id) REFERENCES trasplante(id) ON DELETE CASCADE;
ALTER TABLE trasplante_serol ADD CONSTRAINT trasplante_serol_serol_valor_id_serol_valor_id FOREIGN KEY (serol_valor_id) REFERENCES serol_valor(id);
ALTER TABLE trasplante_serol ADD CONSTRAINT trasplante_serol_serol_id_serol_id FOREIGN KEY (serol_id) REFERENCES serol(id);
ALTER TABLE tratamiento ADD CONSTRAINT tratamiento_paciente_id_pacientes_id FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE;
ALTER TABLE tratamiento ADD CONSTRAINT tratamiento_medicacion_id_medicaciones_id FOREIGN KEY (medicacion_id) REFERENCES medicaciones(id);
ALTER TABLE md_content ADD CONSTRAINT md_content_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id);
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_second_md_content_id FOREIGN KEY (md_content_id_second) REFERENCES md_content(id);
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_first_md_content_id FOREIGN KEY (md_content_id_first) REFERENCES md_content(id);
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_id_md_media_id FOREIGN KEY (md_media_id) REFERENCES md_media(id);
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_album_id_md_media_album_id FOREIGN KEY (md_media_album_id) REFERENCES md_media_album(id);
ALTER TABLE md_passport ADD CONSTRAINT md_passport_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id);
ALTER TABLE md_passport_remember_key ADD CONSTRAINT md_passport_remember_key_md_passport_id_md_passport_id FOREIGN KEY (md_passport_id) REFERENCES md_passport(id) ON DELETE CASCADE;