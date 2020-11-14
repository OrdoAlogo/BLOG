-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2020 a las 18:18:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `nickname` varchar(40) NOT NULL,
  `comentario` varchar(400) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post`, `nickname`, `comentario`, `fecha`) VALUES
(7, 16, 'David', ' Actualmente tengo un intel core i6700K acompañado de una 1070 y puedo con todos los juegos en ultra sin ningún tipo \r\n de problema', '2020-11-14'),
(8, 16, 'Ordoño', ' Muy buen aporte', '2020-11-14'),
(9, 16, 'Maria', ' Un post increible enhorabuena ', '2020-11-14'),
(10, 16, 'Jose', ' En mi opinion es mejor comprar un prcesador actual en vez de adquirir algo con 5 años de antiguedad con 4 nucleos\r\n', '2020-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` varchar(3000) DEFAULT NULL,
  `imagen_post` varchar(255) DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `nickname`, `titulo`, `contenido`, `imagen_post`, `visitas`, `fecha`) VALUES
(16, 'Jon', 'CORE I7 6700K FRENTE A CORE I7 9700K EN JUEGOS ACTUALES', 'Los chicos de NJ Tech vuelven a la carga con una nueva e interesante comparativa en la que enfrentan, en esta ocasión, al Core i7 6700K y al Core i7 9700K, dos procesadores que están separados por tres generaciones (Kaby Lake, Coffee Lake y Coffee Lake Refresh).\r\n\r\nA pesar de la diferencia que existe entre ambos si atendemos al tiempo y a las generaciones en términos de IPC ambos son idénticos. Intel ha mejorado el rendimiento de sus procesadores en las últimas tres generaciones recurriendo, principalmente, a un aumento del número de núcleos e hilos, y también con subidas de frecuencia de trabajo.\r\n\r\nEl Core i7 6700K tiene cuatro núcleos y ocho hilos a una frecuencia de 4 GHz-4,2 GHz, modo normal y turbo, mientras que el Core i7 9700K tiene ocho núcleos y ocho hilos a una frecuencia de 3,6 GHz-4,9 GHz, modo normal y turbo. Ambos soportan overclock.\r\n\r\nEn las pruebas de rendimiento sintético las diferencias entre ambos procesadores son bastante marcadas, ¿pero qué ocurre en juegos? Las mayores frecuencias de trabajo del Core i7 9700K marcan una diferencia clara en muchos juegos, pero en otros tenemos prácticamente un empate.\r\n\r\nPor ejemplo, en Red Dead Redemption 2 la diferencia entre ambos es casi inexistente, y lo mismo ocurre en CoD: Modern Warfare 2019, una tónica que se repite en muchos resultados. En juegos que sí aprovechan mejor la presencia de más de cuatro núcleos físicos, como AC: Odyssey y Shadow of the Tomb Raider, las diferencias a favor del Core i7 9700K son mucho más marcadas, y lo mismo ocurre en The Division 2.\r\n\r\nHabría sido interesante ver esta misma comparativa con el Core i7 6700K funcionando a mayores frecuencias, ya que la distancia frente al Core i7 9700K se habría podido reducir de una manera considerable. Dicho procesador tiene unos cuantos años, pero gracias a su alto IPC y a sus cuatro núcleos y ocho hilos sigue siendo perfectamente capaz de mover cualquier juego actual.', 'img/posts/CORE I7 6700K FRENTE A CORE I7 9700K EN JUEGOS ACTUALES.jpeg', 36, '2020-11-14'),
(17, 'Jon', 'AMD vs. Intel: ¿cuál es el que más te conviene?', 'Para navegar en la web a diario, ver Netflix y responder correos electrónicos, las CPU Intel y AMD te brindarán un excelente rendimiento desde el primer momento. Sin embargo, hay ciertas tareas en las que las opciones de un fabricante funcionarán mejor que las del otro.\r\n\r\nSi estás buscando trabajar con su procesador realizando tareas intensivas de múltiples subprocesos –como edición o transcodificación de video, o actividades pesadas de múltiples tareas con decenas de pestañas del navegador abiertas–, las CPU de AMD son más capaces en el extremo superior y más rentables en cuanto a precio. Las Intel no son malas, pero tendrás que pagar más por el mismo rendimiento, aunque puede valer la pena si el Thunderbolt 3 es algo que realmente necesitas.\r\n\r\nSi está trabajando y jugando, los chips AMD aún representan el mejor rendimiento por su precio, incluso los procesadores de Intel te brindarán un mejor rendimiento de juego una vez que salgas de los chips de nivel de entrada.\r\n\r\nPor eso, para un rendimiento de juego puro y absoluto, los procesadores Intel siguen siendo la mejor opción. Eso es especialmente cierto si planeas hacer overclock, con las opciones de rango medio de Intel, como el Core i5-10600K, capaces de producir el tipo de rendimiento que solo antes era posible con los chips más potentes.\r\n\r\n\r\nSi estás pensando en comprar una computadora portátil, es posible que quieras un procesador Intel Tiger Lake para una computadora portátil para juegos, ya que en ella hay mucho más a considerar que solo el chip.\r\n\r\nLos usuarios de computadoras de escritorio también deben tener en cuenta esto, pero generalmente en los equipos de escritorio hay más margen para elegir otros componentes o actualizarlos más tarde, si es que lo necesitan.', 'img/posts/AMD vs. Intel cul es el que ms te conviene.jpeg', 7, '2020-11-14'),
(18, 'Jon', 'NVIDIA GeForce RTX 3070', 'Hacía mucho tiempo que el mercado de las tarjetas gráficas no nos ofrecía tantas emociones fuertes como este año. NVIDIA está colocando en las tiendas unas soluciones que ponen en nuestras manos un rendimiento muy superior al de las tarjetas gráficas a las que reemplazan a un precio similar. Más por el mismo dinero. Y AMD parece llegar a esta generación mejor preparada que en años anteriores y dispuesta a medirse con NVIDIA en todas las gamas de producto, incluido el nivel prémium. Comprobaremos si realmente es así cuando analicemos a fondo sus nuevas Radeon RX 6000.\r\n\r\nHace solo unas semanas analizamos a fondo la ambiciosa GeForce RTX 3080, una tarjeta gráfica que está un peldaño por encima en precio, y probablemente también en prestaciones (lo comprobaremos a lo largo de este artículo), de la GeForce RTX 3070 en la que estamos a punto de zambullirnos. Sin embargo, esta última es aproximadamente 200 euros más barata, un ahorro que la coloca al alcance de un abanico de usuarios mayor. Si hay una tarjeta de las tres que dan forma actualmente a la familia GeForce RTX 3000 que tiene lo que hace falta para ser una superventas, esa es la RTX 3070. Veamos si está a la altura de las expectativas.\r\nLos procesadores gráficos de la familia GeForce RTX 3000 están siendo fabricados por Samsung utilizando su fotolitografía de 8 nm, y no por TSMC, que es el fabricante de semiconductores que ha producido las últimas generaciones de chips GeForce. No obstante, NVIDIA asegura que sus ingenieros han colaborado con los técnicos de Samsung con el propósito de refinar y personalizar la tecnología de integración utilizada en la fabricación de sus nuevas GPU.\r\n\r\nEn \'Battlefield V\' sucede algo muy similar a lo que acabamos de observar en \'Control\': a 1080p y 1440p la RTX 3070 no necesita recurrir a la tecnología DLSS, pero a 2160p, sí. Con el trazado de rayos activado a esta última resolución pasamos de 31 FPS sin DLSS a 54 FPS con esta tecnología habilitada. En este juego la RTX 3070 arroja un rendimiento un 6,8% más alto que el de la RTX 2070 SUPER sin DLSS, y con esta tecnología activada esta cifra se incrementa hasta alcanzar el 25,5%.\r\n\r\n\'Death Stranding\' no representa un gran reto para la RTX 3070. Y es que a 2160p esta tarjeta arroja una cadencia media de 78 FPS, aunque no debemos perder de vista que este juego no implementa trazado de rayos. Si habilitamos la tecnología DLSS esta última cifra se dispara hasta alcanzar unos estupendos 120 FPS, unas cifras, de nuevo, sensiblemente superiores a las que arroja su predecesora. Y es que a 2160p sin DLSS su rendimiento en este juego es un 32,2% más alto que el de la RTX 2070 SUPER, y con el DLSS activado un 23,7% mayor.\r\n\r\n\r\nLa siguiente gráfica recoge el rendimiento de la GeForce RTX 3070 en tres juegos que solo utilizan renderizado mediante rasterización: \'Doom Eternal\', \'Final Fantasy XV\' y \'Rise of the Tomb Raider\'. Las resoluciones 1080p y 1440p no ponen en apuros a esta tarjeta gráfica, y, como podéis ver, arroja', 'img/posts/NVIDIA GeForce RTX 3070.jpeg', 4, '2020-11-14'),
(19, 'Jon', 'AMD Radeon RX 5700/xt', 'Las características técnicas de las nuevas AMD Radeon RX 5700 / XT son desde luego llamativas. La familia Navi se apunta al proceso litográfico de 7 nm, algo que permite que AMD dé un salto cualitativo importante aunque aún no sea suficiente para competir con la gama más alta de NVIDIA, las RTX 2080 o por supuesto las RTX 2080 Ti.\r\n\r\nEntre las mejoras más llamativas están la nueva arquitectura RDNA para esta primera generación de GPUs de la familia Navi, pero además también es llamativo el uso de la memoria GDDR6 (nada de HBM2), o el soporte PCIe 4.0 que permite aprovechar ese mayor ancho de banda que ofrecerán las nuevas placas de AMD preparadas también para los Ryzen de tercera generación.\r\n\r\n\r\nLos responsables de AMD hablaban en la presentación inicial de estas nuevas gráficas del rendimiento que podríamos esperar. Es evidente que los 7 nm y la nueva arquitectura le han hecho mucho bien a la nueva familia Navi, que además promete aún más si tenemos en cuenta que esta es tan solo la primera iteración de estos productos aún con mucho margen de maniobra.\r\n\r\n\r\n\r\nLas nuevas tarjetas gráficas de AMD están disponibles a partir de hoy, y el fabricante hizo ayer un extraño movimiento al corregir su precio de lanzamiento, que ya había sido publicado pero que probablemente se vio modificado tras el lanzamiento de las RTX 2060/2070/2080 SUPER.\r\n\r\n\r\nLos precios de salida en dólares que se habían anunciado eran de 499 dólares para la versión 50th Anniversary de la Radeon RX 5700 XT, de 449 dólares para la 5700 XT y de 379 dólares para las Radeon RX 5700. Esos precios bajaron ayer, y AMD los ha colocado en 449, 399 y 349 dólares respectivamente.\r\n\r\nEn Europa y en nuestro país esos precios ya tienen traducción a nuestra moneda: la AMD Radeon RTX 5700 XT costará 429,90 euros, mientras que la AMD Radeon RX RX 5700 costará 374,90 euros.\r\n\r\n\r\n', 'img/posts/AMD Radeon RX 5700xt.jpeg', 1, '2020-11-14'),
(27, 'David', 'NVIDIA RTX 2080 y RTX 2080 Ti', 'Nos encontramos ante dos gráficas que demuestran claramente haber ido más allá en cuanto a rendimiento, aunque es cierto que la relación precio/prestaciones, al menos de momento, sale perdiendo respecto a sus antecesoras.\r\n\r\nEso parece dejar una conclusión clara: ganamos en rendimiento, desde luego, pero esa mejora sale cara. Eso podría hacer pensar que quizás sería más conveniente invertir en gráficas de la serie GTX 1000, que podrían bajar de precio en los próximos meses\r\n\r\nPascal (\'GeForce 1000 Series\') supuso un salto impresionante respecto a Maxwell (\'GeForce 900 Series\') en cuanto a lo que obteníamos \"por dólar\", y aunque ese salto no es tan pronunciado en Turing (\'GeForce 2000 Series\') esa comparación es algo injusta, porque como decimos en NVIDIA han ido más allá de tratar de hacer una mera mejora de rendimiento.\r\n\r\nHan querido mirar al futuro y ser más ambiciosos. Han querido no quedarse en el \"vamos a hacer unas gráficas más rápidas y ya\". Ahora queda por ver si ese discurso logra convencer a los usuarios, pero como decimos, es pronto para decidir si esa apuesta es o no válida. De momento, los números están ahí.', NULL, 3, '2020-11-14'),
(28, 'David', 'Ryzen 5 3500 y Ryzen 5 3500x', 'Los nuevos Ryzen 5 3500 y Ryzen 5 3500X, donde ambas CPUs llegan con algunas sorpresas.\r\nComencemos por recordar a qué nos enfrentamos con el menor de los hermanos, el Ryzen 5 3500, ya que nos encontramos con un procesador de 6 núcleos sin SMT, que correrá a una frecuencia base de 3,6 GHz y obtendrá un Boost de 4,1 GHz, donde lo más llamativo será su caché de 16 MB y su TDP de 65 vatios.\r\n\r\nComo decimos, el Ryzen 5 3500X llegará con 6 núcleos y también sin SMT, comparte mismas frecuencias base (3,6 GHz) y Boost (4,1 GHz) y por ello también el mismo TDP de 65 vatios. Pero a diferencia del menor, tiene 32 MB de L3, lo cual es altamente sospechoso.\r\n\r\nHa sido visto en un minorista chino a un precio de 1099 yuanes, lo que al cambio serían unos 140 euros.\r\nAMD obtiene algo de ventaja en la comparativa desde su inicio, ya que porta memorias a 3200 MHz por 2666 MHz del i5-9400F.\r\n\r\nDe igual manera, el rendimiento de ambos es muy similar en gaming, donde en algunos casos gana uno y en otros el rival.\r\n', 'img/posts/Ryzen 5 3500 y Ryzen 5 3500x.jpeg', 2, '2020-11-14'),
(29, 'David', 'GTX 1080 con Ryzen 7 2700', 'La buena noticia es que, con el lanzamiento de GTX 1080 Ti, el precio del GTX 1080 está obteniendo más descuento. NVIDIA tarjetas xx80 siempre se han definido por los precios high-end con un rendimiento que llama a la puerta de las tarjetas gráficas extreme, especialmente cuando se hace overclock. Después de tomarse el tiempo para probar completamente la tarjeta gráfica Pascal dentro del GTX 1080, podemos decir sin lugar a dudas que continúa la tendencia.\r\n\r\nEl GTX 1080 tiene 8 GB de RAM en comparación con la GTX 980 memoria de video de 4 GB. Desafortunadamente, el rendimiento de los juegos no fue tan impresionante. Incluso si el GTX 1080 ofrece constantemente aumentos de velocidad de fotogramas durante el GTX 980, NVIDIA GeForce GTX 980 Ti, la ganancia no es mucho para justificar una actualización.\r\n\r\nPara 1080p Full HD, pudimos jugar Borderlands 3, Anthem, Need For Speed: Heat, Just Cause 4, Gears of War 5 en 68 fps a 85 fps y mantuvieron las velocidades de cuadro rondando 78 fps. Para 1440p Quad HD, pudimos jugar Gears of War 5, Need For Speed: Heat, Shadow of the Tomb Raider, Just Cause 4, Final Fantasy XV en 62 fps a 63 fps y mantuvieron las velocidades de cuadro rondando 62 fps.\r\n\r\nPara 2160p 4K, pudimos jugar Forza Horizon 4 en 65 fps a 65 fps y mantuvieron las velocidades de cuadro rondando 65 fps.', 'img/posts/GTX 1080 con Ryzen 7 2700.jpeg', 2, '2020-11-14'),
(30, 'Ordoño', 'GTX 1080 Ti? Así mueve los juegos de 2020', 'la GeForce GTX 1080 Ti sigue siendo una tarjeta gráfica que puede mover sin ningún tipo de problema cualquier juego moderno, incluso juegos AAA como Red Dead Redemption 2 (que, todo sea dicho, no es que esté especialmente bien optimizado en PC). La GTX 1080 Ti no tiene ningún problema para mover cualquier juego actual por encima de 60 FPS incluso con los gráficos al máximo y a resolución Full HD (recordad que la prueba la hemos hecho a 1440p, así que a Full HD el rendimiento es todavía más elevado).\r\n\r\nComo decíamos al principio, a pesar de que esta gráfica tiene ya más de tres años algunas tiendas todavía tienen stock y la venden, además a precios bastante llamativos. En el mercado de segunda mano es más sencillo encontrarlas y a precios todavía mejores, aunque tened en cuenta que probablemente ya sin garantía, máxime dada la edad que tienen estas gráficas.\r\n\r\nRespondiendo a la pregunta, resulta evidente que las GTX 1080 Ti han envejecido muy bien, ya que tres años después siguen entregando el máximo de rendimiento y mueven sin ningún tipo de problema cualquier juego actual por encima de 60 FPS con los gráficos al máximo, incluso a resolución 1440p, así que la respuesta es que sí, si encuentras una GTX 1080 Ti nueva o en buen estado y a buen precio, actualmente te va a dar mejor rendimiento que una RTX 2070, por ejemplo, aunque ten en cuenta que no tendrás hardware dedicado para Ray Tracing.', 'img/posts/GTX 1080 Ti As mueve los juegos de 2020.jpeg', 1, '2020-11-14'),
(31, 'Ordoño', 'Presupuesto gamer +300€', 'Si montar un PC Gamer con solo 300 euros no es tarea sencilla, con un presupuesto algo mayor si es posible entrar de cabeza en la Master Race. Y es que por un poco más de lo que cuesta una consola de nueva generación estamos ante un PC Gamer que nos permitirá jugar a cualquier juego actual a una tasa de frames de 60 FPS estables, en calidad medio alto o incluso en calidad alta-ultra (sacrificando algunos frames) a una resolución de 1080p.\r\n\r\nEn juegos bien optimizados como Red Dead Rendeption 2, Borderlands 3, Fortnite, Apex Legends podremos disfrutar de una experiencia de juego sensacional, con unos gráficos superiores a consola y con una fluidez absoluta, todo ello unido a online gratuito y a la gran comunidad que hay detrás del mundo del PC, dispuesta siempre a ayudar. Todo esto unido a un equipo equilibrado, sin cuellos de botella, silencioso y con un consumo ridículo lo cual no deja de lado la potencia que somos capaces de obtener por tan poco dinero.\r\n\r\nEsta configuración esta compuesto por la siguiente configuración de Hardware:\r\n\r\nProcesador Ryzen 3 1200\r\nPlaca base MSI A320M-A PRO\r\nMemoria RAM Crucial DDR4 2133 8GB\r\nHDD SSD KINGSTON A400 240 GB\r\nTarjeta gráfica AMD RX 580 4 GB\r\nCaja LED Tempest Espectra con Ventana\r\nFuente Nfortec 650W Plus Bronce', 'img/posts/Presupuesto gamer 300.jpeg', 1, '2020-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `nickname` varchar(40) NOT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `foto_nick` varchar(255) DEFAULT NULL,
  `tipo_de_usuario` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `e_mail`, `contrasena`, `foto_nick`, `tipo_de_usuario`, `estado`) VALUES
('David', 'david@gmail.com', '/XKo36xEl1M=', 'img/usuarios/David.png', 'mod', 0),
('Jon', 'jon@gmail.com', '/XKo36xEl1M=', 'img/usuarios/Jon.png', 'admin', 0),
('Jose', 'jose@gmail.com', '/XKo36xEl1M=', 'img/usuarios/Jose.png', 'normal', 0),
('Maria', 'maria@gmail.com', '/XKo36xEl1M=', 'img/usuarios/Maria.png', 'normal', 0),
('Ordoño', 'ordoño@gmail.com', '/XKo36xEl1M=', 'img/usuarios/Ordoo.png', 'normal', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `nickname` (`nickname`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `nickname` (`nickname`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`nickname`) REFERENCES `usuarios` (`nickname`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`nickname`) REFERENCES `usuarios` (`nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
