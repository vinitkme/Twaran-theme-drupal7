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

<div class="large-5 columns subject-intro-wrapper">
          <div class="subject-intro">
            <h2><?php echo $fields['name']->content; ?></h2>
            <span class="ops-subscribe"><?php print $fields['ops']->content; ?></span>
            <p><?php echo $fields['description']->content; ?></p>
          </div>
           <div class="subject-intro-descrip">
           <div class="subject-intro-descrip-inner">
            <h6>Reference Book</h6>
            <ul class="vertical menu">
               <?php print views_embed_view('featured_courses', 'block_1'); ?>
            </ul>
          </div>
          </div>
        </div>