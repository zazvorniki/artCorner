<!--  ==========	Default Letters ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<p class="bold"><?=anchor('blog/vocab/', 'Vocabulary');?> <?if($this->uri->segment(3)){echo ' - '.$this->uri->segment(3);};?></p>
					<ul id="apl">
						<li><?=anchor('blog/vocab/', 'View All');?></li>
						<?foreach($letter as $row) :?>
							<li><?=anchor('blog/vocab/'.$row->letter, $row->letter, array('class' => 'letters'));?></li>
						<? endforeach;?>
					</ul>
				<ul>