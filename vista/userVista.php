<?php
if (isset($libros)): ?>
<?php foreach ($libros->libro as $libro): ?>
    <form class="contenedor-principal" action="#" method="POST">
        <div class="tarjeta-libro">
            <div class="imagen-libro"><img src="includes/img/<?php echo $libro->portada; ?>"></div>
            <div class="informacion-libro">
                <p class="titulo"><?php echo $libro->titulo; ?></p>
                <p class="autor"><?php echo $libro->autor; ?></p>
                <p class="categoria"><?php echo $libro->categoria; ?></p>
                <p class="oferta"><?php echo oferta($libro->promocion) ?></p>
                <button type="submit" class="boton-comprar">Comprar</button>
            </div>
            
        </div>
    </form>
<?php endforeach;
else: ?>
    <h1> No hay Libros </h1>

<?php
endif;

?>