<?php
$model = select_dba ()->select_row ( "select name from admin where id = :id", array (
		':id' => Yii::app ()->user->id
) );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<link rel="stylesheet" type="text/css" href="<?=$this->url('css/admin.css')?>">
<script type="text/javascript" src="<?=$this->url('js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/utils.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/listtable.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/jquery.blockUI.js')?>"></script>
<script type="text/javascript">
var STATIC_BASE_URL=<?=json_encode(Yii::app()->getBaseUrl())?>;
var CODE_BASE_URL=<?=json_encode(Yii::app()->getBaseUrl()."/index.php")?>;
var LANG=<?=json_encode(Yii::app()->language)?>;
var TEST_SERVER_FLAG = <?php echo TEST_SERVER_FLAG;?>;
</script>
<script type="text/javascript" src="<?=$this->url('js/main.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/url.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/helper.js')?>"></script>
</head>
<body>
<?php echo $content; ?>
</body>
</html>