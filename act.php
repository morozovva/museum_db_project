<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База данных музея</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="project/main/main.css">
    <!--    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">-->
</head>

<body>

<script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>

<!-- <script id="replace_with_header" src="/project/header_/header.js"></script> -->
<script id="add_nav" src="/project/nav/nav.js"></script>

<div class="container p-4">
    <h2>Акты принятия предметов на постоянное хранение</h2>
    <?php include 'project/tables/act_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/act_add.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер акта</label>
            <input type="text" class="form-control" id="act_number" name="act_number" required placeholder="Введите номер акта">
            <label for="employee_id">Иденификатор ответственного сотрудника</label>
            <select class="form-select" id="employee_id" name="employee_id">
                <option value="NULL" selected disabled>Введите иденификатор ответственного сотрудника</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM employee WHERE status = 1';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["employee_id"];
                    echo '<option value="'. $temp.'" >' . $temp . " (ФИО: ". $row["surname"] . " ". $row["name"] . " ". $row["patronymic"] . ")" . "</option>";
                }
                ?>
            </select>
            <label for="document_file">Документ</label>
            <input type="text" class="form-control" id="document_file" name="document_file" placeholder="Введите документ">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Добавить</button>
    </form>
</div>


<div class="container p-4">
    <h3>Удалить запись</h3>
    <form action="project/delete/act_del.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер акта</label>
            <input type="text" class="form-control" id="act_number" name="act_number" placeholder="Введите номер акта">
            <label for="employee_id">Иденификатор ответственного сотрудника</label>
            <select class="form-select" id="employee_id" name="employee_id">
                <option value="NULL" selected disabled>Введите иденификатор ответственного сотрудника</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM employee';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["employee_id"];
                    echo '<option value="'. $temp.'" >' . $temp . " (ФИО: ". $row["surname"] . " ". $row["name"] . " ". $row["patronymic"] . ")" . "</option>";
                }
                ?>
            </select>
            <label for="document_file">Документ</label>
            <input type="text" class="form-control" id="document_file" name="document_file" placeholder="Введите документ">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Удалить</button>
    </form>
</div>

<div class="container p-4">
    <h3>Изменить запись</h3>
    <form action="project/update/act_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="appearance">Номер акта</label>
                    <input type="text" class="form-control" id="w_act_number" name="w_act_number" placeholder="Введите номер акта">
                    <label for="employee_id">Иденификатор ответственного сотрудника</label>
                    <select class="form-select" id="w_employee_id" name="w_employee_id">
                        <option value="NULL" selected disabled>Введите иденификатор ответственного сотрудника</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM employee';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["employee_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (ФИО: ". $row["surname"] . " ". $row["name"] . " ". $row["patronymic"] . ")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="document_file">Документ</label>
                    <input type="text" class="form-control" id="w_document_file" name="w_document_file" placeholder="Введите документ">
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="appearance">Номер акта</label>
                    <input type="text" class="form-control" id="s_act_number" name="s_act_number" placeholder="Введите номер акта">
                    <label for="employee_id">Иденификатор ответственного сотрудника</label>
                    <select class="form-select" id="s_employee_id" name="s_employee_id">
                        <option value="NULL" selected disabled>Введите иденификатор ответственного сотрудника</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM employee WHERE status = 1';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["employee_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (ФИО: ". $row["surname"] . " ". $row["name"] . " ". $row["patronymic"] . ")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="document_file">Документ</label>
                    <input type="text" class="form-control" id="s_document_file" name="s_document_file" placeholder="Введите документ">
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Изменить</button>
    </form>
    <br><br><br>
</div>
</body>
</html>
