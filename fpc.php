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
    <h2>Визиты в Фондово-закупочную комиссию</h2>
    <?php include 'project/tables/fpc_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/fpc_add.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер визита</label>
            <input type="number" min="1" step="1" class="form-control" id="visit_number" name="visit_number" placeholder="Введите номер визита">
            <label for="fpc_decision">Решение ФЗК</label>
            <select class="form-select" id="fpc_decision" name="fpc_decision">
                <option value="" selected disabled>Введите решение ФЗК</option>
                <option value="0">Оттрицательное (0)</option>
                <option value="1">Положительное (1)</option>
            </select>
            <label for="item_id">Иденификатор предмета</label>
            <select class="form-select" id="item_id" name="item_id">
                <option value="NULL" selected disabled>Введите иденификатор предмета</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM item';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["item_id"];
                    echo '<option value="'. $temp.'" >' . $temp . " (Описание: ". $row["appearance"] . ")" . "</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Добавить</button>
    </form>
</div>


<div class="container p-4">
    <h3>Удалить запись</h3>
    <form action="project/delete/fpc_del.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер визита</label>
            <input type="number" min="1" step="1" class="form-control" id="visit_number" name="visit_number" placeholder="Введите номер визита">
            <label for="fpc_visit">Решение ФЗК</label>
            <select class="form-select" id="fpc_decision" name="fpc_decision">
                <option value="" selected disabled>Введите решение ФЗК</option>
                <option value="0">Оттрицательное (0)</option>
                <option value="1">Положительное (1)</option>
            </select>
            <label for="item_id">Иденификатор предмета</label>
            <select class="form-select" id="item_id" name="item_id">
                <option value="NULL" selected disabled>Введите иденификатор предмета</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM item';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["item_id"];
                    echo '<option value="'. $temp.'" >' . $temp . " (Описание: ". $row["appearance"] . ")" . "</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Удалить</button>
    </form>
</div>

<div class="container p-4">
    <h3>Изменить запись</h3>
    <form action="project/update/fpc_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="appearance">Номер визита</label>
                    <input type="number" min="1" step="1" class="form-control" id="w_visit_number" name="w_visit_number" placeholder="Введите номер визита">
                    <label for="fpc_visit">Решение ФЗК</label>
                    <select class="form-select" id="w_fpc_decision" name="w_fpc_decision">
                        <option value="" selected disabled>Введите решение ФЗК</option>
                        <option value="0">Оттрицательное (0)</option>
                        <option value="1">Положительное (1)</option>
                    </select>
                    <label for="item_id">Иденификатор предмета</label>
                    <select class="form-select" id="w_item_id" name="w_item_id">
                        <option value="NULL" selected disabled>Введите иденификатор предмета</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM item';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["item_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Описание: ". $row["appearance"] . ")" . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="appearance">Номер визита</label>
                    <input type="number" min="1" step="1" class="form-control" id="s_visit_number" name="s_visit_number" placeholder="Введите номер визита">
                    <label for="fpc_visit">Решение ФЗК</label>
                    <select class="form-select" id="s_fpc_decision" name="s_fpc_decision">
                        <option value="" selected disabled>Введите решение ФЗК</option>
                        <option value="0">Оттрицательное (0)</option>
                        <option value="1">Положительное (1)</option>
                    </select>
                    <label for="item_id">Иденификатор предмета</label>
                    <select class="form-select" id="s_item_id" name="s_item_id">
                        <option value="NULL" selected disabled>Введите иденификатор предмета</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM item';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["item_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Описание: ". $row["appearance"] . ")" . "</option>";
                        }
                        ?>
                    </select>
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
