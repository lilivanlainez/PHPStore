<?php
require_once "../config/conexion.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Obtener los datos del producto existente desde la base de datos basado en $product_id
    $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $product_id");
    $existingProduct = mysqli_fetch_assoc($query);
    
    if (!$existingProduct) {
        // Manejar el caso en el que el producto no exista
        header('Location: productos.php');
        exit;
    }
    
    if (isset($_POST['operation']) && $_POST['operation'] === 'update') {
        // Actualizar los datos del producto basado en los campos del formulario
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];
        $categoria = $_POST['categoria'];
        
        // Verificar si se proporciona una nueva imagen en el formulario
        if ($_FILES['foto']['name']) {
            // Eliminar la foto anterior (si existe)
            $foto_anterior = $existingProduct['imagen'];
            $ruta_foto_anterior = "../assets/img/$foto_anterior";
            if (file_exists($ruta_foto_anterior)) {
                unlink($ruta_foto_anterior);
            }
            
            // Subir la nueva imagen y actualizar la base de datos
            $img = $_FILES['foto'];
            $name = $img['name'];
            $tmpname = $img['tmp_name'];
            $fecha = date("YmdHis");
            $foto = $fecha . ".jpg";
            $destino = "../assets/img/" . $foto;
            
            if (move_uploaded_file($tmpname, $destino)) {
                // Actualizar la base de datos con el nuevo nombre de la imagen
                $updateQuery = "UPDATE productos SET nombre = '$nombre', cantidad = $cantidad, descripcion = '$descripcion', precio_normal = '$p_normal', precio_rebajado = '$p_rebajado', imagen = '$foto', id_categoria = $categoria WHERE id = $product_id";
                $updateResult = mysqli_query($conexion, $updateQuery);
                
                if ($updateResult) {
                    // Actualización exitosa
                    header('Location: productos.php');
                    exit;
                } else {
                    // Manejar el caso en el que la actualización falle
                    // Es posible que desees mostrar un mensaje de error aquí
                }
            }
        } else {
            // No se proporcionó una nueva imagen, actualizar solo los demás campos
            $updateQuery = "UPDATE productos SET nombre = '$nombre', cantidad = $cantidad, descripcion = '$descripcion', precio_normal = '$p_normal', precio_rebajado = '$p_rebajado', id_categoria = $categoria WHERE id = $product_id";
            $updateResult = mysqli_query($conexion, $updateQuery);
            
            if ($updateResult) {
                // Actualización exitosa
                header('Location: productos.php');
                exit;
            } else {
                // Manejar el caso en el que la actualización falle
                // Es posible que desees mostrar un mensaje de error aquí
            }
        }
    }
} else {
    // Manejar el caso en el que no se proporcionó un ID de producto válido
    header('Location: productos.php');
    exit;
}

include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="operation" value="update">
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $existingProduct['nombre']; ?>" required>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $existingProduct['cantidad']; ?>" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" rows="3" required><?php echo $existingProduct['descripcion']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="p_normal">Precio Normal</label>
            <input id="p_normal" class="form-control" type="text" name="p_normal" placeholder="Precio Normal" value="<?php echo $existingProduct['precio_normal']; ?>" required>
        </div>

        <div class="form-group">
            <label for="p_rebajado">Precio Rebajado</label>
            <input id="p_rebajado" class="form-control" type="text" name="p_rebajado" placeholder="Precio Rebajado" value="<?php echo $existingProduct['precio_rebajado']; ?>" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select id="categoria" class="form-control" name="categoria" required>
                <?php
                $categorias = mysqli_query($conexion, "SELECT * FROM categorias");
                foreach ($categorias as $cat) { ?>
                    <option value="<?php echo $cat['id']; ?>" <?php if ($cat['id'] == $existingProduct['id_categoria']) echo "selected"; ?>><?php echo $cat['categoria']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="foto">Imagen</label>
            <input type="file" class="form-control" name="foto">
        </div>

        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php include("includes/footer.php"); ?>
