

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>filter</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="filter-1.0.js"></script>  
    <style type="text/css" media="screen">
    	#main{
	    	width: 1080px;
	    	margin: 0 auto;
    	}
    	#filter, #list {
	    	float: left;
	    	width: 100%;
    	}
    	#filter li{
    		list-style: none;
	    	float: left;
	    	margin-right: 15px;
    	}
    	#list .doc{
	    	float: left;
	    	margin: 15px;
    	}
    </style>

</head>

<body>
   <div id="main">
    <ul id="filter">
        <li><a href="#" class="f-all sel">All documents</a></li>
        
    	<?php
    		/*
			foreach($groups as $group){
    			// if admin of group ?
    			// if private group ?
	    		echo('<li><a href="#" class="f-'.get group id.'">'.get group name.'</a></li>');
    		}
*/
    	?>

        <li><a href="#" class="f-personnal">Personnal documents</a></li>

        <li><a href="#" class="f-group1">Group 1</a></li>

        <li><a href="#" class="f-group2">Group 2</a></li>

        <li><a href="#" class="f-group3">Group 3</a></li>

        <li><a href="#" class="f-group4">Group 4</a></li>

        <li><a href="#" class="f-group5">Group 5</a></li>
    </ul>

    <div id="list">
    	<?php
    		/*
    		foreach($documents as $document){
	    		echo('
	    			<div class="doc">
			            <a href="#" class="f-'.get group id.' "><img src="http://placehold.it/200x250&text=document+placeholder"></a>
			        </div>
	    		');
    		}
    		*/ 
    	?>
        <div class="doc">
            <a href="#" class="f-group1 f-group4 "><img src="http://placehold.it/200x250&text=document+1+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group1 f-personnal "><img src="http://placehold.it/200x250&text=document+2+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group5 f-group3 f-personnal f-group4 "><img src="http://placehold.it/200x250&text=document+3+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group5 f-group1 "><img src="http://placehold.it/200x250&text=document+4+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group3 "><img src="http://placehold.it/200x250&text=document+5+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group3 f-group2 "><img src="http://placehold.it/200x250&text=document+6+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group1 f-personnal "><img src="http://placehold.it/200x250&text=document+7+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group3 "><img src="http://placehold.it/200x250&text=document+8+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group3 f-group4 f-group2 "><img src="http://placehold.it/200x250&text=document+9+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group5 f-group3 "><img src="http://placehold.it/200x250&text=document+10+placeholder"></a>
        </div>

        <div class="doc">
            <a href="#" class="f-group5 f-group3 f-group4 "><img src="http://placehold.it/200x250&text=document+11+placeholder"></a>
        </div>
    </div>
</div>
</body>
</html>