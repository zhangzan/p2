<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-Login-Form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,)
));
?>
<style>
	body, li:first-child:after, li:last-child:after{background-color: #313131;}
	.login{position: absolute;width: 384px;height: 140px;color: #b5b5b5;font-size: 14px;top: 50%; left: 50%; margin: -70px 0 0 -192px;}
	.login li{list-style-type: none;margin-bottom: 10px;border-radius: 5px;overflow: hidden;position: relative;height: 42px;}
	.login li input{box-shadow:inset 0 0 5px rgba(0,0,0,.5),-1px 1px 0 rgba(255,255,255,.05);border:0 none;padding:8px 5px 5px;border-radius: 5px;width:300px;height: 28px;box-sizing: content-box;background: rgba(0,0,0,.1);color: #fff;}
	.login li:first-child:after,
	.login li:last-child:after{position: absolute;width: 50px;height: 50px;content: "";border-radius: 25px;z-index: 2;right: -23px;box-shadow: 0 0 8px rgba(0,0,0,.5);}
	::-webkit-input-placeholder{color:#fff;font-weight: bold;}
	.login li:first-child:after{top: 15px;}
	.login li:last-child:after{bottom:15px;}
	.login label{width: 70px;display: inline-block;text-align: right;}
	.login span{display: block;color: #6296b4;padding-left: 75px;}
	input[type="submit"]{position: absolute;top: 24px;outline: none; right: -30px;width: 44px;height: 44px;border-radius: 22px;border:1px solid #00a1d2;background: -webkit-linear-gradient(top,#029ecd,#0d7796);color: #fff;text-shadow:1px 1px 0 #666;box-shadow:0 0 0 5px #2c2c2c;z-index: 3;text-align: center;line-height: 46px;-webkit-transition: all 0.28s ease-in;}
	input[type="submit"]:hover{-webkit-transform:rotate(360deg);}
</style>
<div class="login">
 	<ul>
		 <li><label for="username">账 号:</label> <?php echo $form->textField($model,'username'); ?></li>
		 <li><label for="password">密 码:</label> <?php echo $form->passwordField($model,'password'); ?></li>
	</ul>
	<?php echo CHtml::submitButton('登陆'); ?>
</div>
<?php $this->endWidget();?>