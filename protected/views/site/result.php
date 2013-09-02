<!-- **************** start All Flie  ****************** -->
                      <div class="box-wrapper span10">
                           
                            <ul class="thumbnails thumbnails-vertical">
                                <?php

foreach ($places as $place) {
    ?>
                                <li class="span5">
                                    <div class="thumbnail border-radius-top">
                                        <div class="bg-thumbnail-img">
                                            <a class="overlay" href="http://wbpreview.com/previews/WB082S4MT/detail.html">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/play.png">
                                            </a>
                                            <img class="border-radius-top" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pj1.jpg">
                                        </div>
                                        <div class="thumbnail-content-left">
                                            <h5><a href="http://wbpreview.com/previews/WB082S4MT/detail.html"><?php echo $place['place_name'] ?></a></h5>
                                            <p>
                                                <?php 
                                                 echo substr($place['place_coments'], 0,59) ;
                                                 if(strlen($place['place_coments'])>60)
                                                    echo "...";
                                                 ?>
                                            </p>
                                            <p>Zona:</p>
                                            <p>Apertura:</p>
                                            <p>Cierre:</p>
                                            <p>Telefono:</p>
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="box border-radius-bottom">
                                        <p>
                                            <span class="title_torrent pull-left">Movie</span>
                                            <span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>1,444,898</span>
                                        </p>
                                    </div>
                                </li>
                                <?php } ?>
    </div><!-- end  -->
    <!-- row -->
    <!-- **************** end All Flie  ****************** -->


