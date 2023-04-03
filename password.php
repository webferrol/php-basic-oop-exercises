<?php
declare(strict_types = 1);
class Password {
    private int $longitud = 8;
    private string $password = '';

    function __construct (int $longitud = 8) {
        $this->longitud = $longitud;
        $this->generarPassword();
    }

    function getPassword(): string {
        return $this->password;
    }

    function getLongitud(): int {
        return $this->longitud;
    }

    function setLongitud(int $longitud): void {
        $this->longitud = $longitud;
    }

    function generarPassword (): void {
        $this->password = '';
        for ($i = 0; $i < $this->longitud; $i++) {
            $this->password.= $this->aleatorio();
        }
    }

    function aleatorio (): string {
        $a1 = chr(rand(65, 90));
        $a2 = chr(rand(97, 122));
        $a3 = chr(rand(48, 57));
        $array = [$a1, $a2, $a3];
        return $array[rand(0,2)];
    }

    function esFuerte (): bool {
        preg_match_all("/[a-z]/", $this->password, $lowerCaseMatches,PREG_SET_ORDER);
        preg_match_all("/[A-Z]/", $this->password, $upperCaseMatches, PREG_SET_ORDER);
        preg_match_all("/[0-9]/", $this->password, $numberMatches, PREG_SET_ORDER);
        return count($lowerCaseMatches) > 1 && count($upperCaseMatches) > 2 && count($numberMatches) > 1;
    }
    function __toString(): string{
        return join(',', [$this->password, $this->longitud]);
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Passoword</title>
</head>
<body>
    <?php
    $p1 = new Password();
    echo 'Password: ',sprintf('<mark>%s</mark>',$p1->getPassword()),$p1->esFuerte() ? ' Fuerte': ' Débil';

    $p2 = new Password(16);
    echo '<br>Password: ',sprintf('<mark>%s</mark>',$p2->getPassword()),$p2->esFuerte() ? ' Fuerte': ' Débil';
    ?>
</body>
</html>



