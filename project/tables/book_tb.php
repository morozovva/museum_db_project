<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Номер записи в инвентарной книге</th>
        <th scope="col">Номер инвентарной книги в архиве</th>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM inventory_book";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>" . $row["record_number"] . "</td><td>"  . $row["book_number"] . "</td></tr>";
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

