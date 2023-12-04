<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('/assets/img/fondologin.jpeg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    #container {
      max-width: 600px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: slideDown 500ms forwards;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    @keyframes slideDown {
      0% {
        transform: translateY(-100%);
      }

      100% {
        transform: translateY(0);
      }
    }

    h1 {
      color: #333;
    }

    p {
      color: #555;
    }

    footer {
      margin-top: 20px;
      text-align: center;
      color: #888;
    }

    #buyButton {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
    }

    #logo {
      max-width: 100px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div id="container">
  <h1>Querido Cliente</h1>

  <p>¡Gracias por elegir Zareshka! Estamos encantados de que hayas confiado en nosotros para tu reciente compra. Tu satisfacción es nuestra prioridad, y estamos seguros de que disfrutarás de tu nuevo articulo.</p>

  <p>Nos esforzamos por brindar productos de alta calidad y un servicio excepcional, y tu elección nos motiva a seguir mejorando. Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto con nuestro equipo de atención al cliente.</p>

  <p>¡Gracias nuevamente por ser parte de la familia Zareshka!</p>

  <button id="buyButton" onclick="location.href='index.php'">Volver a comprar</button>

  <footer>
    <p>Atentamente,<br>Zareshka</p>
    <img id="logo" src="/assets/img/logo.png" alt="Logo de tu Tienda">
  </footer>
</div>

</body>
</html>
