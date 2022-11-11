<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Номер акта</th>
        <th scope="col">Идентификатор ответственного сорудника</th>
        <th scope="col">Документ</th>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM act_of_accepting_an_object";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>"
                . $row["act_number"] . "</td><td>"
                . $row["employee_id"] . "</td><td>"
                . $row["document_file"] . "</td></tr>";
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


