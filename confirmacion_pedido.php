<?php
// confirmacion_pedido.php
require_once "config/conexion.php";
require_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (código del encabezado) ... -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="assets/css/confirmacionde_pedido.css">
    <title>Confirmación de Pedido</title>

</head>

<body>
    <div class="container">
        <h2>Confirmación de Pedido</h2>
        <!-- Mostrar información del cliente -->
        <div id="infoCliente">
            <h4>Información del Cliente:</h4>
            <script>
                // Recuperar datos del localStorage en JavaScript
                var informacionCliente = JSON.parse(localStorage.getItem('informacion_cliente'));

                // Verificar si hay información del cliente
                if (informacionCliente) {
                    document.write("<p><strong>Nombre:</strong> " + informacionCliente.nombre + "</p>");
                    document.write("<p><strong>Correo Electrónico:</strong> " + informacionCliente.correo + "</p>");
                    document.write("<p><strong>Teléfono:</strong> " + informacionCliente.telefono + "</p>");
                } else {
                    document.write("<p>No hay información del cliente almacenada.</p>");
                }
            </script>
        </div>
<!-- Mostrar detalles de entrega -->
<div id="detallesEntrega">
    <h4>Detalles de Entrega:</h4>
    <script>
        // Recuperar detalles de entrega desde la entrada del cuerpo en JavaScript
        var detallesEntrega = JSON.parse(localStorage.getItem('detalles_entrega'));

        // Verificar si hay detalles de entrega
        if (detallesEntrega) {
            document.write("<p><strong>Departamento:</strong> " + detallesEntrega.departamento + "</p>");
            document.write("<p><strong>Municipio:</strong> " + detallesEntrega.municipio + "</p>");
            document.write("<p><strong>Dirección:</strong> " + detallesEntrega.direccion + "</p>");
            document.write("<p><strong>Punto de Referencia:</strong> " + detallesEntrega.referencia + "</p>");
        } else {
            document.write("<p>No hay detalles de entrega almacenados.</p>");
        }
    </script>
</div>


        <div class="table-responsive">
            <h4>Productos en el Carrito:</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody id="tblCarrito">

                </tbody>
            </table>
        </div>
        <h4>Total a Pagar: $<span id="total_pagar">0.00</span></h4>
        <div id="paypal-button-container"></div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Aea6PpK3-1fLwlHkTolC6urviWivZDgkcTdAOzm4jW_yCl973lRlNScyCnWyZIRDjr3oxZwyL9TcFVwq"></script>
    <script>
        mostrarCarrito();

        function mostrarCarrito() {
            if (localStorage.getItem("productos") != null) {
                let array = JSON.parse(localStorage.getItem('productos'));
                if (array.length > 0) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        async: true,
                        data: {
                            action: 'buscar',
                            data: array
                        },
                        success: function(response) {
                            console.log(response);
                            const res = JSON.parse(response);
                            let html = '';
                            res.datos.forEach(element => {
                                html += `
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td>$${element.precio}</td>
                                <td>1</td>
                                <td>$${element.precio}</td>
                            </tr>
                            `;
                            });
                            $('#tblCarrito').html(html);
                            $('#total_pagar').text(res.total);
                            paypal.Buttons({
                                style: {
                                    color: 'blue',
                                    shape: 'pill',
                                    label: 'pay'
                                },
                                size: 'responsive',
                                
                                createOrder: function(data, actions) {
                                    // This function sets up the details of the transaction, including the amount and line item details.
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: res.total
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    
                                    // This function captures the funds from the transaction.
                                    actions.order.capture().then(function(details) {
                                        // This function shows a transaction success message to your buyer.
                                        //window.location.href = 'pago_completado.php';
                                        //alert('Transaction completed by ' + details.payer.name.given_name);
                                    console.log(details)
                                    let url = 'captura.php'
                                    return fetch(url,{
                                        method:'post',
                                        headers:{
                                            'content-type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            details:details
                                        })
                                    }) 
                                    
                                });
                            }
                            }).render('#paypal-button-container');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            }
        }
    </script>
</body>

</html>
