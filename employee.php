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
    <h2>Сотрудники</h2>
    <?php include 'project/tables/employee_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/employee_add.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="position_id">Идентификатор должности</label>
                    <select class="form-select" id="position_id" name="position_id">
                        <option value="NULL" selected disabled>Введите идентификатор должности</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM positons';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["position_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Должность: ". $row["duties"] .")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Введите фамилию">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic" placeholder="Введите отчество">
                </div>
                <div class="col-6">
                    <label for="phone_number">Номер телефона</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="[7-8]{1}[0-9]{10}" size="11" placeholder="Введите номер телефона">
                    <label for="date_of_birth">Дата рождения</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" max="2004-11-30" placeholder="Введите дату рождения">
                    <label for="date_of_employment">Дата принятия на работу</label>
                    <input type="date" class="form-control" id="date_of_employment" max="<?= date('Y-m-d'); ?>" name="date_of_employment" placeholder="Введите дату принятия на работу">
<!--                    <label for="date_of_dismissal">Дата увольнения</label>-->
<!--                    <input type="date" class="form-control" id="date_of_dismissal" name="date_of_dismissal" placeholder="Введите дату увольнения">-->
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Добавить</button>
    </form>
</div>


<div class="container p-4">
    <h3>Удалить запись</h3>
    <form action="project/delete/employee_del.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="appearance">Идентификатор</label>
                    <input type="number" min="1" step="1" class="form-control" id="employee_id" name="employee_id" placeholder="Введите идентификатор">
                    <label for="position_id">Идентификатор должности</label>
                    <select class="form-select" id="position_id" name="position_id">
                        <option value="NULL" selected disabled>Введите идентификатор должности</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM positons';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["position_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Должность: ". $row["duties"] .")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Введите фамилию">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic" placeholder="Введите отчество">
                </div>
                <div class="col-6">
                    <label for="phone_number">Номер телефона</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="[7-8]{1}[0-9]{10}" size="11" placeholder="Введите номер телефона">
                    <label for="date_of_birth">Дата рождения</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" max="2004-11-30" placeholder="Введите дату рождения">
                    <label for="date_of_employment">Дата принятия на работу</label>
                    <input type="date" class="form-control" id="date_of_employment" max="<?= date('Y-m-d'); ?>" name="date_of_employment" placeholder="Введите дату принятия на работу">
                    <label for="date_of_dismissal">Дата увольнения</label>
                    <input type="date" class="form-control" id="date_of_dismissal" max="<?= date('Y-m-d'); ?>" name="date_of_dismissal" placeholder="Введите дату увольнения">
                    <label for="status">Статус</label>
                    <select class="form-select" id="status" name="status">
                        <option value="" selected disabled>Введите статус сотрудника</option>
                        <option value="0">Уволен (0)</option>
                        <option value="1">Работает (1)</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Удалить</button>
    </form>
</div>

<div class="container p-4">
    <h3>Изменить запись</h3>
    <form action="project/update/employee_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="appearance">Идентификатор</label>
                    <input type="number" min="1" step="1" class="form-control" id="w_employee_id" name="w_employee_id" placeholder="Введите идентификатор">
                    <label for="position_id">Идентификатор должности</label>
                    <select class="form-select" id="w_position_id" name="w_position_id">
                        <option value="NULL" selected disabled>Введите идентификатор должности</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM positons';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["position_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Должность: ". $row["duties"] .")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="w_surname" name="w_surname" placeholder="Введите фамилию">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="w_name" name="w_name" placeholder="Введите имя">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="w_patronymic" name="w_patronymic" placeholder="Введите отчество">
                    <label for="phone_number">Номер телефона</label>
                    <input type="tel" class="form-control" id="w_phone_number" name="w_phone_number" pattern="[7-8]{1}[0-9]{10}" size="11" placeholder="Введите номер телефона">
                    <label for="date_of_birth">Дата рождения</label>
                    <input type="date" class="form-control" id="w_date_of_birth" name="w_date_of_birth" max="2004-11-30" placeholder="Введите дату рождения">
                    <label for="date_of_employment">Дата принятия на работу</label>
                    <input type="date" class="form-control" id="w_date_of_employment" max="<?= date('Y-m-d'); ?>" name="w_date_of_employment" placeholder="Введите дату принятия на работу">
                    <label for="date_of_dismissal">Дата увольнения</label>
                    <input type="date" class="form-control" id="w_date_of_dismissal" max="<?= date('Y-m-d'); ?>" name="w_date_of_dismissal" placeholder="Введите дату увольнения">
                    <label for="status">Статус</label>
                    <select class="form-select" id="w_status" name="w_status">
                        <option value="" selected disabled>Введите статус сотрудника</option>
                        <option value="0">Уволен (0)</option>
                        <option value="1">Работает (1)</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="appearance">Идентификатор</label>
                    <input type="number" min="1" step="1" class="form-control" id="s_employee_id" name="s_employee_id" placeholder="Введите идентификатор">
                    <label for="position_id">Идентификатор должности</label>
                    <select class="form-select" id="s_position_id" name="s_position_id">
                        <option value="NULL" selected disabled>Введите идентификатор должности</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM positons';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["position_id"];
                            echo '<option value="'. $temp.'" >' . $temp . " (Должность: ". $row["duties"] .")" . "</option>";
                        }
                        ?>
                    </select>
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="s_surname" name="s_surname" placeholder="Введите фамилию">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Введите имя">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="s_patronymic" name="s_patronymic" placeholder="Введите отчество">
                    <label for="phone_number">Номер телефона</label>
                    <input type="tel" class="form-control" id="s_phone_number" name="s_phone_number" pattern="[7-8]{1}[0-9]{10}" size="11" placeholder="Введите номер телефона">
                    <label for="date_of_birth">Дата рождения</label>
                    <input type="date" class="form-control" id="s_date_of_birth" name="s_date_of_birth" max="2004-11-30" placeholder="Введите дату рождения">
                    <label for="date_of_employment">Дата принятия на работу</label>
                    <input type="date" class="form-control" id="s_date_of_employment" max="<?= date('Y-m-d'); ?>" name="s_date_of_employment" placeholder="Введите дату принятия на работу">
                    <label for="date_of_dismissal">Дата увольнения</label>
                    <input type="date" class="form-control" id="s_date_of_dismissal" max="<?= date('Y-m-d'); ?>" name="s_date_of_dismissal" placeholder="Введите дату увольнения">
                    <label for="status">Статус</label>
                    <select class="form-select" id="s_status" name="s_status">
                        <option value="" selected disabled>Введите статус сотрудника</option>
                        <option value="0">Уволен (0)</option>
                        <option value="1">Работает (1)</option>
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