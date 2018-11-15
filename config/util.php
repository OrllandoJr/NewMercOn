<?php
function formataData_YYYYMMDD($sData)
{
	if ((!is_null($sData)) && (trim($sData) != ""))
	{
		//Origem = dd/mm/yyyy
		$sData = substr($sData, 6, 4) . "-" . substr($sData, 3, 2) . "-" . substr($sData, 0, 2);
	}
	return $sData;
}

function formataData_DDMMYYYY($sData)
{
	if ((!is_null($sData)) && (trim($sData) != ""))
	{
		//Origem = yyyy-mm-dd
		$sData = substr($sData, 8, 2) . "/" . substr($sData, 5, 2) . "/" . substr($sData, 0, 4);
	}
	return $sData;
}
