<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit career position</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editcareerpositionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Position">Position</label>
<input type="text" id="Position" name="position" value='<?php echo set_value('position',$before->position);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Education">Education</label>
<input type="text" id="Education" name="education" value='<?php echo set_value('education',$before->education);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewcareerposition"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
