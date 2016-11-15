<?php 
//dpm($node);
//dsm($content);


?>
<div id="node-<?php print $node->nid; ?>" class=" video-lecture node-full-screen <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="question"><?php print render($content['body'][0]['#markup']); ?></div>
	<div class="answer"><?php print render($content['answers']['#markup']); ?></div>
	<div class="hint"><?php print render($content['field_hint']); ?></div>
	<ul class="menu tags">
    	<li><a><?php print render($content['language']['#markup']); ?></a></li>
  	</ul>
	
 <div class="node-secondary-link"><?php print render($content['links']); ?></div>
  <div class="comment">
      <div class="comment-user">
       <?php print render($content['comments']); ?>
    </div>
    </div>
</div>      