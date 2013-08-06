<?php
class Mlinks {
	
	public static function addLinks($name,$href) {
		$dba = select_dba();
		$dba->execute("insert into links(`name`,`href`)", array(
			':name'=>$name,':href'=>$href
			));
	}

	public static function getLinksList() {
		$dba = select_dba();
		return $dba->select("select * from links order by id desc");
	}

  public static function deleteLinksById($id) {
      $dba = select_dba();
      return $dba->execute("delete from links  where id=:id", array(
                  ':id' => $id
              ));
  }

  public static function linksExist($href) {
      $dba = select_dba();
      return $dba->select("select href from links where href=:href", array(':href' => $href));
  }

  /* 更新友情链接标题 根据ID */
  public static function updateLinksNameById($id, $name) {
      $dba = select_dba();
      $res = $dba->execute("update links set name=:name where id=:id", array(
          ':name' => $name, ':id' => $id
              ));
      return $res;
  }
  /* 更新友情链接链接 根据ID */
  public static function updateLinksHrefById($id, $href) {
      $dba = select_dba();
      $res = $dba->execute("update links set href=:href where id=:id", array(
          ':href' => $href, ':id' => $id
              ));
      return $res;
  }

}

