<h1 class="fixedtitle"><a href="#">Agencia de Modelos</a></h1>


<?php if (!empty($this->category)) { ?>
<ul class="category-menu">
	<li><h2><a href="<?php echo URL; ?>agencia/women">Women</a> </h2></li>
	<li><h2><a href="<?php echo URL; ?>agencia/men">Men</a> </h2></li>
	<li><h2><a href="<?php echo URL; ?>agencia/kids">Kids</a> <?php //echo $this->category; ?></h2></li>
</ul>
<div id="modelos" class="col-lg-12">
	<?php $this->render('site/agencia-pagination'); ?>
</div>
<input name="category" value="<?php echo $this->category;?>" type="hidden">
<div id="loadmore" class="col-lg-12">	
</div>

<?php } else { ?>


<nav id="agencia-menu">	
	<ul>
        <a href="<?php echo URL; ?>agencia/women">
            <li data-menuanchor="cursos">
                Women
            </li>
        </a>
        <a href="<?php echo URL; ?>agencia/men">
            <li data-menuanchor="cursos">
                Men
            </li>
        </a>
        <a href="<?php echo URL; ?>agencia/kids">
            <li data-menuanchor="cursos">
                Kids
            </li>
        </a>		
	</ul>
</nav>
<?php } ?>