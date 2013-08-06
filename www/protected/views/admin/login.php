<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-Login-Form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,)
));
?>

<div class="left login-body">
<div class="login-title">管理员登陆</div>
<div class="login-form">
<div>
	<div class="txt">账&nbsp;&nbsp;号：<?php echo $form->textField($model,'username'); ?></div>
	<span style='color:red'>
			<?php //echo $form->error($model,'username'); ?>
		</span>
	<div class="clear"></div>

</div>
<br/>
<div>

<div class="txt">密&nbsp;&nbsp;码：<?php echo $form->passwordField($model,'password'); ?></div>
<span style='color:red'>
			<?php //echo $form->error($model,'password'); ?>
		</span>
<div class="clear"></div>
</div>
<br/>
<div class="btn"><?php echo CHtml::submitButton('登陆'); ?></div>
</div>
</div>
</div>
<?php $this->endWidget();?>