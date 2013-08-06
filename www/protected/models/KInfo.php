<?php
final class KInfo {

	private function __construct() {

	}

	private static function t($file, $key) {

		$msg = Yii::t ( $file, $key );
		if ($msg == $key) {
			echo $file . '-' . $key;
		}
		return trim ( $msg );
	}

}