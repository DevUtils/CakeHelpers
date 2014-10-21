<?php
App::uses('Helper', 'View');

class BrDateHelper extends Helper
{
	public function fromsql($p_sql_date)
	{
		try
		{
			$temp1 = explode(' ', $p_sql_date);
			$temp2 = explode('-', $temp1[0]);
			$result = sprintf('%s/%s/%s', $temp2[2], $temp2[1], $temp2[0]);
			if (count($temp1) > 1)
			{
				$result .= ' ' .$temp1[1];
			}
			return $result;
		}
		catch(Exception $e)
		{
			return $p_sql_date;
		}
	}
}