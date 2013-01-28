<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<h2><?=anchor('blog/vocab/', 'Vocabulary');?> <?if($this->uri->segment(3)){echo ' - '.$this->uri->segment(3);};?></h2>
					<ul id="apl">
						<?foreach($letter as $row) :?>
							<li><?=anchor('blog/vocab/'.$row->letter, $row->letter, array('class' => 'letters'));?></li>
						<? endforeach;?>
					</ul>
				<ul>