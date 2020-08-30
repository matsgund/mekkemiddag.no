<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oppskrifter</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/styling.css">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/recipe.css">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/create.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
    <!-- Script for Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>

@include('navbar.navbar')

<!--Container start -->
<div class="container">

    <!-- row 1 -->
    <div class="row1">
        <h2>Legg til ny oppskrift</h2>
    </div>

    <!--row 2-->
    <div class="row2-recipe">
        <form method="POST" enctype="multipart/form-data" action="{{ action('PostController@store') }}">

            {{csrf_field()}}

            <div class="form-group">
                <label for="Title">Tittel</label>
                <input type="text" class="form-control" id="" name="title" placeholder="eksempel: Kjøttkaker i brun saus" required>
            </div>
            <div class="form-group">
                <label for="Categories">Kategory</label>
                <select class="form-control" id="" name="category">
                    <option>Bakverk</option>
                    <option>Hovedrett</option>
                    <option>Dessert</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Estimated_time">Estimert tid</label>
                <input type="number" class="form-control" id="" name="estimated_time" placeholder="eksempel: 60" required>
            </div>
            <div class="form-group">
                <label for="Upload_image">Last opp bilde</label>
                <input type="file" class="form-control-file" id="" name="picture" required>
            </div>
            <br>
            <hr>
            <br>
            <div class="form-group">
                <label for="Ingrediens_title_1">Ingrediens tittel tabell 1</label>
                <input type="text" class="form-control" id="" name="ingredients_title_1" placeholder="eksempel: Pizzabunn">
            </div>
            <div class="form-group">
                <label for="Ingredients_list_1">Ingredienser1</label>
                <textarea class="form-control " id="" name="ingredients_1" placeholder="eksempel: Melk 1l, Mel 2kg, Salt 1ts" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="Ingrediens_title_2">Ingrediens tittel tabell 2</label>
                <input type="text" class="form-control" id="" name="ingredients_title_2" placeholder="eksempel: fyll">
            </div>
            <div class="form-group">
                <label for="Ingredients_list_2">Ingredienser2</label>
                <textarea class="form-control " id="" name="ingredients_2" placeholder="eksempel: Ost 3dl, Skinke 200g, Salt 1ts" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="Description">Fremgangsmåte</label>
                <textarea class="form-control " id="" name="description" rows="12" required></textarea>
            </div>
            <br>
            <hr>
            <br>
            <div class="form-group">
                <label for="Temperature">Temperatur ovn</label>
                <input type="number" class="form-control" id="" name="temperature" placeholder="eksempel: 225" value="0">
            </div>
            <div class="form-group">
                <label for="Time_in_oven">Tid i ovn</label>
                <input type="number" class="form-control" id="" name="timer" placeholder="eksempel: 30" value="0">
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-lg mb-2" id="submitButton">  Legg til  </button>
            </div>

            <!--If any errors should accrue -->
            @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

        </form>
    </div>

    <!--row 5 footer-->
    <div class="row5">

        <footer>
            <p class="copy-right">Copyright <i class="fa fa-copyright"></i> 2018 – Mats Gundersen </p>
        </footer>

    </div>

    <!--Container end -->
</div>
</body>

</html>
