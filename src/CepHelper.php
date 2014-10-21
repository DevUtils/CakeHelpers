<?php
App::uses('Helper', 'View');

class CepHelper extends Helper {

	public $helpers = array('Mask');

	public function mask($cep)
	{
		$value = sprintf('%08s', $cep);
		return $this->Mask->mask($value, '#####-###');
	}
}