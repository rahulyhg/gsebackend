<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit blog video</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editblogvideosubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" row" style="display:none">
<div class=" input-field col s12 m6">
<?php echo form_dropdown("diaryarticle",$diaryarticle,set_value('diaryarticle',$before->diaryarticle));?>
<label for="Diary Article">Diary Article</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Url">Url</label>
<input type="text" id="Url" name="url" value='<?php echo set_value('url',$before->url);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Order">Order</label>
<input type="text" id="Order" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewblogvideo?id=").$this->input->get('diaryarticleid'); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
