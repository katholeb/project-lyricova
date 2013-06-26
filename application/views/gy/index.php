<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->admin_model->get_title();?></title>
	<?php $this->load->view('gy/head');?>
</head>
<body>
	<?php $this->load->view('gy/header');?>
	<div class="hero-unit header">
		<div class="container">
			<h1><?=$this->admin_model->get_config('banner');?></h1>
			<p class="lead"><?=$this->admin_model->get_config('subbanner');?></p>			
		</div>
	</div>
	<div class="container">
		<div class="row songbox-row">

			<?php foreach ($posts as $postitem): ?>
			<?php
			$lyricinline=strip_quotes($this->typography->nl2br_except_pre($postitem->lyric));?>
			<div class="songbox-cont span4" >
				<div class="song-box">
				<div class="lyric"><?=$this->typography->nl2br_except_pre($postitem->lyric)?></div>
				<div class="meta muted"><small>
					<span class="title" onclick="window.open('<?= base_url('/post/'.$postitem->id)?>')"><?=$postitem->name?></span> by <span class="author"><?=$postitem->artist?></span> <?php if(!$postitem->featuring=="") {?>feat. <span class="feat"><?=$postitem->featuring?></span> <?php } ?><?php if(!$postitem->album==""){ ?>in <span class="album"><?=$postitem->album?></span> <?php } ?><a data-toggle="collapse" data-target="#detail-<?=$postitem->id?>" href="javascript:void(0)">More...</a>
				</small></div>
  				<div id="detail-<?=$postitem->id?>" class="collapse">
  					<?php if(!$postitem->origin==""){ echo '<strong>Original Lyric:</strong> <br>'.$this->typography->nl2br_except_pre($postitem->origin).'<br>';} ?>
  					<?php if(!$postitem->translate==""){ echo '<strong>Translated Lyric:</strong> <br>'.$this->typography->nl2br_except_pre($postitem->translate).'<br>';} ?>
  					<?php if(!$postitem->translator==""){ echo '<strong>Translator:</strong> '.$postitem->translator.'<br>';} ?>
  					<?php if(!$postitem->comment==""){ echo '<strong>Comment:</strong><br>'.$this->typography->nl2br_except_pre($postitem->comment).'<br>';} ?>
        			<small class="muted">
        				Posted at <time><?=$postitem->time?></time> by <?=$this->user_model->get_by_id($postitem->user_id)->display_name?>. 
        				<?php if($this->user_model->allow_to_edit($postitem)===TRUE){ echo anchor('admin/edit/'.$postitem->id, 'Edit'); }?> 
        				<?php if($this->user_model->allow_to_delete($postitem)===TRUE){ echo '<a href="javascript:void(0)" onclick="delConfModal('.$postitem->id.",'".jsize_string($lyricinline)."')\">Delete</a>"; }?>
        			</small>
    			</div>
    			</div>
			</div>
			<?php endforeach ?>
			<div class="songbox-cont span4" >
				<?=$this->pagination->create_links();?>
			</div>
		</div>
	</div>
	<div class="modal hide" id="Del">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Confirm Delete</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to delete the following item?</p>
			<p id="del_info">....</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-danger" id="btn-delete">Delete</a>
			<a href="#" data-dismiss="modal" class="btn btn-primary">Cancel</a>
		</div>
	</div>
	<?php $this->load->view('gy/footer');?>
</body>
</html>