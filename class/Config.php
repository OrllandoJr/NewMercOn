    <?php

class Config
{
	public static $ArquivoINI = "";

	public static function LerChave($NomeChave, $NomeSecao)
	{
		if(self::ValidaArquivo())
		{
			$file  = parse_ini_file(self::$ArquivoINI, true);
			$secao = $file[$NomeChave][$NomeSecao];

			if(key_exists($NomeChave, $file)) { return $secao; }
			else							  { return ""; 	   }
		}
		else
		{
			return "";
		}
	}

	private static function ValidaArquivo()
	{
		if(empty(self::$ArquivoINI))
		{
			try { throw new Exception('Informe o arquivo de Configura��o!', 0); }
			catch(Exception $e) { self::montaExcecao($e->getMessage(), $e); return false; exit; }
		}
			
		if(!file_exists(self::$ArquivoINI))
		{
			try { throw new Exception('O arquivo '. $arquivo .' n�o existe!', -1); }
			catch(Exception $e) { self::montaExcecao($e->getMessage(), $e); return false; exit; }
		}
			
		return true;
	}


	public static function setConfig()
	{
		if(self::ValidaArquivo())
		{
			$file = parse_ini_file(self::$ArquivoINI, true);
			$secao = $file['KEY_CONFIG']['key'];

			if(!key_exists($secao, $file))
			{
				try { throw new Exception('Chave informada n�o existe no arquivo de configura��o.', -2); }
				catch(Exception $e){ self::montaExcecao($e->getMessage(), $e); exit;}
			}

			return $file[$secao];
		}
		else
		{
			return null;
		}
	}

	public static function montaExcecao($mensagem, $exception)
	{
		$dir = self::BaseUrl() . '/mercon/_LogError';
		if(!is_dir($dir)) { $k = mkdir($dir); }
			
		$ret = '[' . $mensagem . ']' . chr(13)
		. $exception->getMessage() . chr(13)
		. $exception->getTraceAsString() . chr(13);
		self::gravarLog($ret);
	}

	private function gravarLog($msg)
	{
		$file = date('Ymd') . '.txt';
		$hora = date('H:i:s');
		if(!file_exists(self::BaseUrl() . '/mercon/_LogError/' . $file)){ self::createLogFile(); }
		$msg = str_repeat('=', 75) . chr(13) . $hora . ': ' . $msg . chr(13);
		error_log($msg, 3, self::BaseUrl() . '/mercon/_LogError/' . $file);
			
	}

	public static function gravarLogSQL($SQL)
	{
		$SQL = str_replace(chr(10), '', $SQL);
		$SQL = str_replace(chr(13), ' ', $SQL);
		$SQL = str_replace(chr(9), '', $SQL);
			
		$file = 'SQL_' . date('Ymd') . '.txt';
		$hora = date('H:i:s');
		if(!file_exists(self::BaseUrl() . '/mercon/_LogError/' . $file)){ self::createLogFile(); }
		$SQL = $hora . ': ' . $SQL . chr(13) . chr(13);
		error_log($SQL, 3, self::BaseUrl() . '/mercon/_LogError/' . $file);
	}

	private function createLogFile()
	{
		$file = self::BaseUrl() . '/mercon/_LogError/' . date('Ymd') . '.txt';
		$r = fopen($file, 'w+');
		fclose($r);
	}

	public static function BaseUrl()
	{
		$server  = $_SERVER["DOCUMENT_ROOT"];
		$arquivo = $_SERVER["PHP_SELF"];
		$iPos 	 = strpos($arquivo, "/", 1);
		$arquivo = substr($arquivo, 0, $iPos);
		$rInclude= $server . $arquivo;
			
		if($_SERVER["SERVER_NAME"] == "localhost"){ return $rInclude; }
		else									  {	return $server;   }
	}

	public static function htmlLink($url)
	{
		$base = $_SERVER["REQUEST_URI"];
		$base = ( substr($base, strlen($base) - 1, 1) == "/" ) ? $base : $base . "/";
		return $base . $url;
	}
	
	
}

?>