<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>上海新世纪机器人有限公司</title>
<script type="text/javascript" src="<?php echo $this->url('js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
var CODE_BASE_URL=<?php echo json_encode(Yii::app()->getBaseUrl()."/index.php"); ?>;
var STATIC_BASE_URL=<?php echo json_encode(Yii::app()->getBaseUrl()); ?>;
var LANG=<?php echo json_encode(Yii::app()->language); ?>;
var STIME=<?php echo json_encode(getTime());?>;
var CTIME=new Date().getTime();
var TEST_SERVER_FLAG = <?php echo TEST_SERVER_FLAG;?>;
</script>
</head>
<body style="margin: 0 auto 0 auto;padding: 0;width: 1000px;height:1030px;color: #888889;box-shadow: 4px 0px 13px 2px;">
    <div style="padding-top:20px;">
        <script>
          (function() {
            var cx = '013005098599441564814:zquivq6odhk';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https' ? 'https:' : 'http:') +
                '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
          })();
        </script>
        <!--div style="width:500px;padding-top:30px;margin-left:30px;"><gcse:searchbox-only></gcse:searchbox-only></div-->
        <gcse:search></gcse:search>
    </div>
    </body>
</html>