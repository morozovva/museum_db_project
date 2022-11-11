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
    <h2>Инвентарные книги</h2>
    <?php include 'project/tables/book_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/book_add.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер записи в инвентарной книге</label>
            <input type="text" class="form-control" id="record_number" name="record_number" required placeholder="Введите номер записи в инвентарной книге">
            <label for="book_number">Номер инвентарной книги в архиве</label>
            <select class="form-select" id="book_number" name="book_number">
                <option value="NULL" selected disabled>Введите номер инвентарной книги в архиве</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM archive';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["book_number"];
                    echo '<option value="'. $temp.'" >' . $temp . "</option>";
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
    <form action="project/delete/book_del.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер записи в инвентарной книге</label>
            <input type="text" class="form-control" id="record_number" name="record_number" placeholder="Введите номер записи в инвентарной книге">
            <label for="book_number">Номер инвентарной книги в архиве</label>
            <select class="form-select" id="book_number" name="book_number">
                <option value="NULL" selected disabled>Введите номер инвентарной книги в архиве</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                $sql = 'SELECT * FROM archive';
                $result = $conn->query($sql);
                var_dump($result);
                while($row = $result-> fetch_assoc()) {
                    $temp = $row["book_number"];
                    echo '<option value="'. $temp.'" >' . $temp . "</option>";
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
    <form action="project/update/book_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="appearance">Номер записи в инвентарной книге</label>
                    <input type="text" class="form-control" id="w_record_number" name="w_record_number" placeholder="Введите номер записи в инвентарной книге">
                    <label for="book_number">Номер инвентарной книги в архиве</label>
                    <select class="form-select" id="w_book_number" name="w_book_number">
                        <option value="NULL" selected disabled>Введите номер инвентарной книги в архиве</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM archive';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["book_number"];
                            echo '<option value="'. $temp.'" >' . $temp . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="appearance">Номер записи в инвентарной книге</label>
                    <input type="text" class="form-control" id="s_record_number" name="s_record_number" placeholder="Введите номер записи в инвентарной книге">
                    <label for="book_number">Номер инвентарной книги в архиве</label>
                    <select class="form-select" id="s_book_number" name="s_book_number">
                        <option value="NULL" selected disabled>Введите номер инвентарной книги в архиве</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                        $sql = 'SELECT * FROM archive';
                        $result = $conn->query($sql);
                        var_dump($result);
                        while($row = $result-> fetch_assoc()) {
                            $temp = $row["book_number"];
                            echo '<option value="'. $temp.'" >' . $temp . "</option>";
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