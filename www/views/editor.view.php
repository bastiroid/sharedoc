<div class="editor">
<form>
            <textarea name="editor1" id="editor1" rows="40" cols="145">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1', {
				    toolbar: 'Basic',
				    uiColor: '#025757'
				});
				// Showing the creation time for testing
				CKEDITOR.instances.editor1.setData( '<?= $document->creation_date ?>', function()
				{
				    this.checkDirty();  // true
				});
            </script>
</form>
</div>