<script>
    ////Iniciar Session
            $('#LoginForm_username').focus();
    
</script>
<div class="login-content span4 offset1">
        
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
        ?>
    
        <div class="header-login well">
            <h3>Iniciar Sesión</h3>
        </div>
    
        <div class="well">
            <?php echo $form->labelEx($loginModel, 'Usuario'); ?>
            
            <?php echo $form->textField($loginModel, 'username'); ?>
            <?php echo $form->error($loginModel, 'username'); ?>

            <?php echo $form->labelEx($loginModel, 'Contraseña'); ?>
            <?php echo $form->passwordField($loginModel, 'password'); ?>
            <?php echo $form->error($loginModel, 'password'); ?>

            <label class="checkbox">
                <?php echo $form->checkBox($loginModel, 'rememberMe'); ?>
                <?php echo $form->label($loginModel, 'Recordarme'); ?>
                <?php echo $form->error($loginModel, 'rememberMe'); ?>
            </label>

            <?php // echo CHtml::ajaxSubmitButton('Login',CController::createUrl('Site/Login')); ?>
            <?php 
            
            $option = array('type' => 'POST',
//                'url'=>CController::createUrl('Site/IniciarSession'),
//                                'data' => array('producto' => "js:$('select#productos').val()", 'subproducto' => "js:$('select#sub_productos').val()", 'uen' => "js:$('select#uen').val()", 'periodo' => 'js:cbo_periodo.value', 'fecha' => 'js:meses.value','tipoCanal' => "js:$('select#tipo_canal').val()"),
                                    'update' => '#divInicioSession',
                                    'success' => 'function(data) {
                                        alert(data);
                                     $(\'#divInicioSession\').html(data);
                                     
                                }');
                            
            
//            echo CHtml::ajaxSubmitButton('Iniciar Sesión', CController::createUrl('Site/IniciarSession'), $option, array("name"=>"sum","class" => "btn btn-info")); 
            echo CHtml::ajaxSubmitButton('Iniciar Sesión', CController::createUrl('Site/IniciarSession'), '', array("class" => "btn btn-info")); 
            
            
            
            ?>
            
            <a data-dismiss="modal" aria-hidden="true" class="btn btn-info">Cancelar</a>
            
            
            <!--<a href="http://wbpreview.com/previews/WB082S4MT/index.html" type="submit" class="btn btn-info">Iniciar Sesión</a>-->
            <!--<p class="sign-up-lg">No recuerdas tu cuenta' <a href="http://wbpreview.com/previews/WB082S4MT/sign-up.html">Sign Up.</a></p>-->
        </div>	
    <a data-dismiss="modal" aria-hidden="true" style="float: right">Registrarme</a>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->


