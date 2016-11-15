<div class="favorite-course clearfix">
<h5><?php echo $fields['title']->content; ?></h5>
<div class="board">
<?php echo $fields['field_board']->content; ?> - 
<?php echo $fields['field_classes']->content; ?>
</div>
<div class="subject-tag"><?php echo $fields['field_subjects']->content; ?></div>
<div class="author">by <?php echo $fields['name']->content; ?></div>
<div class="fav-opt float-right"><?php echo $fields['ops']->content; ?></div>
</div>