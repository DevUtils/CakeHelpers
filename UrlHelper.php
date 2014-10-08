<?php
App::uses('Helper', 'View');

class UrlHelper extends Helper
{
	public function here($p_compare = null)
	{
		if (empty($p_compare))
		{
			return trim($this->request->here, '/');
		}
		$temp1 = strtolower(trim($this->request->here, '/'));
		$temp2 = strtolower(trim($p_compare, '/'));
		return ($temp1 == $temp2);
	}

	public function slug()
	{
		$url = trim($this->request->url, '/');
		$result = str_replace('/', '-', $url);
		return $result;
	}

	public function url($p_url)
	{
		return Router::url($p_url, true);
	}

	public function nocache($p_url)
	{
		$nc = chr(mt_rand(65,90)) . chr(mt_rand(65,90)) . mt_rand(1000, 9999);
		return Router::url($p_url . '?nc=' . $nc, true);
	}

	public function version($p_url, $p_version)
	{
		return Router::url($p_url . '?v=' . $p_version, true);
	}
}