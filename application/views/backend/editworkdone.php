<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit Work Done</h4>
</div>
</div>
<div class="row">
    <form class='col s12' method='post' action='<?php echo site_url("site/editworkdonesubmit");?>' enctype= 'multipart/form-data'>
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
        
        <div class="row">
            <div class="input-field col s6">
            <label for="Title">title</label>
            <input type="text" id="title" name="title" value='<?php echo set_value('title',$before->title);?>'>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="date">Date</label><br>
                <input type="date" id="date" name="date" value='<?php echo set_value('date',$before->date);?>'>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="City">city</label>
                <input type="text" id="city" name="city" value='<?php echo set_value('city',$before->city);?>'>
            </div>
        </div>
        <div class=" row">
            <div class=" input-field col s12 m6">
                <?php echo form_dropdown("talenttype",$talenttype,set_value('talenttype',$before->talenttype));?>
                <label for="talenttype">Talent Type</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
            <label>Description</label>
            <textarea name="description" placeholder="Enter text ..."><?php echo set_value( 'description',$before->description);?></textarea>
            </div>
        </div>
        <div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big">
								                    	<?php if($before->image == "") { } else {
									                    ?><img src="<?php echo base_url('uploads')."/".$before->image; ?>">
															<?php } ?>
															</span>
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload image" value="<?php echo set_value('image',$before->image);?>">
				</div>
			</div>
			<span style=" display: block;
		padding-top: 30px;">630 x 285</span>
		</div>
        
        <div class="row">
            <div class="input-field col s6">
                <label for="url">URL</label>
                <input type="text" id="url" name="url" value='<?php echo set_value('url',$before->url);?>'>
            </div>
        </div>
    
        <div class="row">
            <div class="col s6">
            <button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
            <a href='<?php echo site_url("site/viewworkdone"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
            </div>
        </div>
    </form>
</div>
