<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Идентификатор предмета</th>
        <th scope="col">Описание</th>
        <th scope="col">Происхождение</th>
        <th scope="col">Дата поступления</th>
        <th scope="col">Номер записи в инвентарной книге</th>
        <th scope="col">Номер акта приема</th>
        <th scope="col">Номер ячейки на складе</th>
        <th scope="col">Дата списания</th>
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
    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>" .
                $row["item_id"] . "</td><td>" .
                $row["appearance"] . "</td><td>" .
                $row["origin"] . "</td><td>" .
                $row["date_of_admission"] . "</td><td>" .
                $row["record_number"] . "</td><td>" .
                $row["act_number"] . "</td><td>" .
                $row["cell_number"] . "</td><td>" .
                $row["date_of_dismissal"] . "</td></tr>";
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


