<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Номер ячейки на складе</th>
        <th scope="col">Доступность</th>
        <th scope="col">Сектор</th>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM storage_place";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>" . $row["cell_number"] . "</td><td>" . $row["vacant"] . "</td><td>" . $row["sector"] . "</td></tr>";
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

