    <script>
 function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
    </script>
<html>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestion de Garzones</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Agregar Nuevo Garzón
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="index.php?nuevoGarzon" method="post">
                                <div class="center-block">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Rut </label>
                                            <input class="form-control" id="rut" name="rut" oninput=" return checkRut(this)" type="text" placeholder="Ingrese rut de garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Nombre </label>
                                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ingrese nombre de garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Apellido Paterno </label>
                                            <input class="form-control" id="apellidoPaterno" name="apellidoPaterno" type="text" placeholder="Ingrese apellido paterno del garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Apellido Materno </label>
                                            <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" type="text" placeholder="Ingrese apellido materno del garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Sueldo</label>
                                            <input class="form-control" id="sueldo" name="sueldo" type="number" placeholder="Ingrese sueldo del garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Direccion</label>
                                            <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Ingrese direccion del garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                            <label>Telefono</label>
                                            <input class="form-control" id="telefono" name="telefono" type="number" placeholder="Ingrese telefono del garzon" required >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label>Seleccione Usuario</label>
                                        <select id="user" name="user" class="form-control">
                                            <?php foreach ($data as $user): ?>
                                                <?php if($user->getRol()->getName() == 'Garzon'){ ?>
                                                <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>
                                             <?php } ?>
                                            <?php endforeach; ?> 
                                               
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-default">Enviar</button>
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->


                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->

</html>