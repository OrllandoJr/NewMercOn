<?php

include_once 'Class/All.php';
include_once 'Class/Config.php';

if (!Empty($_POST)){

	$objLogin = new Login(); //instancia da classe Login.php

	$r = $objLogin->logar($_POST['email'], $_POST['senha']);	//metodo da classe Login, que verifica se os dados inseridos no login retornam true ou false

	switch ($r){ // $r minha variavel de retorno da consulta sql $r = $this->consulta($sql);
		case "0":
			header('location:http://127.0.0.1/NewMercOn/product.php'); // usuario logado retorna para a pagina index.php minha home no site
			break;
		case "-1": // tratamento para meu email ou senha errado
			echo "Email ou senha incorreta";
			break;
		case "-2": 
			echo "Dados Incompletos";
			break;
		default:
			break;		
	}
}

if (!Empty($_POST)){

	$objCadastrar = new Cadastrar();

	$rC = $objCadastrar->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cpf'], $_POST['cep'], $_POST['endereco'], $_POST['fone']);

		switch ($rC){ // $r minha variavel de retorno da consulta sql $rC = $this->consulta($sql);
			case "0":
				header('location:http://127.0.0.1/NewMercOn/product.php'); // usuario logado retorna para a pagina index.php minha home no site
				break;
			case "-1": // tratamento para meu email ou senha errado
				echo "Email ou senha incorreta";
				break;
			case "-2": 
				echo "Dados Incompletos";
				break;
			default:
				break;		
		}
}



?>



<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Merc On</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Merc On" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>Merc On - Zona de Ofertas & Descontos</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						Merc
						<span>On</span>
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Acompanhar Pedido</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 61 8888-8888
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Login </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Cadastre-se </a>
					</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Como posso lhe ajudar?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>Por Favor, selecione a sua localização.</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Selecione a Cidade</option>
					<option>Aguas Claras</option>
				</optgroup>
				<optgroup label="AguasClaras">
					<option>Aguas Claras</option>
				</optgroup>
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Login </h3>
						<p>
							Entre agora, Comece suas compras no Merc On. Não tem uma conta?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Cadastre-se agora</a>
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="email" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Senha" name="senha" required="">
							</div>
							<input type="submit" value="Enviar">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Cadastre-se</h3>
						<p>
							Comece a comprar no Merc On agora mesmo! Vamos criar sua conta.
						</p>
						<form action="about.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Nome" name="nome" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Senha" name="senha" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirmar Senha" name="Confirm Password" id="password2" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="CPF" name="cpf" OnKeyPress="formatar('###.###.###-##', this)" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="CEP" name="cep" OnKeyPress="formatar('#####-###', this)" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Endereço" name="endereco" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Telefone" name="fone" OnKeyPress="formatar('## #########', this)" required="">
							</div>
							<input type="submit" value="Cadastrar">
						</form>
						<p>
							<a href="#">Ao clicar em registrar-se, Eu aceito todos os termos</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">Categorias</option>
						<option value="Conzinha">Cozinha</option>
						<option value="Casa">Casa</option>
						<option value="Lanches &amp; Bebidas">Lancher & Bebidas</option>
						<option value="Cuidado pessoas">Cuidado Pessoal</option>
						<option value="Frutas &amp; Legumes">Frutas & Legumes</option>
						<option value="Cuidados de bebe">Cuidados de Bebê</option>
						<option value="Refrigerantes &amp; Sucos">Refrigerantes & Sucos</option>
						<option value="Comida Congelada">Comida Congelada</option>
						<option value="Padaria">Padaria</option>
						<option value="Doces">Doces</option>
					</select>
				</form>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Navegação</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.php">Sobre</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cozinha
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.php">Padaria</a>
													</li>
													<li>
														<a href="product.php">Café, Chá & Bebidas</a>
													</li>
													<li>
														<a href="product.php">Frutas secas, sementes</a>
													</li>
													<li>
														<a href="product.php">Doces, Chocolate</a>
													</li>
													<li>
														<a href="product.php">Grãos</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.php">Picles</a>
													</li>
													<li>
														<a href="product.php">Massas & Macarrão</a>
													</li>
													<li>
														<a href="product.php">Arroz, Farinha & Feijão</a>
													</li>
													<li>
														<a href="product.php">Molhos</a>
													</li>
                                                    <li>
														<a href="product.php">Biscoitos</a>
													</li>
													<li>
														<a href="product.php">Salgadinhos</a>
													</li>
													<li>
														<a href="product.php">Óleos, Vinagres</a>
													</li>
													<li>
														<a href="product.php">Carne, Aves & Frutos do Mar</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Casa
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.php">Cozinha & Jantar</a>
													</li>
													<li>
														<a href="product2.php">Detergentes</a>
													</li>
													<li>
														<a href="product2.php">Produtos de Limpeza</a>
													</li>
													<li>
														<a href="product2.php">Chão & Outros Limpadores</a>
													</li>
													<li>
														<a href="product2.php">Descartáveis, Saco de lixo</a>
													</li>
													<li>
														<a href="product2.php">Repelentes & Purificadores</a>
													</li>
													<li>
														<a href="product2.php"> Lavagem de Louça</a>
													</li>
													<li>
														<a href="product2.php">Cuidado de Animais</a>
													</li>
													<li>
														<a href="product2.php">Acessorios de Limpeza</a>
													</li>
													<li>
														<a href="product2.php">Produtos de casa</a>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="faqs.php">FAQ</a>
								</li>
								<li class="active">
									<a class="nav-stylehead" href="faqs.php">Faqs</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="contact.php">Contato</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Faqs</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- FAQ-help-page -->
	<div class="faqs-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Faqs
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<h3 class="w3-head">Top 10 Frequently asked questions</h3>
			<div class="faq-w3agile">
				<ul class="faq">
					<li class="item1">
						<a href="#" title="click here">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?</a>
						<ul>
							<li class="subitem1">
								<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.
									At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque
									corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item2">
						<a href="#" title="click here">The standard Lorem Ipsum passage Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices ?</a>
						<ul>
							<li class="subitem1">
								<p> Tincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
									nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus
									qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
									cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item3">
						<a href="#" title="click here">Consectetuer adipiscing elit Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices?</a>
						<ul>
							<li class="subitem1">
								<p>Dincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
									nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus
									qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
									cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item4">
						<a href="#" title="click here">Sed diam nonummy nibh euismod Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices?</a>
						<ul>
							<li class="subitem1">
								<p>At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer
									adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
									voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item5">
						<a href="#" title="click here">Euismod tincidunt laoreet Etiam faucibus viverra libero vel efficitur ?</a>
						<ul>
							<li class="subitem1">
								<p>At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer
									adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
									voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item6">
						<a href="#" title="click here">Voluptas sit aspernatur aut Ut semper nisl ut laoreet ultrices ?</a>
						<ul>
							<li class="subitem1">
								<p>At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer
									adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
									voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item7">
						<a href="#" title="click here">Donec ut quam ligula feugiat Ut semper nisl ut laoreet ultrices ?</a>
						<ul>
							<li class="subitem1">
								<p>At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer
									adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
									voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item8">
						<a href="#" title="click here">The standard Lorem Ipsum Ut semper nisl ut laoreet ultrices passage ?</a>
						<ul>
							<li class="subitem1">
								<p>Lorem ipsum dolor sit amet At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
									nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus
									qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
									cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item9">
						<a href="#" title="click here">Consectetuer adipiscing Ut semper nisl ut laoreet ultrices elit ?</a>
						<ul>
							<li class="subitem1">
								<p>Lorem ipsum dolor sit amet At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
									nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus
									qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
									cupiditate non provident.</p>
							</li>
						</ul>
					</li>
					<li class="item10">
						<a href="#" title="click here">Sed diam nonummy Ut semper nisl ut laoreet ultrices nibh euismod ?</a>
						<ul>
							<li class="subitem1">
								<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod consectetuer adipiscing elit, sed diam nonummy nibh euismod
									accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
									et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //FAQ-help-page -->

	<!-- newsletter -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>Obtenha suas compras na sua casa.</h2>
				<p>Entrega gratuita em sua primeira compra!</p>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>"Merc On"</span> Um mercado online, onde você pode efetuar a compra dos seus mantimentos e recebelos na sua casa. Sem a necessidade de deslocar-se até um supermercado local.</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Acompanhe seu Pedido</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Fácil Devolução</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Cancelamento Online </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						
					</div>
					<div class="col-xs-6 footer-grids agile-secomk">
						
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Links</h3>
						<ul>
							<li>
								<a href="about.php">Sobre</a>
							</li>
							<li>
								<a href="contact.php">Contato</a>
							</li>
							<li>
								<a href="help.php">Ajuda</a>
							</li>
							<li>
								<a href="faqs.php">FAQ</a>
							</li>
							<li>
								<a href="terms.php">Termos de Uso</a>
							</li>
							<li>
								<a href="privacy.php">Politica de Privacidade</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Entrar em Contato</h3>
						<ul>
							<li>
								<i class="fa fa-mobile"></i> 61 98888-8888 </li>
							<li>
								<i class="fa fa-phone"></i> 61 3333-4444 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> contato@mercon.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>Siga-nos</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>Em breve App</h5>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">
				<div class="sub-some">
					<h5>Merc On</h5>
					<p>Pedidos online. Seus produtos favoritos online e com baixo preço, só o Merc On faz isso por você. O Merc On atende, no momento, apenas a cidade de Águas Claras. Com baixo preço em produtos da Unilever, Pampers, Maggi, Coca-Cola, Brilhante, Huggies, Nestle, Ariel, Bom Bril, Italac, Gillette, Yoki, Bauduco, Sadia, União, Aurora, P&G entre outras.</p>
				</div>
				<div class="sub-some">
					<h5>Compre online com os melhores descontos & ofertas</h5>
					<p>Ganhe até 40% Off Qualquer Dia nos Produtos em Oferta no Fim da Página. Estão incluidos Produtos Pessoais, Limpeza, Rações, Higiene, Grãos, Bebidas, Frutas, Sementes e outros Produtos do Dia. O Desconto Pode Variar de Produto Para Produto.</p>
				</div>
				<!-- brands -->
				<div class="sub-some">
					<h5>Marcas Populares</h5>
					<ul>
						<li>
							<a>Amil</a>
						</li>
						<li>
							<a>Bauduco</a>
						</li>
						<li>
							<a>Coca-Cola</a>
						</li>
						<li>
							<a>Bom Bril</a>
						</li>
						<li>
							<a>Durex</a>
						</li>
						<li>
							<a> Maggi</a>
						</li>
						<li>
							<a>Nestle</a>
						</li>
						<li>
							<a>Italac</a>
						</li>
						<li>
							<a>Palmolive</a>
						</li>
						<li>
							<a>Dove</a>
						</li>
						<li>
							<a>Suave</a>
						</li>
						<li>
							<a>Nivia</a>
						</li>
						<li>
							<a>Colgate</a>
						</li>
						<li>
							<a>Brilhante</a>
						</li>
						<li>
							<a>Closeup</a>
						</li>
						<li>
							<a> Sadia</a>
						</li>
						<li>
							<a>Garoto</a>
						</li>
						<li>
							<a>Knor</a>
						</li>
						<li>
							<a>Cif</a>
						</li>
						<li>
							<a>Tang</a>
						</li>
						<li>
							<a>Aurora</a>
						</li>
						<li>
							<a>Oreo</a>
						</li>
						<li>
							<a> Nissin</a>
						</li>
						<li>
							<a>Sprite</a>
						</li>
						<li>
							<a>Sukita</a>
						</li>
						<li>
							<a>WD</a>
						</li>
						<li>
							<a>Lacta</a>
						</li>
						<li>
							<a>Fresh</a>
						</li>
						<li>
							<a>Sorriso</a>
						</li>
						<li>
							<a>Oral-B</a>
						</li>
						<li>
							<a>Parmalat</a>
						</li>
						<li>
							<a>RedBul</a>
						</li>
						<li>
							<a>Guarana</a>
						</li>
						<li>
							<a> Omo</a>
						</li>
                        <li>
							<a>Rexona</a>
						</li>
						<li>
							<a>Axe</a>
						</li>
						<li>
							<a>delValle</a>
						</li>
						<li>
							<a>Piracanjuba</a>
						</li>
						<li>
							<a>Perdigão</a>
						</li>
						<li>
							<a>União</a>
						</li>
						<li>
							<a> Camil</a>
						</li>
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>Métodos de Pagamento</h5>
					<ul>
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2018 Merc On. Todos direitos reservados. | Design by
				<a> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->
	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('O número mínimo de item é 3. Por favor, adicione mais itens ao seu carrinho antes de finalizar a compra');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- script for tabs -->
	<script>
		$(function () {

			var menu_ul = $('.faq > li > ul'),
				menu_a = $('.faq > li > a');

			menu_ul.hide();

			menu_a.click(function (e) {
				e.preventDefault();
				if (!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true, true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true, true).slideUp('normal');
				}
			});

		});
	</script>
	<!-- script for tabs -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>