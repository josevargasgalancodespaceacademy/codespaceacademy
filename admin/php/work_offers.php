<?php

require_once '../../assets/php/classes/mysql.php'; 
require_once '../../assets/php/classes/validator.php';
require_once '../../assets/php/classes/sanitizer.php';
require_once '../../assets/php/config.php';


$request = $_POST;
$sanitizer = new Sanitizer($request);
$request = $sanitizer->sanitizeRequest();

$validator = new Validator($request);
$validator->filledIn("name")->alpha("name")->length("name", "<=", 100);
$validator->filledIn("city")->alpha("city")->length("city", "<=", 100);
$validator->filledIn("business")->alpha("business")->length("business", "<=", 100);
$validator->filledIn("offer_type")->length("offer_type", "<=", 50);
$validator->filledIn("min_experience")->length("min_experience", "<=", 25);
$validator->filledIn("min_studies")->length("min_estudies", "<=", 50);
$validator->filledIn("salary")->length("salary", "<=", 15)->numeric("salary","€");
$validator->filledIn("min_requirements");
$validator->filledIn("num_vacant")->length("num_vacant", "<=", 10)->numeric("num_vacant");
$validator->filledIn("industry_type")->length("industry_type", "<=", 100);
$validator->filledIn("offer_short_description")->length("offer_short_description", "<=", 120);
$validator->filledIn("offer_description");
$errors = $validator->getErrors();
$contenido = 
"<!DOCTYPE html>
<head>
<script type='text/javascript' src='../../assets/javascript/lib/jquery-3.2.1.min.js' type='text/javascript'></script> 
<script type='text/javascript' src='../../assets/javascript/forms/curriculums.js' type='text/javascript'></script> 
<script type='text/javascript' src='../../assets/javascript/forms/newsletter.js'></script>
<script type='text/javascript' src='../../assets/javascript/bootstrap.js'></script>
<link rel='stylesheet' href='../../assets/stylesheets/codespace.css'>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-107698899-1'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107698899-1');
</script>

<meta http-equiv='Content-type' content='text/html; charset=utf-8'/>
<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1'>
<link rel='shortcut icon' href='../../assets/favicon.ico'>
<title>Ofertas de trabajo codespace</title>
</head>
<body onselectstart='return false;' class='page-jobs'>
  <div id='top' class='main-content'>
           <div class='header'>
           <div class='num-telefono'><a onclick='goog_report_conversion ('tel:900-102-101')' href='tel://900102101'><img class='telefono-icon' src='../../assets/images/index/telefono-negativo.svg'></a></div>
   <div class='main-nav'>
        <div class='container'>
        <a href='https://www.codespaceacademy.com/' class='codespace-logo'><img src='../../assets/images/logos/logo_positivo.svg'></a>
        <a href='#' class='hamburger-icon'><img src='../../assets/images/logos/hamburger-icon-positivo.svg'></a>
<nav class='menu'>
    <ul>
      <li class='menu-item'>
        <a href='../../es/nosotros'>Nosotros</a>
      </li>
        <li class='menu-item'>
        <a href='../../es/cursos-programacion-malaga'>Cursos</a>
        <div class='submenu'>
          <ul>
            <li><a href='../../es/cursos-programacion-malaga#bootcamps'>Bootcamps</a></li>
            <li><a href='../../es/cursos-programacion-malaga#business-courses'>Business code courses</a></li>
            <li><a href='#''>Extreme programming workshops</a></li>
          </ul>
        </div>
      </li>
      <li class='menu-item'>
      <a href='../../es/agenda-eventos-codespace'>Eventos</a>
      </li>
      <li class='menu-item'>
        <a href='../../es/becas-programacion-malaga'>Becas</a>
      </li>
       <li class='menu-item'>
        <a href='../../es/asesoramiento-laboral-malaga'>Mentoring</a>
      </li>
      <li class='menu-item'>
        <a href='../../es/talento-codespace'>Talento <strong>codespace</strong></a>
      </li>
        <li class='menu-item'>
        <a href='#''>Partners</a>
      </li>
    </ul>
    </nav>
    </div>
    </div>

     <div class='hero-block'>
     <div class='image-overlay'></div>
        <div class='row'>
          <div class='col-xs-12 col-md-10 col-md-offset-1 call-to-action'>
            <h1 class='h1'>".$request["name"]."</h1>
          </div>
        </div>
      </div>
    </div>

        <section>
  <div class='col-sm-12 informacion-basica-oferta'>
    <div class='col-sm-3 col-sm-offset-1'>
      <ul>
        <li><strong>Empresa</strong>: ".$request["business"]."</li>
        <li><strong>Localidad</strong>: ".$request["city"]."</li>
        <li><strong>Salario</strong>: ".$request["salary"]."€</li>
      </ul>
    </div>
    <div class='col-sm-3 col-sm-offset-1'>
      <ul>
        <li><strong>Experiencia mínima: </strong>".$request["min_experience"]."</li>
        <li><strong>Tipo de oferta: </strong>".$request["offer_type"]."</li>
      </ul>
    </div>
    <div class='col-sm-3 col-sm-offset-1'>
      <a class='button fondobutton href='../offers/".$request["name"].'-'.$request['city'].'-'.$request['business']."#inscripcion'>Inscribirme a la oferta</a>
    </div>
  </div>
</section>

<section class='col-xs-12 col-sm-12 informacion-detallada-oferta-container'>
  <div class='col-xs-12 col-sm-6 col-sm-offset-3 informacion-detallada-oferta'>
    <h2 class='informacion-detallada-oferta-title col-sm-12'>Requisitos</h2>
    <p class='col-xs-12 experiencia-minima'><strong>Experiencia mínima: </strong>".$request["min_experience"]."</p>
    <p class='col-xs-12 estudios-minimos'><strong>Estudios mínimos: </strong>".$request["min_studies"]."</p>
    <p class='col-xs-12 requisitos-minimos'><strong>Requisitos mínimos:</strong><br>".nl2br($request["min_requirements"])."</p>
<h2 class='informacion-detallada-oferta-title col-sm-12'>Descripción</h2>
<p class='col-xs-12 descripcion-oferta'>".nl2br($request["offer_description"])."</p>
    <p class='col-xs-12 tipo-industria-oferta'><strong>Tipo de industria de la oferta: </strong>".$request["industry_type"]."</p>
    <p class='col-xs-12 vacantes-oferta'><strong>Vacantes: </strong>".$request["num_vacant"]."</p>
  </div>
</section>
 
 <div class='container formulario-cv-ofertas'> 
 <a name='inscripcion'></a>
        <form role='form' id='curriculums' enctype='multipart/form-data'>
        <div class='datos-personales'>
        <label class='title'> Ingresa tus datos personales*</label>
        <div class='trabaja-field'>
        <label class='title-field' for='name'>Nombre completo*</label>
        <input class='form-control' id='name'
           placeholder='Introduce tu nombre completo' name='name'>
           </div>
           <div class='trabaja-field'>
        <label class='title-field' for='telephone'>Teléfono*</label>
              <input class='form-control' id='telephone' 
           placeholder='Introduce tu teléfono' name='telephone'>
           </div>
           <div class='trabaja-field'>
        <label class='title-field' for='email'>Email*</label>
           <input class='form-control' id='email' 
           placeholder='Introduce tu email' name='email'>
           </div>
       </div>
       <div class='web-linkedin'>
       <label class='title'> Website y Linkedin </label>
        <div class='trabaja-field'>
        <label class='title-field' for='website-cv'>Website o portfolio</label>
         <input class='form-control' id='website-cv' 
           placeholder='Introduce tu website o portfolio' name='website'>
           </div>
           <div class='trabaja-field'>
        <label class='title-field' for='website-cv'>Linkedin</label>
           <input class='form-control' id='linkedin-cv' 
           placeholder='Introduce tu perfil de Linkedin' name='linkedin'>
           </div>
      </div>
      <div class='adjuntar-cv'>  
      <div class='form-group'>
      <label for='archivo-cv' class='title'>Adjunta tu CV*</label>
      <input type='file' id='archivo-cv' name='curriculum'>
      <p class='help-block'>Solo se admite formato PDF con un peso máximo de 5MB*</p>
      <div class='pdf-error'></div>
      </div>
      <div class='checkbox'>
       <label>
      <input type='checkbox' id='check-cv'> Acepto <a href='../../es/avisos-legales' target='_blank'>los términos y Condiciones de uso y Política de Privacidad.</a>* 
      </label>
      </div>
      <div class='checkbox'>
       <label>
      <input class='comunicaciones' type='checkbox' id='comunicaciones'>No deseo recibir comunicaciones comerciales sobre productos o servicios de Codespace.*
      </label>
      </div>
      <button type='button' class='button fondobutton btn boton-enviar-cv' onclick='enviar_curriculum()'>Inscribirme a la oferta</button>
      <div class='mensajerror'>Uno o mas campos del formulario tienen errores.</div> 
      </div>
     </form>
     </div>

  <div class='modal fade' id='modal-cv' role='dialog'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
<h4 class='modal-title'>Gracias por enviarnos su curriculum</h4>
       </div>
<div class='modal-body'>
         Su curriculum ha sido enviado.
       </div>
<div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal' onclick='recargar()'>Cerrar</button>
        </div>
      </div>
    </div>
  </div> 

<section class='prefooter'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-6 newsletter'>
          <p>Obtén más información sobre los cursos y eventos de <strong>code</strong>space</p>
          <h2>Suscríbete a nuestra newsletter</h2>
        <form id='newsletter'>
        <input type='text' class='newsletter-email' placeholder='Introduce tu email aquí' name='email'>
             <button type='button' class='button fondobutton newsletter-button' onclick='enviar_newsletter(`../../assets/php/forms/newsletter.php`)'>enviar</button>
        </form>
          </div>
        <div class='col-xs-12 col-sm-12 col-md-6 trabaja-con-nosotros'>
        <div class='col-xs-12 col-sm-6 col-md-6 tcn-text'>
         <h2><strong>Únete a nuestro equipo</strong></h2>
         <h2>Trabaja con nosotros</h2>
          <p>Vente a un grupo empresarial con 30 años de experiencia
          donde tendrás la oportunidad de investigar, formarte y 
          descubrir nuevos retos profesionales en el mejor ambiente
          de trabajo.<br>
          </p>
          <a class='button fondobutton' href='../../es/trabaja-con-nosotros'>Únete</a>
        </div>
        <div class='col-xs-12 col-sm-6 col-md-6 tcn-image'>
        <img src='../../assets/images/trabaja-con-nosotros/trabaja-con-nosotros-icon.png'>
        </div>
        </div>
        </div>
    </section>


        <div class='modal fade' id='modal-newsletter' role='dialog'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
<h4 class='modal-title'>Gracias por inscribirte en nuestro newsletter</h4>
       </div>
<div class='modal-body'>
         Ya has sido inscrito.
       </div>
<div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
        </div>
      </div>
    </div>
  </div>

   <footer>
  <div class='container footer-content'>
    <div class='row'>
    <div class='col-xs-12 col-sm-12 container-logo'><div class='codespace-logo'><a href='https://www.codespaceacademy.com/''><img src='../../assets/images/logos/logo_negativo.svg'></a></div></div>
    <div class='col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright'><p>C/ Compositor Lehmberg Ruiz, 13 29007 Málaga | 900 102 101 | www.codespaceacademy.com</p></div>
    <div class='col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright'><p>&copy; 2017 <strong>code</strong>space - Formación tecnológica. All Rigths Reserved. <a href='../es/avisos-legales'>Políticas legales y condiciones de uso</a></p></div>
      <div class='col-xs-12 col-sm-12 footer-navigate'>
        <ul>
          <li class='footer-link'><a href='../../es/contacto'>contacto</a></li>
        </ul>
        </div>
         <div class='col-xs-12 col-sm-12 redes-sociales'> 
         <ul>
          <li class='footer-link facebook'><a class='facebook-link' target='_blank' href='https://www.facebook.com/CodeSpace-Academy-274879479668861/'></a></li>
          <li class='footer-link instagram'><a class='instagram-link' target='_blank' href='https://www.instagram.com/codespaceacademy/'></a></li>
          <li class='footer-link twitter'><a class='twitter-link' target='_blank' href='https://twitter.com/CodeSpaceAcade'></a></li>
          <li class='footer-link linkedin'><a class='linkedin-link' target='_blank' href='https://www.linkedin.com/company/24800060/'></a></li>
        </ul>
         </div>
        </div>
        </div>
        </footer>
       </div>
        
    <div id='barraaceptacion'>     
    <div class='inner'>
        Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
        Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
        <a href='javascript:void(0);'' class='ok' onclick='PonerCookie();'><b>OK</b></a> | 
        <a href='../es/avisos-legales' target='_blank' class='info'>Más información</a>
    </div>
</div>
        <script src='../../assets/javascript/codespace.js'></script>
    </body>
</html>";

if (!$errors) {
	$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	$mysql->insertRow("work_offers",$request);
	mkdir('/var/www/codespaceacademy/curriculums/ofertas-externas/'.$request["name"].'-'.$request['city'].'-'.$request['business'], 0777, true);
	file_put_contents('/var/www/codespaceacademy/es/offers/'.$request["name"].'-'.$request['city'].'-'.$request['business'].'.html', $contenido);
}

if (!$errors) echo "OK";
else echo json_encode($errors);