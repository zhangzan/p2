<?php

class MNews {
	public static function getNewsList() {
		$dba = select_dba();
		$ret = $dba->select("select * from news where type=1 and status=1 order by publish_time desc,id desc");
		foreach ($ret as &$row) {
			if (!$row['img']) {
				$row['img'] = false;
			} else {
                if(strpos($row['img'], '/')===false){
                    $row['img'] = 'img/news/' . $row['img'];
                }
			}
			$row['content'] = str_replace("\n", "<br />", str_replace(" ", "&nbsp;", $row['content']));
		}
		return $ret;
	}

	/*后台获得新闻所有列表*/
	public static function getAllNewsList() {
		$dba = select_dba();
		$arr = $dba->select("select * from news order by id desc");
		return $arr;
	}




    public static function getNewsListByTime($time) {
        $start_time = $time . "-1-1";
        $end_time = (intval($time) + 1) . "-1-1";
        $dba = select_dba();
        $ret = $dba->select("select * from news where status=1 and publish_time >= :start_time and publish_time < :end_time order by publish_time desc", array(
            ':start_time' => getTime($start_time), ':end_time' => getTime($end_time)
                ));
        foreach ($ret as &$row) {
            if (!$row['img']) {
                $row['img'] = false;
            } else {
                if(strpos($row['img'], '/')===false){
                    $row['img'] = 'img/news/' . $row['img'];
                }
            }
            $row['content'] = str_replace("\n", "<br />", str_replace(" ", "&nbsp;", $row['content']));
        }
        return $ret;
    }

    public static function getTopNewsList() {
        $dba = select_dba();
        $ret = $dba->select("select * from news where type=2 and status=1 order by publish_time desc,id desc limit 5");
        foreach ($ret as &$row) {
            if (!$row['img']) {
                $row['img'] = false;
            } else {
                if(strpos($row['img'], '/')===false){
                    $row['img'] = 'img/news/' . $row['img'];
                }
            }
            $row['content'] = str_replace("\n", "<br />", str_replace(" ", "&nbsp;", $row['content']));
        }
        return $ret;
    }

    public static function getTopNewsListByTime($time) {
        $start_time = $time . "-1-1";
        $end_time = (intval($time) + 1) . "-1-1";
        $dba = select_dba();
        $ret = $dba->select("select * from news where type=2 and status=1 and publish_time >= :start_time and publish_time < :end_time order by publish_time desc", array(
            ':start_time' => getTime($start_time), ':end_time' => getTime($end_time)
                ));
        foreach ($ret as &$row) {
            if (!$row['img']) {
                $row['img'] = false;
            } else {
                if(strpos($row['img'], '/')===false){
                    $row['img'] = 'img/news/' . $row['img'];
                }
            }
            $row['content'] = str_replace("\n", "<br />", str_replace(" ", "&nbsp;", $row['content']));
        }
        return $ret;
    }

    /* 根据新闻ID获得新闻的详情 */

    public static function getNewsinfoById($id) {
        $dba = select_dba();
        $res = $dba->select("select * from news where id=:id", array(':id' => $id));
        if (!empty($res)) {
            return $res[0];
        } else {
            return array();
        }
    }

    /* 获得新闻的类别列表 */

    public static function getNewsClassList() {
        $dba = select_dba();
        $arr = $dba->select("select * from category where model='news' order by id desc");
        return $arr;
    }

    /* 增加新闻的类别 */

    public static function addNewsClass($name, $model) {
        $dba = select_dba();
        return $dba->execute("insert into category(name,model)
                       values(:name,:model)", array(
                    ':name' => $name, ':model' => $model
                ));
    }

    /* 判断一个新闻类别是否存在 */

    public static function newsClassExist($name, $model) {
        $dba = select_dba();
        $arr = $dba->select("select * from category where model='" . $model . "' and name='" . $name . "'");
        if (!empty($arr)) {
            return true;
        } else {
            return false;
        }
    }

    /* 根据类别ID删除类别信息 */

    public static function deleteNewsClassById($id) {
        $dba = select_dba();
        return $dba->execute("delete from category  where id=:id", array(
                    ':id' => $id
                ));
    }

    /* 根据类别ID更新类别信息 */

    public static function updateNewsClassById($id, $name, $model) {
        $dba = select_dba();
        $arr = $dba->execute("update category set name=:name,model=:model where id=:id", array(
            ':name' => $name, ':model' => $model, ':id' => $id
                ));

        return $arr;
    }

    /* 增加新闻 */

    public static function addNews($title, $type, $status, $img, $content) {
        $dba = select_dba();
        return $dba->execute("insert into news(title,type,status,img,content,publish_time)values(:title,:type,:status,:img,:content,:publish_time)", array(
                    ':title' => $title, ':type' => $type, ':status' => $status, ':img' => $img, ':content' => $content,':publish_time'=>getTime()
                ));
    }

    /* 根据新闻ID更改新闻信息 */

    public static function updateNewsById($id, $title, $type, $status, $img, $content) {
        $dba = select_dba();
        $res = $dba->execute("update news set title=:title,type=:type,status=:status,img=:img,content=:content where id=:id", array(
            ':title' => $title, ':type' => $type, ':status' => $status, ':img' => $img, ':content' => $content, ':id' => $id
                ));
        return $res;
    }

    /* 判断新闻标题是否存在 */

    public static function newsExist($title) {
        $dba = select_dba();
        return $dba->select("select title from news where title=:title", array(':title' => $title));
    }

    /* 更新新闻标题 根据ID */

    public static function updateNewsTitleById($id, $title) {
        $dba = select_dba();
        $res = $dba->execute("update news set title=:title where id=:id", array(
            ':title' => $title, ':id' => $id
                ));
        return $res;
    }

    /* 根据新闻ID删除信息 */

    public static function deleteNewsById($id) {
        $dba = select_dba();
        return $dba->execute("delete from news  where id=:id", array(
                    ':id' => $id
                ));
    }

    /* 根据类别ID，获取该类别下的文章信息 */

    public static function getNewsByClassId($class) {
        $dba = select_dba();
        return $dba->select("select * from news where type=:type", array(':type' => $class));
    }

    public static function getYearList() {
        $dba = select_dba();
        $ret = $dba->select("SELECT distinct YEAR(from_unixtime(publish_time)) as `year` FROM `news` order by `year` desc");
        $new_ret = array();
        foreach ($ret as $row) {
            if ($row['year'] == 1970) {
                continue;
            }
            $new_ret[] = $row['year'];
        }
        return $new_ret;
    }
    
	public static function getNewsTitleList() {
		$dba = select_dba();
		$ret = $dba->select("select id,title from news where type=1 and status=1 order by publish_time desc,id desc limit 5");
		return $ret;
	}
}
