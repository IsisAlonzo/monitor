<div class="container" style="margin-top: 2%;">
	<div class="card text-white bg-secondary">
			<div class="card-header"><h4 class="card-title">NUEVA NOTICIA</h4></div>
			<div class="card-body">
            <?php echo form_open_multipart('administrador/agregar/noticia',array('class'=>'flex'));?>
        <div class="left">
            <div class="column">
                <div class="title column">
                    <!-- Campos Ocultos -->
                    <input class="form-control" type="text" hidden name="idNoticia" value="<?php echo !empty($noticias[0]->id)?$noticias[0]->id:'';?>">
                    <!-- Fin Campos ocultos -->

                    <h4>TÍTULO</h4>
                    <input class="form-control" type="text" name="nombre" value="<?php echo !empty($noticias[0])?$noticias[0]->nombre:'';?>">
                </div>
                <div class="form-group">
                    <h4>DESCRIPCIÓN CORTA</h4>
                    <textarea class="form-control" name="descripcion" rows="4"><?php echo !empty($noticias[0])?$noticias[0]->descripcion:'';?></textarea>
                </div>
                <h4>CONTENIDO</h4>
                <textarea class="form-control" name="contenido" rows="25"><?php echo !empty($noticias[0])?$noticias[0]->contenido:'';?></textarea>
            </div>
        </div>

        <div class="" style="margin-top: 2%;">
                <div class="column">
                    <h4>IMAGEN DE PORTADA</h4>
                    <div class="white-space-16"></div>
                    <div class="featured-img responsive-img">
                        <!-- Susituir por la ruta de la portada actual -->
                        <!-- <img src="<?php echo !empty($noticias[0]->imagen)?base_url().$noticias[0]->imagen:''; ?>" alt=""> -->
                        <img class="img-thumbnail" src="<?php echo !empty($noticias[0]->imagen)?$noticias[0]->imagen:''; ?>" alt="">
                    </div>
                    <div class="white-space-8"></div>
                    <div><a class="btn btn-blue" id="featured-img-click"><i class="fas fa-file-upload"></i> CAMBIAR IMAGEN</a></div>
                    <input class="input-file-h" id="featured-img" type="file" name="imagen">
                    <br><br>
                    <input class="btn btn-blue" type="submit" value="PUBLICAR">
                </div>
        </div>

    </form>
</div>
</div>
<br><br><br><br>
<!-- FIN IMPORTANTE -->

</div>

</div>
</div>
<script>
document.getElementById('fechaspClick').onclick = function () {
            document.getElementById('featured-img').click();
        };
</script>
