
//Eliminar Administrador de Dashboard

$(function(){
    $('body').on('click','#tAdministradores button', function(e){
        e.preventDefault();
        email = $(this).parents("tr").find("td").eq(2).html();

        confirmacion = confirm("Desea eliminar el registro para la cuenta: " + email);

        if (confirmacion){

          ur=$("#deleteAdministrador").val();
          $.ajax({
            url:   ur,
            type: 'POST',
            data: {email:email},
            success:function(eliminar){
              if(eliminar === 'true')
              {
                  alert("Registro borrado correctamente");
                  $(location).attr('href', 'administradores');
                }
                else
                {
                  alert("Error: El usuario no fue borrado");
                  $(location).attr('href', 'administradores');
                }
              }
          });
        }
        else
        {
          $(location).attr('href', 'administradores');
        }
    });
});


//Update Administradores

$(function(){
    $('body').on('click','#tAdministradores a', function(e){
        e.preventDefault();
        id       = $(this).parents("tr").find("td").eq(0).html();
        nombre   = $(this).parents("tr").find("td").eq(1).html();
        email    = $(this).parents("tr").find("td").eq(2).html();
        password = $(this).parents("tr").find("td").eq(3).html();

        id       = $('#idAdmin').val(id);
        nombre   = $('#nombreAdmin').val(nombre);
        email    = $('#emailAdmin').val(email);
        password = $('#passwordAdmin').val(password)

        $('#modalAdmin').modal('show');

        $('#saveAdmin').on('click',function(e){
            e.preventDefault();

            id       = $('#idAdmin').val();
            nombre   = $('#nombreAdmin').val();
            email    = $('#emailAdmin').val();
            password = $('#passwordAdmin').val();

            if(id!="" && nombre!="" && email!="" && password!="")
            {
                $.ajax({
                    url: $('#updateAdmin').attr('action'),
                    type: $('#updateAdmin').attr('method'),
                    data: {id:id, nombre:nombre, email:email, password:password},
                    success: function(updateAdmin)
                    {
                        if(updateAdmin=='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','administradores');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.")
                        }
                    }
                });
            }
            else
            {
                aler("Por favor llene todos los campos")
            }
        });
    });
});


//Eliminar logos clientes
$(function(){
    $(".logos_clientes").on('click','.delete', function(e){
        e.preventDefault();

        valor = $(this).attr('data-img');

        respuesta = confirm("Desea eliminar el archivo: " + valor);

        if (respuesta) {
            ur = $("#deleteCliente").val();
            $.ajax({
                url: ur,
                type: 'POST',
                data: {valor:valor},               
                success:function(eliminarLogo){
                    if(eliminarLogo == 'true')
                    {
                        alert("El archivo se ha borrado");

                        $(location).attr('href', 'clientes');
                    }
                    else
                    {
                        alert("Error al intentar borrar el archivo");
                    }
                }
            });
        }
        else
        {
            $(location).attr('href', 'clientes');
        }         
    });
});

//Cargar Galeria

$(function(){
    $('.administrador_galeria').on('click','.delete', function(e){
        e.preventDefault();
        foto = $(this).attr('data-img');

        
        respuesta = confirm("Desea eliminar el archivo: " + foto);

        if (respuesta) {
            ur = $("#deleteFotoGaleria").val();
            $.ajax({
                url: ur,
                type: 'POST',
                data: {foto:foto},               
                success:function(eliminarLogo){
                    if(eliminarLogo == 'true')
                    {
                        alert("Los datos se han borrado correctamente");

                        $(location).attr('href', 'galeria');
                    }
                    else
                    {
                        alert("Error al intentar borrar los datos");
                    }
                }
            });
        }
        else
        {
            $(location).attr('href', 'galeria');
        }        
    });
});

//Eliminar Usuarios (Gestor de BD)

$(function(){
    $('body').on('click','#tUsuarios button', function(e){
        e.preventDefault();
        email = $(this).parents("tr").find("td").eq(2).html();

        confirmacion = confirm("Desea eliminar el registro para la cuenta: " + email);

        if (confirmacion){

          ur=$("#deleteUsuario").val();
          $.ajax({
            url:   ur,
            type: 'POST',
            data: {email:email},
            success:function(eliminarUsuario){
              if(eliminarUsuario === 'true')
              {
                  alert("Registro borrado correctamente");
                  $(location).attr('href', 'usuarios');
                }
                else
                {
                  alert("Error: El usuario no fue borrado");
                  $(location).attr('href', 'usuarios');
                }
              }
          });
        }
        else
        {
          $(location).attr('href', 'usuarios');
        }
    });
});


//Update Usuarios (Gestor de BD)

$(function(){
    $('body').on('click','#tUsuarios a', function(e){
        e.preventDefault();
        id       = $(this).parents("tr").find("td").eq(0).html();
        nombre   = $(this).parents("tr").find("td").eq(1).html();
        email    = $(this).parents("tr").find("td").eq(2).html();
        password = $(this).parents("tr").find("td").eq(3).html();

        id       = $('#idUser').val(id);
        nombre   = $('#nombreUser').val(nombre);
        email    = $('#emailUser').val(email);
        password = $('#passwordUser').val(password);



        $('#modalUser').modal('show');

        $('#saveUser').on('click',function(e){
            e.preventDefault();

            id       = $('#idUser').val();
            nombre   = $('#nombreUser').val();
            email    = $('#emailUser').val();
            password = $('#passwordUser').val();

            alert(id);

            if(id!="" && nombre!="" && email!="" && password!="")
            {
                $.ajax({
                    url: $('#updateUser').attr('action'),
                    type: $('#updateUser').attr('method'),
                    data: {id:id, nombre:nombre, email:email, password:password},
                    success: function(updateUser)
                    {
                        if(updateUser =='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','usuarios');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.");
                            $(location).attr('href','usuarios');
                        }
                    }
                });
            }
            else
            {
                alert("Por favor llene todos los campos")
            }
        });
    });
});

//Eliminar Empleados (Gestor de BD)

$(function(){
    $('body').on('click','#tEmpleados button', function(e){
        e.preventDefault();
        nombre = $(this).parents("tr").find("td").eq(1).html();
        id = $(this).parents("tr").find("td").eq(0).html();
        confirmacion = confirm("Desea eliminar el registro del empleado: " + nombre);

        if (confirmacion){
          
          ur=$("#deleteEmpleado").val();
            $.ajax({
                url:   ur,
                type: 'POST',
                data: {id:id},
                success:function(eliminarEmpleado){
                  if(eliminarEmpleado === 'true')
                  {
                      alert("Registro borrado correctamente");
                      $(location).attr('href', 'empleados');
                    }
                    else
                    {
                      alert("Error: El usuario no fue borrado");
                      $(location).attr('href', 'empleados');
                    }
                }
          });
        }
        else
        {
          $(location).attr('href', 'empleados');
        }
    });
});


//Update Empleados (Gestor de BD)

$(function(){
    $('body').on('click','#tEmpleados a', function(e){
        e.preventDefault();
        id        = $(this).parents("tr").find("td").eq(0).html();
        nombre    = $(this).parents("tr").find("td").eq(1).html();
        direccion = $(this).parents("tr").find("td").eq(2).html();
        telefono  = $(this).parents("tr").find("td").eq(3).html();
        imss      = $(this).parents("tr").find("td").eq(4).html();
        curp      = $(this).parents("tr").find("td").eq(5).html();
        categoria = $(this).parents("tr").find("td").eq(6).html();        

        

        id        = $('#idEmpleado').val(id);
        nombre    = $('#nombreEmpleado').val(nombre);
        direccion = $('#direccionEmpleado').val(direccion);
        telefono  = $('#telEmpleado').val(telefono);
        imss      = $('#imssEmpleado').val(imss);
        curp      = $('#curpEmpleado').val(curp);
        categoria = $('#categoriaEmpleado').val(categoria);


        
        $('#modalEmpleado').modal('show');

        $('#saveEmpleado').on('click',function(e){
            e.preventDefault();


            id        = $('#idEmpleado').val();
            nombre    = $('#nombreEmpleado').val();
            direccion = $('#direccionEmpleado').val();
            telefono  = $('#telEmpleado').val();
            imss      = $('#imssEmpleado').val();
            curp      = $('#curpEmpleado').val();
            categoria = $('#categoriaEmpleado').val();

            if(id!="" && nombre!="" && direccion!="" && telefono!="" && imss!="" && curp!="" && categoria!="")
            {
                $.ajax({
                    url:  $('#updateEmpleado').attr('action'),
                    type: $('#updateEmpleado').attr('method'),
                    data: {id:id, nombre:nombre, direccion:direccion, telefono:telefono, imss:imss, curp:curp, categoria:categoria},
                    success: function(updateEmpleado)
                    {
                        if(updateEmpleado =='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','empleados');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.");
                            $(location).attr('href','empleados');
                        }
                    }
                });
            }
            else
            {
                alert("Por favor llene todos los campos")
            }
        });
    });
});

//Eliminar Clientes (Gestor de BD)

$(function(){
    $('body').on('click','#tGestorClient button', function(e){
        e.preventDefault();
        nombre = $(this).parents("tr").find("td").eq(1).html();
        id = $(this).parents("tr").find("td").eq(0).html();
        confirmacion = confirm("Desea eliminar el registro del cliente: " + nombre);

        if (confirmacion){
          
          ur=$("#deleteGestorCliente").val();
            $.ajax({
                url:   ur,
                type: 'POST',
                data: {id:id},
                success:function(eliminarGestorCliente){
                  if(eliminarGestorCliente === 'true')
                  {
                      alert("Registro borrado correctamente");
                      $(location).attr('href', 'clientes');
                    }
                    else
                    {
                      alert("Error: El usuario no fue borrado");
                      $(location).attr('href', 'clientes');
                    }
                }
          });
        }
        else
        {
          $(location).attr('href', 'clientes');
        }
    });
});


//Update Clientes (Gestor de BD)

$(function(){
    $('body').on('click','#tGestorClient a', function(e){
        e.preventDefault();
        id        = $(this).parents("tr").find("td").eq(0).html();
        nombre    = $(this).parents("tr").find("td").eq(1).html();
        direccion = $(this).parents("tr").find("td").eq(2).html();
        telefono  = $(this).parents("tr").find("td").eq(3).html();
        email     = $(this).parents("tr").find("td").eq(4).html();
        empresa   = $(this).parents("tr").find("td").eq(5).html();       

        id        = $('#idClient').val(id);
        nombre    = $('#nomClient').val(nombre);
        direccion = $('#dirClient').val(direccion);
        telefono  = $('#telCliente').val(telefono);
        email     = $('#emailCliente').val(email);
        empresa   = $('#empresa').val(empresa);
        
        $('#modalGestorClient').modal('show');

        $('#saveGestorCliente').on('click',function(e){
            e.preventDefault();


            id        = $('#idClient').val();
            nombre    = $('#nomClient').val();
            direccion = $('#dirClient').val();
            telefono  = $('#telCliente').val();
            email     = $('#emailCliente').val();
            empresa   = $('#empresa').val();

            if(id!="" && nombre!="" && direccion!="" && telefono!="" && email!="" && empresa!="")
            {
                $.ajax({
                    url:  $('#updateGestorCliente').attr('action'),
                    type: $('#updateGestorCliente').attr('method'),
                    data: {id:id, nombre:nombre, direccion:direccion, telefono:telefono, email:email, empresa:empresa},
                    success: function(updateGestorCliente)
                    {
                        if(updateGestorCliente =='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','clientes');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.");
                            $(location).attr('href','clientes');
                        }
                    }
                });
            }
            else
            {
                alert("Por favor llene todos los campos")
            }
        });
    });
});

//Eliminar Proveedores (Gestor de BD)

$(function(){
    $('body').on('click','#tProveedores button', function(e){
        e.preventDefault();
        nombre = $(this).parents("tr").find("td").eq(1).html();
        id = $(this).parents("tr").find("td").eq(0).html();
        confirmacion = confirm("Desea eliminar el registro del proveedor: " + nombre);

        if (confirmacion){
          
          ur=$("#deleteProveedores").val();
            $.ajax({
                url:   ur,
                type: 'POST',
                data: {id:id},
                success:function(eliminarProveedor){
                  if(eliminarProveedor === 'true')
                  {
                      alert("Registro borrado correctamente");
                      $(location).attr('href', 'proveedores');
                    }
                    else
                    {
                      alert("Error: El usuario no fue borrado");
                      $(location).attr('href', 'proveedores');
                    }
                }
          });
        }
        else
        {
          $(location).attr('href', 'proveedores');
        }
    });
});


//Update Proveedores (Gestor de BD)

$(function(){
    $('body').on('click','#tProveedores a', function(e){
        e.preventDefault();
        id        = $(this).parents("tr").find("td").eq(0).html();
        nombre    = $(this).parents("tr").find("td").eq(1).html();
        direccion = $(this).parents("tr").find("td").eq(2).html();
        telefono  = $(this).parents("tr").find("td").eq(3).html();
        email     = $(this).parents("tr").find("td").eq(4).html();
        empresa   = $(this).parents("tr").find("td").eq(5).html();       

        id        = $('#idProveedor').val(id);
        nombre    = $('#nomProveedor').val(nombre);
        direccion = $('#dirProveedor').val(direccion);
        telefono  = $('#telProveedor').val(telefono);
        email     = $('#emailProveedor').val(email);
        empresa   = $('#empresaProveedor').val(empresa);
        
        $('#modalProveedores').modal('show');

        $('#saveProveedor').on('click',function(e){
            e.preventDefault();


            id        = $('#idProveedor').val();
            nombre    = $('#nomProveedor').val();
            direccion = $('#dirProveedor').val();
            telefono  = $('#telProveedor').val();
            email     = $('#emailProveedor').val();
            empresa   = $('#empresaProveedor').val();

            if(id!="" && nombre!="" && direccion!="" && telefono!="" && email!="" && empresa!="")
            {
                $.ajax({
                    url:  $('#updateProveedor').attr('action'),
                    type: $('#updateProveedor').attr('method'),
                    data: {id:id, nombre:nombre, direccion:direccion, telefono:telefono, email:email, empresa:empresa},
                    success: function(updateProveedor)
                    {
                        if(updateProveedor =='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','proveedores');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.");
                            $(location).attr('href','proveedores');
                        }
                    }
                });
            }
            else
            {
                alert("Por favor llene todos los campos")
            }
        });
    });
});

//Eliminar Herramientas (Gestor de BD)

$(function(){
    $('body').on('click','#tHerramientas button', function(e){
        e.preventDefault();
        herramienta = $(this).parents("tr").find("td").eq(1).html();
        id = $(this).parents("tr").find("td").eq(0).html();
        confirmacion = confirm("Desea eliminar el registro de la herramienta: " + herramienta);

        if (confirmacion){
          
          ur=$("#deleteHerramienta").val();
            $.ajax({
                url:   ur,
                type: 'POST',
                data: {id:id},
                success:function(eliminarHerramienta){
                  if(eliminarHerramienta === 'true')
                  {
                      alert("Registro borrado correctamente");
                      $(location).attr('href', 'herramientas');
                    }
                    else
                    {
                      alert("Error: El usuario no fue borrado");
                      $(location).attr('href', 'herramientas');
                    }
                }
          });
        }
        else
        {
          $(location).attr('href', 'herramientas');
        }
    });
});


//Update Herramientas (Gestor de BD)

$(function(){
    $('body').on('click','#tHerramientas a', function(e){
        e.preventDefault();
        id          = $(this).parents("tr").find("td").eq(0).html();
        herramienta = $(this).parents("tr").find("td").eq(1).html();
        cantidad    = $(this).parents("tr").find("td").eq(2).html();
        tipo        = $(this).parents("tr").find("td").eq(3).html();
        bodega      = $(this).parents("tr").find("td").eq(4).html();
        obra        = $(this).parents("tr").find("td").eq(5).html();       

        id          = $('#idHerramienta').val(id);
        herramienta = $('#herramienta').val(herramienta);
        cantidad    = $('#cantidad').val(cantidad);
        tipo        = $('#tipo').val(tipo);
        bodega      = $('#bodega').val(bodega);
        obra        = $('#obra').val(obra);
        
        $('#modalHerramientas').modal('show');

        $('#saveHerramienta').on('click',function(e){
            e.preventDefault();


            id          = $('#idHerramienta').val();
            herramienta = $('#herramienta').val();
            cantidad    = $('#cantidad').val();
            tipo        = $('#tipo').val();
            bodega      = $('#bodega').val();
            obra        = $('#obra').val();

            if(id!="" && herramienta!="" && cantidad!="" && tipo!="" && bodega!="" && obra!="")
            {
                $.ajax({
                    url:  $('#updateHerramientas').attr('action'),
                    type: $('#updateHerramientas').attr('method'),
                    data: {id:id, herramienta:herramienta, cantidad:cantidad, tipo:tipo, bodega:bodega, obra:obra},
                    success: function(updateHerramientas)
                    {
                        if(updateHerramientas =='true')
                        {
                            alert("Los datos han sido actualizados correctamente");
                            $(location).attr('href','herramientas');
                        }
                        else
                        {
                            alert("Algo ha salido mal, por favor intente de nuevo.");
                            $(location).attr('href','herramientas');
                        }
                    }
                });
            }
            else
            {
                alert("Por favor llene todos los campos")
            }
        });
    });
});

//Active para botones nav principal
$(function(){
    var cambio = false;
    $('.nav li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            cambio = true;
        }
    });
    if(!cambio){
        $('.nav li:first').addClass("active");
    }
});  

$(function(){
     $('.bxslider').bxSlider({
        slideWidth: 900,
        minSlides: 3,
        maxSlides: 3,
        moveSlides: 1,
        pager: false,
        auto: true
      });
}); 