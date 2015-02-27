<script>
$(document).ready(function() {

    var getUrl  = $('#get_url'); //url to extract from text field
    
    getUrl.keyup(function() { //user types url in text field        
        
        //url to match in the text field
        var match_url = /\b(https?):\/\/([\-A-Z0-9.]+)(\/[\-A-Z0-9+&@#\/%=~_|!:,.;]*)?(\?[A-Z0-9+&@#\/%=~_|!:,.;]*)?/i;
        
        //continue if matched url is found in text field
        if (match_url.test(getUrl.val())) {
                $("#results").hide();
                $("#loading_indicator").show(); //show loading indicator image
                
                var extracted_url = getUrl.val().match(match_url)[0]; //extracted first url from text filed
                
                //ajax request to be sent to extract-process.php
                $.post('/fetchlink',{'url': extracted_url}, function(data){         
                                        //content to be loaded in #results element
                    var content = '<div class="extracted_url">'+ inc_image +'<div class="extracted_content"><h4><a href="'+extracted_url+'" target="_blank">'+data.title+'</a></h4><p>'+data.content+'</p></div></div>';
                    $("#shake it off")
                    //load results in the element
                    $("#results").html(content); //append received data into the element
                    $("#results").slideDown(); //show results with slide down effect
                    $("#loading_indicator").hide(); //hide loading indicator image
                },'json');
        }
    });
});
</script>
<div class="extract_url">
    <img id="loading_indicator" src="images/ajax-loader.gif">
    <textarea id="get_url" placeholder="Enter Your URL here" class="get_url_input" spellcheck="false" ></textarea>
        <div id="results">
        </div>
</div>