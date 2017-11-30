<?php

              require('../assets/php/config.php');
              require('../assets/php/classes/mysql.php');
              $mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
              $offers = $mysql->getAllDataWithParameters("work_offers");
              $offers = array_reverse($offers);
?>
<!DOCTYPE html>
<html>
<head>
<script src="../assets/javascript/lib/jquery-3.2.1.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="../assets/javascript/forms/curriculums.js" type="text/javascript" async="async"></script> 
<script type="text/javascript" src="../assets/javascript/forms/newsletter.js" async="async"></script>
<script type="text/javascript" src="../assets/javascript/bootstrap.js"></script>
<link rel="stylesheet" href="../assets/stylesheets/codespace.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107698899-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107698899-1');
</script>

<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<link rel="shortcut icon" href="../assets/favicon.ico">
<title>Ofertas de trabajo codespace</title>
</head>
<body onselectstart='return false;' class="page-jobs">
<div id="top" class="main-content">
       <div class="header">
                <div class="num-telefono"><a onclick="goog_report_conversion ('tel:900-102-101')" href="tel://900102101"><img class="telefono-icon" src="../assets/images/index/telefono-negativo.svg"></a></div>
   <div class="main-nav">
        <div class="container">
        <a href="https://www.codespaceacademy.com/" class="codespace-logo"><img src="../assets/images/logos/logo_positivo.svg"></a>
        <a href="#" class="hamburger-icon"><img src="../assets/images/logos/hamburger-icon-positivo.svg"></a>
<nav class="menu">
    <ul>
      <li class="menu-item">
        <a href="../es/nosotros">Nosotros</a>
      </li>
        <li class="menu-item">
        <a href="../es/cursos-programacion-malaga">Cursos</a>
        <div class="submenu">
          <ul>
            <li><a href="../es/cursos-programacion-malaga#bootcamps">Bootcamps</a></li>
            <li><a href="../es/cursos-programacion-malaga#business-courses">Business code courses</a></li>
            <li><a href="#">Extreme programming workshops</a></li>
          </ul>
        </div>
      </li>
      <li class="menu-item">
      <a href="../es/agenda-eventos-codespace">Eventos</a>
      </li>
      <li class="menu-item">
        <a href="../es/becas-programacion-malaga">Becas</a>
      </li>
       <li class="menu-item">
        <a href="../es/asesoramiento-laboral-malaga">Mentoring</a>
      </li>
      <li class="menu-item">
        <a href="../es/talento-codespace">Talento <strong>codespace</strong></a>
      </li>
        <li class="menu-item">
        <a href="../es/jobs">Jobs</a>
      </li>
    </ul>
    </nav>
    </div>
    </div>

     <div class="hero-block">
       <div class="image-overlay"></div>
        <div class="row">
          <div class="col-xs-12 col-md-10 col-md-offset-1 call-to-action">
            <h1 class="h1"><strong>Codespace </strong> Jobs</h1>
            <h2 class="h2">Ponemos los <strong>mejores puestos</strong> a tu disposición</h2>
          </div>
        </div>
      </div>
    </div>

     <section class="offer-jobs">
    <div class="container"> 
     <div class="row col-sm-12">
       <?php
                foreach ($offers as $offer) 
               {
                  if($offer["status"]==1){
                     echo "<div class='col-xs-12 col-sm-6 col-sm-offset-3 offer'>
                            <div class='offer-job-date'>Publicada el: ".date("d-m-Y", strtotime($offer["created_at"]))."</div>
                            <article>
                            <p class='offer-job-title'>".$offer["name"]."</p>
                            <p class='offer-job-explanation'>".nl2br($offer["offer_short_description"])."</p>
                            <div class='offer-conditions'>
                             <div class='offer-job-location'></div><p class='col-xs-1 job-location'>".$offer["city"]."</p><div class='offer-job-time'></div><p>".$offer["offer_type"]."</p>
                           </div>
                           <a class='button fondobutton' href='offers/".$offer["name"].'-'.$offer['city'].'-'.$offer['business']."'>ver oferta</a>
                            </article>
                           </div>";
             }
           }
        ?>  
    </div>   
    </div>
</section>

    <section class="prefooter">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 newsletter">
          <p>Obtén más información sobre los cursos y eventos de <strong>codespace</strong></p>
          <h2>Suscríbete a nuestra newsletter</h2>
        <form id="newsletter">
        <input type="text" class="newsletter-email" name="email" placeholder="Introduce tu email aquí">
        <button type="button" class="button fondobutton newsletter-button" onclick="enviar_newsletter('../assets/php/forms/newsletter.php')">enviar</button>
        </form>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-6 trabaja-con-nosotros">
        <div class="col-xs-12 col-sm-6 col-md-6 tcn-text">
         <h2><strong>Únete a nuestro equipo</strong></h2>
         <h2>Trabaja con nosotros</h2>
          <p>Vente a un grupo empresarial con 30 años de experiencia
          donde tendrás la oportunidad de investigar, formarte y 
          descubrir nuevos retos profesionales en el mejor ambiente
          de trabajo.<br>
          </p>
        <a class="button fondobutton" href="../es/trabaja-con-nosotros">Únete</a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 tcn-image">
        <img src="../assets/images/trabaja-con-nosotros/trabaja-con-nosotros-icon.png">
        </div>
        </div>
        </div>
    </section>


        <div class="modal fade" id="modal-newsletter" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Gracias por inscribirte en nuestro newsletter</h4>
       </div>
<div class="modal-body">
         Ya has sido inscrito.
       </div>
<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

   <footer>
  <div class="container footer-content">
    <div class="row">
    <div class=" col-xs-12 col-sm-12 container-logo"><div class="codespace-logo"><a href="https://www.codespaceacademy.com/"><img src="../assets/images/logos/logo_negativo.svg"></a></div></div>
    <div class=" col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright"><p>C/ Compositor Lehmberg Ruiz, 13 29007 Málaga | 900 102 101 | www.codespaceacademy.com</p></div>
    <div class=" col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright"><p>&copy; 2017 <strong>code</strong>space - Formación tecnológica. All Rights Reserved. <a href="../es/avisos-legales">Políticas legales y condiciones de uso</a></p></div>
      <div class="col-xs-12 col-sm-12 footer-navigate">
        <ul>
          <li class="footer-link"><a href="../es/contacto">contacto</a></li>
        </ul>
        </div>
         <div class="col-xs-12 col-sm-12 redes-sociales"> 
         <ul>
          <li class="footer-link facebook"><a class="facebook-link" target="_blank" href="https://www.facebook.com/CodeSpace-Academy-274879479668861/"></a></li>
          <li class="footer-link instagram"><a class="instagram-link" target="_blank" href="https://www.instagram.com/codespaceacademy/"></a></li>
          <li class="footer-link twitter"><a class="twitter-link" target="_blank" href="https://twitter.com/CodeSpaceAcade"></a></li>
          <li class="footer-link linkedin"><a class="linkedin-link" target="_blank" href="https://www.linkedin.com/company/24800060/"></a></li>
        </ul>
         </div>
        </div>
        </div>
        </footer>

    <div id="barraaceptacion">     
    <div class="inner">
        Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
        Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
        <a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a> | 
        <a href="../es/avisos-legales" target="_blank" class="info">Más información</a>
    </div>
</div>
        <script src="../assets/javascript/codespace.js"></script>
    </body>
</html>
