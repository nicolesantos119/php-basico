<?php

date_default_timezone_set("America/Sao_Paulo");

$data = date("d/m/Y");
$hora = date("H:i:s");

$mensagem = "Hoje é " . $data . " e agora são " . $hora . ".";

$mensagemInterpolada = "Hoje é $data e agora são $hora.";

$horaAtual = (int) date("H");

if ($horaAtual < 12) {
    $saudacao = "Bom dia";
} elseif ($horaAtual < 18) {
    $saudacao = "Boa tarde";
} else {
    $saudacao = "Boa noite";
}

$diasSemana = [
    "domingo",
    "segunda-feira",
    "terça-feira",
    "quarta-feira",
    "quinta-feira",
    "sexta-feira",
    "sábado"
];

$diaSemana = $diasSemana[(int) date("w")];

$dataFormatada = date("d/m/y H:i");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e hora</title>
</head>

<body>

    <h1>Data e hora do servidor</h1>

    <h2><?= $saudacao ?>!</h2>

    <p>Hoje é <strong><?= $data ?></strong>.</p>

    <p>Agora são <strong><?= $hora ?></strong>.</p>

    <p><?= $mensagem ?></p>

    <p><?= $mensagemInterpolada ?></p>

    <p>Dia da semana: <?= $diaSemana ?>.</p>

    <p>Data formatada: <?= $dataFormatada ?>.</p>

    <h2>Relógio ao vivo</h2>

    <p id="relogio"></p>

    <script>
        function atualizarRelogio() {
            const agora = new Date();

            const hora = agora.toLocaleTimeString("pt-BR", {
                timeZone: "America/Sao_Paulo"
            });

            document.getElementById("relogio").textContent = hora;
        }

        atualizarRelogio();

        setInterval(atualizarRelogio, 1000);
    </script>

</body>

</html>