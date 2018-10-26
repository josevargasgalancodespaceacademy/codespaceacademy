<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\Http\Requests\ContenidoWeb\RequestCrearOfertasTrabajo;
use App\OfertasTrabajo;
use App\CurriculumsOfertasTrabajo;


class OfertasTrabajoController extends Controller
{
    	public function __construct()
    {
        $this->middleware('auth');
    }
  //Consultas y filtros ofertas de trabajo  
    public function consulta(Request $request)
    {
    	$ofertas_trabajo = OfertasTrabajo::orderBy('name' ,'asc')->paginate(15);
        $total_ofertas_trabajo= OfertasTrabajo::all()->count();
    	return view('vistas.ofertas-trabajo')->with('ofertas_trabajo', $ofertas_trabajo)->with('total_ofertas_trabajo', $total_ofertas_trabajo);
    }
    public function filtrar_ofertas_trabajo(Request $request)
    {
        $ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_ofertas_trabajo= OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->count();
        if ($request->status>=0) 
        {
            $ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->paginate(15);
            $total_ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->count();
        }
        return view('vistas.ofertas-trabajo')->with('ofertas_trabajo', $ofertas_trabajo)->with('total_ofertas_trabajo',$total_ofertas_trabajo);
    }
    public function detalle($id)
    {
    	$detalle_ofertas_trabajo = OfertasTrabajo::find($id);
    	return view('vistas.detalle-ofertas-trabajo')->with('detalle_ofertas_trabajo', $detalle_ofertas_trabajo);
    }
    public function editar($id)
    {
    	$registro_a_editar = OfertasTrabajo::find($id);
    	return view('vistas.editar-ofertas-trabajo')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id, EditarRequest $editarrequest)
    {
    	 $validator = Validator::make($editarrequest->all(), $editarrequest->rules(), $editarrequest->messages());
    	 if ($validator->valid())
    	 {
         $registro_a_editar = OfertasTrabajo::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-ofertas-trabajo');
     }
    }
    public function activar_oferta(Request $request, $id)
    {
         $registro_a_editar = OfertasTrabajo::find($id);
         $registro_a_editar->status = $request->status;
         $registro_a_editar->save();
         return redirect()->route('listado-ofertas-trabajo');
    }
        public function mostrar_candidatos($id)
    {
        $candidatos = CurriculumsOfertasTrabajo::where('offer_id', '=',$id)->paginate(15);
        $total_candidatos = CurriculumsOfertasTrabajo::where('offer_id', '=',$id)->count();
        return view('ofertas.candidatos-oferta')->with('candidatos', $candidatos)->with('total_candidatos', $total_candidatos);
    }
        public function detalle_candidatos($offer_id, $id)
    {
        $detalle_candidato= CurriculumsOfertasTrabajo::find($id);
        return view('ofertas.detalle-candidatos-oferta')->with('detalle_candidato', $detalle_candidato);
    }
        public function filtrar_candidatos(Request $request, $id)
    {
        $candidatos = CurriculumsOfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_candidatos = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->count();
        if ($request->status>=0) 
        {
            $candidatos = CurriculumsOfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->paginate(15);
            $total_candidatos = CurriculumsOfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->count();
        }
        return view('vistas.candidatos-oferta')->with('candidatos', $candidatos)->with('total_candidatos',$total_candidatos);
    }
  //Creacion de ofertas de trabajo 
        public function crear_oferta_trabajo(Request $request, RequestCrearOfertasTrabajo $requestcrearofertastrabajo)
     {
         $validator = Validator::make($requestcrearofertastrabajo->all(), $requestcrearofertastrabajo->rules(), $requestcrearofertastrabajo->messages());
         if ($validator->valid())
         {
         $OfertasTrabajo = new OfertasTrabajo();
         $OfertasTrabajo->name =  $request->name;
         $OfertasTrabajo->city =  $request->city;
         $OfertasTrabajo->business =  $request->business;
         $OfertasTrabajo->offer_type = $request->offer_type;
         $OfertasTrabajo->min_experience =  $request->min_experience;
         $OfertasTrabajo->min_studies =  $request->min_studies;
         $OfertasTrabajo->min_salary = $request->min_salary;
         $OfertasTrabajo->max_salary =  $request->max_salary;
         $OfertasTrabajo->min_requirements =  $request->min_requirements;
         $OfertasTrabajo->num_vacant =  $request->num_vacant;
         $OfertasTrabajo->industry_type = $request->industry_type;
         $OfertasTrabajo->offer_short_description =  $request->offer_short_description;
         $OfertasTrabajo->offer_description = $request->offer_description;
         $rangoSalarial = "No disponible";
         if($OfertasTrabajo->save()) {
          response()->json(array('success' => true, 'last_insert_id' => $OfertasTrabajo->id), 200);
          }
         if($request->min_salary !==null && $request->max_salary!==null){
          $rangoSalarial = $request->min_salary." - ".$request->max_salary;
         }
         $contenido = 
"<!DOCTYPE html>
<head>
<script type='text/javascript' src='../../assets/javascript/lib/jquery-3.2.1.min.js' type='text/javascript'></script> 
<script type='text/javascript' src='../../assets/javascript/forms/work_offers_curriculums.js' type='text/javascript' async='async'></script> 
<script type='text/javascript' src='../../assets/javascript/forms/newsletter.js' async='async'></script>
<script type='text/javascript' src='../../assets/javascript/bootstrap.js'></script>
<link rel='stylesheet' href='../../assets/stylesheets/codespace.css'>
<link href='../../assets/stylesheets/sweetalert.css' rel='stylesheet'>
<script src='../../assets/javascript/sweetalert.min.js' async='async'></script>

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
            <li>
            <a href='../business-courses/qa360'>QA 360: Un enfoque práctico</a>
          </li>
          <li>
            <a href='../cursos-programacion-malaga#landing-courses'>Landing courses</a>
          </li>
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
        <a href='../../es/jobs'>Jobs</a>
      </li>
      <li class='menu-item'>
      <a href='../alumni'>Alumni</a>
      </li>
    </ul>
    </nav>
    </div>
    </div>

     <div class='hero-block'>
     <div class='image-overlay'></div>
        <div class='row'>
          <div class='col-xs-12 col-md-10 col-md-offset-1 call-to-action'>
            <h1 class='h1'>".$request->name."</h1>
          </div>
        </div>
      </div>
    </div>

   <section>
  <div class='col-sm-12 informacion-basica-oferta'>
    <div class='col-sm-3 col-sm-offset-1'>
      <ul>
        <li><strong>Empresa</strong>: ".$request->business."</li>
        <li><strong>Localidad</strong>: ".$request->city."</li>
        <li><strong>Rango salarial</strong>: ".$rangoSalarial."</li>
      </ul>
    </div>
    <div class='col-sm-3 col-sm-offset-1'>
      <ul>
        <li><strong>Experiencia mínima: </strong>".$request->min_experience."</li>
        <li><strong>Tipo de oferta: </strong>".$request->offer_type."</li>
      </ul>
    </div>
    <div class='col-sm-3 col-sm-offset-1'>
      <a class='button fondobutton' href='../offers/".$request->name.'-'.$request->city.'-'.$request->business."#inscripcion'>Inscribirme a la oferta</a>
    </div>
  </div>
</section>

<section class='col-xs-12 col-sm-12 informacion-detallada-oferta-container'>
  <div class='col-xs-12 col-sm-6 col-sm-offset-3 informacion-detallada-oferta'>
    <h2 class='informacion-detallada-oferta-title col-sm-12'>Requisitos</h2>
    <p class='col-xs-12 experiencia-minima'><strong>Experiencia mínima: </strong>".$request["min_experience"]."</p>
    <p class='col-xs-12 estudios-minimos'><strong>Estudios mínimos: </strong>".$request["min_studies"]."</p>
    <p class='col-xs-12 requisitos-minimos'><strong>Requisitos mínimos:</strong><br>".nl2br($request->min_requirements)."</p>
<h2 class='informacion-detallada-oferta-title col-sm-12'>Descripción</h2>
<p class='col-xs-12 descripcion-oferta'>".nl2br($request->offer_description)."</p>
    <p class='col-xs-12 tipo-industria-oferta'><strong>Tipo de industria de la oferta: </strong>".$request->industry_type."</p>
    <p class='col-xs-12 vacantes-oferta'><strong>Vacantes: </strong>".$request->num_vacant."</p>
  </div>
</section>
 <section class='col-xs-12 col-sm-12'>
  <a name='inscripcion'></a>
 <div class='container formulario-cv-ofertas'> 
        <form role='form' id='curriculums' enctype='multipart/form-data'>
        <input type='hidden' name='offer_id' value='".$OfertasTrabajo->id ."'>
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
      <button type='button' class='button fondobutton btn boton-enviar-cv' onclick='enviar_curriculum(`".$request->name.'-'.$request->city.'-'.$request->business."`)'>Inscribirme a la oferta</button>
      <div class='mensajerror'>Uno o mas campos del formulario tienen errores.</div> 
      </div>
     </form>
     </div>
    </section>

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

   <footer class='col-xs-12 col-sm-12' style='margin: inherit!important; padding: inherit!important;'>
  <div class='footer-content'>
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
                <!-- Google Code para etiquetas de remarketing -->
<!--
Es posible que las etiquetas de remarketing todavía no estén asociadas a la información personal identificable o que estén en páginas relacionadas con las categorías delicadas. Para obtener más información e instrucciones sobre cómo configurar la etiqueta, consulte http://google.com/ads/remarketingsetup. -->
<script type='text/javascript'>
/* <![CDATA[ */
var google_conversion_id = 830007273;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type='text/javascript' src='//www.googleadservices.com/pagead/conversion.js'>
</script>
<noscript>
<div style='display:inline;'>
<img height='1' width='1' style='border-style:none;' alt='' src='//googleads.g.doubleclick.net/pagead/viewthroughconversion/830007273/?guid=ON&amp;script=0'/>
</div>
</noscript>
    </body>
</html>";
         mkdir('/var/www/codespaceacademy/curriculums/ofertas-externas/'.$request->name.'-'.$request->city.'-'.$request->business, 0777, true);
         file_put_contents('/var/www/codespaceacademy/es/offers/'.$request->name.'-'.$request->city.'-'.$request->business.'.html', $contenido);
         file_put_contents('/var/www/codespaceacademy/en/offers/'.$request->name.'-'.$request->city.'-'.$request->business.'.html', $contenido);
         return redirect()->route('listado-ofertas-trabajo');
     }
     }
    
}
