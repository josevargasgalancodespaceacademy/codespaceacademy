<!DOCTYPE html>
<html>
  <head>
  <script src="../assets/javascript/lib/jquery-3.2.1.min.js" type="text/javascript"></script> 
      <script src="../assets/javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="../assets/stylesheets/codespace.css">
    <link href="../assets/stylesheets/sweetalert.css" rel="stylesheet">
    <script src="../assets/javascript/sweetalert.min.js"></script>

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
    <script type="text/javascript" src="../assets/javascript/forms/pedir_informacion.js"></script>
    <link rel="shortcut icon" href="../assets/favicon.ico">
    <title>
      ¿Necesitas más información de nuestro Videogames Development Bootcamp? 
    </title>
  </head>
  <body onselectstart='return false;' class="page-nosotros">
    <div id="top" class="main-content">
      <div class="header">
        <div class="num-telefono"><a onclick="goog_report_conversion ('tel:900-102-101')" href="tel://900102101"><img class="telefono-icon" src="../assets/images/index/telefono-negativo.svg"></a></div>
           <div class="main-nav">
        <div class="container">
          <a href="https://www.codespaceacademy.com/" class="codespace-logo"><img src="../assets/images/logos/logo_positivo.svg"></a>
        </div>
      </div>
    </div>
</div>
    <section class="container codespace-talent">
      <div class="row col-sm-12">
        <h1 class="title">
          ¿Necesitas más información de nuestro Videogames Development Bootcamp?
        </h1>
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <p>
            Déjanos tus datos personales e indica cualquier duda que tengas.
          </p> 
          <br>
          <form role="form" id="pedir_mas_informacion">

            <div >

              <label for="name"> 
                Nombre*
              </label>
              <div class="form-group">
                <input class="form-control" id="informacion_name" placeholder="" name="name">
              </div>

              <label for="email"> 
                Email*
              </label>
              <div class="form-group">
                <input class="form-control" id="informacion_email" placeholder="" name="email">
              </div>

              <label for="telephone"> 
                Teléfono*
              </label>
              <div class="form-group">
                <input class="form-control" id="informacion_telephone" placeholder="" name="telephone">
              </div>
                <input type="hidden" class="form-control" value="3" name="course-1">
              <label for="comment">Comentario</label>
              <textarea class="form-control" id="comentario-talent" placeholder="Coméntanos cualquier duda que tengas" name="comment"></textarea>

            </div>

             <hr>
             <div class="row">

             <?php
              require('../assets/php/config.php');
              require('../assets/php/classes/mysql.php');
              $mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

              $cities = $mysql->getAllDataWithParameters("citys");
              $courses = $mysql->getAllDataWithParameters("courses", array("active" => true));
              $courses = $mysql->groupResultByColumn($courses,"city_id"); 
             ?>


              <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6 col-xl-6" id ="mas_informacion_city_block">

                <label for="city"> 
                  Ciudad donde quieres estudiar
                </label>

                <select class="form-control" id="information-city" name="city">
                  <option value="" class="unselectable">Escoge una ciudad</option>
                  <?php
                    foreach ($cities as $city) {
                      echo "<option value ='" . $city["id"] . "'>" . $city["name"] . "</option>";
                    }
                  ?>
                </select>

                <p class="city-error mensajerror"></p>
              </div>

            </div>
                  <div class="checkbox">
       <label>
      <input class="check-becas" type="checkbox" id="check-mas-info"> Acepto <a href="../es/avisos-legales" target="_blank">los términos y Condiciones de uso y Política de Privacidad</a>*.
      </label>
      </div>
      <div class="checkbox">
       <label>
      <input class="comunicaciones" type="checkbox" id="comunicaciones">No deseo recibir comunicaciones comerciales sobre productos o servicios de Codespace.
      </label>
      </div>

            <button type="button" class="button fondobutton btn boton-enviar-talent" onclick="enviar_pedir_mas_informacion();">enviar</button>


          </form>
        </div>
      </div>
    </section>



<div class="modal fade" id="modal-pedir-informacion" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Hemos recibido tu petición correctamente</h4>
       </div>
<div class="modal-body">
         En breve nos pondremos en contacto contigo con más información.
       </div>
<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div> 

   <footer>
  <div class="footer-content">
    <div class="row">
    <div class=" col-xs-12 col-sm-12 container-logo"><div class="codespace-logo"><a href="https://www.codespaceacademy.com/"><img src="../assets/images/logos/logo_negativo.svg"></a></div></div>
    <div class=" col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright"><p>C/ Compositor Lehmberg Ruiz, 13 29007 Málaga | 900 102 101 | www.codespaceacademy.com</p></div>
    <div class=" col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 codespace-copyright"><p>&copy; 2017 <strong>code</strong>space - Formación tecnológica. All Rigths Reserved. <a href="../es/avisos-legales">Políticas legales y condiciones de uso</a></p></div>
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
          <li class="footer-link linkedin"><a class="linkedin-link" target="_blank" href="https://www.linkedin.com/school/codespace-españa/"></a></li>
          <li class="footer-link meetup"><a class="meetup-link" target="_blank" href="https://www.meetup.com/es-ES/Codespace-Academy/"></a></li>
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
        <!-- Google Code para etiquetas de remarketing -->
<!--
Es posible que las etiquetas de remarketing todavía no estén asociadas a la información personal identificable o que estén en páginas relacionadas con las categorías delicadas. Para obtener más información e instrucciones sobre cómo configurar la etiqueta, consulte http://google.com/ads/remarketingsetup. -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 830007273;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/830007273/?guid=ON&amp;script=0"/>
</div>
</noscript>
  </body>
</html>
