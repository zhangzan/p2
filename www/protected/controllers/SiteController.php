<?php

class SiteController extends Controller {
	public function actionMaintance(){
		$this->renderPartial('maintance');
	}
    public function actionError()
	{
		$this->renderPartial('error');
    }
    public function actionIndex()
    {
        //do nothing for console
    }
}