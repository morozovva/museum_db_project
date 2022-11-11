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
    <h2>Склад</h2>
    <?php include 'project/tables/storage_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/storage_add.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер ячейки на складе</label>
            <input type="number" min="1" step="1" class="form-control" id="cell_number" name="cell_number" required placeholder="Введите номер ячейки на складе">
            <label for="vacant">Доступность</label>
            <select class="form-select" id="vacant" name="vacant">
                <option value="0" selected disabled>Введите доступность</option>
                <option value="0">Свободно (0)</option>
                <option value="1">Занято (1)</option>
            </select>
            <label for="sector">Сектор</label>
            <input type="text" class="form-control" id="sector" name="sector" placeholder="Введите сектор">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Добавить</button>
    </form>
</div>


<div class="container p-4">
    <h3>Удалить запись</h3>
    <form action="project/delete/storage_del.php" method="post">
        <div class="form-group">
            <label for="appearance">Номер ячейки на складе</label>
            <input type="number" min="1" step="1" class="form-control" id="cell_number" name="cell_number" placeholder="Введите номер ячейки на складе">
            <label for="vacant">Доступность</label>
            <select class="form-select" id="vacant" name="vacant">
                <option value="" selected disabled>Введите доступность</option>
                <option value="0">Свободно (0)</option>
                <option value="1">Занято (1)</option>
            </select>
            <label for="sector">Сектор</label>
            <input type="text" class="form-control" id="sector" name="sector" placeholder="Введите сектор">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Удалить</button>
    </form>
</div>

<div class="container p-4">
    <h3>Изменить запись</h3>
    <form action="project/update/storage_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="appearance">Номер ячейки на складе</label>
                    <input type="number" min="1" step="1" class="form-control" id="w_cell_number" name="w_cell_number" placeholder="Введите номер ячейки на складе">
                    <label for="vacant">Доступность</label>
                    <select class="form-select" id="w_vacant" name="w_vacant">
                        <option value="" selected disabled>Введите доступность</option>
                        <option value="0">Свободно (0)</option>
                        <option value="1">Занято (1)</option>
                    </select>
                    <label for="sector">Сектор</label>
                    <input type="text" class="form-control" id="w_sector" name="w_sector" placeholder="Введите сектор">
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="appearance">Номер ячейки на складе</label>
                    <input type="number" min="1" step="1" class="form-control" id="s_cell_number" name="s_cell_number" placeholder="Введите номер ячейки на складе">
                    <label for="vacant">Доступность</label>
                    <select class="form-select" id="s_vacant" name="s_vacant">
                        <option value="" selected disabled>Введите доступность</option>
                        <option value="0">Свободно (0)</option>
                        <option value="1">Занято (1)</option>
                    </select>
                    <label for="sector">Сектор</label>
                    <input type="text" class="form-control" id="s_sector" name="s_sector" placeholder="Введите сектор">
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