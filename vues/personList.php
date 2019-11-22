<table class="table table-bordered table-striped">
    <tr>
        <th>Nom</th>
        <th>Age</th>
        <th>Skills</th>
    </tr>

    <?php foreach($personData as $person): ?>
    <tr>
        <td> <?= $person["name"] ?> </td>
        <td> <?= $person["age"] ?> </td>
        <td> <?= implode(",", $person["skills"]) ?> </td>
    </tr>
    <?php endforeach?>
</table>