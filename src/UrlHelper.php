<?php
App::uses('Helper', 'View');

class UrlHelper extends Helper
{
	public $helpers = array('Html');

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
		$result = (empty($result)) ? 'home' : $result;
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

	public function add($p_url_add)
	{
		$url = '/' . $this->here() . '/' . $p_url_add;
		$result = Router::url($url, true);
		return $result;
	}

	public function count($p_quant = null)
	{
		$url = $this->here();
		if ($p_quant == null)
		{
			return count(explode('/', $url));
		}
		else
		{
			return count(explode('/', $url)) == $p_quant;
		}
	}

	public function has($p_section)
	{
		$url = $this->here();
		$url = strtolower($url);
		$array = explode('/', $url);

		if (is_string($p_section))
		{
			$locate = strtolower($p_section);
			return in_array($locate, $array);
		}

		if (is_array($p_section))
		{
			foreach ($p_section as $key => $section)
			{
				$locate = strtolower($section);
				if (in_array($locate, $array))
				{
					return true;
				}
			}
			return false;
		}
	}

	public function getFirstLevel()
	{
		$url = $this->here();
		$array = explode('/', $url);
		if (!empty($array[0]))
		{
			return $array[0];
		}
		return '';
	}

	public function auto_javascript($p_base)
	{
		App::uses('Folder', 'Utility');
		$url = $this->here();
		$url = strtolower($url);
		$array = explode('/', $url);
		While(count($array) > 3)
		{
			unset($array[count($array)-1]);
		}
		$url = implode('/', $array);
		$url = str_replace('/', '-', $url);
		$url = str_replace('_', '-', $url);
		$base = trim($p_base, '/');
		$filename = $base . '/' . $url . '.js';
		if (file_exists($filename))
		{
			echo $this->Html->script('/' . $filename, array('fullBase' => true));
		}
		else
		{
			debug($filename);
		}
	}
}