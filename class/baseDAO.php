<?php
	
	abstract class baseDAO
	{
		private $__Type = "mysql";
		private $__connection;
		
		public function __construct()
		{
			$this->__connectToDB(DB_USER, DB_PASS, DB_HOST, DB_DATABASE);
			Config::$ArquivoINI = Config::BaseUrl() . "/config/config.ini";
		}
		
		private function __connectToDB($user, $pass, $host, $database)
		{
			try {
				$this->__connection = instanciaDB::getInstancia();
			}
			catch(Exception $e)
			{
				Config::montaExcecao('Não foi possível conectar ao banco de dados.', $e);
				exit;
			}
		}
		
		protected function select($arr_campos=NULL, $arr_where=NULL, $arr_order=NULL)
		{
			$aux_arr = array();
			
			if( gettype($arr_where) == 'integer' ) { $arr_where = array($this->_primaryKey => $arr_where); }
			
			/*
			if(!is_null($arr_where))
			{
				//echo $this->_tabela . " " . gettype($arr_where) . "<br />";
				foreach($arr_where as $coluna => $valor) 
				{ 
					if($valor == 'NULL') 					{ $aux_arr[] = "{$coluna} IS NULL"; }
					elseif( gettype($valor) == 'integer' ) 	{ $aux_arr[] = "{$coluna} = {$valor}"; }
					elseif(strrpos($valor, "%") >= 0) 		{ $aux_arr[] = "upper({$coluna}) LIKE upper('{$valor}')"; } 
					else 									{ $aux_arr[] = "{$coluna} = '{$valor}'"; }
				}
				
				$arr_where = $aux_arr;
			}
			*/
			
			$campos = is_null($arr_campos) ? " * " : implode(', ', $arr_campos);
			$where	= is_null($arr_where) ? "" : " WHERE " . implode(" AND ", $this->where($arr_where));
			$order	= is_null($arr_order) ? "" : " ORDER BY " . implode(",", $arr_order);
			
			$SQL = "SELECT {$campos} FROM " . DB_DATABASE . ".{$this->_tabela} {$where} {$order}";		
			
			$ini = microtime(true);
			$result = $this->__connection->_DB->query($SQL);
			$end = microtime(true);
			
			if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($SQL . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
			
			if(!$result)
			{
				$info = $this->__connection->_DB->errorInfo();
				try	{ throw new Exception($info[2]); }
				catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instrução: ' . $SQL, $e ); }
				return -1;
			}
			else
			{
				return $result->fetchAll();
			}

		}
		
		protected function insert($arr_campos)
		{
			foreach ($arr_campos as $coluna => $valor)
			{
				$colunas[] = $coluna;
				if($valor == 'NULL' || $valor == "")
				{
					$valores[] = "NULL"; 
				}
				else if(gettype($valor) == 'integer')
				{
					$valores[] = "" . $valor . "";
				}
				else
				{
					$valores[] = "'" .  $valor . "'"; 
				}
			}
			
			$coluna = implode(", ", $colunas);
			$valor	= implode(", ", $valores);
			$SQL = "INSERT INTO " . DB_DATABASE . ".{$this->_tabela} ({$coluna}) VALUES ({$valor})";
			
			$ini = microtime(true);
			$result = $this->__connection->_DB->query($SQL);
			$end = microtime(true);
			
			if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($SQL . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
			
			if(!$result)
			{
				$info = $this->__connection->_DB->errorInfo();
				try	{ throw new Exception($info[2]); }
				catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instru��o: ' . $SQL, $e ); }
				return -1;
			}
			else
			{
			    $R = $this->select(array("LAST_INSERT_ID()"));
				return $R[0][0];
				unset($R);
			}
		}
		
		protected function update($arr_campos, $arr_where=NULL)
		{
			//Tratamento para os campos de atualiza��o
			foreach($arr_campos as $coluna => $valor) {
				if($valor== 'NULL' || $valor == "")
				{
					$atualiza[] = "{$coluna} = NULL";
				} 
				elseif(gettype($valor) == 'integer')
				{
					$atualiza[] = "{$coluna} = {$valor}";
				}
				else
				{
					$atualiza[] = "{$coluna} = '{$valor}'"; 
				}
			}
			$coluna_set = implode(", ", $atualiza);
			
			//Tratamento para a clausula WHERE
			if(!is_null($arr_where))
			{
				if(is_numeric($arr_where) )
				{
					$where_set = " WHERE " . $this->_primaryKey . " = " . $arr_where;
				}
				else
				{
					foreach($arr_where as $coluna => $valor) { $where[] = "{$coluna} = '{$valor}'"; }
					$where_set = " WHERE " . implode(" AND ", $where);
					//$where_set = " WHERE " . $this->where($arr_where);
				} 
			}
			
			$SQL = "UPDATE " . DB_DATABASE . ".{$this->_tabela} SET {$coluna_set} {$where_set} " ;
			
			$ini = microtime(true);
			$result = $this->__connection->_DB->query($SQL);
			$end = microtime(true);
			
			if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($SQL . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
			
			if(!$result) { 
				$info = $this->__connection->_DB->errorInfo();
				try	{ throw new Exception($info[2]); }
				catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instru��o: ' . $SQL, $e ); }
				return -1; 
			}
			else { return 1; }
			
		}
		
		protected function delete($arr_where)
		{
			if(is_numeric($arr_where) )
			{
				$where_set = " WHERE " . $this->_primaryKey . " = " . $arr_where;
			}
			else
			{
				foreach($arr_where as $coluna => $valor) {
					 if($valor == "IS NULL")
					 {
						$where[] = "{$coluna} IS NULL";
					 }
					 else
					 {
					 	$where[] = "{$coluna} = '{$valor}'";
					 } 
				}
				$where_set = " WHERE " . implode(", ", $where);
			}
			
			$SQL = "DELETE FROM " . DB_DATABASE . ".{$this->_tabela} {$where_set} " ;
			$ini = microtime(true);
			$result = $this->__connection->_DB->query($SQL);
			$end = microtime(true);
			
			if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($SQL . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
			
			if(!$result) { 
				$info = $this->__connection->_DB->errorInfo();
				try	{ throw new Exception($info[2]); }
				catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instru��o: ' . $SQL, $e ); }
				return -1; 
			}
			else { return 1; }
			
		}
		
		protected function where($arr)
		{
			$aux_arr = array();

			if(!is_null($arr))
			{
				foreach($arr as $coluna => $valor)
				{
					if($valor == 'NULL') 					{ $aux_arr[] = "{$coluna} IS NULL"; }
					elseif( gettype($valor) == 'integer' ) 	{ $aux_arr[] = "{$coluna} = {$valor}"; }
					elseif(gettype($valor) == 'array')		{ $aux_arr[] = "{$coluna} IN (" . implode(",", $valor) . ")"; }
					elseif(strrpos($valor, "%") > 0) 		{ $aux_arr[] = "upper({$coluna}) LIKE upper('{$valor}')"; }
					else 									{ $aux_arr[] = "{$coluna} = '{$valor}'"; }
				}
			}
			
			return $aux_arr;
		}
		
		protected function consulta($sql)
		{
			if($sql != "")
			{
				$ini = microtime(true);
				$result = $this->__connection->_DB->query($sql);
				$end = microtime(true);
				
				if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($sql . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
				
				if(!$result) { 
					$info = $this->__connection->_DB->errorInfo();
					try	{ throw new Exception($info[2]); }
					catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instru��o: ' . $sql, $e ); }
					return -1; 
				}
				else { return $result->fetchAll(); }
			}
			else
			{
				return -2;
			}
		}
		
		protected function execute($sql)
		{
		    if($sql != "")
		    {
		    	$ini = microtime(true);
				$result = $this->__connection->_DB->query($sql);
				$end = microtime(true);
				
				if((bool)Config::LerChave("DEBUG_SQL", "active")) { Config::gravarLogSQL($sql . '( ' . number_format( ($end - $ini), 4 ) . 's)' ); }
				
				if(!$result) { 
					$info = $this->__connection->_DB->errorInfo();
					try	{ throw new Exception($info[2]); }
					catch( Exception $e ) { Config::montaExcecao('Erro ao Executar a Instrução: ' . $sql, $e ); }
					return -1; 
				}
				else { return $result->fetchAll(); }
		    }
		    else
		    {
		        return -2;
		    }
		}
	}

?>