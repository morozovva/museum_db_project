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

<!--<script>-->
<!--    function inputTypeChange() {-->
<!--        var inputBox = document.getElementById('condition');-->
<!--        this.value == 'position_id' ? inputBox.type = 'number' : inputBox.type = 'text';-->
<!--    }-->
<!--    document.getElementById('where').addEventListener('change', inputTypeChange);-->
<!--</script>-->

<script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>

<!-- <script id="replace_with_header" src="/project/header_/header.js"></script> -->
<script id="add_nav" src="/project/nav/nav.js"></script>

<div class="container p-4">
    <h2>Должности сотрудников</h2>
    <?php include 'project/tables/positions_tb.php';?>
</div>

<div class="container p-4">
    <h3>Добавить запись</h3>
    <form action="project/add/positions_add.php" method="post">
        <div class="form-group">
            <label for="duties">Должность</label>
            <input type="text" class="form-control" id="duties" name="duties" aria-describedby="dutiesHelp" placeholder="Введите должность">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Добавить</button>
    </form>
</div>


<div class="container p-4">
    <h3>Удалить запись</h3>
    <form action="project/delete/positions_del.php" method="post">
        <div class="form-group">
            <label for="position_id">Идентификатор</label>
            <input type="number" min="1" step="1" class="form-control" id="position_id" name="position_id" aria-describedby="dutiesHelp" placeholder="Введите идентификатор">
        </div>
        <div class="form-group">
            <label for="duties">Должность</label>
            <input type="text" class="form-control" id="duties" name="duties" aria-describedby="dutiesHelp" placeholder="Введите должность">
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Удалить</button>
    </form>
</div>

<div class="container p-4">
    <h3>Изменить запись</h3>
    <form action="project/update/positions_update.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="condition" style="font-weight: bold">Где</label>
                <div class="form-group">
                    <label for="position_id">Идентификатор</label>
                    <input type="number" min="1" step="1" class="form-control" id="w_position_id" name="w_position_id" placeholder="Введите идентификатор">
                    <label for="book_number">Должность</label>
                    <input type="text" class="form-control" id="w_duties" name="w_duties" placeholder="Введите должность">
                </div>
            </div>
            <div class="col-6">
                <label for="change" style="font-weight: bold">Изменить</label>
                <div class="form-group">
                    <label for="position_id">Идентификатор</label>
                    <input type="number" min="1" step="1" class="form-control" id="s_position_id" name="s_position_id" placeholder="Введите идентификатор">
                    <label for="book_number">Должность</label>
                    <input type="text" class="form-control" id="s_duties" name="s_duties" placeholder="Введите должность">
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Изменить</button>
    </form>
<br><br><br>
</div>

<!--<div class="container p-4">-->
<!--    <h3>Ввести запрос на вывод</h3>-->
<!--    <form action="project/query/positions_query.php" method="post">-->
<!--        <div class="form-group">-->
<!--            <label for="duties">Выбрать</label>-->
<!--            <input type="text" class="form-control" id="duties" name="duties" aria-describedby="dutiesHelp" placeholder="Введите должность">-->
<!--        </div>-->
<!--        <br>-->
<!--        <button type="submit" class="btn btn-dark">Отправить</button>-->
<!--    </form>-->
<!---->
<!--</div>-->

</body>
</html>
