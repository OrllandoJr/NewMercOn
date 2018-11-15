<?php

$__inc_menu = "";
$__inc_redirect_url = "";
$__inc_breadline = "";

/* FUNÇÕES DE VALIDAÇÃO DA ROTA */
function montarBreadCrumb($sCaminho) {
	$s = "";
	$a = explode ( "|", $sCaminho );
	$l = "";

	if (count ( $a ) > 1) {
		for($i = 0; $i < count ( $a ) - 1; $i ++) {
			$l .= "/" . strtolower ( $a [$i] );
			
			$l = str_replace("ç", "c", $l);
			$l = str_replace("ã", "a", $l);
			$l = str_replace(" ", "-", $l);
			
			$s .= "<li><a href=\"{$l}\">{$a[$i]}</a> <span class=\"divider\">></span></li>";
		}

		$s .= "<li class=\"active\">{$a[count($a) -1]}</li>";
	} else {
		$s = "<li class=\"active\">{$a[0]}</li>";
	}

	return $s;
}

function validarRota() {

	global $aRoute, $__inc_menu, $__inc_redirect_url, $__inc_breadline, $__inc_fullView;
	
	$__request_uri = (isset($_SERVER ['REDIRECT_URL'])) ? $_SERVER ['REDIRECT_URL'] : "";
	
	$__inc_fullView = ' page-navigation-toggled ';
	
	//$__request_uri = "sistema/associado";
	
	//$__request_uri = (isset($_SERVER ['REQUEST_URI'])) ? $_SERVER ['REQUEST_URI'] : "";

	//echo $__request_uri; die;
	
	if ($__request_uri != "") {
		
		$aURI = explode ( "/", $__request_uri );
		$sBaseURI = $aURI [2];
		
		//var_dump($sBaseURI);die;
		
		//echo "<pre>";
		//var_dump($aRoute); die;
		//echo $sBaseURI;
		//$sBaseURI = "empresas111";
		//echo key_exists($sBaseURI, $aRoute );
		//die;

		if (($sBaseURI != "") && (substr ( $sBaseURI, strrpos ( $sBaseURI, "." ) ) != ".php") && (key_exists($sBaseURI, $aRoute ))) {
			
			$aRouteURI = $aRoute[$sBaseURI];
			$url = strtolower ( $__request_uri );
			$url = (substr ( $url, strlen ( $url ) - 1, 1 ) == "/") ? substr ( $url, 0, strlen ( $url ) - 1 ) : $url;
			
			$url = $url . "/";
				
			$aKeyRoute = array_keys ( $aRouteURI );
			
			//var_dump($aKeyRoute); die;
			
			foreach ( $aKeyRoute as $route => $include ) {
				
				//var_dump($aRouteURI [$include] [0]); die;
				
				if (strtolower($__request_uri) == strtolower ( $include )) {
					
					if($aRouteURI [$include] [2]){
						$__inc_fullView = ' page-navigation-toggled ';
					}
					else{
						$__inc_fullView = '';
					}
					$__inc_redirect_url = $aRouteURI [$include] [0];					
					$__inc_breadline = montarBreadCrumb ( $aRouteURI [$include] [1] );
					break;
				}
				
			}
			
			/*
			if( (key_exists("config", $aRouteURI)) && key_exists("menu", $aRouteURI["config"]) )
			{				
				if( file_exists($_SERVER["DOCUMENT_ROOT"]. "/". $aRouteURI["config"]["menu"]) )
				{
					$__inc_menu = $aRouteURI["config"]["menu"];
				}
			}
			*/
				
		}
	}
}
