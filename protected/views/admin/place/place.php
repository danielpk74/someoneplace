<?php
/* @var $this AdminController */
/* @var $placeModel PlacesRecord */
/* @var $form CActiveForm */
?>

<script>
    function validatePlace()
    {
        if ($("#place_id").val())
            ;
        if ($("#place_name").val())
            ;
        if ($("#zone_id_fk").val())
            ;
        if ($("#place_address").val())
            ;
        if ($("#place_phone").val())
            ;
        if ($("#place_movil").val())
            ;
        if ($("#place_email").val())
            ;
        if ($("#place_web").val())
            ;
        if ($("#place_facebook").val())
            ;
        if ($("#place_twitter").val())
            ;
        if ($("#place_google_m").val())
            ;
        if ($("#place_flick_r").val())
            ;
        if ($("#place_open_date").val())
            ;
        if ($("#contact_name").val())
            ;
        if ($("#contact_phone").val())
            ;
        if ($("#contact_movil").val())
            ;
        if ($("#contact_email").val())
            ;
        if ($("#contact_phone").val())
            ;
        if ($("#place_coments").val())
            ;
        if ($("#key_words").val())
            ;
    }

    function savePlace(objeto)
    {
        var data = new FormData();
        data.append('objeto', objeto.id);
        data.append('place_id', $("#place_id").val());
        data.append('place_name', $("#place_name").val());
        data.append('zone_id_fk', $("#zone_id_fk").val());
        data.append('place_address', $("#place_address").val());
        data.append('place_phone', $("#place_phone").val());
        data.append('place_movil', $("#place_movil").val());
        data.append('place_email', $("#place_email").val());
        data.append('place_web', $("#place_web").val());
        data.append('place_facebook', $("#place_facebook").val());
        data.append('place_twitter', $("#place_twitter").val());
        data.append('place_google_m', $("#place_google_m").val());
        data.append('place_flick_r', $("#place_flick_r").val());
        data.append('place_open_date', $("#place_open_date").val());
        data.append('contact_name', $("#contact_name").val());
        data.append('contact_phone', $("#contact_phone").val());
        data.append('contact_movil', $("#contact_movil").val());
        data.append('contact_email', $("#contact_email").val());
        data.append('contact_phone', $("#contact_phone").val());
        data.append('place_coments', $("#place_coments").val());
        data.append('key_words', $("#key_words").val());
        
        categories =  new Array();
        $('.categories').each(function(index, elemento) {
            categories[index] = $(elemento).attr("id");
        });
        
          data.append('categories', categories);


        $.ajax({'type': 'POST', contentType: false, 'url': '<?php echo CController::createUrl('Admin/Place') ?>',
            data: data,
            processData: false,
            'success': function(data) {
                if (data != 'error') {
                    $('#divAlert').show();
                    $('#wellcome').hide();
                    $('#divAlert').html("Tu lugar ha sido registrado, ahora puedes crear eventos, promociones o invitaciones a conocer tu lugar.");

                    $('#admin').show(1000);
                    $('#admin').html(data);
                }
                else {
                    $('#divAlert').show(20);
                    $('#divAlert').html("No pudimos registrar tu lugar, por favor intentalo o comunicate con nosotros y lo haremos por ti... =D");
                }
            }, 'cache': false});
    }

    function checks()
    {
//        $(".tab5 div div[id=checks]").each(function(index) {
//            $(this).children("checkbox").each(function(index2) {
//                 alert($(this).value());
//            })
//        });

        //Gestionar con each
//        $('.categories').each(function(index, elemento) {
//                    alert("Elemento: " + $(elemento).attr("id") + " en el indice " + index);
//        });
        
        categories =  new Array();
        $('.categories').each(function(index, elemento) {
            categories[index]=$(elemento).attr("id");
        });
        
        alert(categories);
    }
</script>

<div class="form">
    <div class="tabbable span12">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab1" data-toggle="tab">Datos Generales</a>
            </li>
            <li><a href="#tab2" data-toggle="tab">¿En que redes sociales te encuentras?</a></li>
            <li><a href="#tab3" data-toggle="tab">Datos para contactarte</a></li>
            <li><a href="#tab4" data-toggle="tab">¿Puedes describir tu lugar?</a></li>
            <li><a href="#tab5" data-toggle="tab">Selecciona tus categorias</a></li>


        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="box-form widget">
                    <div class="widget-content">

                        <div class="title">
                            <h5>Datos generales de tu Lugar</h5>

                            <p class="note" style="float: right">
                                Campos con <span class="required">*</span> son requeridos. <br>
                            </p>
                            <div id="errorSumary" style="float: right">
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <fieldset>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Nit *                                   
                                    </label>

                                    <div class="controls">
                                        <input id="place_id" type="text" class="input-medium" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Nombre *

                                    </label>

                                    <div class="controls">
                                        <input id="place_name" type="text" class="input-xlarge" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Zona *
                                    </label>

                                    <div class="controls">
                                        <select id="zone_id_fk">
                                            <option>(Selecciona)</option>
                                            <?php foreach ($zones as $zone) { ?>
                                                <option value="<?php echo $zone->zone_id ?>"><?php echo $zone->zone_name ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Dirección *
                                    </label>

                                    <div class="controls">
                                        <input id="place_address" type="text" class="input-xlarge" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Teléfono *
                                    </label>

                                    <div class="controls">
                                        <input id="place_phone" type="text" class="input-medium" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Nro Celular
                                    </label>

                                    <div class="controls">
                                        <input id="place_movil" type="text" class="input-medium" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Hora Apertura
                                    </label>

                                    <div class="controls">
                                        <input id="place_open_date" type="time" class="input-small" >
                                    </div>
                                </div>
                            </fieldset>
                        </div><!-- end form-horizontal -->
                    </div>
                </div><!-- end box-form -->
            </div>
            <!-- end Table1 -->

            <div class="tab-pane" id="tab2">
                <div class="box-form widget">
                    <div class="widget-content">
                        <div class="title">
                            <h5>Las redes Sociales</h5>
                            <div id="errorSumary" style="float: right"></div>
                        </div>
                        <div class="form-horizontal">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        wwww.facebook.com/
                                    </label>
                                    <div class="controls">
                                        <input id="place_facebook" type="text" class="input-xlarge" placeholder="Nombre de tu perfil">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        www.twitter.com/
                                    </label>
                                    <div class="controls">
                                        <input id="place_twitter" type="text" class="input-xlarge" placeholder="Nombre de tu perfil">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Google +
                                    </label>
                                    <div class="controls">
                                        <input id="place_google_m" type="text" class="input-xlarge" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Flick
                                    </label>
                                    <div class="controls">
                                        <input id="place_flick_r" type="text" class="input-xlarge" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Email
                                    </label>
                                    <div class="controls">
                                        <input id="place_email" type="email" class="input-xlarge" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Pagina Web
                                    </label>
                                    <div class="controls">
                                        <input id="place_web" type="text" class="input-xlarge" >

                                    </div>
                                </div>
                            </fieldset>
                        </div><!-- end form-horizontal -->
                    </div>
                </div><!-- end box-form -->
            </div><!-- end Table2 -->

            <div class="tab-pane" id="tab3">
                <div class="box-form widget">
                    <div class="widget-content">
                        <div class="title">
                            <h3>Horizontal forms</h3>
                            <div id="errorSumary" style="float: right"></div>
                        </div>
                        <div class="form-horizontal">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Nombre de Contacto *
                                    </label>
                                    <div class="controls">
                                        <input id="contact_name" type="text" class="input-xlarge" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Teléfono Contacto *
                                    </label>
                                    <div class="controls">
                                        <input id="contact_phone" type="text" class="input-xlarge" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Email Contacto
                                    </label>
                                    <div class="controls">
                                        <input id="contact_email" type="text" class="input-xlarge" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Nro Celular Contacto
                                    </label>
                                    <div class="controls">
                                        <input id="contact_movil" type="text" class="input-xlarge" >
                                    </div>
                                </div>

                            </fieldset>
                        </div><!-- end form-horizontal -->
                    </div>
                </div><!-- end box-form -->
            </div><!-- end table3 -->

            <div class="tab-pane" id="tab4">
                <div class="box-form widget">
                    <div class="widget-content">
                        <div class="title">
                            <h5>Describe tu lugar por medio de comentarios y palabras claves para su busqueda</h5>
                            <div id="errorSumary" style="float: right"></div>
                        </div>
                        <div class="form-horizontal">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Describe tu sitio
                                    </label>
                                    <div class="controls">

                                        <textarea id="place_coments" class="input-xxlarge" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">
                                        Palabras Claves
                                    </label>
                                    <div class="controls">
                                        <textarea id="key_words" class="input-xxlarge" rows="5"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div><!-- end form-horizontal -->
                    </div>
                </div><!-- end box-form -->
            </div><!-- end Table4 -->

            <div class="tab-pane" id="tab5">
                <div class="box-form widget">
                    <div class="widget-content">
                        <div class="title">
                            <h5>Selecciona las categorias en las que crees que tu lugar se encuentra</h5>
                            <div id="errorSumary" style="float: right"></div>
                        </div>
                        <div class="form-inline">
                            <fieldset>
                                <?php foreach ($categories as $category) { ?>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="chk<?php echo $category->category_name; ?>"><input type="checkbox" class="categories" value="<?php echo $category->category_name; ?>" id="<?php echo $category->category_id; ?>"/> <?php echo $category->category_name; ?></label>
                                        </div>                                        
                                    </div>
                                <?php } ?>
                            </fieldset>
                        </div><!-- end form-horizontal -->
                    </div>
                </div><!-- end box-form -->
            </div><!-- end Table5 -->
            <a id="savePlace" class="btn btn-info" onclick="savePlace(this)" style="float: left">Guardar</a>
            <a id="savePlace" class="btn btn-info" onclick="checks()" style="float: left">Checks</a>
        </div><!-- end tab-content -->

    </div><!-- end table -->




</div><!-- form -->