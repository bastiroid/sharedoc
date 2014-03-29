	<div id='header'>
		<div class="docname"> 
    <div class="nameform"  contenteditable="true">  
      <p><?php if(isset($data['document'])) echo $data['document']->name; ?></p>  
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
                  			<?php if(isset($data['groups'])) foreach ($data['groups'] as $group): ?>					
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

	<form id="rename" action="rename.php" method="post">
    <input type="hidden" id="name" name="name">
    <input type="hidden" id="doc_id" name="doc_id">
    <input type="hidden" id="group_id" name="group_id">
  </form>
  <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );

      $(document).ready(function(){
        var name;
        var groupLinks = $('#filter').find('a');

        $(groupLinks).on('click', function(){
          name = $(this).text();
          $('.nameform').text(name);
        });

        $('.docbtn').on('click', function(){
          name = $('.nameform').text();
          $('#name').val(name);
          $('#doc_id').val(<?php if(isset($data['document'])) echo $data['document']->id; ?>);
          console.log(name);
          var groupId = window.location.href.split('#')[1]
          $('#group_id').val(groupId);
          console.log(groupId);
          $( "#rename" ).submit();
        });

      });
      
      

    </script>