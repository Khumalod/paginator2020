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
<div class="container">
    <div class="row">
            <!-- Search form -->
                <form class="form-inline" style="margin-top:20px">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="first_position" class="sr-only">Password</label>
                        <input type="text" class="form-control" id="first_position" placeholder="First Position">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="second_position" class="sr-only">Password</label>
                        <input type = "text" class="form-control" id="second_position" placeholder="Second Position">
                    </div>
                    <a class="btn btn-primary mb-2" id="search" href="#">Search</a>
                </form>
            <ul class="user-profiles-list-basic">


            </ul>
    </div>
    <nav aria-label="Page navigation pagination-link" style="margin-top:45px;">
        <ul class="pagination">

        </ul>
    </nav>
</div>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/HoldOn.min.js"></script>
<script>
    var options = {
        theme:"sk-cube-grid",
        message:'Loading people profiles',
        backgroundColor:'rgba(0,0,0,0.5)',
        textColor:"white"
    };

//    var fist_position = $('#first_position').val();
//    var second_position = $('#second_position').val();

    $(document).ready(function(){
        paginate('get_data.php');
    });

    $('#search').click(function(){
        var fist_position = document.getElementById("first_position").value
        var second_position = document.getElementById("second_position").value
        paginate('get_data.php?fist_position='+fist_position+'&second_position='+second_position);
    })
    function paginate(request_uri){
        $.ajax({
            type: "GET",
            url: request_uri,
            beforeSend:function(){ HoldOn.open(options); },
            success: function(response){
                setTimeout(function(){
                    response = JSON.parse(response);
                    $('.user-profiles-list-basic').html(response.user_profile);
                    $('.pagination').html(response.pagination_links);
                    HoldOn.close();
                }, 500)
            },
            error: function(jq,status,message) {
                alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
            }
        });
    }


</script>