<script type="text/javascript">
$(document).ready(function(){
	$('.job-m li div').click(function(){
		$(this).next().slideToggle();
	});
});
</script>
<img src="<?php echo $this->url("images/ban-job.jpg");?>"/>
<div class="c-nav">
    <i>
        <a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
        <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
        <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
        <a href="<?php echo $this->url("About", "Jobs");?>" class="hover">人力资源</a>
        <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
        <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
    </i>
    <span>关于新世纪</span>
</div><!--c-nav-end-->
<div class="job pr">
	 <i class="tel"></i>
    <dl class="job-t fix">
        <dt>
            <h3>培训与员工发展</h3>
            <p>我们置身于瞬息万变的新经济时代,我们只有给予员工系统完整的培训,才能使员工的能力与素质不断的提高,实现个人价值的增值和个人事业的发展,成为与企业共同进步成长的人才。新世纪公司一直努力建设着利于员工发展的培训体系。
                <br/>入职培训：快速引导新员工理解企业各种规章制度、结构和体系、融入企业文化中，从而顺利进入工作角色。
                <br/>员工在职培训：在工作岗位中随时补充知识和技能的不足，及时充电。
                <br/>国内外研修：提供给公司的骨干人员到国外进行研究考察，学习国内外先进的技术及管理理念。
                <br/>员工职业生涯规划：为员工职业发展提供多种参考建议。
            </p>
            <h3>成长性薪资和福利</h3>
            <p>社会统筹养老保险、失业保险、住房公积金：为员工提供基本的养老、失业保障、住房公积金；
                 <br/>社会基本医疗保险：为员工看病就医提供基本保障；
                 <br/>带薪休假：员工可选择灵活的休假制度；
            </p>
            <h3>互动交流与沟通机制</h3>
            <p>新世纪鼓励一种坦率的、交通的、沟通的文化，新世纪认为积极地互动交流是分享经验、互相学习提高的良好方式，广泛的交流与沟通有助于培养我们的长远眼光和胆识，帮助我们开拓事业的空间。我们一直努力营造一种开放的氛围。通过内部网、人力资源员工自助系统、部门内部交流等多种形式，大家可以公开表达自己的意愿，包括与公司领导的对话和座谈。任何级别的管理人员、公司的人力资源部每一天都希望和大家交流，经常听大家的意见，藉此来不断改进我们的工作。</p>
        </dt>
        <dd><img src="<?php echo $this->url("images/i-9.jpg");?>"/><img src="<?php echo $this->url("images/i-10.jpg");?>"/><img src="<?php echo $this->url("images/i-11.jpg");?>"/></dd>
    </dl>
    <h2>人才招聘</h2>
     <ul class="job-m">

<?php foreach($job_list as $k =>$row) {?>
        <li>
            <div id="job_<?php echo $row['id'];?>" class="tit"><span class="r"><?php echo $row['expire_time']!=0?date('Y-m-d',$row['expire_time']).'截止':'';?></span><?php echo $row['title'];?></div>
            <dl id="detail_<?php echo $row['id'];?>" style="display:<?php echo $k==0?'block':'none'; ?>;">
                <dt><a class="">&nbsp;</a></dt>
                <dd>
                    <h5><i class="blue">●</i><?php echo $row['title'];?></h5>
            <?php echo "<p>招聘人数：".($row['count']==0?"若干":$row['count'])."</p>";?>
                    <p>发布日期： <?php echo date('Y-m-d',$row['publish_time']);?></p> 
            <?php if($row['location']&&$row['location']!=''){?><p>工作地点： <?php echo $row['location'];?> </p><?php } ?>
            <?php if($row['experience']&&$row['experience']!=''){?><p>工作年限： <?php echo $row['experience'];?></p><?php } ?>
            <?php if($row['education']&&$row['education']!=''){?><p>学    历： <?php echo $row['education'];?></p><?php } ?>
            <?php if($row['desc']&&$row['desc']!=''){?><p>岗位要求:</p>
                    <pre style="word-wrap:break-word;width:820px;"><?php echo $row['desc'];?></pre><?php } ?>
            <?php if($row['responsibility']&&$row['responsibility']!=''){?><p>岗位职责：</p>
                    <pre style="word-wrap:break-word;width:820px;"><?php echo $row['responsibility'];?></pre><?php } ?>
            <?php if($row['qualification']&&$row['qualification']!=''){?><h5 class="pt20"><i class="blue">●</i>任职资格</h5>
                    <pre style="word-wrap:break-word;width:820px;"><?php echo $row['qualification'];?></pre><?php } ?>
                </dd>
            </dl>
        </li>
<?php } ?>
    </ul>
</div>
