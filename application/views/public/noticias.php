    <div class="container" style="margin-top: 1%;">
        <div class="column">
            <div class="title">
                <h2>Últimas Noticias</h2>
            </div>
                <?php if(!empty($noticias)){
                    $count=0;
                    $registros=count($noticias);
                    for($i=0; $i<count($noticias); $i++)
                    {
                        $count++;
                        if($i%3==0)
                        {
                            $count=0;
                            echo
                            '<div class=""> <div class="">';
                        } ?>
                            <div class="container" style="margin-top: 1%;">

                            <div class="card mb-3">
                                <img class="card-img-top" src="<?php echo $noticias[$i]->imagen; ?>" alt="No se encontro la imagen">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $noticias[$i]->nombre; ?></h5>
                                    <p class="card-text"><?php echo $noticias[$i]->descripcion; ?></p>
                                    <a href="<?php echo base_url().'ver/noticia/'.$noticias[$i]->id; ?>"><button  type="button" class="btn btn-primary">Leer Más</button></a>
                                    <p class="card-text" ><small class="text-muted"><?php echo $noticias[$i]->fecha; ?></small></p>
                                </div>
                            </div>
                        </div> <!-- End Card -->
                        <?php  if($count==2 || ($registros<=3 && $count==$registros-1) )
                    {
                        $registros=$registros-3;
                        echo '</div> </div> <div class="white-space-16"></div>';
                    }
                    };
                }
                else
                {
                    echo '<h2>No hay noticias para mostrar</h2>';
                } ?>

            </div> <!-- End Noticias Contenedor -->
        </div> <!-- End Main Column -->
    </div> <!-- End Main Container -->
</div>