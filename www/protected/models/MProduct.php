<?php
class MProduct {


	/* 增加新产品 */
	public static function addProduct($name,$category,$product_image,$product_description,$tedian1,$tedian1_desc,$tedian2,$tedian2_desc,$tedian3,$tedian3_desc,$tedian4,$tedian4_desc,$tedian5,$tedian5_desc,$tedian6,$tedian6_desc,$xijie1,$xijie2,$xijie3,$xijie4,$xijie5,$xijie6,$add_time){
       $dba=  select_dba();
	   return  $dba->execute("insert into product(name,category,product_image,product_description,tedian1,tedian1_desc,tedian2,tedian2_desc,tedian3,tedian3_desc,tedian4,tedian4_desc,tedian5,tedian5_desc,tedian6,tedian6_desc,xijie1,xijie2,xijie3,xijie4,xijie5,xijie6,add_time)
                       values(:name,:category,:product_image,:product_description,:tedian1,:tedian1_desc,:tedian2,:tedian2_desc,:tedian3,:tedian3_desc,:tedian4,:tedian4_desc,:tedian5,:tedian5_desc,:tedian6,:tedian6_desc,:xijie1,:xijie2,:xijie3,:xijie4,:xijie5,:xijie6,:add_time)", array(
               	':name'=>$name,'' .
               	':category'=>$category,
				':product_image'=>$product_image,
				':product_description'=>$product_description,
				':tedian1'=>$tedian1,':tedian1_desc' => $tedian1_desc,
				':tedian2'=>$tedian2,':tedian2_desc' => $tedian2_desc,
				':tedian3'=>$tedian3,':tedian3_desc' => $tedian3_desc,
				':tedian4'=>$tedian4,':tedian4_desc' => $tedian4_desc,
				':tedian5'=>$tedian5,':tedian5_desc' => $tedian5_desc,
				':tedian6'=>$tedian6,':tedian6_desc' => $tedian6_desc,
				':xijie1' => $xijie1,
				':xijie2' => $xijie2,
				':xijie3' => $xijie3,
				':xijie4' => $xijie4,
				':xijie5' => $xijie5,
				':xijie6' => $xijie6,
				'add_time'=>$add_time
		));
	}



	/*产品列表*/
	public static function getProductList(){
        $dba = select_dba();
        $pro = $dba->select("select * from product order by id desc");
        return $pro;
	}

    /* 判断产品名称是否存在 */
    public static function productNameExist($name) {
        $dba = select_dba();
        return $dba->select("select name from product where name=:name", array(':name' => $name));
    }


	/*根据产品ID更新产品信息 */
	public static function eidtProductById($product_id,$name,$category,$product_image,$product_description,$tedian1,$tedian1_desc,$tedian2,$tedian2_desc,$tedian3,$tedian3_desc,$tedian4,$tedian4_desc,$tedian5,$tedian5_desc,$tedian6,$tedian6_desc,$xijie1,$xijie2,$xijie3,$xijie4,$xijie5,$xijie6){
		$dba = select_dba();
        return $dba->execute("update product set name=:name,category=:category,product_image=:product_image,product_description=:product_description," .
        				"tedian1=:tedian1,tedian1_desc=:tedian1_desc,tedian2=:tedian2,tedian2_desc=:tedian2_desc,tedian3=:tedian3,tedian3_desc=:tedian3_desc," .
        				"tedian4=:tedian4,tedian4_desc=:tedian4_desc,tedian5=:tedian5,tedian5_desc=:tedian5_desc,tedian6=:tedian6,tedian6_desc=:tedian6_desc," .
        				"xijie1=:xijie1,xijie2=:xijie2,xijie3=:xijie3,xijie4=:xijie4,xijie5=:xijie5,xijie6=:xijie6 where id=:id",array(
        					':name'=>$name,':category'=>$category,':product_image'=>$product_image,':product_description'=>$product_description,
        					':tedian1'=>$tedian1,':tedian1_desc'=>$tedian1_desc,
        					':tedian2'=>$tedian2,':tedian2_desc'=>$tedian2_desc,
        					':tedian3'=>$tedian3,':tedian3_desc'=>$tedian3_desc,
        					':tedian4'=>$tedian4,':tedian4_desc'=>$tedian4_desc,
        					':tedian5'=>$tedian5,':tedian5_desc'=>$tedian5_desc,
        					':tedian6'=>$tedian6,':tedian6_desc'=>$tedian6_desc,
        					':xijie1'=>$xijie1,
        					':xijie2'=>$xijie2,
        					':xijie3'=>$xijie3,
        					':xijie4'=>$xijie4,
        					':xijie5'=>$xijie5,
        					':xijie6'=>$xijie6,
        					':id'=>$product_id
        				));
	}

    /*根据产品ID获得产品的信息*/
    public static function getInfoById($id) {
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_info where id = :id", array(
            ':id' => $id
        ));
        return $ret;
    }

    public static function getInfoList() {
        $dba = select_dba();
        $ret = $dba->select("select * from product_info order by id asc");
        return $ret;
    }

    public static function updateInfoById($id, $name, $main_info, $title1, $info1, $title2, $info2, $title3, $info3, $title4, $info4, $title5, $info5, $title6, $info6, $status) {
        $dba = select_dba();
        $ret = $dba->execute("update product_info set name=:name,main_info=:main_info,title1=:title1,info1=:info1,title2=:title2,info2=:info2,title3=:title3,info3=:info3,
            title4=:title4,info4=:info4,title5=:title5,info5=:info5,title6=:title6,info6=:info6,`status`=:status where id=:id",array(
            ':id' => $id, 
            ':name' => $name, 
            ':main_info' => $main_info, 
            ':title1' => $title1, 
            ':info1' => $info1, 
            ':title2' => $title2, 
            ':info2' => $info2, 
            ':title3' => $title3, 
            ':info3' => $info3, 
            ':title4' => $title4, 
            ':info4' => $info4, 
            ':title5' => $title5, 
            ':info5' => $info5, 
            ':title6' => $title6, 
            ':info6' => $info6,
            ':status' =>$status
        ));
    }

    public static function uploadProductFile($product_id, $filename) {
        $dba = select_dba();
        $dba->execute("insert into product_download(filename,product_id)values(:filename,:product_id)",array(
            ':filename' => $filename, ':product_id' => $product_id
            ));
    }

    public static function getAllFileList(){
        $dba = select_dba();
        return $dba->select("select * from product_download order by product_id asc");
    }
    public static function delProductFileById($id){
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_download where id=:id",array(':id'=>$id));
        $dba->execute("delete from product_download where id=:id",array(':id'=>$id));
        return $ret['filename'];
    }
    public static function getFileListByProduct($pid){
        $dba = select_dba();
        return $dba->select("select * from product_download where product_id=:product_id order by id asc",array(':product_id'=>$pid));
    }

    public static function getAllPartList() {
        $dba=select_dba();
        return $dba->select("select * from custom_part order by id desc");
    }

    public static function addPart($name, $type, $price, $thumbnail_name, $img_name){
        $dba=select_dba();
        $dba->execute("insert into custom_part(type,thumbnail,img,name,price,record_time)values(:type,:thumbnail,:img,:name,:price,:record_time)",array(
            ":type"=>$type,":thumbnail"=>$thumbnail_name,":img"=>$img_name,":name"=>$name,":price"=>$price,":record_time"=>getTime()
        ));
    }
    public static function delPartById($id) {
        $dba=select_dba();
        $ret = $dba->select_row("select * from custom_part where id=:id",array(':id'=>$id));
        $dba->execute("delete from custom_part where id=:id",array(':id'=>$id));
        $upload_dir = dirname(__FILE__) . "/../../upload/part/";
        @unlink($upload_dir . $ret['thumbnail']);
        @unlink($upload_dir . $ret['img']);
    }

    public static function addPic($type, $pos, $filename){
        $dba = select_dba();
        $dba->execute("insert into product_pic(type,filename)values(:type,:filename)",array(
            ':type' => $type, ':filename' => $filename
        ));
    }

    public static function getAllPicList(){
        return select_dba()->select("select * from product_pic order by type asc, pos asc");
    }

    public static function getPicListByType($type){
        return select_dba()->select("select * from product_pic where type=:type order by pos asc",array(
            ':type' => $type
        ));
    }

    public static function getPicByTypeAndPos($type, $pos) {
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_pic where type=:type and pos=:pos", array(
            ':type' => $type, ':pos' => $pos
        ));
        return $ret;
    }

    public static function changePicById($filename){
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_pic where id=:id", array(
            ':id' => $id
        ));
        $dba->execute("update product_pic set filename=:filename where id=:id", array(
            ':id' => $id, ':filename' => $filename
        ));
        return $ret['filename'];
    }

    public static function changePicByTypeAndPos($type, $pos, $filename) {
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_pic where type=:type and pos=:pos", array(
            ':type' => $type, ':pos' => $pos
        ));
        $dba->execute("update product_pic set filename=:filename where type=:type and pos=:pos", array(
            ':type' => $type, ':pos' => $pos, ':filename' => $filename
        ));
        return $ret['filename'];
    }

    public static function delPicById($id){
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_pic where id=:id", array(
            ':id' => $id
        ));
        $dba->execute("delete from product_pic where id=:id", array(
            ':id' => $id
        ));
        return $ret;
    }

    public static function getProListByType($type) {
        $dba = select_dba();
        return $dba->select("select * from product_list where type=:type order by id asc", array(':type' => $type));
    }

    public static function addProductList($type, $title, $text, $img) {
        $dba = select_dba();
        $dba->execute("insert into product_list(type,title,text,img,record_time)values(:type,:title,:text,:img,:record_time)",array(
            ':type' => $type,
            ':title' => $title,
            ':text' => $text,
            ':img' => $img,
            ':record_time' => time()
            ));
    }

    public static function delProductListById($id){
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_list where id=:id",array(':id'=>$id));
        $dba->execute("delete from product_list where id=:id",array(':id'=>$id));
        return $ret['img'];
    }
    
    public static function getProApplyByType($type, $admin = false) {
        $dba = select_dba();
        $ret = $dba->select_row("select * from product_apply where type=:type order by id desc", array(':type' => $type));
        if (!$admin && $ret) {
            $ret['text'] = str_replace(" ", "&nbsp;", str_replace("\n", "<br>", $ret['text']));
        }
        return $ret;
    }
    public static function EditProductApply($type, $title, $text, $img) {
        $dba = select_dba();
        if ($img) {
            $ret = $dba->select_row("select * from product_apply where type=:type",array(':type'=>$type));
            $dba->execute("insert into product_apply(type,title,text,img,record_time)values(:type,:title,:text,:img,:record_time)
            on duplicate key update title=:title,text=:text,img=:img",array(
                ':type' => $type,
                ':title' => $title,
                ':text' => $text,
                ':img' => $img,
                ':record_time' => time()
                ));
            if ($ret && $ret['img']) {
                @unlink(dirname(__FILE__) . "/../../" . $ret['img']);
            }
        } else {
            $dba->execute("insert into product_apply(type,title,text,record_time)values(:type,:title,:text,:record_time)
            on duplicate key update title=:title,text=:text",array(
                ':type' => $type,
                ':title' => $title,
                ':text' => $text,
                ':record_time' => time()
                ));
        }
    }

}
