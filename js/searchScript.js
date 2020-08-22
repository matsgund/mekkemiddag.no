
//Search for recipes script
document.getElementById("search-field").oninput=function(){
    var matcher = new RegExp(document.getElementById("search-field").value, "i");
    for (var i=0;i<document.getElementsByClassName("article-search").length;i++) {
        if (matcher.test(document.getElementsByClassName("recipes-title-gallary")[i].innerHTML)) {
            document.getElementsByClassName("article-search")[i].style.display="block";
        } else {
            document.getElementsByClassName("article-search")[i].style.display="none";
        }
    }
};


//Toggle hovedretter
function hideHovedretter() {
    // Get the checkbox
    var checkBox = document.getElementById("hovedretterBox");
    document.getElementsByClassName("Hovedrett");

      //Loop through divs with Hovedrett class
        for (var i=0; i<document.getElementsByClassName("Hovedrett").length; i++)  {
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            document.getElementsByClassName("Hovedrett")[i].style.display="block";
        } else {
            document.getElementsByClassName("Hovedrett")[i].style.display="none";
        }
    }
}

//Toggle Bakverk
function hideBakverk() {
    // Get the checkbox
    var checkBox = document.getElementById("bakverkBox");
    document.getElementsByClassName("Bakverk");

    //Loop through divs with Hovedrett class
    for (var i=0; i<document.getElementsByClassName("Bakverk").length; i++)  {
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            document.getElementsByClassName("Bakverk")[i].style.display="block";
        } else {
            document.getElementsByClassName("Bakverk")[i].style.display="none";
        }
    }
}

//Toggle Dessert
function hideDessert() {
    // Get the checkbox
    var checkBox = document.getElementById("dessertBox");
    document.getElementsByClassName("Dessert");

    //Loop through divs with Hovedrett class
    for (var i=0; i<document.getElementsByClassName("Dessert").length; i++)  {
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            document.getElementsByClassName("Dessert")[i].style.display="block";
        } else {
            document.getElementsByClassName("Dessert")[i].style.display="none";
        }
    }
}


