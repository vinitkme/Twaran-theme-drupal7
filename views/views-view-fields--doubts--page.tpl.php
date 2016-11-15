<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="row">
<div class="twaran-doubt-page">
	<div class="row">
      <div class="twaran-doubt-inner clearfix">
        <div class="doubt-review-left columns large-4">
        <ul class="menu simple doubt-review">
          <li class="votes"><?php print $fields['value']->content; ?>Votes</li>
          <li class="answer"><?php echo $fields['comment_count']->content; ?>Answer</li>
          <li class="views"><?php echo $fields['totalcount']->content; ?>Views</li>
        </ul>
        </div>
        <div class=" doubt-details-right columns large-8">
        <ul class="menu simple vertical doubt-details">
          <li class="doubt-title"><h5><?php echo $fields['title']->content; ?></h5></li>
          <li class="publish"><p><span><?php echo $fields['name']->content; ?></span> asked <span><?php echo $fields['created']->content; ?></span></p></li>
          <ul class="menu tags">
            <li><?php echo $fields['field_subjects']->content; ?></li>
            <li><?php echo $fields['field_board']->content; ?></li>
            <li><div class="field-content">Class VII</div></li>
          </ul>
        </ul>
        </div>
      </div>
      </div>
    </div>
    </div>
    <hr/>