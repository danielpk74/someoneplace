<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . " - Eventos";
$this->layout = 'layout_admin';
?>
<div class="row">
    <!--    <div class="span3 sidebar_content">
            <div class="row">
                <div class="span3 user_info">
                    <ul>
                        <li><a class="avatar" href="#"><img src="blog_files/avatar.png"></a></li>
                        <li><a href="http://wbpreview.com/previews/WB082S4MT/account.html"><i class="icon-user icon-white"></i>Profile</a></li>
                        <li><a class="btn btn-danger" href="#"><i class="icon-envelope icon-white"></i>Send Mail</a></li>
                    </ul>
                </div>
            </div>
        </div> end sidebar_content -->
    <div class="span12">
        <!--        <ul class="breadcrumb">
                    <li class="active">
                        <span>Profile</span>
                    </li>
                </ul>-->



        <div class="tabbable span16">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab1" data-toggle="tab">Eventos(<?php echo Count($events)?>)</a>
                </li>
                <li><a href="#tab2" data-toggle="tab">Promociones(<?php echo Count($promotions)?>)</a></li>
                <li><a href="#tab3" data-toggle="tab">Invitaciones(<?php echo Count($invitations)?>)</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
<!--
                    <div class="title">
                        <h3>Eventos</h3>
                    </div> end title -->

                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>H. Inicio</th>
                                <th>H. Fin</th>
                                <th>Dirección</th>
                                <th>Descripción</th>
                                <th>Palabras Clave</th>
                                <th>editar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($events as $event) { ?>
                                <tr>
                                    <td><?php echo $event['event_id'] ?></td>
                                    <td><a href="http://wbpreview.com/previews/WB082S4MT/element.html#"><?php echo $event['event_name'] ?></a></td>
                                    <td><?php echo $event['event_date'] ?></td>
                                    <td><?php echo $event['event_start_hour'] ?></td>
                                    <td><?php echo $event['event_end_hour'] ?></td>
                                    <td><?php echo $event['event_address'] ?></td>
                                    <td><?php echo $event['event_description'] ?></td>
                                    <td><?php echo $event['event_keys_words'] ?></td>
                                    <td>

                                        <a class="overlay">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/edit.png"  >
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="footer-table">
                        <div class="navigation pagination pull-right">
                            <ul>
                                <li><a href="http://wbpreview.com/previews/WB082S4MT/element.html#">←</a></li>
                                <li><a class="active" href="http://wbpreview.com/previews/WB082S4MT/element.html#">1</a></li>
                                <li><a href="http://wbpreview.com/previews/WB082S4MT/element.html#">2</a></li>
                                <li><a href="http://wbpreview.com/previews/WB082S4MT/element.html#">3</a></li>
                                <li><a href="http://wbpreview.com/previews/WB082S4MT/element.html#">→</a></li>
                            </ul>
                        </div>
                    </div> 

                    <a  id="btn_create_event" onclick="showEventForm(1,'modalEventDetails')" href="#modalEventDetails" role="button" data-toggle="modal" class="btn btn-blue-s6">
                        Crear Evento
                    </a>

                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                
                
                <div class="tab-pane" id="tab2">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>H. Inicio</th>
                                <th>H. Fin</th>
                                <th>Dirección</th>
                                <th>Descripción</th>
                                <th>Palabras Clave</th>
                                <th>editar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($promotions as $event) { ?>
                                <tr>
                                    <td><?php echo $event['event_id'] ?></td>
                                    <td><a href="http://wbpreview.com/previews/WB082S4MT/element.html#"><?php echo $event['event_name'] ?></a></td>
                                    <td><?php echo $event['event_date'] ?></td>
                                    <td><?php echo $event['event_start_hour'] ?></td>
                                    <td><?php echo $event['event_end_hour'] ?></td>
                                    <td><?php echo $event['event_address'] ?></td>
                                    <td><?php echo $event['event_description'] ?></td>
                                    <td><?php echo $event['event_keys_words'] ?></td>
                                    <td>

                                        <a class="overlay">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/edit.png"  >
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                      <a  id="btn_create_event" onclick="showEventForm(2,'modalEventDetails')" href="#modalEventDetails" role="button" data-toggle="modal" class="btn btn-blue-s6">
                        Crear Promoción
                    </a>
                </div>
                
                <div class="tab-pane" id="tab3">
                    
                    <?php if(Count($promotions) != 0) { ?>
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>H. Inicio</th>
                                <th>H. Fin</th>
                                <th>Dirección</th>
                                <th>Palabras Clave</th>
                                <th>editar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($invitations as $event) { ?>
                                <tr>
                                    <td><?php echo $event['event_id'] ?></td>
                                    <td><?php echo $event['event_description'] ?></td>
                                    <td><?php echo $event['event_date'] ?></td>
                                    <td><?php echo $event['event_start_hour'] ?></td>
                                    <td><?php echo $event['event_end_hour'] ?></td>
                                    <td><?php echo $event['event_address'] ?></td>
                                    <td><?php echo $event['event_keys_words'] ?></td>
                                    <td>

                                    <a>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/edit.png" style="width:28px" >
                                    </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                     <a  id="btn_create_event" onclick="showEventForm(3,'modalEventDetails')" href="#modalEventDetails" role="button" data-toggle="modal" class="btn btn-blue-s6">
                        Crear Invitación
                    </a>
                    
                    <?php } else { ?>
                        <div id='informacion' class='alert alert-info fade in' ><h4 class='alert-heading'>¡Oye!</h4><br>¡No tienes ninguna promoción creada hasta en esete momento!</div>
                    <?php }  ?>
                </div>
            </div>
        </div>
        <!-- end content profile -->
    </div>

</div>

<div id="modalEventDetails" class="modal hide fade span19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ></div>
