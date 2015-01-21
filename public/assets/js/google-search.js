google.load('search', '1');
	$(document).ready(function(){
	var imageSearch;

	 function addPaginationLinks() {
      
        var cursor = imageSearch.cursor;
        var curPage = cursor.currentPageIndex; // check what page the app is on
        var pagesDiv = document.createElement('div');
        var ul = document.createElement('ul');
        ul.className = 'pagination';
        for (var i = 0; i < cursor.pages.length; i++) {
          var page = cursor.pages[i];

            var list = document.createElement('li');
            var link = document.createElement('a');
            link.href= "https://www.google.com/jsapi/image-search/v1/javascript:imageSearch.gotoPage("+i+");";
            link.innerHTML = page.label;
            link.style.marginRight = '2px';
            list.appendChild(link);
            ul.appendChild(list);
            pagesDiv.appendChild(ul);
        }

        var contentDiv = document.getElementById('content');
        contentDiv.appendChild(pagesDiv);
      }

      function searchComplete() {

        if (imageSearch.results && imageSearch.results.length > 0) {
          var contentDiv = document.getElementById('content');
          contentDiv.innerHTML = '';
          var results = imageSearch.results;
          for (var i = 0; i < results.length; i++) {
            var result = results[i];
            var imgContainer = document.createElement('div');
            var addBtn = document.createElement('button');
            addBtn.className = 'btn add-btn btn-default';
          	imgContainer.className = 'col-md-3 image-res';
            
            var newImg = document.createElement('img');

            newImg.src=result.url;
           
            imgContainer.appendChild(newImg);
            imgContainer.appendChild(addBtn);
            contentDiv.appendChild(imgContainer);
          }
          addPaginationLinks(imageSearch);
        }
      }
		$(".img-srch .img-text").on('keyup',function(){
			var search = $(this).val();
			OnLoad(search);

			function OnLoad(value) {
	        imageSearch = new google.search.ImageSearch();
	        imageSearch.setSearchCompleteCallback(this, searchComplete, null);
	        imageSearch.setResultSetSize(8);

	        imageSearch.execute(value);
	      }
	      google.setOnLoadCallback(OnLoad);

	  	});

$(".image-search #content.row").hover(function(){
  $(this).find('div').hover(function(){
    $(this).find('.add-btn').attr("data-dismiss", "modal");
      $(this).find('.add-btn').text("Add");
      $(this).find('.add-btn').toggle();
      var rCon = $(this);
      $(this).find('.add-btn').on('click', function(){
        $(".img-addon img").attr("src", $(rCon).find('img').attr('src'));
        $(".addons-container").prepend("<img src='"+$(rCon).find('img').attr('src')+"' />");
        $("#content.row div").remove();
      })
  });
});
  
});