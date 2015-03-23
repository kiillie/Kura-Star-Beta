google.load('search', '1');
	var imageSearch;

	 function addPaginationLinks() {
      
        var cursor = imageSearch.cursor;
        var curPage = cursor.currentPageIndex; // check what page the app is on
        var pagesDiv = document.createElement('div');
        var ul = document.createElement('ul');
        ul.className = 'pagination';
        pagesDiv.className = 'page-con';
        for (var i = 0; i < cursor.pages.length; i++) {
          var page = cursor.pages[i];

            var list = document.createElement('li');
            var link = document.createElement('a');
            link.href= "javascript:imageSearch.gotoPage("+i+");";
            link.innerHTML = page.label;
            link.style.marginRight = '2px';
            list.appendChild(link);
            ul.appendChild(list);
            pagesDiv.appendChild(ul);
        }

        var contentDiv = document.getElementById('content');
        contentDiv.appendChild(pagesDiv);
      }
      function postSearch(){
        if(imageSearch.results && imageSearch.results.length > 0) {
          var contentDiv = document.getElementById('content');
          var hiddenDiv = document.getElementById('hide-loaded');
          contentDiv.innerHTML = '';
          var results = imageSearch.results;
          for (var i = 0; i < results.length; i++) {
            var result = results[i];
            var imgContainer = document.createElement('div');
            var addBtn = document.createElement('input');

            addBtn.type = 'button';
            addBtn.className = 'btn add-btn btn-default';
            addBtn.setAttribute("onclick", "add_google_image('"+result.url+"')");
            addBtn.value = "Add";
            imgContainer.className = 'col-md-4 image-res';
            
            var newImg = document.createElement('img');

            var img = result.url;
            img = decodeURIComponent(decodeURIComponent(img));
            newImg.src=img;

            imgContainer.appendChild(newImg);
            imgContainer.appendChild(addBtn);
            hiddenDiv.appendChild(imgContainer);
          }
      }
    }
      function searchComplete() {
        if(imageSearch.results && imageSearch.results.length > 0) {
          var contentDiv = document.getElementById('content');
          contentDiv.innerHTML = '';
          var results = imageSearch.results;

          for (var i = 0; i < results.length; i++) {
            var result = results[i];
            var imgContainer = document.createElement('div');
            var addBtn = document.createElement('input');

            addBtn.type = 'button';
            addBtn.className = 'btn add-btn btn-default';
            addBtn.setAttribute("onclick", "add_google_image('"+result.url+"')");
            addBtn.value = "Add";
          	imgContainer.className = 'col-md-4 image-res';
            
            var newImg = document.createElement('img');

            var img = result.url;
            img = decodeURIComponent(decodeURIComponent(img));
            newImg.src=img;
  
            //if(imageExists(img) != 0){
              imgContainer.appendChild(newImg);
              imgContainer.appendChild(addBtn);
              contentDiv.appendChild(imgContainer);
           // }
            
          }
          addPaginationLinks(imageSearch);
        }
        image_hovered();
      }

function imageExists(url) {
  var img = new Image();
  img.src = url;
  return img.width;
}
function add_google_image(res){
  var kind = $(".image-search .search-kind").val();
  var li = $(".image-search .search-li").val();

  if(kind == 'new'){
    $(".new-addon .new-item").html("");
    var image = '<a class="art-added-img" href="'+res+'" title="'+res+'" data-fancybox-group="gallery"><img class="image" src="'+res+'" alt="" /></a>';
    var content =   '<li class="ui-state-default added-addon">'+
              '<div class="item-added-container">'+
              '<div class="item-inner text">'+
              '<div class="image-container">'+image+'</div>'+
              '</div>'+
              '<div class="editlist">'+
              '<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
              '</div>'+
              '</div>'+
              '<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
              '<input type="hidden" class="type" value="picture">'+
              '<input type="hidden" class="kind" value="'+kind+'">'+
              '</li>';

    $(".addons-container .sortable").prepend(content);
    insert_addon();
    count_image();
    }
    else{
    var image = '<a class="art-added-img" href="'+res+'" title="'+res+'" data-fancybox-group="gallery"><img class="image" src="'+res+'" alt="" /></a>';
    var content =   '<li class="ui-state-default added-addon">'+
              '<div class="item-added-container">'+
              '<div class="item-inner text">'+
              '<div class="image-container">'+image+'</div>'+
              '</div>'+
              '<div class="editlist">'+
              '<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
              '</div>'+
              '</div>'+
              '<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
              '<input type="hidden" class="type" value="picture">'+
              '<input type="hidden" class="kind" value="'+kind+'">'+
              '</li>';
        var current = $('ul.sortable li[value="'+li+'"]');
        $("ul.sortable li[value='"+li+"'] .append-new-item").hide();

        $("ul.sortable li[value='"+li+"'] .item-btn-con").show();
        current.after(content);
        insert_addon();
      }
      count_image();
      addonHovered(type, kind);
}
$(document).ready(function(){
  $(".img-srch .img-text").on('keyup',function(){
    var search = $(this).val();
    // postLoad(search);
    // function postLoad(value){
    //   imageSearch = new google.search.ImageSearch();
    //   imageSearch.setSearchCompleteCallback(this, postSearch, null);
    //   imageSearch.setResultSetSize(6);
    //   imageSearch.execute(value);
    // }
    OnLoad(search);
    function OnLoad(value) {
      imageSearch = new google.search.ImageSearch();
      imageSearch.setSearchCompleteCallback(this, searchComplete, null);
      imageSearch.setResultSetSize(6);
      imageSearch.execute(value);
    }
    google.setOnLoadCallback(OnLoad);
  });
});
function image_hovered(){
  $(document).ready(function(){
    $(".image-res").hover(function(){
      $(this).find(".add-btn").show();
    }, function(){
      $(this).find(".add-btn").hide();
    });
  });
}