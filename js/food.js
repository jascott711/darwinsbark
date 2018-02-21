var isSortingShown = true;
var resetSorting = $('.recipe-tile-link').html();

$(document).ready( function() {

  //SearchBar
  $('#search-text').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      search();
      return false;
    }
  });
  
  $('#search-btn').on('click', function (e) {
    e.preventDefault(); 
    search();
  });

  $('#reset-btn').on('click', function () {
    var $divs = $(".recipe-tile-link");  
    $divs.show(); 
    $('#no-results-tile').hide();;
    $('#recipe-searchbar-results').hide();
    $('.recipe-tile-link').html(resetSorting);
  });

  $('#recipe-searchbar-results').hide();

  //Sorting : Alphabetical
  $('#recipes-up').on('change', function () {
    sortAlphaUp();
  });
  if($('#recipes-up').is(':checked')) { 
    sortAlphaUp();
  }
  $('#recipes-down').on('change', function () {
    sortAlphaDown();
  });
  if($('#recipes-down').is(':checked')) { 
    sortAlphaDown();
  }

  //Sorting : Recipe Type
  $('#recipes1').on('change', function() {
    $('.recipe-tile-link').show();
    $('#no-results-tile').hide();
  });
  if($('#recipes1').is(':checked')) { 
    $('.recipe-tile-link').show();
    $('#no-results-tile').hide();
  }

  $('#recipes2').on('change', function() {   
    $('.recipe-tile-link' ).hide();
    $('a[data-recipe-type="entree"]' ).show();
  });
  if($('#recipes2').is(':checked')) { 
    $('.recipe-tile-link' ).hide();
    $('a[data-recipe-type="entree"]' ).show();
  }

  $('#recipes3').on('change', function() {   
    $('.recipe-tile-link' ).hide();
    $('a[data-recipe-type="dessert"]' ).show();
  });
  if($('#recipes3').is(':checked')) { 
    $('.recipe-tile-link' ).hide();
    $('a[data-recipe-type="dessert"]' ).show();
  }

}); 








//Recipe Display Sorting
function displaySorting() {
  if  (isSortingShown)  {
    $( ".recipe-sorting" ).removeClass( "hide" );
    $("#show-sorting").html("<i class=\"fa fa-arrow-up\" ><span>Hide Sorting Options</span></i>");

    isSortingShown = false;
  }
  
  else if (!isSortingShown) {
    $( ".recipe-sorting" ).addClass( "hide" );
    $("#show-sorting").html("<i class=\"fa fa-arrow-down\" ><span>Display Sorting Options</span></i>");

    isSortingShown = true;
  }
}

//SearchBar
function search() {
  $('#no-results-tile').hide();
  var r = 0;
  var $divs = $(".recipe-tile-link");
  $divs.hide();
   
  var query = document.getElementById("search-text").value;
  var Uquery = query.toUpperCase();
  var cleanquery = Uquery.split(/\W/);

  for (var i = 0, len = cleanquery.length; i < len; i++) {
    var currentSearch = cleanquery[i].toUpperCase();
    if (currentSearch !== "") {
      recipes = document.getElementsByClassName("recipe-tile-link");
      
      for (var j = 0, divsLen = recipes.length; j < divsLen; j++) {
        if (recipes[j].textContent.toUpperCase().indexOf(currentSearch) !== -1) {
            recipes[j].style.display = "block";
            r++;
        }
        else {
          recipes[j].style.display = "none";
          //$('#no-results-tile').css( "display", "block" );
        }
      }
    }
    else {
      $('#no-results-tile').show();
    }
  }

  if (r < 1) {
    $('#no-results-tile').show();
  }
  console.log("Tile Count: " + r + ", Query: " + query);
  $('#recipe-searchbar-results').show();
  $('#recipe-searchbar-results .text ').text("Search results for \"" + query + "\" ... " + r + " recipes found.");

}

//Sorting : Alphabetical
function sortAlphaUp() {
  function strDes(a, b) {
     if (a>b) return 1;
     else if (a<b) return -1;
     else return 0;
    }

    var $divs = $(".recipe-tile-link");
    $divs.sort(strDes);
    $(".recipe-list").html($divs);
}
function sortAlphaDown() {
  function strDes(a, b) {
     if (a>b) return -1;
     else if (a<b) return 1;
     else return 0;
    }

    var $divs = $(".recipe-tile-link");
    $divs.sort(strDes);
    $(".recipe-list").html($divs);
}
