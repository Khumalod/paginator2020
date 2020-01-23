<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Freebie: 12 Practical Templates For List Pages</title>

    <link rel="stylesheet" href="assets/css/user-profiles-lists/user-profiles-list-basic.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user-profiles-lists/user-profiles-list-basic.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/HoldOn.min.css">
</head>
<style>
    .active-pink-4 input[type=text]:focus:not([readonly]) {
        border: 1px solid #f48fb1;
        box-shadow: 0 0 0 1px #f48fb1;
    }
    .active-pink-3 input[type=text] {
        border: 1px solid #f48fb1;
        box-shadow: 0 0 0 1px #f48fb1;
    }
    .active-purple-4 input[type=text]:focus:not([readonly]) {
        border: 1px solid #ce93d8;
        box-shadow: 0 0 0 1px #ce93d8;
    }
    .active-purple-3 input[type=text] {
        border: 1px solid #ce93d8;
        box-shadow: 0 0 0 1px #ce93d8;
    }
    .active-cyan-4 input[type=text]:focus:not([readonly]) {
        border: 1px solid #4dd0e1;
        box-shadow: 0 0 0 1px #4dd0e1;
    }
    .active-cyan-3 input[type=text] {
        border: 1px solid #4dd0e1;
        box-shadow: 0 0 0 1px #4dd0e1;
    }
</style>
<body>
<?php
    include_once('get_data.php');
   print_r($_REQUEST);
?>
<div class="container">
    <div class="row">
        <!-- Search form -->
        <form action="<?= $_SERVER['PHP_SELF']?>" class="form-inline"  method="get" style="margin-top:20px">
            <div class="form-group mx-sm-3 mb-2">
                <label for="first_position" class="sr-only">Password</label>
                <input type="text" class="form-control" id="first_position" placeholder="First Position">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="second_position" class="sr-only">Password</label>
                <input type="text" class="form-control" id="second_position" placeholder="Second Position">
            </div>
            <input type="submit" class="btn btn-primary mb-2"></input>
        </form>
        <ul class="user-profiles-list-basic">
            <?php echo $players_html ?>
        </ul>
    </div>
    <nav aria-label="Page navigation pagination-link" style="margin-top:45px;">
        <ul class="pagination">
            <?php echo $pagination_links ?>
        </ul>
    </nav>
</div>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/HoldOn.min.js"></script>
<script>
</script>