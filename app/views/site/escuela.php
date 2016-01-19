<h1>Escuela de Modelos</h1>


<style>
.container,
.cbp-fbscroller,
.cbp-fbscroller section { 
	height: 100%; 
}

.cbp-fbscroller > nav {
	position: fixed;
	z-index: 9999;
	right: 100px;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
}

.cbp-fbscroller > nav a {
	display: block;
	position: relative;
	color: transparent;
	height: 50px;
}

.cbp-fbscroller > nav a:after {
	content: '';
	position: absolute;
	width: 24px;
	height: 24px;
	border-radius: 50%;
	border: 4px solid #fff;
}

.cbp-fbscroller > nav a:hover:after {
	background: rgba(255,255,255,0.6);
}

.cbp-fbscroller > nav a.cbp-fbcurrent:after {
	background: #fff;
}

/* background-attachment does the trick */
.cbp-fbscroller section {
	position: relative;
	background-position: top center;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
}

#fbsection1 {
	background-image: url(../images/1.jpg);
}

#fbsection2 {
	background-image: url(../images/2.jpg);
}

#fbsection3 {
	background-image: url(../images/3.jpg);
}

#fbsection4 {
	background-image: url(../images/4.jpg);
}

#fbsection5 {
	background-image: url(../images/5.jpg);
}
</style>

<div id="cbp-fbscroller" class="cbp-fbscroller">
	<nav>
		<a href="#fbsection1" class="cbp-fbcurrent">Section 1</a>
		<a href="#fbsection2">Section 2</a>
		<a href="#fbsection3">Section 3</a>
		<a href="#fbsection4">Section 4</a>
		<a href="#fbsection5">Section 5</a>
	</nav>
	<aside>
		<ul class=""><!--- agencia-button futura size3-->
		  <li id="infantil"><a class="link-white">Infantil</a></li>
		  <li id="juvenil"><a href="#" class="link-white">Juvenil</a></li>
		  <li id="caballeros"><a href="#" class="link-white">Caballeros</a></li>
		  <li id="talleres"><a onclick="javascript:inframer('escuela/talleres.php');" class="link-white">Talleres</a></li>
		</ul>
	</aside>


	<section id="fbsection1"></section>
	<section id="fbsection2"></section>
	<section id="fbsection3"></section>
	<section id="fbsection4"></section>
	<section id="fbsection5"></section>
</div>