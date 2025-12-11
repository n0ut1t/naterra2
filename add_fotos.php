<?php
$file = file_get_contents('app/Helpers/preguntas.php');

// Reemplazar cada 'correcta' => X con 'correcta' => X, 'foto' => 'img/c#_p#.jpg'
for ($c = 1; $c <= 5; $c++) {
    for ($p = 1; $p <= 10; $p++) {
        $pattern = "/(\[\s*'pregunta'[^]]*'correcta' => \\d+)(?!.*'foto')/s";
        $replacement = "$1, 'foto' => 'img/c{$c}_p{$p}.jpg'";
        $file = preg_replace($pattern, $replacement, $file, 1);
    }
}

file_put_contents('app/Helpers/preguntas.php', $file);
echo "✅ Fotos agregadas\n";
?>
