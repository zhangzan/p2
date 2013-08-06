<?php
class MMedia {

    public static function uploadFile($type, $filename, $title, $desc, $thumbnail,$content_type, $level, $show, $theme) {
    	$dba = select_dba();
    	$affected_rows = $dba->execute("insert into media(type,filename,title,`desc`,thumbnail,content_type,level,`show`,theme,record_time) values(:type,:filename,:title,:desc,:thumbnail,:content_type,:level,:show,:theme,:record_time)", array(
			":type" => $type,
			":filename" => $filename,
			":title" => $title,
			":desc" => $desc,
			":thumbnail" => $thumbnail,
			':content_type' =>$content_type,
			":level" => $level,
			":show" => $show,
			":theme" => $theme,
			":record_time" => getTime(),
    	));
    	if ($affected_rows != 1) {
    		return false;
    	}
    	return true;
    }

    public static function getShowMediaList() {
    	$dba = select_dba();
    	$ret = $dba->select("select * from media where `show`=1 and type in(1,2) order by record_time desc");
    	return $ret;
    }

    public static function getAllMediaList($mtype) {
    	if($mtype==1){
    		$show = 0;
    	}else{
    		$show = 1;
    	}
    	$dba = select_dba();
    	$count_row = $dba->select_one("select count(*) from `media` where `show`=:show",array(':show'=>$show));
		$criteria = new CDbCriteria ();
		$pages = new CPagination ( $count_row );
		$pages-> pageSize = 20;
		$pages-> applyLimit ( $criteria );
		$offset = $pages-> currentPage * $pages-> pageSize;
    	$ret = $dba->select("select * from media where `show`=:show order by record_time desc limit {$offset},{$pages->pageSize}",array(':show'=>$show));
    	return array($ret, $pages, $count_row);
    }

    public static function getMediaById($id) {
    	$dba = select_dba();
    	$ret = $dba->select_row("select * from media where id=:id", array(
    		':id' => $id
    	));
    	return $ret;
    }

    public static function deleteMediaById($id) {
		$dba = select_dba();
    	$dba->execute("delete from media where id=:id limit 1", array(
    		':id' => $id
    	));
    	return true;
    }

    public static function calcXmlFile() {
    	$file_list = self::getShowMediaList();
		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<thumbnails>\n";
		foreach ($file_list as $row) {
			$xml .= "\t<thumbnail ";
			$xml .= "filename=\"../../../upload/files/" . $row['filename'] . "\" url=\"\" target=\"_blank\"\n";
			$xml .= "\t\ttitle=\"" . ($row['title']!='' ? $row['title'] : $row['filename']) . "\" ";
			$xml .= "icon=\"../../../thumbnails/" . ($row['thumbnail']!='' ? $row['thumbnail'] : 'default.jpg') . "\" ";
			$xml .= "type1=\"" . $row['theme'] . "\" type2=\"" . $row['type'] . "\"\n";
			$xml .= "\t\tdescription=\"" . $row['desc'] . "\" />\n";
		}
		$xml .= "</thumbnails>";
		file_put_contents(dirname(__FILE__) . "/../../xml/thumbnail_list.xml", $xml);
    }

    public static function getMediaListByDealer($dealer_login_id) {
    	$dba = select_dba();
		$dealer_login = $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $dealer_login_id
		));
		$ret = $dba->select("select * from media where `show`=0 and level like '%" . $dealer_login['level'] . "%' order by record_time desc");
		return $ret;
    }

    public static function checkCanDownload($dealer_login_id, $id) {
    	$dba = select_dba();
		$dealer_login = $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $dealer_login_id
		));
		$ret = $dba->select_row("select * from media where level like '%" . $dealer_login['level'] . "%' and id=:id", array(
			':id' => $id
		));
		if ($ret) {
			return $ret;
		} else {
			return false;
		}
    }

    public static function getThemeList(){
        $dba = select_dba();
        return $dba->select("select * from search_type order by id desc");
    }
    public static function addTheme($theme){
        $dba = select_dba();
        $dba->execute("insert into search_type(title)values(:title)",array(':title'=>$theme));
    }
    public static function delThemeById($id){
        $dba = select_dba();
        $dba->execute("delete from search_type where id=:id",array(':id'=>$id));
    }
    public static function getDvList(){
        $dba = select_dba();
        return $dba->select("select * from video order by id desc");
    }
    public static function getDvByPage($page) {
        $dba = select_dba();
        return $dba->select("select * from video where page=:page order by id desc",array(':page'=>$page));
    }
    public static function getDvById($id) {
        $dba = select_dba();
        return $dba->select_row("select * from video where id=:id",array(':id'=>$id));
    }
    public static function addDv($page, $file, $title){
        $dba = select_dba();
        $dba->execute("insert into video(title,file,page)values(:title,:file,:page)",array(
            ':title' => $title, ':file' => $file, ':page' => $page
        ));
    }
    public static function updateDvById($id, $page, $file, $title){
        $dba = select_dba();
        if($file != false){
            $dba->execute("update video set title=:title,file=:file,page=:page where id=:id",array(
                ':title' => $title, ':file' => $file, ':page' => $page, ':id'=>$id
            ));
        }else{
            $dba->execute("update video set title=:title,page=:page where id=:id",array(
                ':title' => $title, ':page' => $page, ':id'=>$id
            ));
        }
    }
    public static function delDvById($id){
        $dba = select_dba();
        $ret = self::getDvById($id);
        $dba->execute("delete from video where id=:id",array(':id'=>$id));
        return $ret;
    }
}