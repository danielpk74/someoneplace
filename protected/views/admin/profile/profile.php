<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . " - Perfil";
$this->layout = 'layout_admin';
?>

<script>

    $(document).ready(function() {
        $('#btn_cancelar').live("click", function() {
            $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Site/Profile') ?>', 'data': {
                }, 'success': function(data) {
                    $('#actualiza').html(data);
                }, 'cache': false});
        });
        
        $('#btn_cancelar').live("click", function() {
            data = new FormData();
            data.append('',$('input[name=]'))
            data.append('',$('input[name=]'))
            data.append('',$('input[name=]'))
            
        
            $.ajax({'type': 'POST', 'url': '<?php echo CController::createUrl('Site/SaveProfile') ?>', 'data': {
                }, 'success': function(data) {
                    $('#actualiza').html(data);
                }, 'cache': false});
        });
    });

</script>

<div class="row">
    <div class="span3 sidebar_content">
        <div class="row">
            <div class="span3 user_info">
                <ul>
                    <li><a class="avatar" href="#"><img src="blog_files/avatar.png"></a></li>
                    <li><a href="http://wbpreview.com/previews/WB082S4MT/account.html"><i class="icon-user icon-white"></i>Profile</a></li>
                    <li><a class="btn btn-danger" href="#"><i class="icon-envelope icon-white"></i>Send Mail</a></li>
                </ul>
            </div>
        </div>
    </div><!-- end sidebar_content -->
    <div class="span9">
        <ul class="breadcrumb">
            <li class="active">
                <span><b>Perfil:</b> <?php echo $user->user_name ?></span>

            </li>
        </ul>
        <div>
            <div class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="input01">Nombre</label>
                        <div class="controls">
                            <input class="input-xlarge" value="<?php echo $user->user_name ?>" id="input01" type="text">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Cambiar Imagen</label>
                        <div class="controls">
                            <input class="file" id="fileInput" type="file">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="input01">Email</label>
                        <div class="controls">
                            <input class="input-xlarge" id="email" value="<?php echo $user->user_email ?>" type="email">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="input01">Teléfono</label>
                        <div class="controls">
                            <input class="input-xlarge" id="email" value="<?php echo $user->user_phone ?>" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Contraseña</label>
                        <div class="controls">
                            <input class="input-xlarge" id="password" type="password">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Confirmar Contraseña</label>
                        <div class="controls">
                            <input class="input-xlarge" id="password" type="password">
                        </div>
                    </div>

                    <div class="form-actions border-rd4">
                        <a href="#" id="btn_guardar_cambios" class="btn btn-primary">Guardar Cambios</a>
                        <a href="#" id="btn_cancelar" class="btn">Cancelar</a>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- end content profile -->
    </div>
</div>