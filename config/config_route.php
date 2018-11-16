<?php
$aRoute = array (
		"bancodehoras" => array(
			"/engesoftware/bancodehoras" => array(
				"modulos/bancodehoras/conexao.php",
				"Banco de Horas",
				true
			),
			"/engesoftware/empresas/add" => array(
				"modulos/empresas/add.php",
				"Adicionar Empresa",
				false
				),
		),
		"funcionario" => array(
			"/engesoftware/funcionario" => array(
				"modulos/funcionario/conexao.php",
				"Funcionários",
				true
			),
			"/engesoftware/funcionario/add" => array(
				"modulos/funcionario/add.php",
				"Adicionar Funcionário",
				false
			),
			"/engesoftware/funcionario/details" => array(
				"modulos/funcionario/add.php",
				"Detalhar Funcionário",
				false
			),
		),
		"centrodecusto" => array(
				"/engesoftware/centrodecusto" => array(
				"modulos/centrodecusto/conexao.php",
				"Centros de Custo",
				true
				),
		),
		/* SEGURANÇA */ 
		"autenticacao" => array (
				
				"/autenticacao" => array (
						"/modulos/seguranca/autenticacao.php",
						"Segurança|Autenticação" 
				) 
		),
		/* LOGOFF */
		"sair" => array (
				"/sair" => array (
						"/modulos/seguranca/logoff.php",
						"" 
				) 
		),
		/* ASSOCIADOS */
		"associado" => array (
				"config" => array(
						"menu" => "/home/audicaixa/public_html/sistema/modulos/associados/menu.php"
				),
				"sistema/associado" => array (
						"/home/audicaixa/public_html/sistema/modulos/associados/conexao.php",
						"Associados" 
				),
				"associado/novo" => array(
					"/home/audicaixa/public_html/sistema/modulos/associados/cadastro.php",
					"Associado|Cadastrar Associado"
				),
				"associado/editar" => array(
						"/home/audicaixa/public_html/sistema/modulos/associados/cadastro.php",
						"Associado|Editar Associado"
				),
				"associado/listar" => array(
						"/home/audicaixa/public_html/sistema/modulos/associados/listar.php",
						"Associado|Listar Associados"
				),
				"associado/pendentes" => array(
						"/home/audicaixa/public_html/sistema/modulos/associados/pendentes.php",
						"Associado|Listar Associados Pendentes"
				),
				"associado/relatorio" => array(
						"/home/audicaixa/public_html/sistema/modulos/associados/relatorio.php",
						"Associado|Relatório"
				),
		),
		/* VOTACAO */
		"votacao" => array (
				"config" => array(
						"menu" => "/modulos/votacao/menu.php"
				),
				"/votacao" => array (
						"/modulos/votacao/conexao.php",
						"Votação/Enquete"
				),
				"/votacao/novo" => array(
						"/modulos/votacao/cadastro.php",
						"Votação|Cadastrar Votação"
				),
				"/votacao/details" => array(
						"/modulos/votacao/details.php",
						"Votação|Relatorio|Detalhes"
				),
				"/votacao/relatorio" => array(
						"/modulos/votacao/relatorio.php",
						"Votação|Pesquisar Votação"
				),
		),
		/* FINANCEIRO */
		"financeiro" => array(
			"config" => array(
				"menu" => "/modulos/financeiro/menu.php"
			),
			"/financeiro/gerenciarpagamento" => array(
				"/modulos/financeiro/gerenciarpagamento.php",
				"Financeiro|Gerenciar Pagamento"
			),
			"/financeiro/detalharmensalidade" => array(
					"/modulos/financeiro/detalharmensalidade.php",
					"Financeiro|Mensalidade Detalhada"
			),
			
			"/financeiro/upload" => array(
					"/_c/MensalidadeC.class.php",
					"Financeiro|Mensalidade"
			),
				
			"/financeiro/prestacaocontas" => array(
					"/modulos/financeiro/prestacaocontas.php",
					"Financeiro|Prestação de Contas"
			),
			"/financeiro/relatorioprestacaocontas" => array(
					"/modulos/financeiro/relatorioprestacaocontas.php",
					"Financeiro|Relatório de Prestação de Contas"
			),
				
		),
		
		/* MANUETENÇÃO */
		"manutencao" => array(
				"config" => array(
						"menu" => "/modulos/manutencao/menu.php"
				),
				"/manutencao/lotacao" => array(
						"/modulos/manutencao/lotacao.php",
						"Manutenção|Gerenciar Lotação"
				),
				"/manutencao" => array(
						"",
						"Manutenção"
				),
				"/manutencao/plano-contas" => array(
						"/modulos/manutencao/planocontas.php",
						"Manutenção|Planos de Contas"
				),
				"/manutencao/cidades" => array(
						"",
						"Manutenção|Cidades"
				)
		)
);