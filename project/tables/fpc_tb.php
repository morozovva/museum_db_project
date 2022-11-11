<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Номер визита</th>
        <th scope="col">Решение ФЗК</th>
        <th scope="col">Идентификатор поступившего предмета</th>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM fpc_visit";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>"
                . $row["visit_number"] . "</td><td>"
                . $row["fpc_decision"] . "</td><td>"
                . $row["item_id"] . "</td></tr>";
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

