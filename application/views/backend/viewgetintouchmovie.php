<div class="row">
<div class="col s12">
<div class="row">
    <div class="col s12 drawchintantable">
    <?php $this->chintantable->createsearch("Get in touch");?>
        <table class="highlight responsive-table">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Name</th>
                <th data-field="lastname">Last Name</th>
                <th data-field="email">Email</th>
                <th data-field="title">Title</th>
                <th data-field="message">Message</th>
                <!--
                <th data-field="timestamp">Timestamp</th>
                <th data-field="comment">Comment</th>
                <th data-field="enquiryfor">Enquiry For</th>
                -->
            </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
    </div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/creategetintouchmovie"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.lastname + "</td><td>" + resultrow.email + "</td><td>" + resultrow.title + "</td><td>" + resultrow.message + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editgetintouchmovie?id=');?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Edit'><i class='fa fa-pencil propericon'></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
