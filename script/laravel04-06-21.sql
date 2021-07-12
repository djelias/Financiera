/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     22/01/2021 22:22:12                          */
/*==============================================================*/


drop table if exists CLASES;

drop table if exists COLECCIONS;

drop table if exists DEPARTAMENTOS;

drop table if exists DETALLEUSUARIOS;

drop table if exists DOMINIOS;

drop table if exists ESPECIES;

drop table if exists ESPECIEAMENAZADAS;

drop table if exists ESPECIMENS;

drop table if exists FAMILIAS;

drop table if exists FILUMS;

drop table if exists GENEROS;

drop table if exists INVESTIGACIONS;

drop table if exists MUNICIPIOS;

drop table if exists OBTENIDO_ENS;

drop table if exists ORDENS;

drop table if exists REINOS;

drop table if exists RIESGOS;

drop table if exists ROLS;

drop table if exists SECUENCIAS;

drop table if exists SE_REALIZANS;

drop table if exists TAXONOMIAS;

drop table if exists TIPOINVESTIGACIONS;

drop table if exists USUARIOS;

drop table if exists ZONAS;

/*==============================================================*/
/* Table: CLASE                                                 */
/*==============================================================*/
create table CLASES 
(
   id  		            integer                        not null		AUTO_INCREMENT,
   idFilum              integer                        null,
   nombreClase          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_CLASES primary key (id)
);

/*==============================================================*/
/* Table: COLECCION                                             */
/*==============================================================*/
create table COLECCIONS 
(
   id  			         integer                        not null 	AUTO_INCREMENT,
   nombreColeccion      char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_COLECCIONS primary key (id)
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   nombreDepto          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_DEPARTAMENTOS primary key (id)
);

/*==============================================================*/
/* Table: DETALLEUSUARIO                                        */
/*==============================================================*/
create table DETALLEUSUARIOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idUsuario            integer                        null,
   idRol                integer                        null,
   permisoInvestigacion char(255)                      not null,
   fechaInicioPermiso   date                           not null,
   fechaFinPermiso      date                           not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_DETALLEUSUARIOS primary key (id)
);

/*==============================================================*/
/* Table: DOMINIO                                               */
/*==============================================================*/
create table DOMINIOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idReino              integer                        null,
   nombreDominio        char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_DOMINIOS primary key (id)
);

/*==============================================================*/
/* Table: ESPECIE                                               */
/*==============================================================*/
create table ESPECIES 
(
   id  	                integer                        not null 	AUTO_INCREMENT,
   idGenero             integer                        null,
   idTaxonomia          integer                        null,
   idEspamen            integer                        null,
   nombreEspecie        char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ESPECIES primary key (id)
);

/*==============================================================*/
/* Table: ESPECIEAMENAZADA                                      */
/*==============================================================*/
create table ESPECIEAMENAZADAS 
(
   id 		            integer                        not null		AUTO_INCREMENT,
   idRiesgo             integer                        null,
   nomEspamen           char(255)                      not null,
   nomComEspamen        char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ESPECIEAMENAZADAS primary key (id)
);

/*==============================================================*/
/* Table: ESPECIMEN                                             */
/*==============================================================*/
create table ESPECIMENS 
(
   id  		            integer                        not null 	AUTO_INCREMENT,
   idTaxonomia          integer                        null,
   idSecuencia          integer                        null,
   idEspecie            integer                        null,
   fechaColecta         date                           not null,
   horaSecuenciacion1   time                           not null,
   colector             char(255)                      not null,
   codigoEspecimen      char(255)                      not null,
   latitud              float                          not null,
   longitud             float                          not null,
   tecnicaRecoleccion   char(255)                      not null,
   cantidad             char(255)                      not null,
   tipoMuestra          char(255)                      not null,
   caracteristicas      char(255)                      not null,
   peso                 float                          not null,
   tamano               float                          not null,
   habitat              char(255)                      not null,
   imagen               char(255)                      null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ESPECIMENS primary key (id)
);

/*==============================================================*/
/* Table: FAMILIA                                               */
/*==============================================================*/
create table FAMILIAS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idOrden              integer                        null,
   nombreFamilia        char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_FAMILIAS primary key (id)
);

/*==============================================================*/
/* Table: FILUM                                                 */
/*==============================================================*/
create table FILUMS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idReino              integer                        null,
   nombreFilum          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_FILUMS primary key (id)
);

/*==============================================================*/
/* Table: GENERO                                                */
/*==============================================================*/
create table GENEROS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idFamilia            integer                        null,
   nombreGenero         char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_GENEROS primary key (id)
);

/*==============================================================*/
/* Table: INVESTIGACION                                         */
/*==============================================================*/
create table INVESTIGACIONS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idUsuario            integer                        null,
   idTipo               integer                        null,
   idZona               integer                        null,
   nombreInv            char(255)                      not null,
   fechaIngreso         date                           not null,
   lugarInv             char(255)                      not null,
   responsableInv       char(255)                      not null,
   objetivo             char(255)                      not null,
   contacto             char(255)                      not null,
   unidadEncargada      char(255)                      not null,
   otrasInstit          char(255)                      null,
   documentacion        char(255)                      not null,
   descripcionInvestigacion char(255)                      not null,
   correoElectronico    char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_INVESTIGACIONS primary key (id)
);

/*==============================================================*/
/* Table: MUNICIPIO                                             */
/*==============================================================*/
create table MUNICIPIOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idDepto              integer                        null,
   nombreMunicipio      char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_MUNICIPIOS primary key (id)
);

/*==============================================================*/
/* Table: OBTENIDO_EN                                           */
/*==============================================================*/
create table OBTENIDO_ENS 
(
   id 		            integer                        not null 	AUTO_INCREMENT,
   idInv                integer                        not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_OBTENIDO_ENS primary key (id, idInv)
);

/*==============================================================*/
/* Table: ORDEN                                                 */
/*==============================================================*/
create table ORDENS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idClase              integer                        null,
   nombreOrden          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ORDENS primary key (id)
);

/*==============================================================*/
/* Table: REINO                                                 */
/*==============================================================*/
create table REINOS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idDominio            integer                        null,
   nombreReino          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_REINOS primary key (id)
);

/*==============================================================*/
/* Table: RIESGO                                                */
/*==============================================================*/
create table RIESGOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   catRiesgo            char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_RIESGOS primary key (id)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROLS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idDetalleUsuario     integer                        null,
   nombreRol            char(255)                      not null,
   estado               char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ROLS primary key (id)
);

/*==============================================================*/
/* Table: SECUENCIA                                             */
/*==============================================================*/
create table SECUENCIAS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   secuenciaObtenida    char(255)                      not null,
   metodoSecuenciacion  char(255)                      not null,
   lugarSec             char(255)                      not null,
   horaSec              time                           not null,
   fechaSec             date                           not null,
   responsableSec       char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_SECUENCIAS primary key (id)
);

/*==============================================================*/
/* Table: SE_REALIZAN                                           */
/*==============================================================*/
create table SE_REALIZANS 
(
   id  		            integer                        not null 	AUTO_INCREMENT,
   idInv                integer                        not null,
   constraint PK_SE_REALIZANS primary key (id, idInv)
);

/*==============================================================*/
/* Table: TAXONOMIA                                             */
/*==============================================================*/
create table TAXONOMIAS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idEspecie            integer                        null,
   idColeccion          integer                        null,
   idEspecimen          integer                        null,
   NumVoucher           char(255)                      not null,
   nombreComun          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_TAXONOMIAS primary key (id)
);

/*==============================================================*/
/* Table: TIPOINVESTIGACION                                     */
/*==============================================================*/
create table TIPOINVESTIGACIONS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idInv                integer                        null,
   nombreTipo           char(255)                      not null,
   descripcionTipo      char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_TIPOINVESTIGACIONS primary key (id)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIOS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idDetalleUsuario     integer                        null,
   nombreUsuario        char(255)                      not null,
   correoElectronico1   char(255)                      not null,
   password             char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_USUARIOS primary key (id)
);

/*==============================================================*/
/* Table: ZONA                                                  */
/*==============================================================*/
create table ZONAS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   nombreZona           char(255)                      not null,
   descripcionZona1     char(255)                      not null,
   lugarZona            char(255)                     not null,
   idDepto              integer                        null,
   idMunicipio          integer                        null,
   latitudZona          float                          not null,
   longitudZona         float                          not null,
   habitatZona          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ZONAS primary key (id)
);

alter table ZONAS
   add constraint FK_ZONA_PERTENECE_A_UN_MUNICIPIO foreign key (idMunicipio)
      references MUNICIPIOS (id)
      on update restrict
      on delete restrict;

alter table ZONAS
   add constraint FK_ZONA_PERTENECE_A_UN_DEPARTAMENTO foreign key (idDepto)
      references DEPARTAMENTOS (id)
      on update restrict
      on delete restrict;


alter table CLASES
   add constraint FK_CLASE_POSEE_UN_FILUM foreign key (idFilum)
      references FILUMS (id)
      on update restrict
      on delete restrict;

alter table DETALLEUSUARIOS
   add constraint FK_DETALLEU_OBTIENE_ROL foreign key (idRol)
      references ROLS (id)
      on update restrict
      on delete restrict;

alter table DETALLEUSUARIOS
   add constraint FK_DETALLEU_POSEE2_USUARIO foreign key (idUsuario)
      references USUARIOS (id)
      on update restrict
      on delete restrict;

alter table DOMINIOS
   add constraint FK_DOMINIO_PERTENECE_REINO foreign key (idReino)
      references REINOS (id)
      on update restrict
      on delete restrict;

alter table ESPECIES
   add constraint FK_ESPECIE_POSEE_UNA_TAXONOMI foreign key (idTaxonomia)
      references TAXONOMIAS (id)
      on update restrict
      on delete restrict;

alter table ESPECIES
   add constraint FK_ESPECIE_PUEDE_SER_ESPECIEA foreign key (idEspamen)
      references ESPECIEAMENAZADAS (id)
      on update restrict
      on delete restrict;

alter table ESPECIES
   add constraint FK_ESPECIE_TIENE_____GENERO foreign key (idGenero)
      references GENEROS (id)
      on update restrict
      on delete restrict;

alter table ESPECIEAMENAZADAS
   add constraint FK_ESPECIEA_TIENE_UNA_RIESGO foreign key (idRiesgo)
      references RIESGOS (id)
      on update restrict
      on delete restrict;

alter table ESPECIMENS
   add constraint FK_ESPECIME_POSEE_UNA_TAXONOMI foreign key (idTaxonomia)
      references TAXONOMIAS (id)
      on update restrict
      on delete restrict;

alter table ESPECIMENS
   add constraint FK_SECUENCI_TIENE_____SECUENCIA foreign key (idSecuencia)
      references SECUENCIAS (id)
      on update restrict
      on delete restrict;

alter table FAMILIAS
   add constraint FK_FAMILIA_TIENE_UNA_ORDEN foreign key (idOrden)
      references ORDENS (id)
      on update restrict
      on delete restrict;

alter table FILUMS
   add constraint FK_FILUM_TIENE_____REINO foreign key (idReino)
      references REINOS (id)
      on update restrict
      on delete restrict;

alter table GENEROS
   add constraint FK_GENERO_PEERTENEC_FAMILIA foreign key (idFamilia)
      references FAMILIAS (id)
      on update restrict
      on delete restrict;

alter table INVESTIGACIONS
   add constraint FK_INVESTIG_PERTENECE_ZONA foreign key (idZona)
      references ZONAS (id)
      on update restrict
      on delete restrict;

alter table INVESTIGACIONS
   add constraint FK_INVESTIG_RELATIONS_USUARIO foreign key (idUsuario)
      references USUARIOS (id)
      on update restrict
      on delete restrict;

alter table INVESTIGACIONS
   add constraint FK_INVESTIG_TIENE_UN_TIPOINVE foreign key (idTipo)
      references TIPOINVESTIGACIONS (id)
      on update restrict
      on delete restrict;

alter table MUNICIPIOS
   add constraint FK_MUNICIPI_COMPUESTO_DEPARTAM foreign key (idDepto)
      references DEPARTAMENTOS (id)
      on update restrict
      on delete restrict;

alter table OBTENIDO_ENS
   add constraint FK_OBTENIDO_OBTENIDO__ESPECIME foreign key (id)
      references ESPECIMENS (id)
      on update restrict
      on delete restrict;

alter table OBTENIDO_ENS
   add constraint FK_OBTENIDO_OBTENIDO__INVESTIG foreign key (idInv)
      references INVESTIGACIONS (id)
      on update restrict
      on delete restrict;

alter table ORDENS
   add constraint FK_ORDEN_RELATIONS_CLASE foreign key (idClase)
      references CLASES (id)
      on update restrict
      on delete restrict;

alter table REINOS
   add constraint FK_REINO_PERTENECE_DOMINIO foreign key (idDominio)
      references DOMINIOS (id)
      on update restrict
      on delete restrict;

alter table ROLS
   add constraint FK_ROL_OBTIENE2_DETALLEU foreign key (idDetalleUsuario)
      references DETALLEUSUARIOS (id)
      on update restrict
      on delete restrict;



alter table SE_REALIZANS
   add constraint FK_SE_REALI_SE_REALIZ_MUNICIPI foreign key (id)
      references MUNICIPIOS (id)
      on update restrict
      on delete restrict;

alter table SE_REALIZANS
   add constraint FK_SE_REALI_SE_REALIZ_INVESTIG foreign key (idInv)
      references INVESTIGACIONS (id)
      on update restrict
      on delete restrict;

alter table TAXONOMIAS
   add constraint FK_TAXONOMI_POSEE_UNA_ESPECIME foreign key (idEspecimen)
      references ESPECIMENS (id)
      on update restrict
      on delete restrict;

alter table TAXONOMIAS
   add constraint FK_TAXONOMI_POSEE_UNA_ESPECIE foreign key (idEspecie)
      references ESPECIES (id)
      on update restrict
      on delete restrict;

alter table TAXONOMIAS
   add constraint FK_TAXONOMI_SE_CONFOR_COLECCIO foreign key (idColeccion)
      references COLECCIONS (id)
      on update restrict
      on delete restrict;

alter table TIPOINVESTIGACIONS
   add constraint FK_TIPOINVE_TIENE_UN2_INVESTIG foreign key (idInv)
      references INVESTIGACIONS (id)
      on update restrict
      on delete restrict;

alter table USUARIOS
   add constraint FK_USUARIO_POSEE_DETALLEU foreign key (idDetalleUsuario)
      references DETALLEUSUARIOS (id)
      on update restrict
      on delete restrict;


CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Roles', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(2, 'Crear Rol', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(3, 'Editar Rol', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(4, 'Eliminar Rol', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(5, 'Usuarios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(6, 'Crear Usuarios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(7, 'Editar Usuarios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(8, 'Eliminar Usuarios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(9, 'Departamentos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(10, 'Crear Departamentos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(11, 'Editar Departamentos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(12, 'Eliminar Departamentos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(13, 'Colecciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(14, 'Crear Colecciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(15, 'Editar Colecciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(16, 'Eliminar Colecciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(17, 'EspeciesAmenazadas', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(18, 'Crear EspecieAmenazada', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(19, 'Editar EspecieAmenazada', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(20, 'Eliminar EspecieAmenazada', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(21, 'Zonas', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(22, 'Crear Zona', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(23, 'Editar Zona', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(24, 'Eliminar Zona', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(25, 'Secuencias', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(26, 'Crear Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(27, 'Editar Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(28, 'Eliminar Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(29, 'TipoInvestigaciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(30, 'Crear TipoInvestigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(31, 'Editar TipoInvestigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(32, 'Eliminar TipoInvestigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(33, 'Riesgos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(34, 'Crear Riesgo', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(35, 'Editar Riesgo', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(36, 'Eliminar Riesgo', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(37, 'Municipios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(38, 'Crear Municipio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(39, 'Editar Municipio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(40, 'Eliminar Municipio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(41, 'Taxonomias', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(42, 'Crear Taxonomia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(43, 'Editar Taxonomia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(44, 'Eliminar Taxonomia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(45, 'Especimenes', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(46, 'Crear Especimen', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(47, 'Editar Especimen', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(48, 'Eliminar Especimen', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(49, 'Clases', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(50, 'Crear Clase', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(51, 'Editar Clase', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(52, 'Eliminar Clase', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(53, 'Dominios', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(54, 'Crear Dominio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(55, 'Editar Dominio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(56, 'Eliminar Dominio', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(57, 'Especies', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(58, 'Crear Especie', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(59, 'Editar Especie', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(60, 'Eliminar Especie', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(61, 'Familias', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(62, 'Crear Familia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(63, 'Editar Familia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(64, 'Eliminar Familia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(65, 'Filums', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(66, 'Crear Filum', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(67, 'Editar Filum', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(68, 'Eliminar Filum', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(69, 'Generos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(70, 'Crear Genero', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(71, 'Editar Genero', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(72, 'Eliminar Genero', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(73, 'Investigaciones', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(74, 'Crear Investigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(75, 'Editar Investigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(76, 'Eliminar Investigacion', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(77, 'Ordenes', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(78, 'Crear Orden', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(79, 'Editar Orden', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(80, 'Eliminar Orden', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(81, 'Reinos', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(82, 'Crear Reino', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(83, 'Editar Reino', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(84, 'Eliminar Reino', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(85, 'Secuencias', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(86, 'Crear Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(87, 'Editar Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(88, 'Eliminar Secuencia', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

--
-- Estructura de tabla para la tabla `roles`
--
CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-02-24 10:25:35', '2021-02-24 10:25:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego', 'diego@gmail.com', NULL, '$2y$10$.N3WdI85CXw4D6C1HGUKreI39lDsHF7id1OKdZUDqwIBPuhmFOHQa', NULL, '2021-02-24 10:28:46', '2021-02-24 10:28:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;