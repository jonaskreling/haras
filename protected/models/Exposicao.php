<?php

class Exposicao extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Imagemexposicao'=>array(self::HAS_MANY, 'Imagemexposicao', 'exposicao'),
		);
	}

}

?>