<!--Navbar -->
<div class="topnav" id="myTopnav">
    <a href="/adminindex"> <i class="fa fa-home icon-padding-nav" aria-hidden="true""></i>Alle oppskrifter</a>
    <a href="/create"><i class="fa fa-plus icon-padding-nav" aria-hidden="true"></i>Legg til ny oppskrift</a>
    <a id="log-ut" href="/logout"> <i class="fa fa-sign-out  icon-padding-nav" aria-hidden="true"></i>logg ut</a>
    <a href="javascript:void(0);" class="icon hamburger-icon" onclick="myFunction()">
        <div ></div>
        <div ></div>
        <div ></div>
    </a>
</div>

<style>

    .icon-padding-nav {
        padding: 5px;
    }

    .topnav {
        overflow: hidden;
        background-color: #363940;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 0px 16px;
        text-decoration: none;
        font-family: "Roboto Condensed", sans-serif;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: normal;
        line-height: 1.6;
        letter-spacing: 1px;
    }
    
  
    .topnav a:hover {
        background-color: #EFF4F7;
        color: black;
    }

    .topnav .icon {
        display: none;
    }

    .hamburger-icon {
        padding: 9px  20px 8px 20px !important;
    }

    .hamburger-icon div {
        width: 35px;
        height: 5px;
        background-color: white;
        margin: 6px 0;
    }

    #log-ut {
        float: right;
        margin-right: 100px;
    }

    @media screen and (max-width: 724px) {
        #log-ut {float: left;}
        .topnav a:not(:first-child) {display: none;}
        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 724px) {
        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }

</style>


<script>

    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
