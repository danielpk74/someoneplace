<?php
/* @var $this EventController */
$this->pageTitle = Yii::app()->name . " - Event";
$this->layout = 'layout_admin';
?>

<script>

    function crearLugar()
    {
        $('#opcionesAdmin').hide(500);
    }

    function showEventForm(event_type_id,div)
    {
        $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Event/ShowFormEvent') ?>',
            'data': {
                'event_type_id': event_type_id
            }, 'success': function(data) {
                $('#'+div).html(data);
            }, 'cache': false});
    }


//    function create_Event(event_type_id)
//    {
//        $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Admin/ShowFormEvent') ?>',
//            'data': {
//                'event_type_id': event_type_id
//            }, 'success': function(data) {
//                $('#opcionesAdmin').html(data);
//            }, 'cache': false});
//    }

</script>

<div id="mainAdmin">
    <div id="divAlert" class="alert alert-info fade in" style="display: none"></div>

    <div id="admin">


        <?php if ($placeId == null) { ?>
            <br>
            <div id="informacion" class="alert alert-info fade in" >
                <h4 class="alert-heading">
                    ¡REGISTRA TU LUGAR!    
                </h4>

                <br>

                <?php
                echo "Aún no tienes registrado tu lugar, da click en el siguiente enlace para Hacerlo ";


                $option = array('type' => 'POST',
                    'update' => '#actualiza',
                    'success' => 'function(data) {
            $(\'#admin\').hide();
            $(\'#admin\').html(data);
            $(\'#admin\').fadeIn(1000);
            }');

                echo CHtml::ajaxLink('Registrar!', CController::createUrl('Admin/Place'), $option, array("class" => "btn btn-blue-s6", "name" => "aplace2"));
                ?>
            </div>
        <?php } ?>

        <div id="opcionesAdmin">

            <div id="wellcome" class="well"> 
                Bienvenido!!  ¿Como quieres sorprender a tus clientes el día de hoy?  <?php $placeId; ?>
            </div>

            <div class="span4">
                <div class="widget">
                    <div class="widget-content">
                        <h3 class="title"><a href="http://wbpreview.com/pcrearLugarreviews/WB082S4MT/grid-layout.html#">¿Deseas crear un Evento?</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        
                        <a id="btn_create_event"  href="#modalEventDetailsAdmin" role="button" data-toggle="modal" <?php if ($placeId == NULL) { ?>onclick="crearLugar()" <?php } ?> <?php if ($placeId != NULL) { ?>onclick="showEventForm(1,'modalEventDetailsAdmin')" <?php } ?> class="btn btn-blue-s6">Crear Evento</a>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="widget">
                    <div class="widget-content">
                        <h3 class="title"><a href="http://wbpreview.com/previews/WB082S4MT/grid-layout.html#">¿Quizá una Promoción?</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a id="create_promotion"  href="#modalEventDetailsAdmin" role="button" data-toggle="modal" <?php if ($placeId == NULL) { ?>onclick="crearLugar()" <?php } ?> <?php if ($placeId != NULL) { ?>onclick="showEventForm(2,'modalEventDetailsAdmin')" <?php } ?> class="btn btn-blue-s6">Crear Promoción</a>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="widget">
                    <div class="widget-content">
                        <h3 class="title"><a href="http://wbpreview.com/previews/WB082S4MT/grid-layout.html#">¿Talvez una Invitación?</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a id="create_invitation"  href="#modalEventDetailsAdmin" role="button" data-toggle="modal" <?php if ($placeId == NULL) { ?>onclick="crearLugar()" <?php } ?> <?php if ($placeId != NULL) { ?>onclick="showEventForm(3,'modalEventDetailsAdmin')" <?php } ?> class="btn btn-blue-s6">Crear Invitación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div id="modalEventDetailsAdmin" class="modal hide fade span19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ></div>

