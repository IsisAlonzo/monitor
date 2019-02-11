<div class="container mx-auto" style="margin-top: 10%; width: 40rem;">
    <div class="well">
        <h1 class="text-black" >Inicio de sesión</h1>
        
        <form  <?= form_open(''); ?>
            <div class="column">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="email" placeholder="Correo">
			</div>
            <div class="form-group" >
                <input class="form-control form-control-lg" type="password" name="password" placeholder="Contraseña">
			</div>
            <div class="form-group" >
                <input class="btn btn-primary" type="submit" value="INGRESAR">
			</div>
        </form>
    </div>
</div>