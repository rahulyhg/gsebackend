<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("worldtour");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">id</th>
<th data-field="type">type</th>
<!-- <th data-field="image">image</th> -->
<th data-field="name">name</th>
<th data-field="location">location</th>
<th data-field="date">date</th>
<th data-field="order">order</th>
<!-- <th data-field="venue">venue</th> -->
<!-- <th data-field="content">content</th> -->
<!-- <th data-field="banner">banner</th> -->
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createworldtour"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
  if(resultrow.type ==1)
  {
    var etype = "Past Concert"
  }
  else if(resultrow.type ==2) {
      var etype = "upcoming Concert"
  }
  else {
    var etype = ""
  }
return "<tr><td>" + resultrow.id + "</td><td>" + etype + "</td><td>" + resultrow.name + "</td><td>" + resultrow.location + "</td><td>" + resultrow.date + "</td><td>" + resultrow.order + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editworldtour?id=');?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Edit'><i class='fa fa-pencil propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\") href='<?php echo site_url('site/deleteworldtour?id='); ?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
