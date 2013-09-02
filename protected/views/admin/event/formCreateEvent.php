<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . " - Crear " . $type->description;
$this->layout = 'layout_admin';
?>

<script>  
    $('input[name=fecha]').datepicker();
</script>

    <div class="title">
        <h3><?php echo $opcion . " " . $type->description ?></h3>
    </div>
    <form class="form-horizontal">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="input01">Nombre de <?php echo $type->description ?><span>(*)</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="input01" required>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="input01">Fecha de <?php echo $type->description ?><span>(*)</span></label>
                <div class="controls">
                    <input id="fecha" name="fecha" type="text" class="input-xlarge" id="input01" required>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="input01">Hora Inicio<span>(*)</span></label>
                <div class="controls">
                    <input type="time" class="input-small" id="input01" required>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="input01">Hora Termina<span>(*)</span></label>
                <div class="controls">
                    <input type="time" class="input-small" id="input01" required>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="optionsCheckbox">Cupo Limitado</label>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" id="optionsCheckbox" value="option1">
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="fileInput">Imagen</label>
                <div class="controls">
                    <input class="input-file" id="fileInput" type="file">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="select01">Describe el(la) <?php echo $type->description ?> <span>(*)</span></label>
                <div class="controls">
                    <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
                </div>
            </div>


            <div class="form-actions border-rd4">
                <a id="aeventsave" class="btn btn-blue-s4">Guardar</a>
            </div><!-- form-actions -->

        </fieldset>
    </form><!-- end form-horizontal -->

