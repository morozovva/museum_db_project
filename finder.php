<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База данных музея</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="project/main/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">-->
</head>

<div>

<script>
</script>

<script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>

<!-- <script id="replace_with_header" src="/project/header_/header.js"></script> -->
<script id="add_nav" src="/project/nav/nav.js"></script>

<div class="container p-4">
    <h3>Найти по слову</h3>
    <form action="finder_sql.php" method="post">
        <div class="form-group">
                <div class="col-6">
                    <label for="appearance">Что хотите найти?</label>
                    <input type="text" class="form-control" id="find_what" name="find_what">
                </div>
            </div>
        <br>
        <button type="submit" class="btn btn-dark float-start">Отправить</button>
    </form>
</div>
</div>

<?php //include 'project/query/show_query.php';?>
</body>
</html>