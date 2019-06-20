(function($) {

var options = {
  valueNames: [ 'name', 'directoryDescription', 'address' ],
  plugins: [ ListPagination({}) ],
};

var directoryList = new List('filter-it', options);
var templater = directoryList.templater;
templater.clear = $.noop; // relying on `show`/`hide` instead
templater.show = function(item) {
  $(item.elm).slideDown(500);
};
templater.hide = function(item) {
  $(item.elm).slideUp(500);
};

//Highlighter
directoryList.on('updated', function() {
  $('.directoryListing').unhighlight();
  var search = $('.search').val();
  var words = search.split(' ');
  $('.directoryListing').highlight(words);
});


$('.filter').click(function(e) {
  e.preventDefault();
  $(this).addClass('active').siblings().removeClass('active');
  var catTest = $(this).data('filter');
  
  directoryList.filter(function(item) {
    console.log('item ' + $(item.elm)) 
    if ( $(item.elm).hasClass( catTest) ){
      return true;
    } else {
      return false;
    }
  });
  return false;
});

$('#Reset').click(function(e) {
  $(this).addClass('active').siblings().removeClass('active');
  directoryList.filter();
  return false;
});
        

}(jQuery));