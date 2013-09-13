<script>

    $(document).ready(function() {
        $('#event_name').focus();
    });

    function goTo(url)
    {
        // load the admin index
        $.ajax({'type': 'POST', 'url': url
                    , 'success': function(data) {
                $('#opcionesAdmin').html(data);
            }, 'cache': false});

        $('#divAlert').hide(500);
    }

    function saveEvent()
    {
//      $('input[name=fecha]').datepicker();
        var inputFileImage = document.getElementById("event_image");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('event_name', $('input[id=event_name]').val());
        data.append('event_date', $('input[id=event_date]').val());
        data.append('event_start_hour', $('input[id=event_start_hour]').val());
        data.append('event_end_hour', $('input[id=event_end_hour]').val());
        data.append('event_address', $('input[id=event_address]').val());
        data.append('event_image', $('input[id=event_image]').val().replace(/C:\\fakepath\\/i, ''));
        //data.append('CboDocumentos', $('select[id=CboDocumentos]').val());
        data.append('event_description', $('textarea[id=event_description]').val());
        data.append('event_keys_words', $('textarea[id=event_keys_words]').val());
        data.append('image', file);

        // editar directorio
        $.ajax({'type': 'POST', contentType: false, 'url': '<?php echo CController::createUrl('Event/SaveEvent') ?>',
            data: data,
            processData: false,
            'success': function(data) {

                if (data == 'error') {
                    $('#divAlert').show(20);
                    $('#divAlert').html("El registro de tu evento no se completó, intenta guardarlo nuevamente.");
                }

                // if the event is created
                else if (data == 'completed') {
                    // Show message completed
                    $('#divAlert').show(20);
                    $('#divAlert').html("Has registrado tu nuevo evento, puedes ver los eventos que has creardo en el siguiente <a href='#' onclick='goTo(\"<?php echo CController::createUrl('eventList') ?>\")'>Enlace</a>, o puedes volver al <a href='#' onclick='goTo(\"<?php echo CController::createUrl('admin/index') ?>\")'>Inicio</a>");

                    // load the admin index
                    $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('admin/Index') ?>'
                                , 'success': function(data) {
                            $('#opcionesAdmin').html(data);
                        }, 'cache': false});
                }
//                    $('#frm_digitalizar').html(data);
            }, 'cache': false
        });
    }
</script>

<div class="title">
    <h3><?php echo $opcion . " " . $type->description ?></h3>
</div>
<form class="form-horizontal" class="span-19">
    <fieldset class="span-19">
        <div class="control-group">
            <label class="control-label" for="input01">Nombre de <?php echo $type->description ?><span>(*)</span></label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="event_name" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">Fecha de <?php echo $type->description ?><span>(*)</span></label>
            <div class="controls">
                <input id="fecha" name="fecha" type="date" class="input-small" id="event_date" value="<?php echo date('Y-m-d') ?>" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">Hora Inicio<span>(*)</span></label>
            <div class="controls">
                <input type="time" class="input-small" id="event_start_hour"  value="<?php echo $place['place_open_hour'] ?>" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">Hora Termina<span>(*)</span></label>
            <div class="controls">
                <input type="time" class="input-small" id="event_end_hour"  value="<?php echo $place['place_close_hour'] ?>" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">
                Dirección *
            </label>

            <div class="controls">
                <input id="event_address" type="text" value="<?php echo $place['place_address'] ?>" class="input-xlarge" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="fileInput">Imagen</label>
            <div class="controls">
                <input class="input-file" id="event_image" type="file">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">
                Describe tú evento
            </label>
            <div class="controls">

                <textarea id="event_description" class="input-xxlarge" rows="5" style="width: 100%"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">
                Palabras Claves
            </label>
            <div class="controls">
                <textarea id="event_keys_words" class="input-xxlarge" rows="5" style="width: 100%"></textarea>
            </div>

            <br>
            <div class="controls">

                <a id="aeventsave" class="btn btn-info btn-red-s6" style="float: right">Cerrar</a>
                <a id="aeventsave" class="btn btn-info" style="float: right" onclick="saveEvent()">Guardar</a>

            </div>
        </div>

        </div>

    </fieldset>
</form><!-- end form-horizontal -->

