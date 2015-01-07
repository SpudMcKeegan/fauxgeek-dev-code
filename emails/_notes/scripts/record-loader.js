//Vars
var howMany = 0;
var firstLoad = true;

//Ready function
$(document).ready(function(){
	ajaxFunction();
	//checkRecords();
	
	$('#show-more').click(function(){
		increaseHowMany();
		ajaxFunction();
		//checkRecords();
	});
});

//Displays articles when either loading a page or when the showmore button is clicked
function ajaxFunction(){
	var ajaxRequest;
	
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){$('#article-listing').append(ajaxRequest.responseText);}
	}
	
	var queryString = "?next=" + howMany;
	queryString += "&subject=" + subject;
	queryString += "&view=" + view;
	ajaxRequest.open("GET", "includes/article-loader.php" + queryString, true);
	ajaxRequest.send(null); 	
}

//Increase howmany, so that the correct number is returned from the database.
function increaseHowMany(){howMany = howMany + 1;}