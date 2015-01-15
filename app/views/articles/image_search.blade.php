@section('imageSearch')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
google.load('search', '1');
	$(document).ready(function(){
	var imageSearch;

	 function addPaginationLinks() {
      
        // To paginate search results, use the cursor function.
        var cursor = imageSearch.cursor;
        var curPage = cursor.currentPageIndex; // check what page the app is on
        var pagesDiv = document.createElement('div');
        var ul = document.createElement('ul');
        ul.className = 'pagination';
        for (var i = 0; i < cursor.pages.length; i++) {
          var page = cursor.pages[i];

            // Create links to other pages using gotoPage() on the searcher.
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

        // Check that we got results
        if (imageSearch.results && imageSearch.results.length > 0) {

          // Grab our content div, clear it.
          var contentDiv = document.getElementById('content');
          contentDiv.innerHTML = '';

          // Loop through our results, printing them to the page.
          var results = imageSearch.results;
          for (var i = 0; i < results.length; i++) {
            // For each result write it's title and image to the screen
            var result = results[i];
            var imgContainer = document.createElement('div');
            var addBtn = document.createElement('button');
            addBtn.className = 'btn add-btn btn-default';
          	imgContainer.className = 'col-md-3 image-res';
            
            // We use titleNoFormatting so that no HTML tags are left in the 
            // title
            
            var newImg = document.createElement('img');

            // There is also a result.url property which has the escaped version
            newImg.src=result.url;
           
            imgContainer.appendChild(newImg);
            imgContainer.appendChild(addBtn);


            // Put our title + image in the content
            contentDiv.appendChild(imgContainer);
          }

          // Now add links to additional pages of search results.
          addPaginationLinks(imageSearch);
        }
      }
		$(".img-srch .img-text").on('keyup',function(){
			var search = $(this).val();
			OnLoad(search);

			function OnLoad(value) {
	      
	        // Create an Image Search instance.
	        imageSearch = new google.search.ImageSearch();

	        // Set searchComplete as the callback function when a search is 
	        // complete.  The imageSearch object will have results in it.
	        imageSearch.setSearchCompleteCallback(this, searchComplete, null);
	        imageSearch.setResultSetSize(8);
	        // Find me a beautiful car.
	        imageSearch.execute(value);
	      }
	      google.setOnLoadCallback(OnLoad);

	  	});

	  	$("#content.row").one('hover', function(){
	  		$(this).find('div').on('mouseover', function(){
	  			$(this).find('.add-btn').attr("data-dismiss", "modal");
	  			$(this).find('.add-btn').text("Add");
	  			$(this).find('.add-btn').css('display', 'block');
	  			var rCon = $(this);
	  			$(this).find('.add-btn').on('click', function(){
	  				$(".img-addon img").attr("src", $(rCon).find('img').attr('src'));
	  				$(".addons-container").prepend("<img src='"+$(rCon).find('img').attr('src')+"' />");
	  			});
	  		});
	  		$(this).find('div').on('mouseout', function(){
	  			$(this).find('.add-btn').css('display', 'none');
	  		});
		});
	});
</script>
<div class="modal image-search fade" id="imageSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Image Search</h4>
	      	</div>
	    	<div class="modal-body">
	    		<div class="img-search">
		        	<ul class="nav nav-tabs">
		        		<li><a href="#google"><span><img width="20" src="/assets/images/google-icon.jpg" /></span> Google</a></li>
		        		<li><a href="#instagram"><span><img width="20" src="/assets/images/insta-icon.jpg" /></span> Instagram</a></li>
		        	</ul>
		        	<div class="img-srch" id="google">
		        		<div class="google-input"><input type="text" class="form-control img-text"/></div>
		        		<br />
    					<div id="content" class="row">Loading...</div>
		        	</div>
		        	<div class="img-srch" id="instagram">
		        		Instagram
		        	</div>
		        </div>
			</div>
			<div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    	<button type="button" class="btn btn-primary">Add</button>
			</div>
		</div>
	</div>
</div>
@stop