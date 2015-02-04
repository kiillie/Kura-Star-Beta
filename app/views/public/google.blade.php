<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Hello World - Google  Web Search API Sample</title>
      {{ HTML::style('/assets/css/bootstrap.css') }}
  {{ HTML::style('/assets/css/bootstrap.min.css') }}
  {{ HTML::style('/assets/css/bootstrap-theme.css') }}
  {{ HTML::style('/assets/css/bootstrap-theme.min.css') }}
  {{ HTML::style('/assets/css/bootstrap-select.css') }}
  {{ HTML::style('/assets/css/bootstrap-select.min.css') }}
  {{ HTML::style('/assets/css/styles.css') }}
  {{ HTML::style('/assets/css/jquery.bxslider.css') }}
  {{ HTML::script('/assets/js/jquery-2.1.3.min.js') }}
  {{ HTML::script('/assets/js/bootstrap.js') }}
  {{ HTML::script('/assets/js/npm.js') }}
  {{ HTML::script('/assets/js/bootstrap-select.js') }}
  {{ HTML::script('/assets/js/bootstrap-select.min.js') }}
  {{ HTML::script('/assets/js/kurastar.js')}}
  {{ HTML::script('/assets/js/jquery.bxslider.js') }}
  {{ HTML::script('/assets/js/jquery.bxslider.min.js') }}
    <script src="https://www.google.com/jsapi"
        type="text/javascript"></script>
    <script language="Javascript" type="text/javascript">
    //<!
    google.load('search', '1');

    function OnLoad() {
      // Create a search control
      var searchControl = new google.search.SearchControl();

      // Add in a full set of searchers
      var localSearch = new google.search.LocalSearch();
      searchControl.addSearcher(localSearch);
      // searchControl.addSearcher(new google.search.WebSearch());
      // searchControl.addSearcher(new google.search.VideoSearch());
      // searchControl.addSearcher(new google.search.BlogSearch());
      // searchControl.addSearcher(new google.search.NewsSearch());
      searchControl.addSearcher(new google.search.ImageSearch());
      // searchControl.addSearcher(new google.search.BookSearch());
      // searchControl.addSearcher(new google.search.PatentSearch());

      // Set the Local Search center point
      localSearch.setCenterPoint("New York, NY");

      // tell the searcher to draw itself and tell it where to attach
      searchControl.draw(document.getElementById("searchcontrol"));

      // execute an inital search
      searchControl.execute();
    }
    google.setOnLoadCallback(OnLoad);

    //]]>
    </script>
  </head>
  <body>
    <div id="searchcontrol"></div>
    
    <div id="displayHere">
      <?php
        function pageTitle($page_url)
        {
             $read_page=file_get_contents($page_url);
             preg_match("/<title.*?>[\n\r\s]*(.*)[\n\r\s]*<\/title>/", $read_page, $page_title);
              if (isset($page_title[1]))
              {
                    if ($page_title[1] == '')
                    {
                          return $page_url;
                    }
                    $page_title = $page_title[1];
                    return trim($page_title);
              }
              else
              {
                    return $page_url;
              }
        }
         echo pageTitle();
        ?>
    </div>
  </body>
</html>