<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . " - Perfil";
$this->layout = 'layout_admin';
?>
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
                <span>Profile</span>
            </li>
        </ul>
        <div>
            <form class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="input01">First Name</label>
                        <div class="controls">
                            <input class="input-xlarge" id="input01" type="text">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="input01">Last Name</label>
                        <div class="controls">
                            <input class="input-xlarge" id="input01" type="text">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Change avatar</label>
                        <div class="controls">
                            <input class="file" id="fileInput" type="file">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="input01">Email Address</label>
                        <div class="controls">
                            <input class="input-xlarge" id="email" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Password</label>
                        <div class="controls">
                            <input class="input-xlarge" id="password" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Confirm</label>
                        <div class="controls">
                            <input class="input-xlarge" id="password" type="text">
                        </div>
                    </div>

                    <div class="form-actions border-rd4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- end content profile -->
    </div>
</div>
</div><!-- end container -->
</div><!-- end main -->