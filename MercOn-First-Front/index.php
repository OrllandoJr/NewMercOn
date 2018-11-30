<!DOCTYPE html><html>  
  <head>
    	<meta content="text/html;charset=utf-8" />
    	<link rel="stylesheet" href="css/style.css" type="text/css">    
	<link href="css/font.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title> MercOn</title> 
  </head>

<body>

<div class="pagina">
    
<!-- Cabeçalho -->
<div id="head">
    <div id="logo">
      	<img src="img/logo.png" height="75" width="230"/>
	</div>
	<div id="search">
		<input type="text" id="buscar" placeholder="BUSCAR" />
		<a id="Busca"><img src="img/search.png" id="imgBuscar" height="27" width="27"/></a>
	</div>
</div>
    
<!-- Menu -->
	<div class="menu">
	<big>
	<ul id="nav">
		<li><a href="#"><span id="text">MENU</span></a>
	<ul>
 		<li><a class="nav-container" href="index.php">Home</a></li>
      <li><a class="nav-container" href="graos.php">Grãos</a></li>
      <li><a class="nav-container" href="bebidas.php">Bebidas</a></li>
    <li><a class="nav-container" href="hortalicas.php">Hortaliças</a></li>
      <li><a class="nav-container" href="frios.php">Frios</a></li>
    <li><a class="nav-container" href="acougue.php">Açougue</a></li>
    <li><a class="nav-container" href="higiene.php">Higiene</a></li>
    <li><a class="nav-container" href="padaria.php">Padaria</a></li>
    <li><a class="nav-container-dif" href="login.php">Login</a></li>
    <li><a class="nav-container-dif" href="cadastrar.php">Cadastrar</a></li>
    <li><a class="carrinho" href="carrinho.php"><img src="img/carrinho.png" height="30" width="30" /></a></li>
	</ul>
	</li>
	</ul>
	</big>
	</div>
    

<!-- welcome -->

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="img/img_home1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/img_home2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/img_home3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/img_home4.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/img_home5.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


<!-- Rodapé -->
    	<div class="rodape">
		<center>
		<h5>ENTRE EM CONTATO</h5>
		<h4>(61) 8888-8888</h4>
     		<small>Todos os direitos reservados.</small>      
		</center>
   	</div>
    

</div>
</body>  
</html>