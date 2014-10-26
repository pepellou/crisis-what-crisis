<?php
    $idioma = isset($_COOKIE['lan']) ? $_COOKIE['lan'] : "";
    $subpag = "";
 ?> 
<!DOCTYPE html>
<html >
<head>
	<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta property="og:image" content="http://www.crisis-whatcrisis.com/img/logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.crisis-whatcrisis.com" />
    <meta property="og:title" content="crisis-whatcrisis" />
    <link rel="stylesheet" type="text/css" href="/css/estilosVersionMovil.css" media="screen" />
<!-- <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1"> -->
  <script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" />
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js' type='text/javascript'></script>
  <title>Crisis - What Crisis</title>  
</head>
<body>
  <img id="headerImage" src="cabecera.png" alt="Web logo: Crisis What Crisis - An optimistic answer" />
	<div id="map"><script>
		var map = L.map('map').    //Lmapp se usa para crear y manipular el mapa
setView([39.35, 7.90],4);  //primer valor norte-sur,what este-oeste,why zoom de origen
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar'}).addTo(map);   //le añadimos un mapa base como tile layer
L.control.scale().addTo(map); //esto para añadir un control de escala
L.marker([42.902963,-8.543353],{draggable: true}).addTo(map);    //coordenadas de un icono que se pueda mover
	</script> </div>  
<img id="bgMoto" src="matricula.png" />
<a  href="roadmap.php"><img src="img/roadmaplinkMOV.png" id="diario" alt="Diario de viaje" /></a>
</div>
<div class="tab">
  <a href="#empty"></a>
  <a href="#what">WHAT</a>
  <a href="#why">WHY</a>
  <a href="#who">WHO</a>
  <a href="#where">WHERE</a>
  <a href="#how">HOW</a>
  <a href="#support">SUPPORT</a>
  <div class="clear">
  </div>
</div>
<div class="contenedor">
      <div id="empty"></div>
      <div id="what"><br/><p>Crisis What Crisis es un viaje en moto a través de los países protagonistas de la *CRISIS* (PIGS.). Queremos hacer visibles a personas y proyectos que están dando una respuesta optimista e innovadora. Crisis What Crisis: an optimistic answer es una mirada constructiva hacia la crisis. Una respuesta práctica y valiente sobre nuevas formas de organización y producción. </p> <p>El nuestro es un viaje de búsqueda compartida a través de colectivos y personas que disfrutan más de la experiencia que del dinero. Rastrearemos organizaciones que promuevan el conocimiento abierto, el autoconsumo y la cooperación basándose en un modelo de negocio sostenible a largo plazo. La felicidad no es lo que nos habían contado, es lo que nos estamos contando.</p>
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
      <div id="why"><br/><p>Vivimos en el Sur de Europa, en unos países que tienen una tradición autoritaria de la que hemos salido hace poco, con unas clases políticas sometidas al poder económico y que nada han hecho para mejorar el bienestar de sus pueblos. Han utilizado las políticas para generar negocio rápido apoyados por la banca y los poderes económicos.<p>La crisis ha sido creada por la especulación económica global por parte de sectores financieros y políticos. No existe por tanto una crisis causada por los pueblos y su falta de espíritu trabajador o innovador. Los PIGS no somos los pueblos que sufrimos esos movimientos especulativos de los poderes económicos y políticos, los PIGS somos pueblos que han sufrido regímenes autoritarios, guerras civiles, represión y violencia, y aún así somos pueblos creativos, innovadores y sociales.</p> <p>“El cerdo doméstico adulto tiene un cuerpo pesado y redondeado, hocico comparativamente largo y flexible, patas cortas con pezuñas (cuatro dedos) y una cola corta. La piel, gruesa pero sensible, está cubierta en parte de ásperas cerdas y exhibe una amplia variedad de colores y dibujos. A pesar de su apariencia son animales ágiles, rápidos e inteligentes.”<p>Aquí nace CWC para demostrar que existe un amplio movimiento en la base que hace temblar la torre del sistema, esto entre comillas, con nuevas ideas y modos de relacionarse q se basan en la sostenibilidad, solidaridad, cooperación y la libertad.<p>Necesitamos visualizar otras respuestas, otros futuros posibles, porque si no los imaginamos nunca seremos quién de hacerlos realidad.<p>En febrero de 2013 nace mi hija Helena . Este documental es también un regalo para ella, y toda esta generación, para que cuando pueda verlo con capacidad de análisis se fije en el mundo y el contexto en el que nació, esperando que le sirva de algún modo para enfrentarse a su vida.
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
      <div id="who"><br/><p>Mi nombre es Xavier Belho y me dedico al diseño gráfico y a la realización audiovisual. A los 23 años me fuí de casa de mis padres. Desde ese instante empecé a realizar todo tipo de actividades para poder comer. Vendí jamones, di clases de refuerzo a niños de primaria, gerencié un pub y hasta acabé siendo Director de una Sucursal. Incluso trabajé como diseñador gráfico para una productora audiovisual y monté una productora con tres socios más. Todas estas actividades tuvieron éxito y fracaso… pero ninguna me llenó… hasta ahora. Por lo tanto, he caido y me he levantado siempre con una idea en la cabeza y pocos apoyos. Al fin y al cabo soy un optimista…. ¿hay alguien ahí? La respuesta espero encontrarla en CWC.</p><p>Si consigo con vuestra ayuda iniciar este proyecto haré un viaje en moto, una Yamaha Virago 1100 del año 97 de tercera mano, para rodar un documental que me llevará desde el Finisterre gallego hasta las puertas de Occidente, a través de los países protagonistas de la CRISIS (PIGS). CWC es un documental que retrata la Europa de 2014. Un viaje en moto en solitario que parte de Galicia, en el extremo noroeste de la Península Ibérica y llega hasta el Pireo (Atenas), en Grecia, pasando por Portugal, España e Italia (PIGS)*.<p><p>Contaré con el apoyo de los ExHermanos Karapatrov ( algunos de ellos colaboran de forma incondicional en el proyecto) y el colectivo NóComún ( nos ayudaron en los primeros pasos y nos ayudarán en la difusión) , Casa das Crechas ( ayuda económica y de contactos), Asociación Cidade Vella de Compostela ( difundir el proyecto), los Dirty Socks (Son un grupo de jovenes que hacen música en inglés y con los q colaboré con algo de diseño) con la banda sonora, NARF (músico silvestre con él que me fuí a Londres a hacer una sesión de fotos, a Mozambique a grabar un vídeo, y con el q camino por la vida con optimismo, me ayudará en lo q precise) entre otros colectivos y personas que manifestarán su soporte públicamente en el momento de iniciar la aventura.</p>
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
      <div id="where"><br/><p>Allí donde haya una respuesta inteligente e innovadora a la crisis.</p><p>En principio la ruta pasará por o cerca de las siguientes ciudades:<br/> <b>Santiago de Compostela - Oporto - Lisboa - Badajoz - Cáceres - Madrid - </b><br/><b>Valencia - Barcelona - Roma - Brindisi - Patras - Atenas - Thessalonika - Pireo</b></p>
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
      <div id="how"><br/><p>Desde niño me han gustado los libros de viajes, desde Julio Verne a Joseph Conrad y particularmente el libro de Ted Simon, Los viajes de Jupiter, que narra su vuelta al mundo en moto y su vivencia a lo largo del viaje. Mi afición por las motos nace del cine y de una película en partícular, Easy Rider, dónde la moto y el viaje son uno.</p><p>Ahora es mi turno y realizar un viaje en mi vieja moto, cruzando Europa por el sur cómo lo hizo en el siglo IV la viajera Egeria, y descubrir ese nuevo mundo que se está construyendo día día con optimismo para tener un futuro que se rija por valores verdaderamente humanos.</p><p>Viajando en moto no puedo permitirme llevar un voluminoso equipo: contaré con una pequeña cámara de vídeo y fotos que grabará en fullHD; un miniequipo de sonido, un portátil para ir editando algunas imágenes y subirlas a la red a medida que voy avanzando.</p><p>El proyecto se plantea como una construcción modular con dos etapas diferenciadas:</p><p> 1. Los protagonistas contarán su historia, allí donde la desarrollan, directamente a la cámara (una Canon 7D), a través de pequeñas entrevistas tipo videomatón. Estas microentrevistas se irán subiendo a la web y a las redes sociales, creando así un mapa interactivo del viaje con el que el público podrá interactuar, prácticamente, en directo.</p><p> 2. Una vez concluido el viaje, se montará un documental narrativo en el que se complementarán declaraciones seleccionadas de los protagonistas con información e imágenes del contexto en el que desarrollan su actividad.</p>
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
      <div id="support"><p><a href="https://goteo.org/project/crisis-what-crisis"><p>Support Us</p><p>contact: </br> xabierbelho@gmail.com</p>
                                        <a href="#empty" id="retorno"><b>close</b></a><br/></div>
<script language="javascript">
<!--
            $(function (activar_pestanya) {
          var tabContainerssup = $('div.contenedor > div');    
          $('div.tab a').click(function () {
              tabContainerssup.hide().filter(this.hash).show();        
              return false;
          }).filter(':first').click();
 $('div.contenedor a').click(function () {
              tabContainerssup.hide().filter(this.hash).show();        
              return false;
          }).filter(':first').click();
      });
//-->
</script>
</body>
</html>			
