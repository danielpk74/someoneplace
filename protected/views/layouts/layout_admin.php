<?php /* @var $this SiteController */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode(Yii::app()->name); ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
                <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css">
                    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/color-button.css">
                        <!-- js Boots_from -->
                        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
                        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
                        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
                        <!-- end Boots_from -->

                        </head>

                        <body data-spy="scroll" data-target=".subnav" data-offset="50" data-twttr-rendered="true">

                            <div class="navbar navbar-fixed-top">
                                <div class="navbar-inner">
                                    <div class="container">
                                        <a class="brand" href="#">
                                            <span>Some</span>one<span class="cl-blue">Place</span>
                                        </a>
                                        <div class="nav-collapse">
                                            <ul class="nav pull-right">
                                                <li><a href="<?php echo CController::createUrl('Site/Index') ?>">Inicio</a></li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                        Maestros
                                                        <b class="caret"></b>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="http://wbpreview.com/previews/WB082S4MT/profile.html">
                                                                <i class="icon-user"></i>
                                                                Zonas
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="http://wbpreview.com/previews/WB082S4MT/setting.html">
                                                                <i class="icon-lock"></i> Categorias</a>
                                                        </li>
                                                    </ul>

                                                    <li><a href="http://wbpreview.com/previews/WB082S4MT/index.html">Web</a></li>
                                                    <!--<li><a href="http://wbpreview.com/previews/WB082S4MT/index.html">Eventos</a></li>-->
                                                    <li>
                                                        <?php
                                                        $option = array('type' => 'POST',
//                                'data' => array('producto' => "js:$('select#productos').val()", 'subproducto' => "js:$('select#sub_productos').val()", 'uen' => "js:$('select#uen').val()", 'periodo' => 'js:cbo_periodo.value', 'fecha' => 'js:meses.value','tipoCanal' => "js:$('select#tipo_canal').val()"),
                                                            'update' => '#actualiza',
                                                            'success' => 'function(data) {
                                                        $(\'#actualiza\').hide();
                                                        $(\'#actualiza\').html(data);
                                                        $(\'#actualiza\').fadeIn(1000);
                                                  }');

                                                        echo CHtml::ajaxLink('Eventos', CController::createUrl('event/eventList'), $option, array("name" => "aevents"));
                                                        ?>

                                                    </li>

                                                    <li>
                                                        <?php
                                                        $option = array('type' => 'POST',
//                                'data' => array('producto' => "js:$('select#productos').val()", 'subproducto' => "js:$('select#sub_productos').val()", 'uen' => "js:$('select#uen').val()", 'periodo' => 'js:cbo_periodo.value', 'fecha' => 'js:meses.value','tipoCanal' => "js:$('select#tipo_canal').val()"),
                                                            'update' => '#actualiza',
                                                            'success' => 'function(data) {
                                                        $(\'#actualiza\').hide();
                                                        $(\'#actualiza\').html(data);
                                                        $(\'#actualiza\').fadeIn(1000);
                                                  }');

                                                        echo CHtml::ajaxLink('Place', CController::createUrl('Admin/place'), $option, array("name" => "aplace"));
                                                        ?>

                                                    </li>


                                                    <li>
                                                        <?php
                                                        $option = array('type' => 'POST',
//                                'data' => array('producto' => "js:$('select#productos').val()", 'subproducto' => "js:$('select#sub_productos').val()", 'uen' => "js:$('select#uen').val()", 'periodo' => 'js:cbo_periodo.value', 'fecha' => 'js:meses.value','tipoCanal' => "js:$('select#tipo_canal').val()"),
                                                            'update' => '#actualiza',
                                                            'success' => 'function(data) {
                                                        $(\'#actualiza\').hide();
                                                        $(\'#actualiza\').html(data);
                                                        $(\'#actualiza\').fadeIn(1000);
                                                  }');

                                                        echo CHtml::ajaxLink('Perfil', CController::createUrl('Admin/Profile'), $option, array("name" => "aprofile"));
                                                        ?>

                                                    </li>

                                                    <!--<li><a href="http://wbpreview.com/previews/WB082S4MT/detail.html"></a></li>-->

                                                    <li class="divider-vertical"></li>

                                                    <li class="avatar_small"><a href="http://wbpreview.com/previews/WB082S4MT/account.html"></a></li>
                                                    <li>
                                                        <?php
                                                        if (Yii::app()->user->isGuest) {
                                                            $option = array('type' => 'POST',
//                                'data' => array('producto' => "js:$('select#productos').val()", 'subproducto' => "js:$('select#sub_productos').val()", 'uen' => "js:$('select#uen').val()", 'periodo' => 'js:cbo_periodo.value', 'fecha' => 'js:meses.value','tipoCanal' => "js:$('select#tipo_canal').val()"),
                                                                'update' => '#divInicioSession',
                                                                'success' => 'function(data) {
                                        if(data=="valido")
                                            window.location.href="index.php?r=site/profile";
                                        else 
                                            $(\'#divInicioSession\').html(data);
                                }');

                                                            echo CHtml::ajaxLink('Iniciar Sesión', CController::createUrl('Site/IniciarSession'), $option, array("href" => "#myModal", "role" => "button", "data-toggle" => "modal"));
                                                        } else {
                                                            echo CHtml::ajaxLink('Cerrar Sesión', CController::createUrl('Site/Logout'), '', array('name' => 'cerrarLogin'));
                                                        }
                                                        ?>    
                                                        <!--<a href="#myModal" role="button"  data-toggle="modal">Iniciar Sesión</a>-->

                                                    </li>
                                                    <!--                            <li class="dropdown">
                                                                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                                                        Iniciar Sesión
                                                                                        <b class="caret"></b>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li>
                                                                                            <a href="http://wbpreview.com/previews/WB082S4MT/profile.html">
                                                                                                <i class="icon-user"></i>
                                                                                                Account Setting  </a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="http://wbpreview.com/previews/WB082S4MT/setting.html">
                                                                                                <i class="icon-lock"></i> Change Password</a>
                                                                                        </li>
                                                                                        <li class="divider"></li>
                                                                                        <li>createUrl
                                                                                            <a href="http://wbpreview.com/previews/WB082S4MT/login.html"><i class="icon-off"></i> Logout</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end navbar -->
                            <div class="main">
                                <div class="container">




                                    <?php if (isset($this->breadcrumbs)): ?>
                                        <?php
                                        $this->widget('zii.widgets.CBreadcrumbs', array(
                                            'links' => $this->breadcrumbs,
                                        ));
                                        ?><!-- breadcrumbs -->
                                    <?php endif ?>

                                    <div id="actualiza">
                                        <?php echo $content; ?>
                                    </div>

                                </div><!-- end container -->
                            </div><!-- end main -->




                            <div class="clear"></div>

                            <div class="footer" >
                                <div class="container">
                                    <div class="row">
                                        <div class="span6 logo-vt">
                                            <a class="brand" href="#">
                                                <span>Some</span>one<span class="cl-blue">Place</span>
                                            </a>
                                            <span class="coppy_right">
                                                <p>Lorem ipsum dolor sit </p>
                                                <p>@2012 All Rights Reserved.</p>
                                            </span>
                                        </div>
                                        <div class="span2">
                                            <ul class="nav nav-list">
                                                <li class="nav-header">Contact</li>
                                                <li><a href="#">Support</a></li>
                                                <li><a href="#">About</a></li>
                                                <li>84.903.197.895</li>
                                            </ul>
                                        </div>
                                        <div class="span2">
                                            <ul class="nav nav-list">
                                                <li class="nav-header">Blog</li>
                                                <li><a href="#">Regulation</a></li>
                                                <li><a href="#">Blog</a></li>
                                            </ul>
                                        </div>
                                        <div class="span2">
                                            <ul class="nav nav-list">
                                                <li class="nav-header">Follow Us</li>
                                                <li><a href="#"><i class="twitter"></i>Twitter</a></li>
                                                <li><a href="#"><i class="facebook"></i>Facebook</a></li>
                                                <li><a href="#"><i class="dd"></i>Forum</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end footer -->

                            <!-- Modal -->
                            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div id="divInicioSession"> </div>
                                <!--            <div class="login-content span4 offset1">
                                                <div class="header-login well">
                                                    <h3>Iniciar Sesión</h3>
                                                </div>
                                                <form class="well">
                                                    <label>Usuario</label>
                                                    <input class="input" placeholder="Usuario..." type="text">
                                                    <label>Contraseña</label>
                                                    <input class="input" placeholder="Contraseña..." type="text">
                                
                                                    <label class="checkbox">
                                                        <input type="checkbox"> Recordarme
                                                    </label>
                                                    <a href="http://wbpreview.com/previews/WB082S4MT/index.html" type="submit" class="btn btn-info">Iniciar Sesión</a>
                                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-info">Cancelar</a>
                                                    <p class="sign-up-lg">No recuerdas tu cuenta' <a href="http://wbpreview.com/previews/WB082S4MT/sign-up.html">Sign Up.</a></p>
                                                </form>	
                                            </div>-->
                            </div>

                            </div><!-- page -->

                        </body>
                        </html>
