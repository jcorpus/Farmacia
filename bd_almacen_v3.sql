-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2017 a las 04:07:00
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_almacen_v3`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cate_listar` ()  BEGIN
select cate_desc from alm_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()  BEGIN

SELECT 
persona.perso_id,persona.perso_nom, 
persona.perso_app, persona.perso_apm,
persona.perso_email,usuario.usu_id, 
usuario.usu_nom, usuario.usu_est,
usuario.usu_img
FROM alm_usuario usuario 
INNER JOIN alm_persona persona 
ON usuario.perso_id = persona.perso_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lote_listar` ()  BEGIN
select lote_id as Codigo,lote_desc as Lote from alm_lote;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_marca_listar` ()  BEGIN
select alm_marca.marca_id as Codigo,alm_marca.marca_desc as Marca
from alm_marca;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_perso_buscar` (IN `Num_Documento` INT)  BEGIN
select
alm_persona.perso_id as id_persona,
alm_persona.perso_nom as Nombre,
alm_persona.perso_app as Ape_Paterno,
alm_persona.perso_apm as Ape_Materno,
alm_persona.perso_numdoc as Num_Documento,
alm_tipodocumento.tpdoc_desc as  Documento
from alm_persona
inner join alm_tipodocumento on (alm_tipodocumento.tpdoc_id= alm_persona.tpdoc_id) 
inner join alm_tipotelefono on (alm_tipotelefono.telf_id=alm_persona.telf_id)
where alm_persona.perso_numdoc = Num_Documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_perso_listar` ()  BEGIN
select 
alm_persona.perso_id as Codigo,
alm_persona.perso_nom as Nombre,
alm_persona.perso_app as Ape_Paterno,
alm_persona.perso_apm as Ape_Materno,
alm_persona.perso_numdoc as Num_Documento,
alm_tipodocumento.tpdoc_desc as  Documento,
alm_persona.perso_nutlfn as Num_Telefono,
alm_tipotelefono.telf_des as Operador,
alm_persona.perso_sexo as Sexo,
alm_persona.perso_direc as Direccion,
alm_persona.perso_fena as Fech_Nacimiento,
alm_persona.perso_email as Email,
alm_persona.perso_freg as Fech_Registro,
alm_persona.perso_est as Estado
from alm_persona
inner join alm_tipodocumento on (alm_tipodocumento.tpdoc_id= alm_persona.tpdoc_id) 
inner join alm_tipotelefono on (alm_tipotelefono.telf_id=alm_persona.telf_id)
order by alm_persona.perso_id asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_prio_listar` ()  BEGIN
select pri_des from alm_prioridad;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_prod_listar` ()  BEGIN
select alm_producto.prod_id,
alm_producto.prod_Nom,
alm_tipo_producto.tppro_des,
alm_categoria.cate_desc,
alm_marca.marca_desc,
alm_lote.lote_desc,
alm_producto.prod_fvc,
alm_producto.prod_nrsa,
alm_producto.prod_umed,
alm_producto.prod_stmx,
alm_producto.prod_stmin,
alm_producto.prod_prcm,
alm_producto.prod_prvt,
alm_producto.prod_cant,
alm_producto.prod_freg,
alm_producto.prod_est
from alm_producto
inner join alm_categoria  on (alm_categoria.cate_id=alm_producto.cate_id)
inner join alm_lote on (alm_lote.lote_id=alm_producto.lote_id)
inner join alm_tipo_producto on (alm_tipo_producto.tppro_id=alm_producto.tppro_id)
inner join alm_marca on (alm_marca.marca_id=alm_producto.marca_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rol_listar` ()  BEGIN
select alm_rol.rol_id as Codigo, alm_rol.rol_desc as Rol from alm_rol;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tpdotk_listar` ()  BEGIN
select alm_tpdokx.tpkx_desc from alm_tpdokx;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tpiv_listar` ()  BEGIN
select tpiv_des from alm_tipoinventario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tppro_listar` ()  BEGIN
select tppro_des from alm_tipo_producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usu_listar` ()  BEGIN
select alm_usuario.usu_id as codigo,
alm_persona.perso_nom as Nom_Persona, 
alm_usuario.usu_nom as Nom_Usuario,
alm_usuario.usu_pass as Password,
alm_usuario.usu_email as Email,
alm_usuario.usu_img as Imagen,
alm_rol.rol_desc as Rol,
alm_usuario.usu_est as estado
from alm_usuario
inner join alm_usurol on alm_usurol.usu_id=alm_usuario.usu_id
inner join alm_rol on alm_rol.rol_id=alm_usurol.rol_id
inner join alm_persona on alm_persona.perso_id=alm_usuario.perso_id
order by  alm_usuario.usu_id asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_email` (IN `_email_usuario` VARCHAR(50))  BEGIN

SELECT per.perso_nom, per.perso_app, per.perso_apm,usuario.usu_email,usuario.usu_pass FROM alm_usuario usuario inner JOIN alm_persona per ON usuario.perso_id = per.perso_id
WHERE usuario.usu_email = _email_usuario

 LIMIT 1 ;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_almacen`
--

CREATE TABLE `alm_almacen` (
  `alm_id` int(11) NOT NULL COMMENT 'identificador del almancen',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `alm_nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del almacen',
  `alm_dire` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'direccion del almacen',
  `alm_freg` date DEFAULT NULL COMMENT 'fecha de registro del almancen',
  `alm_est` tinyint(1) DEFAULT NULL COMMENT 'estado del almacen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla almacen';

--
-- Volcado de datos para la tabla `alm_almacen`
--

INSERT INTO `alm_almacen` (`alm_id`, `usu_id`, `alm_nom`, `alm_dire`, `alm_freg`, `alm_est`) VALUES
(1, 1, 'El Carmen', 'Urb el carmen Mz 25 Lt 7', '2017-04-25', 1),
(2, 1, 'Pizarro', 'Jirón Leoncio Prado, 240', '2017-04-25', 1),
(3, 1, 'Meiggs', 'Avenida Enrique Meiggs, 420 - Miramar Alto', '2017-04-25', 1),
(4, 1, 'Los Pinos', 'Urb. Los Pinos, Mz. 3- Lt. 20', '2017-04-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_bitacora`
--

CREATE TABLE `alm_bitacora` (
  `bita_id` int(11) NOT NULL COMMENT 'identificador de la bitacora',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `bit_fechra` date DEFAULT NULL COMMENT 'fecha de la bitacora',
  `bit_accion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'la accion que realizo',
  `bit_clvolv` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'clave olvidada',
  `bit_clvnew` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'clave nueva del usuario',
  `bit_ip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ip desde donde el usuario esta ingresando',
  `bit_fhfin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_categoria`
--

CREATE TABLE `alm_categoria` (
  `cate_id` int(11) NOT NULL COMMENT 'identificador de la categoria',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `cate_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la categoria',
  `cate_freg` date DEFAULT NULL COMMENT 'fecha del registro de la categoria',
  `cate_est` tinyint(1) DEFAULT NULL COMMENT 'estado de la categoria activo''1'', desactivo''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla categoria';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_controlingreso`
--

CREATE TABLE `alm_controlingreso` (
  `ctin_id` int(11) NOT NULL COMMENT 'indetificador del control de ingreso ',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador de producto',
  `nti_id` int(11) DEFAULT NULL COMMENT 'identificador nota de ingreso',
  `ctin_cip` int(11) DEFAULT NULL COMMENT 'cantidad de ingreso de producto',
  `ctin_cpp` int(11) DEFAULT NULL COMMENT 'cantidad pendiente de producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de control de ingreso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_controlsalida`
--

CREATE TABLE `alm_controlsalida` (
  `ctsd_id` int(11) NOT NULL COMMENT 'control de salida de producto',
  `nts_id` int(11) DEFAULT NULL COMMENT 'identificador nota de producto',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador de producto',
  `ctsd_csp` int(11) DEFAULT NULL COMMENT 'cantidad de salida de productos',
  `ctsd_cpp` int(11) DEFAULT NULL COMMENT 'cantidad pendiente de productos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='control de salida de productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_detalmacen`
--

CREATE TABLE `alm_detalmacen` (
  `dtal_id` int(11) NOT NULL COMMENT 'identificador detalle del almacen',
  `alm_id` int(11) DEFAULT NULL COMMENT 'identificador del almacen',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador de prodocto',
  `prod_cant` int(11) DEFAULT NULL COMMENT 'cantidad del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla detalle del almacen';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_detnotaingreso`
--

CREATE TABLE `alm_detnotaingreso` (
  `dnti_id` int(11) NOT NULL COMMENT 'identificador de detalle de nota de ingresos',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador del producto',
  `nti_id` int(11) DEFAULT NULL COMMENT 'identificador nota de ingreso',
  `krx_id` int(11) DEFAULT NULL COMMENT 'identificador kardex',
  `dnti_cant` int(11) DEFAULT NULL COMMENT 'cantidad',
  `dtni_obs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observaciones'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='detalle de la nota de ingreso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_detnotasalida`
--

CREATE TABLE `alm_detnotasalida` (
  `dnts_id` int(11) NOT NULL COMMENT 'identificador del detalle de nota de salida',
  `nts_id` int(11) DEFAULT NULL COMMENT 'identificador nota de salida ',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador producto',
  `krx_id` int(11) DEFAULT NULL COMMENT 'identificador kardex',
  `dtns_cant` int(11) DEFAULT NULL COMMENT 'cantidad de productos',
  `dtns_obs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observacioness'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla detalle nota de slaida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_detpresentacion`
--

CREATE TABLE `alm_detpresentacion` (
  `dtpre_id` int(11) NOT NULL COMMENT 'identificador del detalle presentacion',
  `prod_id` int(11) DEFAULT NULL COMMENT 'identificador del producto',
  `pres_id` int(11) DEFAULT NULL COMMENT 'identificador de la presentacion',
  `dtpre_Concet` int(11) DEFAULT NULL COMMENT 'concentracion',
  `dtpre_fraccion` int(11) DEFAULT NULL COMMENT 'fracciones existentes en el producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='detalle de la presentacion y el producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_empleado`
--

CREATE TABLE `alm_empleado` (
  `empl_id` int(11) NOT NULL COMMENT 'identificador del empleado',
  `perso_id` int(11) DEFAULT NULL COMMENT 'identificador de la persona',
  `empl_freg` date DEFAULT NULL COMMENT 'fecha de registro del empleado',
  `empl_est` tinyint(1) DEFAULT NULL COMMENT 'estado del empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='entididad del empleado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_inventario`
--

CREATE TABLE `alm_inventario` (
  `inv_id` int(11) NOT NULL COMMENT 'identificador del inventario',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `alm_id` int(11) DEFAULT NULL COMMENT 'identificador del almacen',
  `tpin_id` int(11) DEFAULT NULL COMMENT 'identificador tipo de almacen',
  `inv_num` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'numero de inventario',
  `inv_stock` int(11) DEFAULT NULL COMMENT 'stock del inventario',
  `inv_freg` date DEFAULT NULL COMMENT 'fecha de registro ',
  `inv_fmod` date DEFAULT NULL COMMENT 'fecha de modificacion',
  `inv_est` tinyint(1) DEFAULT NULL COMMENT 'estado del invetario activar ''1'' , desactivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla del inventario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_kardex`
--

CREATE TABLE `alm_kardex` (
  `krx_id` int(11) NOT NULL COMMENT 'identificador del kardex',
  `inv_id` int(11) DEFAULT NULL COMMENT 'identificador inventario',
  `krx_num` int(11) DEFAULT NULL COMMENT 'numero del kardex',
  `krx_stini` int(11) DEFAULT NULL COMMENT 'stock inicial',
  `krx_stact` int(11) DEFAULT NULL COMMENT 'stock actual',
  `krxobs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observaciones ',
  `krx_freg` date DEFAULT NULL COMMENT 'fecha de registro del kardex',
  `krx_est` tinyint(1) DEFAULT NULL COMMENT 'estado activo ''1'' desactivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla kardex';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_lote`
--

CREATE TABLE `alm_lote` (
  `lote_id` int(11) NOT NULL COMMENT 'identificador de lote',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `lote_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del lote',
  `lote_freg` date DEFAULT NULL COMMENT 'fecha del registro del lote',
  `lote_est` tinyint(1) DEFAULT NULL COMMENT 'estado del lote'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla del lote del producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_marca`
--

CREATE TABLE `alm_marca` (
  `marca_id` int(11) NOT NULL COMMENT 'identificador de la marca',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `marca_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la marca',
  `marca_freg` date DEFAULT NULL COMMENT 'fecha registro de la marca',
  `marca_est` tinyint(1) DEFAULT NULL COMMENT 'estado de la marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de la marca';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_menu`
--

CREATE TABLE `alm_menu` (
  `menu_id` int(11) NOT NULL COMMENT 'identificador del menu',
  `menu_nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del menu',
  `menu_link` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'link de la pagina del menu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla dell menu de la web';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_modulo`
--

CREATE TABLE `alm_modulo` (
  `modu_id` int(11) NOT NULL COMMENT 'identificador del  modulo',
  `menu_id` int(11) DEFAULT NULL COMMENT 'identificador del menu',
  `rol_id` int(11) DEFAULT NULL COMMENT 'identificador del rol',
  `modu_nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del modulo',
  `modu_icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'icono para cada url',
  `modu_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'donde iran ejemplo: localhots:8080/almacen/producto/registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_notaingreso`
--

CREATE TABLE `alm_notaingreso` (
  `nti_id` int(11) NOT NULL COMMENT 'identificador de nota de ingreso',
  `tpni_id` int(11) DEFAULT NULL COMMENT 'identificador de tipo nota de ingrso',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `ord_id` int(11) DEFAULT NULL COMMENT 'identificador de la orden',
  `tpdi_id` int(11) DEFAULT NULL COMMENT 'identificador de tipo documento ingreso',
  `nti_num` int(11) DEFAULT NULL COMMENT 'numero de nota de ingreso',
  `nti_mtig` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'metodo de ingreso',
  `nti_can` int(11) DEFAULT NULL COMMENT 'descripcion de la cantidad producto',
  `nti_pretotal` decimal(10,2) DEFAULT NULL COMMENT 'precio total de productos',
  `nti_freg` date DEFAULT NULL COMMENT 'fecha de registro de la nota de ingreso',
  `nti_fnti` date DEFAULT NULL COMMENT 'fecha de la nota de ingreso',
  `nti_obs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observaciones de ingreso',
  `nti_est` tinyint(1) DEFAULT NULL COMMENT 'estado activo ''1'' , desacivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de nota de ingreso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_notasalida`
--

CREATE TABLE `alm_notasalida` (
  `nts_id` int(11) NOT NULL COMMENT 'identificador de la nota de salida',
  `tipnts_id` int(11) DEFAULT NULL COMMENT 'identificador de tipo nota de salida',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificadion del usuario',
  `prio_id` int(11) DEFAULT NULL COMMENT 'identificador prioridad de la nota de salida',
  `sold_id` int(11) DEFAULT NULL COMMENT 'identificador de solicitud de la nota de salida',
  `nts_num` int(11) DEFAULT NULL COMMENT 'numero de la nota de salida',
  `nts_mten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'metodo de entrega del producto',
  `nts_cant` int(11) DEFAULT NULL COMMENT 'cantidad de productos',
  `nts_freg` date DEFAULT NULL COMMENT 'fecha registro de la nota de salida',
  `nts_fnt` date DEFAULT NULL COMMENT 'fecha de nota de salida',
  `nts_obs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observacion de la nota de salida',
  `nts_est` tinyint(1) DEFAULT NULL COMMENT 'estado de la nota de salida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de la nota de salida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_permiso`
--

CREATE TABLE `alm_permiso` (
  `permi_id` int(11) NOT NULL COMMENT 'identificador del permiso',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `permi_feini` date DEFAULT NULL COMMENT 'fecha de  inicio del permiso de usuario',
  `permi_fefin` date DEFAULT NULL COMMENT 'fecha de fin del permiso del usuario',
  `permi_est` tinyint(1) DEFAULT NULL COMMENT 'estado del permiso del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_persona`
--

CREATE TABLE `alm_persona` (
  `perso_id` int(11) NOT NULL COMMENT 'identificador de la persona',
  `ubi_id` int(11) DEFAULT NULL COMMENT 'identificador del ubigeo',
  `tpdoc_id` int(11) DEFAULT NULL,
  `telf_id` int(11) DEFAULT NULL COMMENT 'identificador del telefono',
  `perso_nom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre de la persona',
  `perso_app` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'apellido paterno de la persona',
  `perso_apm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'apellido materno de la persona',
  `perso_numdoc` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'numero documenton ',
  `perso_nutlfn` int(9) DEFAULT NULL COMMENT 'numero de telefono',
  `perso_direc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'direccion de la persona',
  `perso_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email de la persona',
  `perso_sexo` enum('M','F') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'sexo de la persona Masculino "M", Feminino "F"',
  `perso_fena` date DEFAULT NULL COMMENT 'fecha de nacimiento de la persona',
  `perso_freg` date DEFAULT NULL COMMENT 'fecha del registro de la persona',
  `perso_est` tinyint(1) DEFAULT NULL COMMENT 'estado de la persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Entidad persona';

--
-- Volcado de datos para la tabla `alm_persona`
--

INSERT INTO `alm_persona` (`perso_id`, `ubi_id`, `tpdoc_id`, `telf_id`, `perso_nom`, `perso_app`, `perso_apm`, `perso_numdoc`, `perso_nutlfn`, `perso_direc`, `perso_email`, `perso_sexo`, `perso_fena`, `perso_freg`, `perso_est`) VALUES
(1, 1, 1, 3, 'Daniel', 'Narvaez', 'Castillo', '46864566', 944940055, 'El Carmen Mz. 25 Lt. 8', 'daniel121_2003@hotmail.com', 'M', '1992-02-26', '2017-05-25', 1),
(2, 1, 1, 2, 'Julio', 'Corpus', 'Mechato', '47596416', 975118172, 'ppao', 'doombakuryo@gmail.com', 'M', '1993-12-09', '2017-05-25', 1),
(3, 1, 1, 2, 'Jhoana', 'Liñam', 'Del Castillo', '45201241', 968863541, 'china', 'jhoanalinandelcastillo@gmail.com', 'F', '1991-06-20', '2017-05-25', 1),
(4, 1, 1, 2, 'Renzo', 'Rojas', 'Arroll', '41024587', 971755797, 'renso', 'zenky_24@hotmail.com', 'M', '1993-10-01', '2017-05-25', 1),
(5, 1, 1, 2, 'David', 'Acevedo', 'Jhong', '60804925', 971755750, 'El Pacífico- Nuevo Chimbote  Mz. I2 Lt. 37', 'Forgoin1940@hotmail.com', 'M', '1990-02-02', '2017-05-25', 1),
(6, 1, 1, 3, 'Miguel', 'Agurto', 'Rondoy', '58902204', 945751292, 'California- Nuevo Chimbote Mz. E Lt. 7', 'MiA_6R_2017@gmail.com', 'M', '1991-04-03', '2017-05-25', 1),
(7, 1, 1, 4, 'Christian', 'Alcalá', 'Negrón', '58410067', 936277740, 'Avenida Enrique Meiggs, 280 Miramar Bajo', 'Ch_A6N_2017@gmail.com', 'M', '1992-02-04', '2017-05-25', 1),
(8, 1, 1, 5, 'Raul', 'Almora', 'Hernandez', '32133789', 981509018, 'Pasaje Cajamarca Mz. 20 Lt. 1 - AA. HH Miraflores', 'Ra_A6H_2017@gmail.com', 'M', '1989-02-05', '2017-05-25', 1),
(9, 1, 1, 2, 'Maria', 'Alosilla', 'Velazco', '45136594', 942948191, 'Avenida Enrique Meiggs, 292 - Miramar Bajo', 'Ma_A6V_2017@gmail.com', 'F', '1989-03-06', '2017-05-25', 1),
(10, 1, 1, 3, 'Victor', 'Alva', 'Campos', '71285480', 970912858, 'Avenida Aviación, 301 - Miramar Bajo', 'Vi_A6C_2017@gmail.com', 'M', '1990-02-07', '2017-05-25', 1),
(11, 1, 1, 4, 'Javier', 'Arevalo', 'Lopez', '51539341', 902475305, 'Jr. Ica 588', 'Ja_A6L_2017@gmail.com', 'M', '1990-05-08', '2017-05-25', 1),
(12, 1, 1, 5, 'Rosario', 'Arias', 'Hernandez', '55671671', 985718976, 'Av. Francisco Bolognesi 320', 'Ro_A6H_2017@gmail.com', 'F', '1991-02-09', '2017-05-25', 1),
(13, 1, 1, 2, 'Efraín', 'Arroyo', 'Ramírez', '56326630', 928615672, 'Av Enrique Meiggs Nro 275 Ur Miramar Bajo ', 'Ef_A6R_2017@gmail.com', 'M', '1992-02-10', '2017-05-25', 1),
(14, 1, 1, 3, 'Marco', 'Alocen', 'Barrera', '64272014', 944066594, 'Av. Buenos Aries 712 Mza. S lt. 29 ', 'Ma_A6B_2017@gmail.com', 'M', '1989-01-11', '2017-05-25', 1),
(15, 1, 1, 4, 'Cesar', 'Baiocchi', 'Ureta', '48828404', 960812032, 'Mz L Lt 16 Ah El acero ', 'Ce_B6U_2017@gmail.com', 'M', '1993-02-12', '2017-05-25', 1),
(16, 1, 1, 5, 'Isela', 'Baylón', 'Rojas', '25078775', 940131781, 'Av Jose Pardo Nro 990 Pj Miramar Bajo ', 'Is_B6R_2017@gmail.com', 'F', '1987-03-13', '2017-05-25', 1),
(17, 1, 1, 2, 'Leoncia', 'Bedoya', 'Castillo', '77328478', 943123833, 'Mz D Lt 24 Ah Miramar Alto ', 'Le_B6C_2017@gmail.com', 'F', '1988-01-14', '2017-05-25', 1),
(18, 1, 1, 3, 'Luz', 'Bedregal', 'Canales', '68130630', 945916317, 'Jirón Espinar, 405 ', 'Lu_B6C_2017@gmail.com', 'F', '1985-05-15', '2017-05-25', 1),
(19, 1, 1, 4, 'Ramiro', 'Bejar', 'Torres', '39283153', 943010187, 'Jr Elias Aguirre Nro 181', 'Ra_B6T_2017@gmail.com', 'M', '1986-02-16', '2017-05-25', 1),
(20, 1, 1, 5, 'Javier', 'Benavides', 'Espejo', '81098572', 928963513, 'Jirón Espinar , 511', 'Ja_B6E_2017@gmail.com', 'M', '1987-03-17', '2017-05-25', 1),
(21, 1, 1, 2, 'Nelson', 'Boza', 'Solis', '79021196', 946265903, 'Jirón Enrique Palacios, 466', 'Ne_B6S_2017@gmail.com', 'M', '1989-04-18', '2017-05-25', 1),
(22, 1, 1, 3, 'Cielito', 'Calle', 'Betancourt', '48270930', 943462976, 'Jr Ladislao Espinar Nro 301', 'Ci_C6B_2017@gmail.com', 'M', '1990-05-19', '2017-05-25', 1),
(23, 1, 1, 4, 'Isabel', 'Caraza', 'Villegas', '48113532', 946671501, 'Los Cedros, 500 - Urb. La Caleta', 'Is_C6V_2017@gmail.com', 'F', '1992-05-20', '2017-05-25', 1),
(24, 1, 1, 5, 'Gizella', 'Carrera', 'Abanto', '76231936', 941866628, 'Jirón Leoncio Prado, 766 ', 'Gi_C6A_2017@gmail.com', 'F', '1993-05-21', '2017-05-25', 1),
(25, 1, 1, 2, 'Estalins', 'Carrillo', 'Segura', '81665906', 943530404, 'Alfonso Ugarte 561', 'Es_C6S_2017@gmail.com', 'M', '1989-01-22', '2017-05-25', 1),
(26, 1, 1, 3, 'Jorge', 'Carrión', 'Neira', '46681605', 905683223, 'Avenida Enrique Meiggs, 210', 'Jo_C6N_2017@gmail.com', 'M', '1990-05-23', '2017-05-25', 1),
(27, 1, 1, 4, 'Guillermo', 'Casapia', 'Valdivia', '63684597', 915743206, 'Jirón Ladislao Espinar, 709', 'Gu_C6V_2017@gmail.com', 'M', '1992-05-24', '2017-05-25', 1),
(28, 1, 1, 5, 'Zarita', 'Chancos', 'Mendoza', '44659585', 943216048, 'Jr Leoncio Prado Nro 770', 'Za_C6M_2017@gmail.com', 'F', '1993-05-25', '2017-05-25', 1),
(29, 1, 1, 2, 'Carlos', 'Chirinos', 'Lacotera', '46436026', 996165212, 'Av. Buenos Aries 710 Mza. S lt. 17', 'Ca_C6L_2017@gmail.com', 'M', '1995-05-26', '2017-05-25', 1),
(30, 1, 1, 3, 'Doris', 'Cores', 'Moreno', '83184977', 976748526, 'Av. Buenos Aries 712 Mza. S lt. 17', 'Do_C6M_2017@gmail.com', 'F', '1975-05-27', '2017-05-25', 1),
(31, 1, 1, 4, 'Maribel', 'Cortez', 'Lozano', '57285758', 930970940, 'Av. Buenos Aries 711 Mza. S lt. 10', 'Ma_C6L_2017@gmail.com', 'F', '1976-05-28', '2017-05-25', 1),
(32, 1, 1, 5, 'Angel', 'Crispin', 'Quispe', '52654869', 971474288, 'Av. Buenos Aries 710 Mza. S lt. 14', 'An_C6Q_2017@gmail.com', 'M', '1982-05-29', '2017-05-25', 1),
(33, 1, 1, 2, 'Conterno', 'De', 'Loayza', '33633226', 930465844, 'Av. Buenos Aries 712 Mza. S lt. 18', 'Co_D6L_2017@gmail.com', 'M', '1985-05-30', '2017-05-25', 1),
(34, 1, 1, 3, 'Ana', 'Diaz', 'Salinas', '39706405', 957099188, 'Jr Elias Aguirre Nro 210', 'An_D6S_2017@gmail.com', 'F', '1986-05-31', '2017-05-25', 1),
(35, 1, 1, 4, 'Antonio', 'Dueñas', 'Aristisabal', '34275427', 962133807, 'Jr Elias Aguirre Nro 150', 'An_D6A_2017@gmail.com', 'M', '1985-06-01', '2017-05-25', 1),
(36, 1, 1, 5, 'Yuliana', 'Espinoza', 'Arana', '43434055', 908828534, 'Jr Elias Aguirre Nro 171', 'Yu_E6A_2017@gmail.com', 'F', '1984-06-02', '2017-05-25', 1),
(37, 1, 1, 2, 'Carlos', 'Fernandez', 'Guzman', '70796590', 909727442, 'Jr Elias Aguirre Nro 160', 'Ca_F6G_2017@gmail.com', 'M', '1983-06-03', '2017-05-25', 1),
(38, 1, 1, 3, 'Esther', 'Fernandez', 'Matta', '78564539', 902935472, 'Jirón Leoncio Prado, 520 ', 'Es_F6M_2017@gmail.com', 'F', '1982-06-04', '2017-05-25', 1),
(39, 1, 1, 4, 'Olga', 'Ferro', 'Salas', '38181210', 968143474, 'Jirón Leoncio Prado, 566 ', 'Ol_F6S_2017@gmail.com', 'F', '1981-06-05', '2017-05-25', 1),
(40, 1, 1, 5, 'Edwin', 'Flores', 'Romero', '82435553', 927677227, 'Jirón Leoncio Prado, 740', 'Ed_F6R_2017@gmail.com', 'M', '1980-06-06', '2017-05-25', 1),
(41, 1, 1, 2, 'Roberto', 'Gamarra', 'Astete', '75988694', 990427348, 'Jirón Leoncio Prado, 766 ', 'Ro_G6A_2017@gmail.com', 'M', '1979-06-07', '2017-05-25', 1),
(42, 1, 1, 3, 'Gloria', 'Gamio', 'Lozano', '66225478', 977764863, 'Jirón Leoncio Prado, 750 ', 'Gl_G6L_2017@gmail.com', 'F', '1978-06-08', '2017-05-25', 1),
(43, 1, 1, 4, 'Miriam', 'García', 'Peralta', '42308077', 934456681, 'Av. Buenos Aries 712 Mza. S lt. 29 ', 'Mi_G6P_2017@gmail.com', 'F', '1975-06-09', '2017-05-25', 1),
(44, 1, 1, 5, 'Valle', 'Gonzales', 'Del', '48407482', 922640324, 'Av. Buenos Aries 712 Mza. S lt. 29 ', 'Va_G6D_2017@gmail.com', 'M', '1970-06-10', '2017-05-25', 1),
(45, 1, 1, 2, 'Marlene', 'Gonzales', 'Huilca', '55515727', 978848676, 'Av. Buenos Aries 322 Mza. S lt. 50', 'Ma_G6H_2017@gmail.com', 'F', '1985-12-11', '2017-05-25', 1),
(46, 1, 1, 3, 'Elsa', 'Gonzales', 'Medina', '49034330', 950550092, 'Av. Buenos Aries 6802 Mza. S lt. 29 ', 'El_G6M_2017@gmail.com', 'F', '1988-10-12', '2017-05-25', 1),
(47, 1, 1, 4, 'Javier', 'Gutierrez', 'Velez', '83135700', 934709871, 'Av. Buenos Aries 720 Mza. A lt. 35', 'Ja_G6V_2017@gmail.com', 'M', '1984-12-13', '2017-05-25', 1),
(48, 1, 1, 5, 'Elena', 'Guzman', 'Chinag', '91943616', 976649124, 'Av. Buenos Aries 530 Mza. B lt. 17', 'El_G6C_2017@gmail.com', 'F', '1983-11-14', '2017-05-25', 1),
(49, 1, 1, 2, 'Clara', 'Guzman', 'Quispe', '47112140', 922812921, 'Av. Buenos Aries 512 Mza. D lt. 15 ', 'Cl_G6Q_2017@gmail.com', 'F', '1982-06-15', '2017-05-25', 1),
(50, 1, 1, 3, 'Milagros', 'Herrera', 'Carbajal', '96974053', 969428595, 'Av. Buenos Aries 620 Mza. F lt. 20', 'Mi_H6C_2017@gmail.com', 'F', '1992-11-16', '2017-05-25', 1),
(51, 1, 1, 4, 'Guillermo', 'Horruitiner', 'Martinez', '48746527', 970732068, 'Avenida Enrique Meiggs, 302 - Miramar Bajo', 'Gu_H6M_2017@gmail.com', 'M', '1991-06-17', '2017-05-25', 1),
(52, 1, 1, 5, 'Lourdes', 'Huamani', 'Flores', '42996257', 984551316, 'Avenida Enrique Meiggs, 292 - Miramar Alto', 'Lo_H6F_2017@gmail.com', 'F', '1990-06-18', '2017-05-25', 1),
(53, 1, 1, 2, 'Luis', 'Huapaya', 'Raygada', '23243864', 957968320, 'Avenida Enrique Meiggs, 292 - Miramar Bajo', 'Lu_H6R_2017@gmail.com', 'M', '1989-12-19', '2017-05-25', 1),
(54, 1, 1, 3, 'Marcos', 'Huarcaya', 'Quispe', '48839442', 957008753, 'Avenida Enrique Meiggs, 192 - Miramar Alto', 'Ma_H6Q_2017@gmail.com', 'M', '1983-11-20', '2017-05-25', 1),
(55, 1, 1, 4, 'Walter', 'Huaytan', 'Sauñe', '43243864', 958970431, 'Avenida Enrique Meiggs, 252 - Miramar Bajo', 'Wa_H6S_2017@gmail.com', 'M', '1984-06-21', '2017-05-25', 1),
(56, 1, 1, 5, 'Fabian', 'La', 'Rosa', '66481837', 963692862, 'Avenida Enrique Meiggs, 291 - Miramar Alto', 'Fa_L6R_2017@gmail.com', 'M', '1985-06-22', '2017-05-25', 1),
(57, 1, 1, 2, 'Pedro', 'Landa', 'Ginocchio', '68455807', 921692541, 'Avenida Enrique Meiggs, 295 - Miramar Bajo', 'Pe_L6G_2017@gmail.com', 'M', '1986-06-23', '2017-05-25', 1),
(58, 1, 1, 3, 'Roberto', 'Llaja', 'Tafur', '44655639', 975669073, 'Avenida Enrique Meiggs, 092 - Miramar Alto', 'Ro_L6T_2017@gmail.com', 'M', '1987-11-24', '2017-05-25', 1),
(59, 1, 1, 4, 'Orfelina', 'Llenpen', 'Nuñez', '70618410', 902706813, 'Jr Elias Aguirre Nro 100', 'Or_L6N_2017@gmail.com', 'F', '1988-11-25', '2017-05-25', 1),
(60, 1, 1, 5, 'Hector', 'Lujan', 'Venegas', '55378938', 995705034, 'Jr Elias Aguirre Nro 095', 'He_L6V_2017@gmail.com', 'M', '1990-11-26', '2017-05-25', 1),
(61, 1, 1, 2, 'Yen', 'Maguiña', 'San', '95546709', 957154900, 'Jr Elias Aguirre Nro 175', 'Ye_M6S_2017@gmail.com', 'M', '1989-06-27', '2017-05-25', 1),
(62, 1, 1, 3, 'Cosme', 'Maldonado', 'Quispe', '43607613', 976803257, 'Jr Elias Aguirre Nro 162', 'Co_M6Q_2017@gmail.com', 'M', '1987-11-28', '2017-05-25', 1),
(63, 1, 1, 4, 'Sandra', 'Maldonado', 'Tinco', '57926898', 943563190, 'Jr Elias Aguirre Nro 192', 'Sa_M6T_2017@gmail.com', 'F', '1986-12-29', '2017-05-25', 1),
(64, 1, 1, 5, 'Jenny', 'Mallqui', 'Celestino', '57419247', 963520037, 'Jr Elias Aguirre Nro 182', 'Je_M6C_2017@gmail.com', 'F', '1985-06-30', '2017-05-25', 1),
(65, 1, 1, 2, 'Santiago', 'Mamani', 'Uchasara', '86005939', 919810883, 'Jr Elias Aguirre Nro 157', 'Sa_M6U_2017@gmail.com', 'M', '1989-07-01', '2017-05-25', 1),
(66, 1, 1, 3, 'Magda', 'Maravi', 'Navarro', '38464171', 990363921, 'Jr Elias Aguirre Nro 350', 'Ma_M6N_2017@gmail.com', 'F', '1988-05-02', '2017-05-25', 1),
(67, 1, 1, 4, 'Martin', 'Martinez', 'Marquez', '67784309', 993899334, 'Jr Elias Aguirre Nro 302', 'Ma_M6M_2017@gmail.com', 'M', '1990-04-03', '2017-05-25', 1),
(68, 1, 1, 5, 'Oscar', 'Medina', 'Zuta', '49865683', 913197181, 'Jr Elias Aguirre Nro 215', 'Os_M6Z_2017@gmail.com', 'M', '1991-04-04', '2017-05-25', 1),
(69, 1, 1, 2, 'Carlos', 'Melgarejo', 'Vibes', '83623628', 984487153, 'Jr Elias Aguirre Nro 220', 'Ca_M6V_2017@gmail.com', 'M', '1992-03-05', '2017-05-25', 1),
(70, 1, 1, 3, 'Elizabeth', 'Miguel', 'Holgado', '62626019', 950545307, 'Jr Elias Aguirre Nro 150', 'El_M6H_2017@gmail.com', 'F', '1993-02-06', '2017-05-25', 1),
(71, 1, 1, 4, 'Manuel', 'Mori', 'Ramirez', '63119106', 983657101, 'Jirón José Olaya, 550', 'Ma_M6R_2017@gmail.com', 'M', '1994-05-07', '2017-05-25', 1),
(72, 1, 1, 5, 'Carlos', 'Nuñez', 'Huayanay', '40052697', 923129614, 'Jirón José Olaya, 250', 'Ca_N6H_2017@gmail.com', 'M', '1985-07-06', '2017-05-25', 1),
(73, 1, 1, 2, 'Olga', 'Ore', 'Reyes', '99156391', 916415497, 'Jirón José Olaya, 557', 'Ol_O6R_2017@gmail.com', 'F', '1986-07-07', '2017-05-25', 1),
(74, 1, 1, 3, 'Josue', 'Orrillo', 'Ortiz', '87651895', 916557589, 'Jirón José Olaya, 581', 'Jo_O6O_2017@gmail.com', 'M', '1987-07-08', '2017-05-25', 1),
(75, 1, 1, 4, 'Carmen', 'Pardave', 'Camacho', '28801643', 940626118, 'Jirón José Olaya, 591 ', 'Ca_P6C_2017@gmail.com', 'F', '1990-07-10', '2017-05-25', 1),
(76, 1, 1, 5, 'Santiago', 'Paredes', 'Jaramillo', '70242541', 926839373, 'Jirón José Olaya, 950', 'Sa_P6J_2017@gmail.com', 'M', '1991-07-11', '2017-05-25', 1),
(77, 1, 1, 2, 'Arturo', 'Pastor', 'Porras', '35058562', 979481380, 'Jirón José Olaya, 157', 'Ar_P6P_2017@gmail.com', 'M', '1992-07-12', '2017-05-25', 1),
(78, 1, 1, 3, 'Enrique', 'Pinedo', 'Nuñez', '69116009', 916303865, 'Jirón José Olaya, 250', 'En_P6N_2017@gmail.com', 'M', '1980-07-13', '2017-05-25', 1),
(79, 1, 1, 4, 'Sonia', 'Prada', 'Vilchez', '84700800', 963285771, 'Jirón José Olaya, 520', 'So_P6V_2017@gmail.com', 'F', '1991-07-14', '2017-05-25', 1),
(80, 1, 1, 5, 'Gerardo', 'Riega', 'Calle', '28602578', 948785614, 'Jirón José Olaya, 521', 'Ge_R6C_2017@gmail.com', 'M', '1992-07-15', '2017-05-25', 1),
(81, 1, 1, 2, 'Freddy', 'Rios', 'Lima', '67558100', 993205960, 'Jr Moquegua Nro 310 Pj Florida Baja ', 'Fr_R6L_2017@gmail.com', 'M', '1989-07-16', '2017-05-25', 1),
(82, 1, 1, 3, 'Teresa', 'Rios', 'Lima', '76681430', 940598110, 'Jr Moquegua Nro 280 Pj Florida Alta', 'Te_R6L_2017@gmail.com', 'F', '1993-07-17', '2017-05-25', 1),
(83, 1, 1, 4, 'Juan', 'Riquelme', 'Miranda', '66293067', 958165052, 'Jr Moquegua Nro 270 Pj Florida Baja ', 'Ju_R6M_2017@gmail.com', 'M', '1995-07-18', '2017-05-25', 1),
(84, 1, 1, 5, 'Georgina', 'Roa', 'Yanac', '41443759', 992323260, 'Jr Moquegua Nro 2300 Pj Florida Alta', 'Ge_R6Y_2017@gmail.com', 'F', '1994-07-19', '2017-05-25', 1),
(85, 1, 1, 2, 'Rosa', 'Robles', 'Valverde', '75307493', 928985328, 'Jr Moquegua Nro 250 Pj Florida Baja ', 'Ro_R6V_2017@gmail.com', 'F', '1995-07-20', '2017-05-25', 1),
(86, 1, 1, 3, 'Rosa', 'Rodriguez', 'Farias', '60598683', 980066725, 'Jr Moquegua Nro 240 Pj Florida Baja ', 'Ro_R6F_2017@gmail.com', 'F', '1993-08-21', '2017-05-25', 1),
(87, 1, 1, 4, 'Maria', 'Rojas', 'Valdivia', '56285061', 964316916, 'Jr Moquegua Nro 230 Pj Florida Baja ', 'Ma_R6V_2017@gmail.com', 'F', '1992-08-22', '2017-05-25', 1),
(88, 1, 1, 5, 'Augusto', 'Romero', 'Gomez', '75388730', 957298697, 'Jr Moquegua Nro 225 Pj Florida Baja ', 'Au_R6G_2017@gmail.com', 'M', '1991-08-23', '2017-05-25', 1),
(89, 1, 1, 3, 'Carina', 'Rosales', 'Flores', '81786440', 911428635, 'Jr Moquegua Nro 215 Pj Florida Baja ', 'Ca_R6F_2017@gmail.com', 'F', '1993-08-24', '2017-05-25', 1),
(90, 1, 1, 2, 'Carlos', 'Rosas', 'Bonifaz', '92635507', 989317153, 'Jr Moquegua Nro 220 Pj Florida Baja ', 'Ca_R6B_2017@gmail.com', 'M', '1995-08-25', '2017-05-25', 1),
(91, 1, 1, 3, 'Angel', 'Ruiz', 'Castilla', '52499735', 947921620, 'Urb. Los Pinos, Mz. 0-Lt. 10', 'An_R6C_2017@gmail.com', 'M', '1993-08-26', '2017-05-25', 1),
(92, 1, 1, 4, 'Pino', 'Salcedo', 'Del', '30429577', 998978969, 'Urb. Los Pinos, 2-8 ', 'Pi_S6D_2017@gmail.com', 'M', '1992-08-27', '2017-05-25', 1),
(93, 1, 1, 5, 'Violeta', 'Salinas', 'Puccio', '54495711', 948109298, 'Urb. Los Pinos, Mz. 3- Lt. 5', 'Vi_S6P_2017@gmail.com', 'F', '1991-08-28', '2017-05-25', 1),
(94, 1, 1, 2, 'Augusto', 'Sanchez', 'Arone', '94147943', 974105525, 'Urb. Los Pinos, Mz. 5- Lt. 8 ', 'Au_S6A_2017@gmail.com', 'M', '1990-08-29', '2017-05-25', 1),
(95, 1, 1, 3, 'Benssa', 'Santa', 'Cruz', '98932382', 933905776, 'Urb. Los Pinos, Mz. 15 - Lt. 8 ', 'Be_S6C_2017@gmail.com', 'F', '1994-08-30', '2017-05-25', 1),
(96, 1, 1, 4, 'Angel', 'Solano', 'Vargas', '45531050', 969502407, 'Urb. Los Pinos, Mz. 6- Lt. 9', 'An_S6V_2017@gmail.com', 'M', '1995-08-31', '2017-05-25', 1),
(97, 1, 1, 5, 'Jose', 'Tejedo', 'Luna', '50426060', 937537984, 'Urb. Los Pinos, Mz. 5- Lt. 15', 'Jo_T6L_2017@gmail.com', 'M', '1980-09-02', '2017-05-25', 1),
(98, 1, 1, 2, 'Angel', 'Tenorio', 'Davila', '55753597', 980514738, 'Urb. Los Pinos, Mz. 5- Lt. 25', 'An_T6D_2017@gmail.com', 'M', '1981-09-03', '2017-05-25', 1),
(99, 1, 1, 3, 'Miguel', 'Torres', 'Gaspar', '45387065', 958701776, 'Urb. Los Pinos, Mz. 5- Lt. 7', 'Mi_T6G_2017@gmail.com', 'M', '1982-09-04', '2017-05-25', 1),
(100, 1, 1, 4, 'Jacquelin', 'Trujillo', 'Parodi', '54628560', 917746124, 'Urb. Los Pinos, Mz. 10- Lt. 8 ', 'Ja_T6P_2017@gmail.com', 'F', '1983-09-05', '2017-05-25', 1),
(101, 1, 1, 5, 'Ruth', 'Vega', 'Carreazo', '54941766', 931527898, 'Jirón Moquegua, 510', 'Ru_V6C_2017@gmail.com', 'F', '1984-09-06', '2017-05-25', 1),
(102, 1, 1, 5, 'Guillermo', 'Velasquez', 'Ramos', '26037485', 947283170, 'Jirón Moquegua, 485', 'Gu_V6R_2017@gmail.com', 'M', '1987-09-07', '2017-05-25', 1),
(103, 1, 1, 2, 'Alejandro', 'Vera', 'Silva', '59194546', 922794249, 'Jirón Moquegua, 415', 'Al_V6S_2017@gmail.com', 'M', '1988-09-08', '2017-05-25', 1),
(104, 1, 1, 3, 'Blanca', 'Vilca', 'Lucero', '38414521', 995170663, 'Jirón Moquegua, 470', 'Bl_V6L_2017@gmail.com', 'F', '1989-09-09', '2017-05-25', 1),
(105, 1, 1, 4, 'Enrique', 'Vilgoso', 'Alvarado', '59194547', 995530707, 'Jirón Moquegua, 452', 'En_V6A_2017@gmail.com', 'M', '1990-09-10', '2017-05-25', 1),
(106, 1, 1, 5, 'Cecilia', 'Yamawaki', 'Onaga', '37826577', 920718540, 'Jirón Moquegua, 440', 'Ce_Y6O_2017@gmail.com', 'F', '1991-09-11', '2017-05-25', 1),
(107, 1, 1, 2, 'Mariela', 'Zamalloa', 'Vega', '33264283', 913064893, 'Jirón Moquegua, 360', 'Ma_Z6V_2017@gmail.com', 'F', '1992-09-12', '2017-05-25', 1),
(108, 1, 1, 3, 'Monica', 'Zapata', 'Chang', '51264283', 905142813, 'Jirón Moquegua, 310 ', 'Mo_Z6C_2017@gmail.com', 'F', '1993-09-13', '2017-05-25', 1),
(109, 1, 1, 4, 'Juan', 'Zegarra', 'Salcedo', '41264283', 947325969, 'Jirón Moquegua, 320', 'Ju_Z6S_2017@gmail.com', 'M', '1994-09-14', '2017-05-25', 1),
(110, 1, 1, 5, 'Hilrich', 'Zu', 'Flores', '42264283', 976218279, 'Jirón Moquegua, 450 ', 'Hi_Z6F_2017@gmail.com', 'M', '1995-09-15', '2017-05-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_presentacion`
--

CREATE TABLE `alm_presentacion` (
  `pres_id` int(11) NOT NULL COMMENT 'identificador de la presentacion',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `pres_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la presentacion',
  `pres_freg` date DEFAULT NULL COMMENT 'fecha de registro de la presentacion',
  `pres_est` tinyint(1) DEFAULT NULL COMMENT 'estado de la presentacion Activo ''1'', desactivo''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de la presentacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_prioridad`
--

CREATE TABLE `alm_prioridad` (
  `pri_id` int(11) NOT NULL COMMENT 'identificador de la prioridad',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `pri_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la prioridad',
  `pri_freg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fecha de registro de la prioridad',
  `pri_est` tinyint(1) DEFAULT NULL COMMENT 'estadado activo ''1'', desactivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de las prioridades ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_producto`
--

CREATE TABLE `alm_producto` (
  `prod_id` int(11) NOT NULL COMMENT 'identificador de producto',
  `prod_Nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del producto',
  `marca_id` int(11) DEFAULT NULL COMMENT 'identificador de la marca',
  `tppro_id` int(11) DEFAULT NULL COMMENT 'identificador del tipo de producto',
  `cate_id` int(11) DEFAULT NULL COMMENT 'identificador de la categoria',
  `lote_id` int(11) DEFAULT NULL COMMENT 'identificador del lote',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador del usuario',
  `prod_umed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad de medida',
  `prod_nrsa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'numero de regla sanitaria del producto',
  `prod_fvc` date DEFAULT NULL COMMENT 'fecha de vencimiento',
  `prod_stmx` int(11) DEFAULT NULL COMMENT 'stock maximo',
  `prod_stmin` int(11) DEFAULT NULL COMMENT 'stock minimo',
  `prod_prcm` decimal(10,2) DEFAULT NULL COMMENT 'precio de compra',
  `prod_prvt` decimal(10,2) DEFAULT NULL COMMENT 'precio de venta',
  `prod_cant` int(11) DEFAULT NULL COMMENT 'cantidad ',
  `prod_freg` date DEFAULT NULL COMMENT 'fecha de registro',
  `prod_est` tinyint(1) DEFAULT NULL COMMENT 'estado del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_rol`
--

CREATE TABLE `alm_rol` (
  `rol_id` int(11) NOT NULL COMMENT 'identificador del tipo de usuario',
  `rol_desc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del tipo del rol',
  `rol_freg` date DEFAULT NULL COMMENT 'fecha de registro  rol',
  `rol_est` tinyint(1) DEFAULT NULL COMMENT 'estado del tipo de rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla del tipo de rol';

--
-- Volcado de datos para la tabla `alm_rol`
--

INSERT INTO `alm_rol` (`rol_id`, `rol_desc`, `rol_freg`, `rol_est`) VALUES
(1, 'ADMINISTRADOR', '2017-05-25', 1),
(2, 'CLIENTE', '2017-05-25', 1),
(3, 'JEFE ALMACEN', '2017-05-25', 1),
(4, 'ALMACENERO', '2017-05-25', 1),
(5, 'JEFE VENTAS', '2017-05-25', 1),
(6, 'VENDEDOR', '2017-05-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tipodocing`
--

CREATE TABLE `alm_tipodocing` (
  `tpdi_id` int(11) NOT NULL COMMENT 'identificador del tipo documento ',
  `usu_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'identificador de usuario',
  `tpdi_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del documento de ingreso',
  `tpdi_freg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fecha registore del documento de ingreso',
  `tpdi_est` tinyint(1) DEFAULT NULL COMMENT 'estado del documemto de ingreso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla del tipo de documento de ingreso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tipodocumento`
--

CREATE TABLE `alm_tipodocumento` (
  `tpdoc_id` int(11) NOT NULL COMMENT 'identificador del tipo documento',
  `usu_id` int(11) DEFAULT NULL,
  `tpdoc_desc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del documento',
  `tpdoc_est` tinyint(1) DEFAULT NULL COMMENT 'estado del documento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de tipo documento identiddad';

--
-- Volcado de datos para la tabla `alm_tipodocumento`
--

INSERT INTO `alm_tipodocumento` (`tpdoc_id`, `usu_id`, `tpdoc_desc`, `tpdoc_est`) VALUES
(1, 1, 'DNI', 1),
(2, 1, 'RUC', 1),
(3, 1, 'PASSAPORTE', 1),
(4, 1, 'CELULA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tipoinventario`
--

CREATE TABLE `alm_tipoinventario` (
  `tpiv_id` int(11) NOT NULL COMMENT 'identificador de tipo de inventario',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `tpiv_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de tipo de inventario',
  `tpiv_freg` date DEFAULT NULL COMMENT 'fecha de registro',
  `tpiv_est` tinyint(1) DEFAULT NULL COMMENT 'estado activo ''1'' desactivo ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de tipo de inventario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tiponotaingreso`
--

CREATE TABLE `alm_tiponotaingreso` (
  `tpnti_id` int(11) NOT NULL COMMENT 'identificador tipo de nota de ingreso',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `tpnti_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del tipo nota de ingreso',
  `tpnti_freg` date DEFAULT NULL COMMENT 'fecha de registro tipo de nota de ingreso',
  `tpnti_est` tinyint(1) DEFAULT NULL COMMENT 'estado  activado ''1'' , desactivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de tipo de nota de ingreso ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tiponotasalida`
--

CREATE TABLE `alm_tiponotasalida` (
  `tpnts_id` int(11) NOT NULL COMMENT 'identificador de tipo nota de salida',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `tpnts_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de tipo nota salida',
  `tpnts_freg` date DEFAULT NULL COMMENT 'fecha registro de tipo nota salida',
  `tpnts_est` tinyint(1) DEFAULT NULL COMMENT 'estado de tipo nota salida activo''1'' , desactivar ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de tipo de nota de salida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tipotelefono`
--

CREATE TABLE `alm_tipotelefono` (
  `telf_id` int(11) NOT NULL COMMENT 'identificador de telefono',
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `telf_des` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del telefono',
  `telf_est` tinyint(1) DEFAULT NULL COMMENT 'estado del telefono'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de telefono';

--
-- Volcado de datos para la tabla `alm_tipotelefono`
--

INSERT INTO `alm_tipotelefono` (`telf_id`, `usu_id`, `telf_des`, `telf_est`) VALUES
(1, 1, 'FIJO', 1),
(2, 1, 'CELULAR MOVISTAR', 1),
(3, 1, 'CELULAR CLARO', 1),
(4, 1, 'CELULAR ENTEL', 1),
(5, 1, 'CELULAR BITEL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tipo_producto`
--

CREATE TABLE `alm_tipo_producto` (
  `tppro_id` int(11) NOT NULL COMMENT 'identificador de tipo de producto',
  `usu_id` int(11) DEFAULT NULL,
  `tppro_des` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcionde tipo de producto',
  `tppro_freg` date DEFAULT NULL COMMENT 'fecha de registro',
  `tppro_est` tinyint(1) DEFAULT NULL COMMENT 'estado activo''1'', desactivado ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla tipo de producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_tpdokx`
--

CREATE TABLE `alm_tpdokx` (
  `tpkx_id` int(11) NOT NULL COMMENT 'identificador tipo documento kardex',
  `usu_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'identificador usuario',
  `tpkx_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del tipo documento kardex',
  `tpkx_freg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fecha de registro de documento kardex',
  `tpkx_est` tinyint(1) DEFAULT NULL COMMENT 'estado activo ''1'' desactivo ''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tipo de documento de kardex';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_ubigeo`
--

CREATE TABLE `alm_ubigeo` (
  `ubi_id` int(11) NOT NULL COMMENT 'identificador del ubigeo',
  `ubi_codep` int(11) DEFAULT NULL COMMENT 'codigo del departamento',
  `ubi_codpro` int(11) DEFAULT NULL COMMENT 'codigo de la provincia',
  `ubi_coddist` int(11) DEFAULT NULL COMMENT 'codigo del distrito',
  `ubi_depar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del departamento',
  `ubi_provi` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la provincia',
  `ubi_distr` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del distrito',
  `ubi_est` tinyint(1) DEFAULT NULL COMMENT 'estado del ubigeo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_usuario`
--

CREATE TABLE `alm_usuario` (
  `usu_id` int(11) NOT NULL COMMENT 'identificador del usuario',
  `perso_id` int(11) DEFAULT NULL COMMENT 'identificador de pesona',
  `usu_nom` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del usuario',
  `usu_pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'contraseña del usuario',
  `usu_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usu_freg` date DEFAULT NULL COMMENT 'fecha del registro del usuario',
  `usu_img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imagen del usuario',
  `usu_est` tinyint(1) DEFAULT NULL COMMENT 'estado del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla del usuario';

--
-- Volcado de datos para la tabla `alm_usuario`
--

INSERT INTO `alm_usuario` (`usu_id`, `perso_id`, `usu_nom`, `usu_pass`, `usu_email`, `usu_freg`, `usu_img`, `usu_est`) VALUES
(1, 1, 'admin', '123456', 'daniel121_2003@hotmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(2, 2, 'admin1', 'MTIzNDU2', 'doombakuryo@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(3, 3, 'Jhoana', 'MTIzNDU2', 'jhoanalinandelcastillo@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 0),
(4, 4, 'Renzo', '123456', 'zenky_24@hotmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(5, 5, 'David', '123456', 'Forgoin1940@hotmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(6, 6, 'Miguel', '123456', 'MiA_6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(7, 7, 'Christian', '123456', 'Ch_A6N_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(8, 8, 'Raul', '123456', 'Ra_A6H_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(9, 9, 'Maria', '123456', 'Ma_A6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(10, 10, 'Victor', '123456', 'Vi_A6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(11, 11, 'Javier', '123456', 'Ja_A6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(12, 12, 'Rosario', '123456', 'Ro_A6H_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(13, 13, 'Efraín', '123456', 'Ef_A6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(14, 14, 'Marco', '123456', 'Ma_A6B_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(15, 15, 'Cesar', '123456', 'Ce_B6U_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(16, 16, 'Isela', '123456', 'Is_B6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(17, 17, 'Leoncia', '123456', 'Le_B6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(18, 18, 'Luz', '123456', 'Lu_B6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(19, 19, 'Ramiro', '123456', 'Ra_B6T_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(20, 20, 'Javier', '123456', 'Ja_B6E_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(21, 21, 'Nelson', '123456', 'Ne_B6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(22, 22, 'Cielito', '123456', 'Ci_C6B_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(23, 23, 'Isabel', '123456', 'Is_C6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(24, 24, 'Gizella', '123456', 'Gi_C6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(25, 25, 'Estalins', '123456', 'Es_C6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(26, 26, 'Jorge', '123456', 'Jo_C6N_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(27, 27, 'Guillermo', '123456', 'Gu_C6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(28, 28, 'Zarita', '123456', 'Za_C6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(29, 29, 'Carlos', '123456', 'Ca_C6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(30, 30, 'Doris', '123456', 'Do_C6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(31, 31, 'Maribel', '123456', 'Ma_C6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(32, 32, 'Angel', '123456', 'An_C6Q_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(33, 33, 'Conterno', '123456', 'Co_D6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(34, 34, 'Ana', '123456', 'An_D6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(35, 35, 'Antonio', '123456', 'An_D6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(36, 36, 'Yuliana', '123456', 'Yu_E6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(37, 37, 'Carlos', '123456', 'Ca_F6G_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(38, 38, 'Esther', '123456', 'Es_F6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(39, 39, 'Olga', '123456', 'Ol_F6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(40, 40, 'Edwin', '123456', 'Ed_F6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(41, 41, 'Roberto', '123456', 'Ro_G6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(42, 42, 'Gloria', '123456', 'Gl_G6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(43, 43, 'Miriam', '123456', 'Mi_G6P_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(44, 44, 'Valle', '123456', 'Va_G6D_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(45, 45, 'Marlene', '123456', 'Ma_G6H_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(46, 46, 'Elsa', '123456', 'El_G6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(47, 47, 'Javier', '123456', 'Ja_G6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(48, 48, 'Elena', '123456', 'El_G6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(49, 49, 'Clara', '123456', 'Cl_G6Q_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(50, 50, 'Milagros', '123456', 'Mi_H6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(51, 51, 'Guillermo', '123456', 'Gu_H6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(52, 52, 'Lourdes', '123456', 'Lo_H6F_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(53, 53, 'Luis', '123456', 'Lu_H6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(54, 54, 'Marcos', '123456', 'Ma_H6Q_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(55, 55, 'Walter', '123456', 'Wa_H6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(56, 56, 'Fabian', '123456', 'Fa_L6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(57, 57, 'Pedro', '123456', 'Pe_L6G_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(58, 58, 'Roberto', '123456', 'Ro_L6T_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(59, 59, 'Orfelina', '123456', 'Or_L6N_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(60, 60, 'Hector', '123456', 'He_L6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(61, 61, 'Yen', '123456', 'Ye_M6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(62, 62, 'Cosme', '123456', 'Co_M6Q_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(63, 63, 'Sandra', '123456', 'Sa_M6T_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(64, 64, 'Jenny', '123456', 'Je_M6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(65, 65, 'Santiago', '123456', 'Sa_M6U_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(66, 66, 'Magda', '123456', 'Ma_M6N_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(67, 67, 'Martin', '123456', 'Ma_M6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(68, 68, 'Oscar', '123456', 'Os_M6Z_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(69, 69, 'Carlos', '123456', 'Ca_M6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(70, 70, 'Elizabeth', '123456', 'El_M6H_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(71, 71, 'Manuel', '123456', 'Ma_M6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(72, 72, 'Carlos', '123456', 'Ca_N6H_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(73, 73, 'Olga', '123456', 'Ol_O6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(74, 74, 'Josue', '123456', 'Jo_O6O_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(75, 75, 'Carmen', '123456', 'Ca_P6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(76, 76, 'Santiago', '123456', 'Sa_P6J_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(77, 77, 'Arturo', '123456', 'Ar_P6P_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(78, 78, 'Enrique', '123456', 'En_P6N_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(79, 79, 'Sonia', '123456', 'So_P6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(80, 80, 'Gerardo', '123456', 'Ge_R6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(81, 81, 'Freddy', '123456', 'Fr_R6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(82, 82, 'Teresa', '123456', 'Te_R6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(83, 83, 'Juan', '123456', 'Ju_R6M_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(84, 84, 'Georgina', '123456', 'Ge_R6Y_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(85, 85, 'Rosa', '123456', 'Ro_R6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(86, 86, 'Rosa', '123456', 'Ro_R6F_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(87, 87, 'Maria', '123456', 'Ma_R6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(88, 88, 'Augusto', '123456', 'Au_R6G_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(89, 89, 'Carina', '123456', 'Ca_R6F_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(90, 90, 'Carlos', '123456', 'Ca_R6B_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(91, 91, 'Angel', '123456', 'An_R6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(92, 92, 'Pino', '123456', 'Pi_S6D_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(93, 93, 'Violeta', '123456', 'Vi_S6P_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(94, 94, 'Augusto', '123456', 'Au_S6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(95, 95, 'Benssa', '123456', 'Be_S6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(96, 96, 'Angel', '123456', 'An_S6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(97, 97, 'Jose', '123456', 'Jo_T6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(98, 98, 'Angel', '123456', 'An_T6D_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(99, 99, 'Miguel', '123456', 'Mi_T6G_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(100, 100, 'Jacquelin', '123456', 'Ja_T6P_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(101, 101, 'Ruth', '123456', 'Ru_V6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(102, 102, 'Guillermo', '123456', 'Gu_V6R_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(103, 103, 'Alejandro', '123456', 'Al_V6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(104, 104, 'Blanca', '123456', 'Bl_V6L_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(105, 105, 'Enrique', '123456', 'En_V6A_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(106, 106, 'Cecilia', '123456', 'Ce_Y6O_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(107, 107, 'Mariela', '123456', 'Ma_Z6V_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(108, 108, 'Monica', '123456', 'Mo_Z6C_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(109, 109, 'Juan', '123456', 'Ju_Z6S_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1),
(110, 110, 'Hilrich', '123456', 'Hi_Z6F_2017@gmail.com', '2017-05-25', 'html/img_server/user-default.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_usurol`
--

CREATE TABLE `alm_usurol` (
  `usrol_id` int(11) NOT NULL,
  `usu_id` int(11) DEFAULT NULL COMMENT 'identificador de usuario',
  `rol_id` int(11) DEFAULT NULL COMMENT 'identificador del rol',
  `usrol_femo` date DEFAULT NULL COMMENT 'fecha modificacion',
  `usrol_est` tinyint(1) DEFAULT NULL COMMENT 'estado del detalle activo ''1'' inactivo''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla detalle del rol y usuario';

--
-- Volcado de datos para la tabla `alm_usurol`
--

INSERT INTO `alm_usurol` (`usrol_id`, `usu_id`, `rol_id`, `usrol_femo`, `usrol_est`) VALUES
(1, 1, 1, '2017-05-25', 1),
(2, 2, 1, '2017-05-25', 1),
(3, 3, 3, '2017-05-25', 1),
(4, 4, 3, '2017-05-25', 1),
(5, 5, 3, '2017-05-25', 1),
(6, 6, 3, '2017-05-25', 1),
(7, 7, 4, '2017-05-25', 1),
(8, 8, 4, '2017-05-25', 1),
(9, 9, 4, '2017-05-25', 1),
(10, 10, 4, '2017-05-25', 1),
(11, 11, 4, '2017-05-25', 1),
(12, 12, 4, '2017-05-25', 1),
(13, 13, 4, '2017-05-25', 1),
(14, 14, 4, '2017-05-25', 1),
(15, 15, 5, '2017-05-25', 1),
(16, 16, 5, '2017-05-25', 1),
(17, 17, 5, '2017-05-25', 1),
(18, 18, 5, '2017-05-25', 1),
(19, 19, 6, '2017-05-25', 1),
(20, 20, 6, '2017-05-25', 1),
(21, 21, 6, '2017-05-25', 1),
(22, 22, 6, '2017-05-25', 1),
(23, 23, 6, '2017-05-25', 1),
(24, 24, 6, '2017-05-25', 1),
(25, 25, 6, '2017-05-25', 1),
(26, 26, 6, '2017-05-25', 1),
(27, 27, 2, '2017-05-25', 1),
(28, 28, 2, '2017-05-25', 1),
(29, 29, 2, '2017-05-25', 1),
(30, 30, 2, '2017-05-25', 1),
(31, 31, 2, '2017-05-25', 1),
(32, 32, 2, '2017-05-25', 1),
(33, 33, 2, '2017-05-25', 1),
(34, 34, 2, '2017-05-25', 1),
(35, 35, 2, '2017-05-25', 1),
(36, 36, 2, '2017-05-25', 1),
(37, 37, 2, '2017-05-25', 1),
(38, 38, 2, '2017-05-25', 1),
(39, 39, 2, '2017-05-25', 1),
(40, 40, 2, '2017-05-25', 1),
(41, 41, 2, '2017-05-25', 1),
(42, 42, 2, '2017-05-25', 1),
(43, 43, 2, '2017-05-25', 1),
(44, 44, 2, '2017-05-25', 1),
(45, 45, 2, '2017-05-25', 1),
(46, 46, 2, '2017-05-25', 1),
(47, 47, 2, '2017-05-25', 1),
(48, 48, 2, '2017-05-25', 1),
(49, 49, 2, '2017-05-25', 1),
(50, 50, 2, '2017-05-25', 1),
(51, 51, 2, '2017-05-25', 1),
(52, 52, 2, '2017-05-25', 1),
(53, 53, 2, '2017-05-25', 1),
(54, 54, 2, '2017-05-25', 1),
(55, 55, 2, '2017-05-25', 1),
(56, 56, 2, '2017-05-25', 1),
(57, 57, 2, '2017-05-25', 1),
(58, 58, 2, '2017-05-25', 1),
(59, 59, 2, '2017-05-25', 1),
(60, 60, 2, '2017-05-25', 1),
(61, 61, 2, '2017-05-25', 1),
(62, 62, 2, '2017-05-25', 1),
(63, 63, 2, '2017-05-25', 1),
(64, 64, 2, '2017-05-25', 1),
(65, 65, 2, '2017-05-25', 1),
(66, 66, 2, '2017-05-25', 1),
(67, 67, 2, '2017-05-25', 1),
(68, 68, 2, '2017-05-25', 1),
(69, 69, 2, '2017-05-25', 1),
(70, 70, 2, '2017-05-25', 1),
(71, 71, 2, '2017-05-25', 1),
(72, 72, 2, '2017-05-25', 1),
(73, 73, 2, '2017-05-25', 1),
(74, 74, 2, '2017-05-25', 1),
(75, 75, 2, '2017-05-25', 1),
(76, 76, 2, '2017-05-25', 1),
(77, 77, 2, '2017-05-25', 1),
(78, 78, 2, '2017-05-25', 1),
(79, 79, 2, '2017-05-25', 1),
(80, 80, 2, '2017-05-25', 1),
(81, 81, 2, '2017-05-25', 1),
(82, 82, 2, '2017-05-25', 1),
(83, 83, 2, '2017-05-25', 1),
(84, 84, 2, '2017-05-25', 1),
(85, 85, 2, '2017-05-25', 1),
(86, 86, 2, '2017-05-25', 1),
(87, 87, 2, '2017-05-25', 1),
(88, 88, 2, '2017-05-25', 1),
(89, 89, 2, '2017-05-25', 1),
(90, 90, 2, '2017-05-25', 1),
(91, 91, 2, '2017-05-25', 1),
(92, 92, 2, '2017-05-25', 1),
(93, 93, 2, '2017-05-25', 1),
(94, 94, 2, '2017-05-25', 1),
(95, 95, 2, '2017-05-25', 1),
(96, 96, 2, '2017-05-25', 1),
(97, 97, 2, '2017-05-25', 1),
(98, 98, 2, '2017-05-25', 1),
(99, 99, 2, '2017-05-25', 1),
(100, 100, 2, '2017-05-25', 1),
(101, 101, 2, '2017-05-25', 1),
(102, 102, 2, '2017-05-25', 1),
(103, 103, 2, '2017-05-25', 1),
(104, 104, 2, '2017-05-25', 1),
(105, 105, 2, '2017-05-25', 1),
(106, 106, 2, '2017-05-25', 1),
(107, 107, 2, '2017-05-25', 1),
(108, 108, 2, '2017-05-25', 1),
(109, 109, 2, '2017-05-25', 1),
(110, 110, 2, '2017-05-25', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alm_almacen`
--
ALTER TABLE `alm_almacen`
  ADD PRIMARY KEY (`alm_id`),
  ADD KEY `iu_alm_des` (`alm_nom`,`alm_dire`),
  ADD KEY `fk_alm_usu_idx` (`usu_id`);

--
-- Indices de la tabla `alm_bitacora`
--
ALTER TABLE `alm_bitacora`
  ADD PRIMARY KEY (`bita_id`),
  ADD KEY `fk_bit_usu_idx` (`usu_id`);

--
-- Indices de la tabla `alm_categoria`
--
ALTER TABLE `alm_categoria`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `iu_cate_desc` (`cate_desc`);

--
-- Indices de la tabla `alm_controlingreso`
--
ALTER TABLE `alm_controlingreso`
  ADD PRIMARY KEY (`ctin_id`),
  ADD KEY `fk_ctin_prod_idx` (`prod_id`),
  ADD KEY `fk_ctin_nti_idx` (`nti_id`);

--
-- Indices de la tabla `alm_controlsalida`
--
ALTER TABLE `alm_controlsalida`
  ADD PRIMARY KEY (`ctsd_id`),
  ADD KEY `fk_ctsd_nts_idx` (`nts_id`),
  ADD KEY `fk_ctsd_prod_idx` (`prod_id`);

--
-- Indices de la tabla `alm_detalmacen`
--
ALTER TABLE `alm_detalmacen`
  ADD PRIMARY KEY (`dtal_id`),
  ADD KEY `fk_dtal_alm_idx` (`alm_id`),
  ADD KEY `fk_dtal_prod_idx` (`prod_id`);

--
-- Indices de la tabla `alm_detnotaingreso`
--
ALTER TABLE `alm_detnotaingreso`
  ADD PRIMARY KEY (`dnti_id`),
  ADD KEY `fk_dtnti_nit_idx` (`nti_id`),
  ADD KEY `fk_dtnti_prod_idx` (`prod_id`),
  ADD KEY `fk_dtnti_krx_idx` (`krx_id`);

--
-- Indices de la tabla `alm_detnotasalida`
--
ALTER TABLE `alm_detnotasalida`
  ADD PRIMARY KEY (`dnts_id`),
  ADD KEY `fk_dtnts_idx` (`nts_id`),
  ADD KEY `fk_dtnts_prod_idx` (`prod_id`),
  ADD KEY `fk_dtnts_krx_idx` (`krx_id`);

--
-- Indices de la tabla `alm_detpresentacion`
--
ALTER TABLE `alm_detpresentacion`
  ADD PRIMARY KEY (`dtpre_id`),
  ADD KEY `fk_dtpre_prdo_idx` (`prod_id`),
  ADD KEY `fk_dtpre_pre_idx` (`pres_id`),
  ADD KEY `xi_dpre_con` (`dtpre_Concet`);

--
-- Indices de la tabla `alm_empleado`
--
ALTER TABLE `alm_empleado`
  ADD PRIMARY KEY (`empl_id`),
  ADD KEY `fk_emp_perso_idx` (`perso_id`);

--
-- Indices de la tabla `alm_inventario`
--
ALTER TABLE `alm_inventario`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `fk_inv_num` (`inv_num`),
  ADD KEY `fk_inv_alm_idx` (`alm_id`),
  ADD KEY `fk_inv_tpinv_idx` (`tpin_id`);

--
-- Indices de la tabla `alm_kardex`
--
ALTER TABLE `alm_kardex`
  ADD PRIMARY KEY (`krx_id`),
  ADD KEY `xi_krx_num` (`krx_num`),
  ADD KEY `fk_krx_inv_idx` (`inv_id`);

--
-- Indices de la tabla `alm_lote`
--
ALTER TABLE `alm_lote`
  ADD PRIMARY KEY (`lote_id`),
  ADD KEY `xi_lote_des` (`lote_desc`);

--
-- Indices de la tabla `alm_marca`
--
ALTER TABLE `alm_marca`
  ADD PRIMARY KEY (`marca_id`),
  ADD KEY `xi_marca_des` (`marca_desc`);

--
-- Indices de la tabla `alm_menu`
--
ALTER TABLE `alm_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `xi_menu_nom` (`menu_nom`);

--
-- Indices de la tabla `alm_modulo`
--
ALTER TABLE `alm_modulo`
  ADD PRIMARY KEY (`modu_id`),
  ADD KEY `fk_menu_rol_idx` (`rol_id`),
  ADD KEY `fk_modu_menu_idx` (`menu_id`);

--
-- Indices de la tabla `alm_notaingreso`
--
ALTER TABLE `alm_notaingreso`
  ADD PRIMARY KEY (`nti_id`),
  ADD KEY `fk_nti_tpni_idx` (`tpni_id`),
  ADD KEY `fk_nti_tpdi_idx` (`tpdi_id`);

--
-- Indices de la tabla `alm_notasalida`
--
ALTER TABLE `alm_notasalida`
  ADD PRIMARY KEY (`nts_id`),
  ADD KEY `fk_nts_tpns_idx` (`tipnts_id`),
  ADD KEY `fk_nts_pri_idx` (`prio_id`);

--
-- Indices de la tabla `alm_permiso`
--
ALTER TABLE `alm_permiso`
  ADD PRIMARY KEY (`permi_id`),
  ADD KEY `fk_permi_usu_idx` (`usu_id`);

--
-- Indices de la tabla `alm_persona`
--
ALTER TABLE `alm_persona`
  ADD PRIMARY KEY (`perso_id`),
  ADD KEY `ix_perso_nom` (`perso_nom`,`perso_app`,`perso_apm`),
  ADD KEY `fk_perso_tdoc_idx` (`tpdoc_id`),
  ADD KEY `fk_perso_telf_idx` (`telf_id`);

--
-- Indices de la tabla `alm_presentacion`
--
ALTER TABLE `alm_presentacion`
  ADD PRIMARY KEY (`pres_id`),
  ADD KEY `xi_pres_des` (`pres_desc`);

--
-- Indices de la tabla `alm_prioridad`
--
ALTER TABLE `alm_prioridad`
  ADD PRIMARY KEY (`pri_id`),
  ADD KEY `xi_pri_des` (`pri_des`);

--
-- Indices de la tabla `alm_producto`
--
ALTER TABLE `alm_producto`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_prod_cate_idx` (`cate_id`),
  ADD KEY `fk_prod_lote_idx` (`lote_id`),
  ADD KEY `fk_prod_marca_idx` (`marca_id`),
  ADD KEY `fk_prod_tppro_idx` (`tppro_id`),
  ADD KEY `xi_prod_nom` (`prod_Nom`),
  ADD KEY `fk_prod_usu_idx` (`usu_id`);

--
-- Indices de la tabla `alm_rol`
--
ALTER TABLE `alm_rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD KEY `xi_tpusu` (`rol_desc`);

--
-- Indices de la tabla `alm_tipodocing`
--
ALTER TABLE `alm_tipodocing`
  ADD PRIMARY KEY (`tpdi_id`),
  ADD KEY `xi_tpdi_desc` (`tpdi_des`);

--
-- Indices de la tabla `alm_tipodocumento`
--
ALTER TABLE `alm_tipodocumento`
  ADD PRIMARY KEY (`tpdoc_id`);

--
-- Indices de la tabla `alm_tipoinventario`
--
ALTER TABLE `alm_tipoinventario`
  ADD PRIMARY KEY (`tpiv_id`),
  ADD KEY `xi_tpinv_des` (`tpiv_des`);

--
-- Indices de la tabla `alm_tiponotaingreso`
--
ALTER TABLE `alm_tiponotaingreso`
  ADD PRIMARY KEY (`tpnti_id`),
  ADD KEY `xi_tpni_desc` (`tpnti_des`);

--
-- Indices de la tabla `alm_tiponotasalida`
--
ALTER TABLE `alm_tiponotasalida`
  ADD PRIMARY KEY (`tpnts_id`),
  ADD KEY `xi_tpnsd_des` (`tpnts_des`);

--
-- Indices de la tabla `alm_tipotelefono`
--
ALTER TABLE `alm_tipotelefono`
  ADD PRIMARY KEY (`telf_id`);

--
-- Indices de la tabla `alm_tipo_producto`
--
ALTER TABLE `alm_tipo_producto`
  ADD PRIMARY KEY (`tppro_id`),
  ADD KEY `xi_tppro_des` (`tppro_des`);

--
-- Indices de la tabla `alm_tpdokx`
--
ALTER TABLE `alm_tpdokx`
  ADD PRIMARY KEY (`tpkx_id`),
  ADD KEY `xi_tpdokx_des` (`tpkx_desc`);

--
-- Indices de la tabla `alm_ubigeo`
--
ALTER TABLE `alm_ubigeo`
  ADD PRIMARY KEY (`ubi_id`),
  ADD KEY `ix_ubi_desc` (`ubi_depar`,`ubi_provi`,`ubi_distr`);

--
-- Indices de la tabla `alm_usuario`
--
ALTER TABLE `alm_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `xi_usu_nom` (`usu_nom`,`usu_pass`,`usu_email`),
  ADD KEY `fk_usu_perso_idx` (`perso_id`);

--
-- Indices de la tabla `alm_usurol`
--
ALTER TABLE `alm_usurol`
  ADD PRIMARY KEY (`usrol_id`),
  ADD KEY `fk_usrol_usu_idx` (`usu_id`),
  ADD KEY `fk_usrol_rol_idx` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alm_almacen`
--
ALTER TABLE `alm_almacen`
  MODIFY `alm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del almancen', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `alm_bitacora`
--
ALTER TABLE `alm_bitacora`
  MODIFY `bita_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la bitacora';
--
-- AUTO_INCREMENT de la tabla `alm_categoria`
--
ALTER TABLE `alm_categoria`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la categoria';
--
-- AUTO_INCREMENT de la tabla `alm_controlingreso`
--
ALTER TABLE `alm_controlingreso`
  MODIFY `ctin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'indetificador del control de ingreso ';
--
-- AUTO_INCREMENT de la tabla `alm_controlsalida`
--
ALTER TABLE `alm_controlsalida`
  MODIFY `ctsd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'control de salida de producto';
--
-- AUTO_INCREMENT de la tabla `alm_detalmacen`
--
ALTER TABLE `alm_detalmacen`
  MODIFY `dtal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador detalle del almacen';
--
-- AUTO_INCREMENT de la tabla `alm_detnotaingreso`
--
ALTER TABLE `alm_detnotaingreso`
  MODIFY `dnti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de detalle de nota de ingresos';
--
-- AUTO_INCREMENT de la tabla `alm_detnotasalida`
--
ALTER TABLE `alm_detnotasalida`
  MODIFY `dnts_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del detalle de nota de salida';
--
-- AUTO_INCREMENT de la tabla `alm_detpresentacion`
--
ALTER TABLE `alm_detpresentacion`
  MODIFY `dtpre_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del detalle presentacion';
--
-- AUTO_INCREMENT de la tabla `alm_empleado`
--
ALTER TABLE `alm_empleado`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del empleado';
--
-- AUTO_INCREMENT de la tabla `alm_inventario`
--
ALTER TABLE `alm_inventario`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del inventario';
--
-- AUTO_INCREMENT de la tabla `alm_kardex`
--
ALTER TABLE `alm_kardex`
  MODIFY `krx_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del kardex';
--
-- AUTO_INCREMENT de la tabla `alm_lote`
--
ALTER TABLE `alm_lote`
  MODIFY `lote_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de lote';
--
-- AUTO_INCREMENT de la tabla `alm_marca`
--
ALTER TABLE `alm_marca`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la marca';
--
-- AUTO_INCREMENT de la tabla `alm_menu`
--
ALTER TABLE `alm_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del menu';
--
-- AUTO_INCREMENT de la tabla `alm_modulo`
--
ALTER TABLE `alm_modulo`
  MODIFY `modu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del  modulo';
--
-- AUTO_INCREMENT de la tabla `alm_notaingreso`
--
ALTER TABLE `alm_notaingreso`
  MODIFY `nti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de nota de ingreso';
--
-- AUTO_INCREMENT de la tabla `alm_notasalida`
--
ALTER TABLE `alm_notasalida`
  MODIFY `nts_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la nota de salida';
--
-- AUTO_INCREMENT de la tabla `alm_permiso`
--
ALTER TABLE `alm_permiso`
  MODIFY `permi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del permiso';
--
-- AUTO_INCREMENT de la tabla `alm_persona`
--
ALTER TABLE `alm_persona`
  MODIFY `perso_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la persona', AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `alm_presentacion`
--
ALTER TABLE `alm_presentacion`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la presentacion';
--
-- AUTO_INCREMENT de la tabla `alm_prioridad`
--
ALTER TABLE `alm_prioridad`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la prioridad';
--
-- AUTO_INCREMENT de la tabla `alm_producto`
--
ALTER TABLE `alm_producto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de producto';
--
-- AUTO_INCREMENT de la tabla `alm_rol`
--
ALTER TABLE `alm_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del tipo de usuario', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `alm_tipodocing`
--
ALTER TABLE `alm_tipodocing`
  MODIFY `tpdi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del tipo documento ';
--
-- AUTO_INCREMENT de la tabla `alm_tipodocumento`
--
ALTER TABLE `alm_tipodocumento`
  MODIFY `tpdoc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del tipo documento', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `alm_tipoinventario`
--
ALTER TABLE `alm_tipoinventario`
  MODIFY `tpiv_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tipo de inventario';
--
-- AUTO_INCREMENT de la tabla `alm_tiponotaingreso`
--
ALTER TABLE `alm_tiponotaingreso`
  MODIFY `tpnti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador tipo de nota de ingreso';
--
-- AUTO_INCREMENT de la tabla `alm_tiponotasalida`
--
ALTER TABLE `alm_tiponotasalida`
  MODIFY `tpnts_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tipo nota de salida';
--
-- AUTO_INCREMENT de la tabla `alm_tipotelefono`
--
ALTER TABLE `alm_tipotelefono`
  MODIFY `telf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de telefono', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `alm_tipo_producto`
--
ALTER TABLE `alm_tipo_producto`
  MODIFY `tppro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tipo de producto';
--
-- AUTO_INCREMENT de la tabla `alm_tpdokx`
--
ALTER TABLE `alm_tpdokx`
  MODIFY `tpkx_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador tipo documento kardex';
--
-- AUTO_INCREMENT de la tabla `alm_ubigeo`
--
ALTER TABLE `alm_ubigeo`
  MODIFY `ubi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del ubigeo';
--
-- AUTO_INCREMENT de la tabla `alm_usuario`
--
ALTER TABLE `alm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del usuario', AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `alm_usurol`
--
ALTER TABLE `alm_usurol`
  MODIFY `usrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alm_almacen`
--
ALTER TABLE `alm_almacen`
  ADD CONSTRAINT `fk_alm_usu` FOREIGN KEY (`usu_id`) REFERENCES `alm_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_bitacora`
--
ALTER TABLE `alm_bitacora`
  ADD CONSTRAINT `fk_bit_usu` FOREIGN KEY (`usu_id`) REFERENCES `alm_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_controlingreso`
--
ALTER TABLE `alm_controlingreso`
  ADD CONSTRAINT `fk_ctin_nti` FOREIGN KEY (`nti_id`) REFERENCES `alm_notaingreso` (`nti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ctin_prod` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alm_controlsalida`
--
ALTER TABLE `alm_controlsalida`
  ADD CONSTRAINT `fk_ctsd_nts` FOREIGN KEY (`nts_id`) REFERENCES `alm_notasalida` (`nts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ctsd_prod` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_detalmacen`
--
ALTER TABLE `alm_detalmacen`
  ADD CONSTRAINT `fk_dtal_alm` FOREIGN KEY (`alm_id`) REFERENCES `alm_almacen` (`alm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtal_prod` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_detnotaingreso`
--
ALTER TABLE `alm_detnotaingreso`
  ADD CONSTRAINT `fk_dtnti_krx` FOREIGN KEY (`krx_id`) REFERENCES `alm_kardex` (`krx_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtnti_nit` FOREIGN KEY (`nti_id`) REFERENCES `alm_notaingreso` (`nti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtnti_prod` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_detnotasalida`
--
ALTER TABLE `alm_detnotasalida`
  ADD CONSTRAINT `fk_dtnts_krx` FOREIGN KEY (`krx_id`) REFERENCES `alm_kardex` (`krx_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtnts_nts` FOREIGN KEY (`nts_id`) REFERENCES `alm_notasalida` (`nts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtnts_prod` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_detpresentacion`
--
ALTER TABLE `alm_detpresentacion`
  ADD CONSTRAINT `fk_dtpre_prdo` FOREIGN KEY (`prod_id`) REFERENCES `alm_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dtpre_pre` FOREIGN KEY (`pres_id`) REFERENCES `alm_presentacion` (`pres_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_empleado`
--
ALTER TABLE `alm_empleado`
  ADD CONSTRAINT `fk_emp_perso` FOREIGN KEY (`perso_id`) REFERENCES `alm_persona` (`perso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_inventario`
--
ALTER TABLE `alm_inventario`
  ADD CONSTRAINT `fk_inv_alm` FOREIGN KEY (`alm_id`) REFERENCES `alm_almacen` (`alm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inv_tpinv` FOREIGN KEY (`tpin_id`) REFERENCES `alm_tipoinventario` (`tpiv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_kardex`
--
ALTER TABLE `alm_kardex`
  ADD CONSTRAINT `fk_krx_inv` FOREIGN KEY (`inv_id`) REFERENCES `alm_inventario` (`inv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_modulo`
--
ALTER TABLE `alm_modulo`
  ADD CONSTRAINT `fk_modu_menu` FOREIGN KEY (`menu_id`) REFERENCES `alm_menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_modu_rol` FOREIGN KEY (`rol_id`) REFERENCES `alm_rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_notaingreso`
--
ALTER TABLE `alm_notaingreso`
  ADD CONSTRAINT `fk_nti_tpdi` FOREIGN KEY (`tpdi_id`) REFERENCES `alm_tipodocing` (`tpdi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nti_tpni` FOREIGN KEY (`tpni_id`) REFERENCES `alm_tiponotaingreso` (`tpnti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_notasalida`
--
ALTER TABLE `alm_notasalida`
  ADD CONSTRAINT `fk_nts_pri` FOREIGN KEY (`prio_id`) REFERENCES `alm_prioridad` (`pri_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nts_tpns` FOREIGN KEY (`tipnts_id`) REFERENCES `alm_tiponotasalida` (`tpnts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_permiso`
--
ALTER TABLE `alm_permiso`
  ADD CONSTRAINT `fk_permi_usu` FOREIGN KEY (`usu_id`) REFERENCES `alm_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_persona`
--
ALTER TABLE `alm_persona`
  ADD CONSTRAINT `fk_perso_tdoc` FOREIGN KEY (`tpdoc_id`) REFERENCES `alm_tipodocumento` (`tpdoc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perso_telf` FOREIGN KEY (`telf_id`) REFERENCES `alm_tipotelefono` (`telf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_producto`
--
ALTER TABLE `alm_producto`
  ADD CONSTRAINT `fk_prod_cate` FOREIGN KEY (`cate_id`) REFERENCES `alm_categoria` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_lote` FOREIGN KEY (`lote_id`) REFERENCES `alm_lote` (`lote_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_marca` FOREIGN KEY (`marca_id`) REFERENCES `alm_marca` (`marca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_tppro` FOREIGN KEY (`tppro_id`) REFERENCES `alm_tipo_producto` (`tppro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_usu` FOREIGN KEY (`usu_id`) REFERENCES `alm_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_usuario`
--
ALTER TABLE `alm_usuario`
  ADD CONSTRAINT `fk_usu_perso` FOREIGN KEY (`perso_id`) REFERENCES `alm_persona` (`perso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alm_usurol`
--
ALTER TABLE `alm_usurol`
  ADD CONSTRAINT `fk_usrol_rol` FOREIGN KEY (`rol_id`) REFERENCES `alm_rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usrol_usu` FOREIGN KEY (`usu_id`) REFERENCES `alm_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
