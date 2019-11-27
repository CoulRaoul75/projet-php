
<h1>LISTE DES CONTACTS</h1>

<table class="table table-bordered table-striped">
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Action</th
    </tr>

    <?php foreach($contactList as $contact): ?>
        <tr>
            <td> <?= $contact["firstName"] ?> </td>
            <td> <?= $contact["name"] ?> </td>
            <td>
                <a class="btn btn-danger delete"
                    href="/app.php?route=supprimer&id=<?=$contact["id"]?>">Supprimer</a>

                <a class="btn btn-info change"
                   href="/app.php?route=ajout-contact&id=<?=$contact["id"]?>">Modifier</a>
            </td>
        </tr>
    <?php endforeach?>
</table>

<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            return confirm("Voulez-vous supprimer ce contact ?");
        })
        $(".change").click(function(){
            return confirm("Voulez-vous modifier ce contact ?");
        })
    });
</script>

<div class="mt-2 mb-2 text-right">
    <a href="/app.php?route=ajout-contact" class="btn btn-primary btn-right">
        Ajouter un contact</a>
</div>


