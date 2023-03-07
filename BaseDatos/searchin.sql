-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 22:46:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `searchin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcadores`
--

CREATE TABLE `marcadores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `marcador1nombre` varchar(25) NOT NULL,
  `marcador1url` varchar(500) NOT NULL,
  `marcador2nombre` varchar(25) NOT NULL,
  `marcador2url` varchar(500) NOT NULL,
  `marcador3nombre` varchar(25) NOT NULL,
  `marcador3url` varchar(500) NOT NULL,
  `marcador4nombre` varchar(25) NOT NULL,
  `marcador4url` varchar(500) NOT NULL,
  `marcador5nombre` varchar(25) NOT NULL,
  `marcador5url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcadores`
--

INSERT INTO `marcadores` (`id`, `usuario`, `marcador1nombre`, `marcador1url`, `marcador2nombre`, `marcador2url`, `marcador3nombre`, `marcador3url`, `marcador4nombre`, `marcador4url`, `marcador5nombre`, `marcador5url`) VALUES
(50, 'administrador', 'Favorito', 'URL', 'Favorito', 'URL', 'Favorito', 'URL', 'Favorito', 'URL', 'Favorito', 'URL'),
(61, 'lector', 'Youtube', 'www.youtube.es', 'Yahoo', 'www.yahoo.es', 'Favorito', 'URL', 'Favorito', 'URL', 'Favorito', 'URL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `url` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `categoria`, `autor`, `fecha`, `url`, `img`) VALUES
(3, 'La guerra de Ucrania agudiza la inflación, que se dispara un 7,6%, su nivel más alto en 35 años', 'Economia', 'Roberto Vargas', '2022-03-11', 'https://www.larazon.es/economia/20220311/dehn73m7k5eslj2zznkdcwfwi4.html', 'https://www.nuevatribuna.es/asset/thumbnail,992,558,center,center//media/nuevatribuna/images/2017/12/09/2017120918200251719.jpg'),
(4, 'España monta un operativo sin precedentes para acoger a los desplazados de Ucrania', 'Nacional', 'Susana Campo', '2022-03-11', 'https://www.larazon.es/espana/20220311/fehndjbdhjftbgg6wbjf5t4x5y.html', 'https://i.guim.co.uk/img/media/ef0d30a0acd161da6ff702cc56df685d63c953fe/0_220_4691_2815/500.jpg?quality=85&auto=format&fit=max&s=9c1c6aa0ea471969faf661af8cf509d1'),
(5, '¿Ha llegado el momento de retomar el Midcat, el gran gasoducto español que “inundaría” Europa de gas?', 'Economia', 'Albert Martinez', '2022-03-10', 'https://www.larazon.es/internacional/20220310/kpa74kf3bzfgvdfq67ebit76ze.html', 'https://www.terram.cl/wp-content/uploads/2016/06/gas-500-x-300.jpg'),
(6, 'Artillería guiada por drones “domésticos”: así hace huir Ucrania a una gran columna de blindados rusa', 'Internacional', 'Angel Luis de Santos', '2022-03-10', 'https://www.larazon.es/internacional/20220310/5c5fmoiagbfupjq54vxer6xnm4.html', 'https://www.newsgater.com/wp-content/uploads/2021/08/2-top-isis-leaders-killed-in-us-drone-strike-in-kabul.jpg'),
(8, 'Atocha, 7:37 horas: una mañana en los trenes que cambiaron la historia', 'Opinion', 'Jaime Echague', '2022-03-11', 'https://www.larazon.es/madrid/20220311/hjcgdndsc5d2raxzvrkuuxc5tq.html', 'https://www.apartamentosparaempresas.com/wp-content/uploads/2019/11/apartamentos-para-empresas-atocha.jpg'),
(9, 'Generación 11-M: así son los jóvenes nacidos el año de los atentados de Madrid', 'Opinion', 'Beatriz Pascual', '2022-03-11', 'https://www.larazon.es/madrid/20220311/4od3t6vxtjgstnofcrx5rpukna.html', 'https://www.nacel.org/assets/img/prod_medium/0000003718.jpg'),
(10, 'Casado defiende en la UE su compromiso contra Vox', 'Nacional', 'Carmen Morodo', '2022-03-11', 'https://www.larazon.es/espana/20220311/4imxgrobfngwxceumcejk4relm.html', 'https://i.guim.co.uk/img/media/7a144d1ab9e9da0a28e0a4c9abbd809a3fcadd77/0_130_5318_3190/500.jpg?quality=85&auto=format&fit=max&s=63b58b866dc4dcfbb8ecc9eb6fc2cd56'),
(11, 'Belarra defenderá ante Podemos su “no” a las armas en un consejo acrítico', 'Nacional', 'Rocio Esteban', '2022-03-11', 'https://www.larazon.es/espana/20220311/axkj7rn2crcr3ey3offhjik4fm.html', 'https://i.guim.co.uk/img/media/c0e0f41b9e26080fbcc31044054113296368b2e4/0_269_5568_3341/500.jpg?quality=85&auto=format&fit=max&s=8c7634e2153aab1352fb7252271f837c'),
(12, 'Detenido el italiano que quemó una furgoneta de la Policía Urbana de Barcelona con los agentes dentro', 'Nacional', 'J.M Zuloaga', '2022-03-10', 'https://www.larazon.es/espana/20220310/7xefdmozuvcttorhvmbkhtkszm.html', 'https://assets.thehansindia.com/h-upload/2020/08/17/500x300_991993-car-fire-vijayawada.webp'),
(13, 'Camps se sentará en el banquillo de la Audiencia Nacional a partir de enero de 2023', 'Nacional', 'Toni Ramos', '2022-03-11', 'https://www.larazon.es/comunidad-valenciana/20220311/prpsvvufdbczpmnthpkepedjwq.html', 'https://www.sail-world.com/photos/sailworld/photos/Med_alinghi5_valencia_lsunching-lb10_000325_photo.jpg'),
(14, 'Lluvia, frío y nieve: estas serán las zonas más afectadas por la gran borrasca', 'Nacional', 'H. de Miguel', '2022-03-10', 'https://www.larazon.es/sociedad/20220310/oydiezq37bgkln3trwz662tn4y.html', 'https://i.guim.co.uk/img/media/12c04ddcea4de9486dcf7333632ddc0bce96777d/0_0_3444_2067/500.jpg?quality=85&auto=format&fit=max&s=faa0261ea2198f71063dbcdaff252754'),
(15, 'Llull guía al Madrid para sobrevivir ante el Milán', 'Deportes', 'Mariano Ruiz Diez', '2022-03-10', 'https://www.larazon.es/deportes/baloncesto/euroliga/20220310/edlo2pncc5gcra4ft4fxl64ebe.html', 'https://s1.eestatic.com/2021/05/23/elbernabeu/real-madrid/baloncesto/583454490_186065387_1024x576.jpg'),
(16, 'Así puede reforzar al Real Madrid y al Barcelona la sanción al Chelsea', 'Deportes', 'Domingo Garcia', '2022-03-10', 'https://www.larazon.es/deportes/futbol/20220310/p4ideaigcbhefgsmqerxnl7hga.html', 'https://larepublica.pe/resizer/kkx2SEb4rUB9BK5B6LxvK29ZelE=/500x300/top/larepublica.pe/resizer/p-Y8hPTprvAcz9GBjPuH4p6c5Ls=/500x300/top/smart/cloudfront-us-east-1.images.arcpublishing.com/gruporepublica/BRQU5KAOYJH23FRG5KLLXJG2M4.jpg'),
(17, 'El cumpleaños feliz de Florentino Pérez', 'Opinion', 'Jesus Rivases', '2022-03-10', 'https://www.larazon.es/deportes/futbol/real-madrid/20220310/jeybwn3londp7jzenkwtc3b3hq.html', 'https://static.footballtransfers.com/images/cn/image/upload/c_thumb,q_90,w_500,h_300,ar_5.3/footballcritic/o2emu77ooktvrl4hoxzg'),
(18, '¿Cuánto cuesta poner cada electrodoméstico este viernes 11 de marzo?', 'Economia', 'Inma Bermejo', '2022-03-11', 'https://www.larazon.es/economia/20220311/ngfwvusjszgqha757r7havqkhm.html', 'https://www.periodicoporque.com/wp-content/uploads/2021/12/enchufe.jpg'),
(19, 'Nueva caída en el precio de la luz: estas son las horas más baratas y caras del viernes 11 de marzo', 'Economia', 'Andrea Garrote', '2022-03-10', 'https://www.larazon.es/economia/20220311/rcf2hqn6sbevzoqenooc3f6zl4.html', 'https://inmopack.makrin.net/web/image/product.template/60/image'),
(20, '¿Cuántos impuestos pagamos por llenar el depósito del coche?', 'Economia', 'Hector Herrera', '2022-03-10', 'https://www.larazon.es/economia/20220310/475h7gyfdvhcngw3drpcb6fdje.html', 'https://i0.wp.com/blogmapfre.com/wp-content/uploads/2014/08/7640165058_cbfdb22c0f_z.jpg?resize=500%2C300'),
(21, 'La última confesión de Nadal sobre su dolencia crónica', 'Deportes', 'J. Terril', '2022-03-11', 'https://www.larazon.es/deportes/tenis/20220311/kro4abw42rbupjlg7xqqw5xgzi.html', 'https://i.guim.co.uk/img/media/21bcb551db80ce74a1d9d616c60242f8e4694ec1/0_0_4297_2579/500.jpg?quality=85&auto=format&fit=max&s=caff15ea4d5abfc71a98cd8dda674f3a'),
(22, 'El error del PSG con Sergio Ramos y Messi, unas “estrellas envejecidas”', 'Deportes', 'Petit Tesson', '2022-03-11', 'https://www.larazon.es/deportes/futbol/20220311/ctqqkafprjbl7nvoc4jwuynpmi.html', 'https://i.guim.co.uk/img/media/06ea7f026d3b20165a71d08fa2f09a940f962c69/0_146_3500_2101/500.jpg?quality=85&auto=format&fit=max&s=87dcd8f08bc87538776a3e114ee23984'),
(23, 'Putin dice que se han logrado avances en las negociaciones con Ucrania', 'Internacional', 'Angel Luis de Santos', '2022-03-11', 'https://www.larazon.es/internacional/20220311/na2wuq3annfj5iqiqpukw7tzje.html', 'https://www.tvartemisa.icrt.cu/wp-content/uploads/2022/02/Vladimir-Putin2.jpg'),
(24, 'Ucrania publica esta lista de 50 empresas globales que aún siguen operando en Rusia', 'Internacional', 'La Razón', '2022-03-11', 'https://www.larazon.es/internacional/20220311/gioyftew7rf25gkvfcmg26ka5e.html', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/%D0%A6%D0%B5%D0%BD%D1%82%D1%80%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BE%D1%84%D0%B8%D1%81_%D0%9C%D1%8D%D0%B9%D0%BB.%D1%80%D1%83.jpg/500px-%D0%A6%D0%B5%D0%BD%D1%82%D1%80%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BE%D1%84%D0%B8%D1%81_%D0%9C%D1%8D%D0%B9%D0%BB.%D1%80%D1%83.jpg'),
(25, 'La Infanta Cristina, madre orgullosa de Pablo Urdangarin en su debut en la Champions de balonmano', 'Nacional', 'Elena Barrios', '2022-03-11', 'https://www.larazon.es/gente/casa-real/20220311/lulbe7aqcnes3mj7lqrhklmrw4.html', 'https://mx.hola.com/imagenes/realeza/casa_espanola/2016010583028/infanta-cristina-una-semana-juicio-noos/0-346-850/infanta-cristina1-c.jpg?filter=w500'),
(120, '¿Qué va a pasar con Twitter tras la compra de Elon Musk?', 'Economía', 'Alfredo Biurrun', '2022-04-25', 'https://www.larazon.es/tecnologia/20220426/faxn5ocic5f3pilfgiosjsrrfy.html', 'https://images.cnbctv18.com/wp-content/uploads/2021/03/elonmusk_technoking-1019x573.jpg?impolicy=website&width=500&height=300'),
(121, 'Objetivo del PP andaluz: sumar más escaños que PSOE y UP', 'Nacional', 'Carmen Morodo', '2022-04-26', 'https://www.larazon.es/espana/20220426/temokxmtube4pdxhoksoa3esoi.html', 'https://elcorreoweb.es/wp-content/uploads/2013/05/pp-invercaria.jpg'),
(122, 'El Gobierno no ve «en riesgo» la legislatura por ERC', 'Nacional', 'Ainhoa Martinez', '2022-04-26', 'https://www.larazon.es/espana/20220426/lceri4huu5dijbb77fg4fk6v74.html', 'https://static.korkep.sk/2021/05/69-500x300.jpg'),
(123, 'El Rey hace público un patrimonio personal de más de 2,5 millones de euros', 'Nacional', 'Susana Campo', '2022-04-26', 'https://www.larazon.es/espana/20220425/ohb35wu5jnbstbcouoiw5zxlqq.html', 'https://i.guim.co.uk/img/media/125d6aea3b9e7611e438d7975c02328d16e91d2c/0_0_4134_2480/500.jpg?quality=85&auto=format&fit=max&s=94ba28610d41d41d0c255f33b980474b'),
(124, 'Le Pen arrasa en el campo y los suburbios y los jóvenes se abstienen', 'Internacional', 'Andreina Flores', '2022-04-26', 'https://www.larazon.es/internacional/europa/20220426/fa5lwvnwnvdvja7u4s65qeotpe.html', 'https://i.guim.co.uk/img/media/64d5f8cbf32dd4136a1e81eb5a3bdd3a5603fd2d/0_108_4096_2459/500.jpg?quality=85&auto=format&fit=max&s=98e379828976eba26dab907f879f17fa'),
(125, '“El principal reto de Macron será gobernar frente a la oposición de la calle”', 'Internacional', 'Goyo G. Maestro', '2022-04-26', 'https://www.larazon.es/internacional/europa/20220426/2bmkxfgjdvd5bcurosmedfmgme.html', 'https://quierotvecuador.com/wp-content/uploads/2022/04/IMG_24042022_142002_500_x_300_pixel.jpg'),
(126, 'Lavrov advierte: “Hay un riesgo real y serio” de una Tercera Guerra Mundial', 'Internacional', 'La Razón', '2022-04-26', 'https://www.larazon.es/internacional/20220426/z722mou3dbhnldqczmzacpc77i.html', 'https://i.guim.co.uk/img/media/b902ac581ec95a172c89d39fda398a8926ebf5d2/0_317_5062_3038/500.jpg?quality=85&auto=format&fit=max&s=5681a733fc1c01d8acf22663c41f243c'),
(127, 'Estos son los países que han entregado armas pesadas a Ucrania pese a la amenaza de Rusia', 'Internacional', 'Antonio Añover', '2022-04-26', 'https://www.larazon.es/internacional/europa/20220425/apxwzglh6zhpjbfh52buxw32ni.html', 'https://ic-cdn.flipboard.com/guim.co.uk/352b061df432d1af30d8b24d5d2c1c3c99e51270/_medium.webp'),
(128, 'Estas son las horas que debes dormir en función de tu edad', 'Opinion', 'Hector Herrera', '2022-04-25', 'https://www.larazon.es/salud/20220425/wihk2uvceffxvpjmuq7ughyw4q.html', 'https://www.diselco.es/fotos/mobiliario/131-mejor-postura-dormir-1-500x300.jpg'),
(129, 'Alerta alimentaria en España: retiran dos productos y piden que no se consuman', 'Opinion', 'Estefanía Sarmiento', '2022-04-26', 'https://www.larazon.es/sociedad/20220425/p4yzjorq2zblfgonxvonibgqsi.html', 'https://i.guim.co.uk/img/media/585cea66a7e3cb67587e20f88ae6102094b1f0d8/21_349_5076_3046/500.jpg?quality=85&auto=format&fit=max&s=ab32f98b751d2613caed5a26ec9dae5b'),
(130, 'El TS exige ahora a parejas de hecho registrarse para cobrar la viudedad', 'Nacional', 'J. Carabaña', '2022-04-26', 'https://www.larazon.es/sociedad/20220426/qtzqxuvasvdipm6v7gb7wrkkbe.html', 'https://www.qhotels.es/wp-content/uploads/2019/06/IMG_0918-500x300.jpg'),
(131, 'Estos son los rasgos de personalidad que predisponen a la demencia', 'Opinion', 'E. Soriano', '2022-04-26', 'https://www.larazon.es/sociedad/20220425/iaebyx4vofbspaj4pqdrmxsoti.html', 'https://yourbrain.health/wp-content/uploads/2019/03/La-demencia-frontotemporal-500x300.jpg'),
(132, 'Omella, contra «el proselitismo» del Gobierno a favor del aborto', 'Opinion', 'Jose Beltrán ', '2022-04-26', 'https://www.larazon.es/sociedad/20220426/rlgzpeahrrayhpzkbsisu5tjia.html', 'https://www.cristianosgays.com/wp-content/uploads/2016/02/visitaadlimina14gran2.png'),
(133, 'Oliver Stone: “Putin no es como Hitler sino alguien muy racional”', 'Opinion', 'Víctor Fernández', '2022-04-26', 'https://www.larazon.es/cultura/20220426/3ekjoo7tlrcgjlsulo3yvwcyg4.html', 'https://ujszo.com/sites/default/files/styles/pl_medium/public/lead_image/tv_showtime_putin895120433495_0.jpg'),
(134, '¿En qué consiste la propuesta de Vox para terminar con los “okupas”?', 'Nacional', 'L. Cuenca', '2022-04-26', 'https://www.larazon.es/espana/20220426/eysmagrny5frlm46uykrvyczyq.html', 'https://s1.eestatic.com/2020/09/19/espana/politica/vox-politica-partido_popular_-pp_521959684_160392232_1024x576.jpg'),
(135, 'La Audiencia Nacional pide renovar a los jueces a cargo del “caso Villarejo” y de la investigación europea a Tomás Ayuso', 'Nacional', 'Irene Dorta', '2022-04-26', 'https://www.larazon.es/espana/20220426/qpoj6d6yrzho7oegqanjmdtuly.html', 'https://i.guim.co.uk/img/media/9359ee4b8cbf82593d392e35ea620110981ed876/193_1059_2162_1297/500.jpg?quality=85&auto=format&fit=max&s=92073a59d3faf02bdc14ad5185d30476'),
(137, 'Podemos usa el patrimonio del Rey para cargar contra su inviolabilidad', 'Nacional', 'Rocío Esteban', '2022-04-26', 'https://www.larazon.es/espana/20220425/et4wdptngvaurayftjioaqyiuy.html', 'https://www.publico.es/uploads/2014/12/12/548ae5de3ff5d.jpg'),
(138, 'De Código Rojo a Alto Riesgo', 'Opinion', 'Toni Bolaño', '2022-04-25', 'https://www.larazon.es/opinion/20220426/t2aoko4ddncl5gf22fnpilbpt4.html', 'https://foroconsultivo.org.mx/cienciayelcoronavirus/images/acceso_libre/Consejos/C_6.jpg'),
(139, 'El Gobierno aprueba mañana la “hoja de ruta” de transparencia de la Casa Real', 'Nacional', 'Ainhoa Martinez', '2022-04-25', 'https://www.larazon.es/espana/20220425/7od6d5tmhnbe7ice3l67yq7auq.html', 'https://i.guim.co.uk/img/media/2a421eb8b3c35958de8c128866e9133e74fd98f5/0_5_4086_2453/500.jpg?quality=85&auto=format&fit=max&s=0f14a5f6853232fb2e62573e6b17fe75'),
(140, '34 agentes del orden se quitaron la vida en 2021', 'Nacional', 'Marta de Andrés', '2022-04-25', 'https://www.larazon.es/sociedad/20220426/ztxhnqdfxbcqbnw2hifr6jitby.html', 'https://www.alertazeta.com/wp-content/uploads/2021/04/p-1-500x300-cropped.jpg'),
(141, 'Berlín confía en impulsar con París la soberanía europea', 'Internacional', 'Rubén Gómez del Barrio', '2022-04-26', 'https://www.larazon.es/internacional/europa/20220426/ybz2ru5bxzgt5crjajfat42xzq.html', 'https://www.aelca.es/material/img/es/4948_1612367053_alemania-blog.jpg'),
(142, 'Macron se lanza a la tercera vuelta en busca del control de la Asamblea Nacional', 'Internacional', 'Carlos Herranz', '2022-04-25', 'https://www.larazon.es/internacional/europa/20220425/3dts33vnsjgade6ft3dfp7r744.html', 'https://dominiomedios.com/wp-content/uploads/2022/04/macron.jpg'),
(143, 'Suecia y Finlandia contemplan solicitar juntas su adhesión a la OTAN', 'Internacional', 'Pedro G. Poyatos', '2022-04-26', 'https://www.larazon.es/internacional/20220425/4uqidfnynvbqvjakxm7idennva.html', 'https://ic-cdn.flipboard.com/guim.co.uk/3b77436d5de5a0e4291c2be65549ed344d255df5/_medium.jpeg'),
(144, 'Varias explosiones sacuden Transnistria', 'Internacional', 'La Razón', '2022-04-25', 'https://www.larazon.es/internacional/20220425/h3jju27tzvgslgz2aqvib4i5jm.html', 'http://www.hotnews.md/upload/articles/2022-03/70669-16473-87370-71.65.jpg'),
(145, '¿Qué se juega Macron en las elecciones legislativas de junio?', 'Internacional', 'Pedro G. Poyatos', '2022-04-25', 'https://www.larazon.es/internacional/europa/20220426/w6hwbmb2rfbipf7j42rh7xdiyq.html', 'https://images.cnbctv18.com/wp-content/uploads/2019/06/2019-06-05T221030Z_1_LYNXNPEF54222_RTROPTP_4_DDAY-ANNIVERSARY-BRITAIN-1019x573.jpg?impolicy=website&width=500&height=300'),
(146, 'El emotivo mensaje del Ejército de Ucrania para agradecer a España y otros países el apoyo en la guerra', 'Internacional', 'Antonio Fernández', '2022-04-25', 'https://www.larazon.es/internacional/20220426/we5kelp7tze43jmpa6vcyasmzy.html', 'https://i.guim.co.uk/img/media/510ec2b9ecee7c89908028a614bd80aa39d585cd/0_395_8124_4875/500.jpg?quality=85&auto=format&fit=max&s=bc3289bcef7ce28b283ce7dfa6d51a34'),
(147, '“El principal reto de Macron será gobernar frente a la oposición de la calle”', 'Internacional', 'Goyo G. Maestro', '2022-04-25', 'https://www.larazon.es/internacional/europa/20220426/2bmkxfgjdvd5bcurosmedfmgme.html', 'https://www.losreplicantes.com/images/f/2300/2316-f7.jpg'),
(148, 'Las sospechas de Estados Unidos que ponen contra las cuerdas a Abramovich', 'Internacional', 'I. Trujillo', '2022-04-26', 'https://www.larazon.es/deportes/20220426/yrvqv47erjeffbt6xhyxvf3wli.html', 'https://i.guim.co.uk/img/media/81827019720ee3134d125250fa31b1a3e350128f/0_66_1142_685/500.jpg?quality=85&auto=format&fit=max&s=462fa1a600995d371ceb96dfc3aff6d3'),
(149, 'Shanghái mata a las mascotas de positivos para evitar la propagación del coronavirus', 'Internacional', 'Lorena Sáez', '2022-04-25', 'https://www.larazon.es/internacional/asia/20220425/sy2iwkavh5eo7muwo25lvo3t7a.html', 'https://i.guim.co.uk/img/media/44889498d88471698c5c0cb02bfad1348896fa0b/0_326_6000_3602/500.jpg?quality=85&auto=format&fit=max&s=ad7652cdce520092f5868712d58e4fb9'),
(150, 'El Ingreso Mínimo solo llega al 12% de la población bajo el umbral de pobreza', 'Economia', 'Inma Bermejo', '2022-04-26', 'https://www.larazon.es/economia/20220426/akj56wa5hnejfnmdfv5jrn5lz4.html', 'https://www.ipcblog.es/wp-content/uploads/2012/08/sueldos_medios_subiran_2010.jpg'),
(151, 'Elon Musk compra Twitter por 41.000 millones de euros', 'Economia', 'Roberto L. Vargas', '2022-04-26', 'https://www.larazon.es/economia/20220425/7zllafjdhre5lc2krw6w35n7tu.html', 'https://i.guim.co.uk/img/media/685f13c2129a016cab5ec5549f8eba9e274f6567/16_109_3143_1887/500.jpg?quality=85&auto=format&fit=max&s=7191682197913415cc1f1466144165dd'),
(152, 'El límite del 2% al alquiler encarecerá los futuros arrendamientos', 'Economia', 'Roberto L. Vargas', '2022-04-26', 'https://www.larazon.es/economia/20220426/mrz4cxlmojfzvabzjyfx4p2zeq.html', 'https://www.articulosdeinteres.org/wp-content/uploads/2018/05/ALQUILER-2.jpg'),
(153, 'Los sindicatos amenazan a los empresarios con más conflictos laborales si no suben los salarios', 'Economia', 'Inma Bermejo', '2022-04-26', 'https://www.larazon.es/economia/20220425/iju7j7iyz5ehlldlutolsx7bsy.html', 'https://www.jornada.com.mx/2021/08/03/fotos/012n2pol-1.jpg'),
(154, 'El beneficio de Enagás cae un 25%, hasta los 69 millones', 'Economia', 'S. E. F', '2022-04-26', 'https://www.larazon.es/economia/20220426/xkldsa73irhyvfo4c7iqcsbwk4.html', 'https://i2.wp.com/noticiasbancarias.com/wp-content/uploads/2013/07/enagas.jpg?ssl=1'),
(155, 'Un juzgado obliga a Wizink a devolver 52.000 euros por una tarjeta revolving', 'Economia', 'S. de la Cruz', '0000-00-00', 'https://www.larazon.es/economia/20220426/fbbi4zelkvbpbhzi3glyhhc6ou.html', 'https://d3hcf0nbuqjt3g.cloudfront.net/panel_marcas/wizink.jpg'),
(156, 'Nuevo récord de gasto en pensiones: la nómina de abril alcanza los 10.798 millones', 'Economia', 'Inma Bermejo', '2022-04-26', 'https://www.larazon.es/economia/20220426/myltno7r3vbixdwwf7at33i3ye.html', 'https://raed.academy/wp-content/uploads/2020/07/pensiones-dstNtc.jpeg'),
(157, 'La facturación de las empresas sigue disparada: aumenta un 28,9% en febrero, pero se modera respecto a enero', 'Economia', 'S. de la Cruz', '2022-04-26', 'https://www.larazon.es/economia/20220426/icue4hphsjb45gawoppnn6ge3a.html', 'https://www.finanzzas.com/wp-content/uploads/autonomos2.jpg'),
(158, '¿Cómo debo actuar si Hacienda aún no me ha devuelto el dinero de la Renta?', 'Economia', 'Hector Herrera', '2022-04-26', 'https://www.larazon.es/economia/20220426/tnrvqixwe5a45p4auea35pmj5m.html', 'https://laurus.es/wp-content/uploads/2017/04/01-agencia-tributaria.jpg'),
(159, 'HSBC, el mayor banco europeo, gana casi un 28% menos en el primer trimestre', 'Economia', 'La Razón', '2022-04-26', 'https://www.larazon.es/economia/20220426/rvturo3sebdkba4cdjrw7twssi.html', 'https://mundour.com/wp-content/uploads/2020/12/c3c7892bbe07446c57487ebac7841d4a_w500_h300_cp.png'),
(160, 'Vuelve Carolina Marín: “Tiene una capacidad de sacrificio muy por encima de la media”', 'Deportes', 'Francisco Martínez', '2022-04-26', 'https://www.larazon.es/deportes/tenis/20220425/vuyqlvepcvai3gxjx3rtplk7wq.html', 'https://thebridge.in/h-upload/2021/12/10/500x300_20002-three-time-champion-shuttler-carolina-marin-source-bwf.webp'),
(161, 'El contundente aviso de Higuaín a Luis Suárez', 'Deportes', 'I. T.', '2022-04-26', 'https://www.larazon.es/deportes/futbol/atletico-madrid/20220425/47h3w6yobzasldwcd4rfivrcsu.html', 'https://i.guim.co.uk/img/media/8157c89ee1725a29acda40c7846c31f3650d8607/454_572_4046_2428/500.jpg?quality=85&auto=format&fit=max&s=4719102cdc720b60a9f96ee94d19f525'),
(162, 'El Betis ofrece a Isco ser uno de los tres jugadores mejor pagados de su plantilla', 'Deportes', 'La Otra Liga', '2022-04-26', 'https://www.larazon.es/deportes/laotraliga/20220425/om66qhhsdfedxnmttioubxmt2a.html', 'https://celebritynews.pk/wp-content/uploads/2020/04/Isco-Alarcon-Suarez-Biography-4.jpg'),
(163, 'Alcaraz desvela cuál es su rutina para motivarse antes de los partidos', 'Deportes', 'Francisco Martínez', '2022-04-25', 'https://www.larazon.es/deportes/tenis/20220425/l3ijjc35mvfgpgtm2jngjm4yhu.html', 'https://i.guim.co.uk/img/media/5f9b1ff4133c963e4e9ba2a2e4ef61b75fcc2222/0_279_2305_1383/500.jpg?quality=85&auto=format&fit=max&s=5fa5f236b2ed5847ee88a9630af5e5a8'),
(164, 'Así está el ranking del tenis tras el triunfo de Alcaraz en Barcelona y con Nadal a punto de regresar', 'Deportes', 'Francisco Martínez', '2022-04-25', 'https://www.larazon.es/deportes/tenis/20220425/3xz27nqeezgnzofl5x3wds2exi.html', 'https://ayvisa.es/wp-content/uploads/2021/01/partes-de-un-tenis.jpg'),
(165, 'El Esports International Business Center llega de la mano de EBLive y el Big C', 'Deportes', 'Álvaro García Daza', '2022-04-25', 'https://www.larazon.es/deportes/esports/20220426/oni4v2yi25bmjknasyowiaxiky.html', 'https://locateinlexington.com/wp-content/uploads/UKs-Cornerstone-Building-Esports-Theater-500x300.jpg'),
(166, 'La decisión definitiva de Messi: el equipo en el que jugará la próxima temporada', 'Deportes', 'Óscar García', '2022-04-26', 'https://www.larazon.es/deportes/futbol/20220426/k47k65u3dbbqpeqgsmryziol5u.html', 'https://larepublica.pe/resizer/TFmNpX4MC8EyXtzL2Q-a3lDE3C0=/500x300/top/larepublica.pe/resizer/T2UgG4zrQ203VNpy01bUGnbMyLc=/500x300/top/smart/cloudfront-us-east-1.images.arcpublishing.com/gruporepublica/LZ4YGNLUMRCZZKTYRVROHJLTFQ.jpg'),
(167, 'La tajante decisión de Fernando Alonso sobre su futuro', 'Deportes', 'Óscar García', '2022-04-26', 'https://www.larazon.es/deportes/formula-1/20220426/jcopmm2ky5ef3jxc7ugzenl4zq.html', 'https://i.guim.co.uk/img/media/0085655d47d1230127dab22b2899c82f01f28de9/0_157_4721_2832/500.jpg?quality=85&auto=format&fit=max&s=49cc1170040bd00f4460dff3dc950d79'),
(169, '¿Sabes quién es el jugador español con más partidos en Champions?', 'Deportes', 'I. Trujillo', '2022-04-26', 'https://www.larazon.es/deportes/futbol/20220426/xuw64aczprgcpiojrve2tngbme.html', 'https://www.haceinstantes.com/uploads/imagenes/repositorio/2021/09/14/169339/20210914103004156005c5baf40ff51a327f1c34f2975b_min.jpg'),
(170, 'El Betis comparte una fotografía de Joaquín desnudo con la Copa del Rey', 'Deportes', 'La Otra Liga', '2022-04-26', 'https://www.larazon.es/deportes/laotraliga/20220425/u62vkuvgt5dorpzhavef5rs3gi.html', 'https://i.guim.co.uk/img/media/e568477086a1dd19b45b2c557d0f9fde832f7aae/161_1_4128_2478/500.jpg?quality=85&auto=format&fit=max&s=154bb87750e9242abf34139007bb632b'),
(171, 'La mentira de Cristina Porta con la que consiguió que la fichara Punto Pelota', 'Deportes', 'La Razón', '2022-04-25', 'https://www.larazon.es/deportes/futbol/real-madrid/20220425/77ggcme4hzestiheovxjquinmi.html', 'https://larepublica.pe/resizer/GJ1buycOtR0IM1Cze2yE7AKnGLI=/500x300/top/larepublica.pe/resizer/aG2hO1e6oUymxrnZ_Kq6BuC9gj4=/500x300/top/smart/cloudfront-us-east-1.images.arcpublishing.com/gruporepublica/6B3QEQNWI5FULKDT4M6TA5J5PA.jpg'),
(172, 'Ancelotti: “Me acuerdo de los que decían que no íbamos a llegar aquí”', 'Deportes', 'José Aguado', '2022-04-25', 'https://www.larazon.es/deportes/futbol/real-madrid/20220425/gfrkuojdlrcohhfi3yb46vaeie.html', 'https://i.guim.co.uk/img/media/736217274f31d471fbb48be4ed2aec68d8de8dd0/55_62_1831_1098/500.jpg?quality=85&auto=format&fit=max&s=aa847ddee3693356b32561072e49cc79'),
(173, 'La Corona de la transparencia', 'Opinion', 'La Razón', '2022-04-25', 'https://www.larazon.es/editoriales/20220426/uy7hyzvmkvhkpdhpesvrfn77fm.html', 'https://imengine.editorial.prod.ntc.navigacloud.com/?uuid=2cf50023-c7ad-5806-829c-93f18792e63b&function=hardcrop&type=preview&source=false&width=500&height=300'),
(174, 'Una de espías', 'Opinion', 'Abel Hernández', '2022-04-25', 'https://www.larazon.es/opinion/20220426/malqbt5enbf63c4us6i6ui47jq.html', 'https://www.telesurtv.net/export/sites/telesur/img/multimedia/2018/05/31/pedro_sanchez.jpg_825434843.jpg'),
(175, 'Palurdismo vocacional', 'Opinion', 'Sabino Méndez ', '2022-04-25', 'https://www.larazon.es/opinion/20220426/52fhikqusrc3xd7q4rn6sv3ijy.html', 'https://larepublica.pe/resizer/JuUelrSV5Ree5v_mxXM7To4VNnM=/500x300/top/larepublica.pe/resizer/cQoY029Uzgk1IVIXeyqDon8GK0s=/500x300/top/smart/cloudfront-us-east-1.images.arcpublishing.com/gruporepublica/SNCBAAR2FNGWZOPLUBJYD3DZKA.jpg'),
(176, 'Cinismo del secesionismo catalán', 'Opinion', 'Luis María Anson', '2022-04-25', 'https://www.larazon.es/opinion/20220426/ijmjydvymvbjvbovdk77g7b5eq.html', 'https://www.telesurtv.net/export/sites/telesur/img/multimedia/2017/12/15/puigdemont_cataluxa_-_efe.jpg_825434843.jpg'),
(177, '¿Orgasmo o napolitana de chocolate? La verdad sobre el futuro de los concursos de Realities de TV', 'Opinion', 'Carla de La Lá', '2022-04-26', 'https://www.larazon.es/opinion/20220425/qjdm7tmi2jhbpo7hvxzlj6rx7m.html', 'https://i.blogs.es/4f2c13/reality/1366_2000.jpg'),
(178, 'Una ola de descontento:\r\nEl voto del cabreo recorre Europa de lado a lado', 'Opinion', 'José Antonio Viera', '2022-04-25', 'https://www.larazon.es/opinion/20220425/x76j4eiexbgwljipvr3yoxqj6i.html', 'https://www.globaltimes.cn/Portals/0//attachment/2020/2020-04-19/f10ac9b4-1b60-402a-8f59-6e915a84e990.jpeg'),
(179, 'El fracaso de Putin: La guerra de nunca acabar', 'Opinion', 'Vicente Vallés                    ', '2022-04-25', 'https://www.larazon.es/opinion/20220425/skelbpz3yzdtxkd7nsma4ufqt4.html', 'https://i.guim.co.uk/img/media/7aee976a1c7d3f43cfed955d0896c52b00671a47/0_1160_6531_3917/500.jpg?quality=85&auto=format&fit=max&s=64708cf80163f9041eb5a603bb92065f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `nombreCompleto` varchar(100) NOT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `contrasena` varchar(25) NOT NULL,
  `categoriaSeleccionada` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `nombreCompleto`, `tipo`, `contrasena`, `categoriaSeleccionada`) VALUES
(97, 'administrador', 'administrador', 'Administrador', 'administrador', 'Todo'),
(108, 'lector', 'lector default', 'Redactor', 'lector', 'Todo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcadores`
--
ALTER TABLE `marcadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcadores`
--
ALTER TABLE `marcadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
