<?php

/**
 * Get Clients on database
 * Return table with HTML, contents data
 */
function getClients() {
    $db = connexionRDS();
    $sql = "SELECT * FROM CAROLER_CLIENT";
    $result = $db->query($sql);
    if ($result->rowCount() > 0) { ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Ville</th>
                <th scope="col">Code Postal</th>
                <th scope="col">Rue</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Mail</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("DataDeleteProvider.php");
            while ($row = $result->fetch()) { ?>
                <tr>
                    <th scope="row"><?php echo$row['code_client'] ?></th>
                    <td><?php echo$row['nom_client'] ?></td>
                    <td><?php echo$row['prenom_client'] ?></td>
                    <td><?php echo$row['ville_client'] ?></td>
                    <td><?php echo$row['code_postale_client'] ?></td>
                    <td><?php echo$row['rue_client'] ?></td>
                    <td><?php echo$row['tel_client'] ?></td>
                    <td><?php echo$row['mail_client'] ?></td>
                    <td><div class="text-center"><button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button></div></td>
                    <td><div class="text-center"><button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button></div></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "0 results";
    }
}
