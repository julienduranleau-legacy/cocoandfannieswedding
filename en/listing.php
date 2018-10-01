<?php
$db = new PDO('sqlite:../db/fanniecoco.db');

$stmt = $db->prepare("
    SELECT * FROM guests
");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="fr" class="page listing">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../styles/compiled/styles.css">
        <link rel="stylesheet" type="text/css" href="../tablesorterStyle/style.css">
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../bower_components/tablesorter/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <header>
            <img src="../images/logo-header.png">
        </header>
        <div class="result-content">
            <table class="tablesorter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Available</th>
                        <th>Name 1</th>
                        <th>Name 2</th>
                        <th>Name 3</th>
                        <th>Name 4</th>
                        <th>Name 5</th>
                        <th>Comments</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['available'] ?></td>
                            <td><?php echo $result['name1'] ?></td>
                            <td><?php echo $result['name2'] ?></td>
                            <td><?php echo $result['name3'] ?></td>
                            <td><?php echo $result['name4'] ?></td>
                            <td><?php echo $result['name5'] ?></td>
                            <td><?php echo $result['comments'] ?></td>
                            <td><?php echo date('r', $result['saveDate']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script>
            $(function() { 
                $("table").tablesorter()
                //$("table").tablesorter({sortList: [[0,0]]})
            })
        </script>
    </body>
</html>