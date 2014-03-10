	<div id='header'>
		<h1>Welcome <?php echo $data['user']->first_name; ?></h1>
	    <div class='userbox'>
	    	<div id='cssmenu'>
				<ul>
	   				<li class='has-sub last'><a href='#'><span><?php echo $data['user']->first_name; ?></span></a>
	      				<ul>
	         				<li><a href='settings.php'><span>Change Password</span></a></li>
	         				<li class='last'><a href='logout.php'><span>Logout</span></a></li>
	      				</ul>
	   				</li>
				</ul>
			</div>
		</div>
		<div class='sidebar'>
            <ul id="gn-menu" class="gn-menu-main">
            	<li class="gn-trigger"><a class="gn-icon gn-icon-menu"><span>Menu</span></a>
            		<nav class="gn-menu-wrapper">
                    	<div class="gn-scroller">
                		<ul class="gn-menu">
                  			<li class="gn-search-item"><input placeholder="Search" type="search" class="gn-search">
                    		<a class="gn-icon gn-icon-search"><span>Search</span></a>
                  			</li>
                  			<li><a class="gn-icon gn-icon-archive">Folder 1</a></li>
                  			<li><a class="gn-icon gn-icon-archive">Folder 2</a></li>
                  			<li><a class="gn-icon gn-icon-archive">Folder 3</a></li>
                  			<li><a class="gn-icon gn-icon-archive">Folder 4</a></li>
                		</ul>
                		<div class="gn-scroller-footer">© Copyright<?php echo date("Y"); ?> ShareDoc</div>
              			</div><!-- /gn-scroller -->
            		</nav>
          		</li>    
            </ul>
        </div>
	</div>
	<script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>