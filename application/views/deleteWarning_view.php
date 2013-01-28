<!--  ==========	Delete Warning ==========  -->
<div class="binder">
	<div class="container">
		<div class="content confirmDelete">
			<?=form_open('admin/delete', array('class' => 'deleteForm'));?>
				<?=form_hidden('id', $this->uri->segment(3));?>
				<?=form_hidden('data-key', 'permDelete')?>
				<p>Are you sure you want to delete this post? This action is <b>permanent</b>, you will not be able to retrieve this information again. </p>
			<div class="confirm">	
				<input type="submit" value="Yes" class="submit yesSub" />			
			</form><!--  end deleteForm  -->
			<?=form_open('blog/', array('class' => 'redirect'));?>
				<input type="submit" value="No"  class="noSub" />
			</form><!--  end redirect  -->	
		</div><!--  end confirmDelete  -->