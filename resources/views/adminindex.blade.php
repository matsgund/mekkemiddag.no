<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mekkemiddag.no</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/styling.css">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/slider.css">
    <link rel="stylesheet" href="{{ env('APP_CSS_FOLDER_LOCATION2') }}css/gallary-recipes.css">
    <!--Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
</head>
<body>

   @include('navbar.navbar')

<!--Container start -->
<div class="cointainer-wrapper">
    <div class="container">

        <!-- row 1 -->
        <div class="row1">
            <h1>Mekkemiddag.no</h1>
            <h3>Her kan du søke i oppskrifter som er enkle å lage!</h3>
        </div>

        <!-- row 2 -->
        <div class="wrapper row2">

            <input checked type=radio name="slider" id="slide1" />
            <input type=radio name="slider" id="slide2" />
            <input type=radio name="slider" id="slide3" />

            <div class="slider-wrapper">
                <div class=inner>
                    <article class="slider-article">
                        <img  src="{{asset('storage/app/public/full_size_images/pizza.jpg')}}"/>
                        <div class="overlay-slider"> </div>
                        <div class="overlay-slider-textbox">
                            <h3>Pizza  <br>med parmaskinke</h3>
                            <p>Januar 30, 2018  <i class="fa fa-circle"></i>Hovedrett</p>
                            <a href="{{ env('APP_URL') }}/post/70">Se oppskriften</a>
                        </div>
                    </article>

                    <article class="slider-article">
                        <img  src="{{asset('storage/app/public/full_size_images/bread.jpg')}}"/>
                        <div class="overlay-slider"> </div>
                        <div class="overlay-slider-textbox">
                            <h3>Brød  <br>frøloff</h3>
                            <p>Februar 30, 2018  <i class="fa fa-circle"></i>Bakverk</p>
                            <a href="{{ env('APP_URL') }}/post/67">Se oppskriften</a>
                        </div>
                    </article>

                    <article class="slider-article">
                        <img  src="{{asset('storage/app/public/full_size_images/tomatosoup.jpg')}}"/>
                        <div class="overlay-slider"> </div>
                        <div class="overlay-slider-textbox">
                            <h3>Tomat <br>suppe</h3>
                            <p>Mars 30, 2018  <i class="fa fa-circle"></i>Hovedrett</p>
                            <a href="{{ env('APP_URL') }}/post/71">Se oppskriften</a>
                        </div>
                    </article>

                </div>
            </div>

            <div class="slider-prev-next-control">
                <label for=slide1></label>
                <label for=slide2></label>
                <label for=slide3></label>
                <label for=slide4></label>
                <label for=slide5></label>
            </div>

            <div class="slider-dot-control">
                <label for=slide1></label>
                <label for=slide2></label>
                <label for=slide3></label>
            </div>

        </div>

        <!--Row 3 search bar -->
        <div class="row3">

            <h3>Søk etter oppskrifter</h3>
            <!-- The form -->
            <form class="search-field-form" action="action_page.php">

                <input type="text" id="search-field" placeholder="Søk" name="search">
                <button type="submit"><i id="search-field-button" class="fa fa-search"></i></button>

                <div class="checkbox-div">
                    <label class="checkbox-label">Hovedretter
                        <input id="hovedretterBox" onclick="hideHovedretter()" value="hovedretter"  type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-label">Bakverk
                        <input id="bakverkBox" onclick="hideBakverk()" value="bakverk" type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-label">Dessert
                        <input id="dessertBox" onclick="hideDessert()" value="dessert" type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
            </form>

        </div>

        <!--Row 4 gallary-->
        <div class="row4">

            <section class="cards">

                @foreach($posts as $post)
                    <article class="article-search {{$post->category}} ">
                        <a href="{{ env('APP_URL') }}/post/{{$post->id}}">
                            <img class="article-img" src="{{asset('storage/app/public/thumbnails/' . $post->picture)}}" alt="Bilde av matretten " />
                        </a>
                        <p></p>
                        <p>{{$post->created_at->toFormattedDateString()}} </p>
                        <a class="recipes-title-gallary" href="{{ env('APP_URL') }}/post/{{$post->id}}">
                            {{$post->title}}
                        </a>
                        <br>
                        <a class="button button2" href="{{ env('APP_URL') }}/edit/{{$post->id}}">Rediger</a>
                        <a class="button button3" onclick="return confirm('Er du sikker på at du vil slette denne posten?')" href="{{ env('APP_URL') }}/delete/{{$post->id}}">Slett</a>
                    </article>
                @endforeach

            </section>

        </div>

        <!--row 5 footer-->
        <div class="row5">

            <footer>
                <p class="copy-right">Copyright <i class="fa fa-copyright"></i> 2018 – Mats Gundersen </p>
            </footer>

        </div>

        <!--Container end -->
    </div>
</div>


</body>
<script src="{{ env('APP_CSS_FOLDER_LOCATION2') }}js/searchScript.js"></script>

</html>
