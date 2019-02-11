<!-- IMPORTANTE -->
<div class="container" style="margin-top: 1%;">
    <h2>TODAS LAS NOTICIAS</h2>

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
                        '<div class="white-space-16"></div>
                         <div class="list row">';
                    } ?>
<div class="container" style="margin-top: 1%;">        
        <div class="card w-75">
        <div class="card-body">
            <h5 class="card-title"><?php echo $noticias[$i]->nombre; ?></h5>
            <a href="<?php echo base_url().'administrador/editar/noticia/'.$noticias[$i]->id; ?>" class="btn btn-primary">Editar</a>
            <a href="<?php echo base_url().'administrador/eliminar/noticia/'.$noticias[$i]->id; ?>" class="btn btn-primary">Borrar</a>
        </div>
    </div>
</div>

    <?php  if($count==2 || ($registros<=3 && $count==$registros-1) )
        {
            $registros=$registros-3;
                echo '</div>';
            }
        };
        }
        else
        {
            echo '<div class="white-space-16"></div><div class="title"><h2>No hay eventos para mostrar</h2></div>';
        } ?>

            <!-- Pagination -->
        <?php if(!empty($noticias)){
            echo '
            <div class="align-middle" style="margin-top: 5%; ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">ANTERIOR</a></li>
                <li class="page-item"><a class="page-link" href="#">SIGUIENTE</a></li>
                </ul>
            </nav>
            </div>';
        } ?>
        
        </div>
    </div>
</div>
</body>
</html>