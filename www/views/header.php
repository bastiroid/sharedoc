	<div id='header'>
		<div class="docname"> 
    <div class="nameform"  contenteditable="true">  
      <p>Untitled Document</p>  
    </div>  
  <button class="docbtn">Save</button>
</div>
	    <div class='userbox'>
	    	<div id='cssmenu'>
				<ul>
	   				<li class='has-sub last'><a href='index.php'><span><?php echo $data['user']->first_name; ?></span></a>
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
                		<ul class="gn-menu" id="filter">
                  			<li><a class="f-all sel">All documents</a></li>
                  			<li><a href="create_group.php" class="create_group">Create Shared Group</a></li>
                  			<?php if($data['groups']) foreach ($data['groups'] as $group): ?>					
							<li><a class="f-<?= $group->id ?>"><?= $group->name ?></a></li>
							<?php endforeach; ?>
                		</ul>
                		<div class="gn-scroller-footer">Copyright © <?php echo date("Y"); ?> ShareDoc</div>
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