<?php

$produtos = [
    [
        "nome" => "Teclado mecânico",
        "preco" => 249.90,
        "estoque" => 12,
        "categoria" => "Informática"
    ],
    [
        "nome" => "Mouse sem fio",
        "preco" => 79.50,
        "estoque" => 30,
        "categoria" => "Informática"
    ],
    [
        "nome" => "Monitor",
        "preco" => 899.90,
        "estoque" => 5,
        "categoria" => "Informática"
    ],
    [
        "nome" => "Headset",
        "preco" => 159.90,
        "estoque" => 0,
        "categoria" => "Áudio"
    ]
];

function formatarPreco(float $valor): string {
    return "R$ " . number_format($valor, 2, ",", ".");
}

usort($produtos, function ($a, $b) {
    return $a["preco"] <=> $b["preco"];
});

$total = 0;

foreach ($produtos as $item) {
    $total += $item["preco"] * ($item["estoque"] ?? 0);
}

$quantidade = count($produtos);

$filtro = 100;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .esgotado {
            color: red;
            font-weight: bold;
        }

        .disponivel {
            color: green;
        }
    </style>

</head>

<body>

    <h1>Lista de produtos</h1>

    <h2>Todos os produtos</h2>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Situação</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($produtos as $item): ?>

                <tr>
                    <td><?= htmlspecialchars($item["nome"]) ?></td>

                    <td><?= htmlspecialchars($item["categoria"]) ?></td>

                    <td><?= formatarPreco($item["preco"]) ?></td>

                    <td><?= $item["estoque"] ?></td>

                    <td class="<?= $item["estoque"] > 0 ? 'disponivel' : 'esgotado' ?>">
                        <?= $item["estoque"] > 0 ? "Disponível" : "Esgotado" ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <p>
        <?= $quantidade ?> produtos cadastrados.
        Valor total em estoque: <?= formatarPreco($total) ?>
    </p>

    <h2>Produtos com preço acima de <?= formatarPreco($filtro) ?></h2>

    <ul>

        <?php foreach ($produtos as $item): ?>

            <?php if ($item["preco"] > $filtro): ?>

                <li>
                    <?= htmlspecialchars($item["nome"]) ?>
                    — <?= formatarPreco($item["preco"]) ?>
                </li>

            <?php endif; ?>

        <?php endforeach; ?>

    </ul>

</body>

</html>