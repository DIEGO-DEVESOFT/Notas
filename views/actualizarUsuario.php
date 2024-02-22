<div class="container-fluid">
    <form action="" method="POST" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; Información del Usuario</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                    <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating"></label>
                            <input type="hidden" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="id" id="item_nombre" maxlength="140" value="<?php echo $user->getid() ?>">
                        </div>
                    <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nombre Usuario:</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="nombre" id="item_nombre" maxlength="140" value="<?php echo $user->getNombre() ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nota1:</label>                            
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="nota1"  maxlength="140" value="<?php echo $user->getNota1() ?>">
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nota2:</label>                            
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="nota2"  maxlength="140" value="<?php echo $user->getNota2() ?>">
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nota3</label>                            
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="nota3"  maxlength="140" value="<?php echo $user->getNota3() ?>">
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nota4</label>                            
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="nota4"  maxlength="140" value="<?php echo $user->getNota4() ?>">
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating"></label>
                            <input type="hidden" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="fecha" id="fecha" maxlength="140" value="<?php echo $user->getfecha() ?>">
                        </div>
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating"></label>
                            <input type="hidden" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="promedio" id="promedio" maxlength="140" value="<?php echo $user->getpromedio() ?>">
                        </div>
                        
                    </div>
                </div>
            </div>
        </fieldset>
        <p class="text-center" style="margin-top: 40px;">
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; ACTUALIZAR</button>
        </p>
    </form>
</div>