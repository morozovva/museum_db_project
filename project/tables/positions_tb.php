
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Идентификатор</th>
        <th scope="col">Должность</th>
<!--    </tr>-->
<?php
    $conn = mysqli_connect("localhost", "root", "root", "museum_database");
//    $sql = 'DESCRIBE positons';
//    $result = $conn->query($sql);
//    while($row = $result-> fetch_assoc()) {
//        echo "<th>" . $row['Field'] . "</th>";
//    }
////var_dump($rows);
//?>
        </tr>
    </thead>
    <tbody>
  <?php  
    $sql = "SELECT * FROM positons";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
        echo "<tr><th>" . "$rowNumber" . "</th><td>" . $row["position_id"] . "</td><td>" . $row["duties"] . "</td></tr>";
        $rowNumber+=1;
        }
    }
    else {
        echo "No результатов";
    }
    $conn->close();
 ?>

    </tbody>
</table>

