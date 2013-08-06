<?php
/* banner 操作方法*/
class MBanner {

	/*大banner 列表*/
	public static function getBigBannerList(){
        $dba = select_dba();
        $pro = $dba->select("select * from banner where type='big' order by id asc");
        return $pro;
	}

	/*小banner列表*/
	public static function getSmallBannerList(){
        $dba = select_dba();
        $pro = $dba->select("select * from banner where type='small' order by id asc");
        return $pro;
	}

	/*新增小的banner图片*/
	public static function insertSmallBanner($name,$url,$image_url,$update_time){
        $dba = select_dba();
        return $dba->execute("insert into banner(name,type,image_url,url,update_time)
                       values(:name,:type,:image_url,:url,:update_time)", array(
                    ':name' => $name, ':type' => 'small', ':image_url' => $image_url, ':url' => $url, ':update_time' => $update_time
                ));
	}

	/*获得小banner的详细信息*/
	public static function getSmallBannerInforById($id){
        $dba = select_dba();
        $ret = $dba->select_row("select * from banner where id = :id", array(
            ':id' => $id
        ));
        return $ret;
	}

	/*更新小bannerbanner信息*/
	public static function updateSmallBannerById($id,$name,$url,$image_url,$update_time){
		$dba = select_dba();
        return $dba->execute("update banner set name=:name,url=:url,image_url=:image_url,update_time=:update_time where id=:id",array(
							':name'=>$name,':url'=>$url,':image_url'=>$image_url,':update_time'=>$update_time,':id'=>$id));
	}


    /* 判断产品名称是否存在 */
    public static function productNameExist($name) {
        $dba = select_dba();
        return $dba->select("select name from product where name=:name", array(':name' => $name));
    }


	/*根据banner ID更行banner信息 */
	public static function updateBigBannerById($id,$image_url,$url){
		$dba = select_dba();
        return $dba->execute("update banner set image_url=:image_url,url=:url where id=:id",array(
			':image_url'=>$image_url,':url'=>$url,':id'=>$id));
	}


    public static function getInfoList() {
        $dba = select_dba();
        $ret = $dba->select("select * from product_info order by id asc");
        return $ret;
    }

}
