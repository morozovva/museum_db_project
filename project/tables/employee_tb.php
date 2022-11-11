<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Идентификатор</th>
        <th scope="col">Идентификатор должности</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Дата рождения</th>
        <th scope="col">Дата принятия на работу</th>
        <th scope="col">Дата увольнения</th>
        <th scope="col">Статус</th>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th><td>" .
                $row["employee_id"] . "</td><td>" .
                $row["position_id"] . "</td><td>" .
                $row["surname"] . "</td><td>" .
                $row["name"] . "</td><td>" .
                $row["patronymic"] . "</td><td>" .
                substr($row["phone_number"], -11, -10) . "(" . substr($row["phone_number"], -10, -7) . ")" . substr($row["phone_number"], -7, -4) . "-" . substr($row["phone_number"], -4, -2) . "-" . substr($row["phone_number"], -2)
                 . "</td><td>" .
                $row["date_of_birth"] . "</td><td>" .
                $row["date_of_employment"] . "</td><td>" .
                $row["date_of_dismissal"] . "</td><td>" .
                $row["status"] . "</td></tr>";
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
