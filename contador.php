<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>Contador</title>
</head>
<body>
  <?php
  class Contador {
    private int $cuenta = 0;

    function __construct ($number) {
      $this->cuenta = (int) $number;
    }

    function getCuenta () {
      return $this->cuenta;
    }

    function setCounter($op) {
      if ($op === 'plus') $this->incrementar();
      else $this->decrementar();
    }

    function incrementar () {
      $this->cuenta++;
    }

    function decrementar () {
      $this->cuenta--;
    }

  }

  $contador = new Contador($_GET['result']??0);

  if (isset($_REQUEST['op']))
    $contador->setCounter($_REQUEST['op'])
  ?>
  <form>
    <button id="plus" name="op" value="plus">+</button>
    <button id="minus" name="op" value="minus">-</button>
    <input name="result" value="<?=$contador->getCuenta()?>" readonly>
  </form>
</body>
</html>