<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modulo</title>
</head>

<body>

<!--Ecriture de la table en raccourci PHP-->
    <table>
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <?php if ($i % 2) : ?>
                <tr style="background-color:pink;">
                <?php else : ?>
                <tr>
                <?php endif ?>

                <?php for ($k = 1; $k <= 10; $k++) : ?>
                    <?php if ($k % 2 == 0) : ?>
                        <td style="background-color:green;"><?= $i * $k ?> </td>
                    <?php else : ?>
                        <td><?= $i * $k ?></td>
                    <?php endif ?>
                <?php endfor ?>
                </tr>
            <?php endfor ?>
    </table>

    <br>
<!--Ecriture de la table en PHP-->
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2) {
                echo '<tr style="background-color:#CCC;">';
            } else {
                echo '<tr>';
            }

            for ($k = 1; $k <= 10; $k++) {
                if ($k % 2 == 0) {
                    echo '<td style="background-color:#888;">' . $i * $k . '</td>';
                } else {
                    echo '<td>' . $i * $k . '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>

</body>

</html>