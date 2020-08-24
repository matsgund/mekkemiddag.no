
<?php
// Makes an array of the ingredients list
$array= $posts->ingredients_1;
$newArray = explode(',', $array);

$array=$posts->ingredients_2;
$newArray2 = explode(',', $array);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oppskrifter</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION1') }}css/styling.css">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION1') }}css/recipe.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <!-- Goole fonts -->
    <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">

</head>
<body>

<!--Container start -->
<div class="container">

    <!-- row 1 -->
    <div class="row1">
        <h2>{{$posts->title}}</h2>
        <h3>Tilbereding: {{$posts->estimated_time}} minutter<i class="fa fa-circle"></i>{{$posts->category}}</h3>
    </div>

    <!--row 2-->
    <div class="row2-recipe">
        <img src="{{asset('storage/app/public/full_size_images/' . $posts->picture)}}" alt="Bilde av oppskrift">
    </div>

    <!--row 3-->
    <div class="row3-recipe">
        <h3>Ingredienser</h3>
    </div>

    <!--row 4-->
    <div class="row4-recipe">
        <div class="ingrediens-box">
            <h4>{{$posts->ingredients_title_1}}</h4>
            <ul>
                @foreach($newArray as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>

        <!--Checks if ingredients list 2 is empty -->
        @if($newArray2[0] !="")
            <div class="ingrediens-box">
                <h4>{{$posts->ingredients_title_2}}</h4>
                <ul>
                    @foreach($newArray2 as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!--row 5-->
    <div class="row5-recipe">
        <h3>Fremgangsmåte</h3>
        <!-- !!nl2br will display line brakes made by users input-->
        <p>{!!nl2br($posts->description)!!}</p>
        <br>
            <!--Checks if there is a timer and temperature set -->
            <p>
                @if($posts->timer != 0 && $posts->temperature != 0 )
                <i class="fas fa-thermometer-empty"></i>{{$posts->temperature}}C
                <i class="far fa-clock"></i>{{$posts->timer}} minutter
                @endif
            </p>
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
