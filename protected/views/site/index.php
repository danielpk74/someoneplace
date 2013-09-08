<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<script>
    $(document).ready(function() {

        // show advance search form
        $('#aBusquedaAvanzada').live("click", function() {
            $('#busquedaAvanzada').show(500);
        });

        // single search place 
        $('#aBuscar').live("click", function() {
            $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Site/Search') ?>',
                data: {'param': $('#singleSearch').val()},
                'success': function(data) {
                    if (data != 'empty') // if a place is find
                        $('#result').html(data);
                    else {
                        $('#result').html("<div id='informacion' class='alert alert-info fade in' ><h4 class='alert-heading'>¡Oye!</h4><br>¡No pudimos encontrar un lugar para ti con las especificaciones de tu consulta!<br><br> Hemos registrador tu busqueda para ofrecerte lugares muy pronto!! =D</div>");
                        $('#singleSearch').focus();
                    }

                }, 'cache': false});
        });

        // advance search aplace 
        $('#aBusquedaAvanzada').live("click", function() {
            $('#busquedaAvanzada').show(500);
        });

        // hide advance search form
        $('#aCerrarBusquedaAvanzada').live("click", function() {
            $('#busquedaAvanzada').hide(500);
        });
    });

    // single search place 
    function openTypePlace(typeID)
    {

        $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Site/SearchTypePlace') ?>',
            data: {'typeID': typeID},
            'success': function(data) {
                if (data != 'empty') // if a place is find
                    $('#result').html(data);
                else {
                    $('#result').html("<div id='informacion' class='alert alert-info fade in' ><h4 class='alert-heading'>¡Oye!</h4><br>¡No pudimos encontrar un lugar para ti con las especificaciones de tu consulta!<br><br> Hemos registrador tu busqueda para ofrecerte lugares muy pronto!! =D</div>");
                    $('#singleSearch').focus();
                }

            }, 'cache': false});

    }

    function showEventForm(event_type_id)
    {
        $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Admin/ShowFormEvent') ?>',
            'data': {
                '': event_type_id
            }, 'success': function(data) {
                $('#container').html(data);
            }, 'cache': false});
    }
</script>

<div class="row">
    <div class="box-wrapper span12">
        <div class="widget">
            <div class="wrapper-search">
                <a id="aBusquedaAvanzada" href="#" >avanzada</a>
                <form class="form-inline form-search border-rd4">
                    <input id="singleSearch" placeholder="Solo escribe que deseas hacer hoy..." class="box-text" type="text">

                    <a id="aBuscar" href="#" class="btn-search">Buscar</a>

                    <div id="busquedaAvanzada" style="display: none">

                        <div class="widget-content">
                            <div class="title">
                                <h5>Busqueda Avanzada....</h5>
                                <div id="errorSumary" style="float: right"></div>
                            </div>
                            <div class="form-inline">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Zona
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
                                                    Hora Apertura
                                                </label>

                                                <div class="controls">
                                                    <input id="place_open_date" type="time" class="input-small" >
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Hora Cierre
                                                </label>

                                                <div class="controls">
                                                    <input id="place_open_date" type="time" class="input-small" >
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Eventos
                                                </label>
                                                <div class="controls">

                                                    <select id="zone_id_fk">
                                                        <option>(Selecciona)</option>
                                                        <option value="hoy">Hoy</option>
                                                        <option value="manana">Mañana</option>
                                                        <option value="pviernes">Próximo Viernes</option>
                                                        <option value="psabado">Próximo Sábado</option>
                                                    </select>
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

                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Hora Cierre
                                                </label>

                                                <div class="controls">
                                                    <input id="place_open_date" type="time" class="input-small" >
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Promociones
                                                </label>
                                                <div class="controls">

                                                    <select id="zone_id_fk">
                                                        <option>(Selecciona)</option>
                                                        <option value="2x1">2x1</option>
                                                    </select>
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

                                            <div class="control-group">
                                                <label class="control-label" for="input01">
                                                    Hora Cierre
                                                </label>

                                                <div class="controls">
                                                    <input id="place_open_date" type="time" class="input-small" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- end advance search -->

                            <br>
                            <a id="aBuscarAvanzado" href="#"  class="btn btn-info">Buscar</a>
                            <a id="aCerrarBusquedaAvanzada" href="#"  class="btn btn-info btn-red-s6" style="float: right">Cerrar Busqueda Avanzada</a>
                        </div>

                        <div>
                            </form>
                        </div>
                    </div>
            </div><!-- end box-wrapper -->
        </div>
        <div class="row">
            <div class="box-wrapper  span12">

                <div class="row">
                    <div class="title span12">
                        <h3 class="pull-left">Que deseas hacer hoy ...</h3>
                        <div class="sort pull-right dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Most Viewed
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-tag"></i>By Name</a></li>
                                <li><a href="#"><i class="icon-list"></i>List</a></li>
                                <li><a href="#"><i class="icon-eye-open"></i>View</a></li>
                            </ul>
                        </div>
                    </div><!-- end title -->
                </div>

                <div id="result">
                    <ul class="thumbnails thumbnails-horizontal">
                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img" onclick="openTypePlace(1)">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png"  >
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj1.jpg">
                                </div>
                                <!--<h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html" onclick="openTypePlace(1)">Comidas Rápidas  </a></h5>-->
                                <h5><a href="#" onclick="openTypePlace(1)">Comidas Rápidas  </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj2.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Bares </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj3.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Restaurantes</a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj4.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Cine </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj5.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj6.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj7.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="thumbnail border-radius-top">
                                <div class="bg-thumbnail-img">
                                    <a style="display: none;" class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                    </a>
                                    <img style="opacity: 1;" class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj8.jpg">
                                </div>
                                <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit </a></h5>
                            </div>
                            <div class="box border-radius-bottom">
                                <p>
                                    <span class="title_torrent pull-left">Movie</span>
                                    <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="span12">
                            <div class="navigation pagination pull-right">
                                <ul>
                                    <li><a href="#">←</a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">→</a></li>
                                </ul>
                            </div>
                        </div><!-- end navigation -->
                    </div>
                </div><!-- end  -->

            </div> <!-- end result -->
            <!-- **************** start All Flie  ****************** -->
            <!--                        <div class="box-wrapper span10">
                                        <div class="row">
                                            <div class="title span10">
                                                <h3 class="pull-left">Lorem ipsum dolor ...</h3>
                                                <div class="sort pull-right dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        Most Viewed
                                                        <b class="caret"></b>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#"><i class="icon-tag"></i>By Name</a></li>
                                                        <li><a href="#"><i class="icon-list"></i>List</a></li>
                                                        <li><a href="#"><i class="icon-eye-open"></i>View</a></li>
                                                    </ul>
                                                </div>
                                            </div> end title 
                                        </div>
                                        <ul class="thumbnails thumbnails-vertical">
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj1.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj2.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj3.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj4.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                        
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj5.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                        
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj6.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                        
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                        
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj7.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit ... </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit magna aliqua.
                        
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                        
                                            <li class="span5">
                                                <div class="thumbnail border-radius-top">
                                                    <div class="bg-thumbnail-img">
                                                        <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                                        </a>
                                                        <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj8.jpg">
                                                    </div>
                                                    <div class="thumbnail-content-left">
                                                        <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html">Lorem ipsum dolor sit amet, consectetur adipisicing </a></h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed 
                                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box border-radius-bottom">
                                                    <p>
                                                        <span class="title_torrent pull-left">Movie</span>
                                                        <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="span10">
                                                <div class="navigation pagination pull-right">
                                                    <ul>
                                                        <li><a href="#">←</a></li>
                                                        <li><a class="active" href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">→</a></li>
                                                    </ul>
                                                </div>
                                                    </div><!-- end navigation -->
        </div>
    </div><!-- end  -->
    <!-- row -->
    <!-- **************** end All Flie  ****************** -->
</div><!-- row -->
