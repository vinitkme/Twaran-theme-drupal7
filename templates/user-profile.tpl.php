<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
 $user_content_count = _twaran_custom_user_content_count(arg(1));
 $following = $user_content_count['following']->total_rows;
 $followers = $user_content_count['followers']->total_rows;
 $best_answers = $user_content_count['best_answer']->total_rows;
 $content = $user_content_count['content']->total_rows;
 $answers = $user_content_count['answer']->total_rows;
 $author = user_load(arg(1));
 $profile = profile2_load_by_user($author, 'main');
?>

<div class="large-3 columns sidebar-left ">
  <?php $block = module_invoke('twaran_custom', 'block_view', 'twaran_custom_author_information');
    print $block['content'];
  ?>
</div>
<div class="large-9 columns main-content-wrap">
  <div class="main-content">
    <div class="profile-right-top clearfix">
      <div class="medium-7 columns about-wrap">
        <div class="about">
	  <h3>
            <?php 
              print t('About'); 
              if($user->uid == arg(1))
                print '<span class="edit-profile-link"><i class="fa fa-pencil"></i> ' . l(t('Edit Profile'), 'user/' . $user->uid . '/edit/main', array('query'=>array('destination' => 'user/' . $user->uid))) . '</span>'; 
            ?>
          </h3>
          <p><?php if(!empty($profile->field_about_me)) {
            print $profile->field_about_me['und'][0]['value'];
          }
          else {
            print 'I am too Lazy to update about me.';
          }
          ?>
          </p>
        </div>
      </div>
      <div class="medium-5 columns role-wrap">
	<div class="role">
          <h3>Role</h3>
          <p><?php print end($author->roles); ?></p>
	</div>
      </div>
    </div>
		         <div class="row collapse profile-right-bottom">
          <ul class="tabs " id="example-vert-tabs" data-tabs>
            <li class="tabs-title is-active"><a href="#Activity" aria-selected="true">Activity</a></li>
            <li class="tabs-title"><a href="#Followings">Followings <span><?php print $following; ?></span></a></li>
            <li class="tabs-title"><a href="#Followers">Followers <span><?php print $followers; ?></span></a></li>
            <li class="tabs-title"><a href="#Contents">Contents <span><?php print $content; ?></span></a></li>
            <li class="tabs-title"><a href="#Answers">Answers <span><?php print $answers; ?></span></a></li>
            <li class="tabs-title"><a href="#Best-Answers">Best Answers <span><?php print $best_answers; ?></span></a></li>
          </ul>
          <div class="tabs-content clearfix" data-tabs-content="example-vert-tabs">
            <div class="tabs-panel is-active" id="Activity">
              <?php print views_embed_view('twaran_activity', 'block_1', arg(1)); ?>
            </div>
            <div class="tabs-panel clearfix" id="Followings">
              <?php print $user_content_count['following']->render(); ?>
            </div>
            <div class="tabs-panel clearfix" id="Followers">
              <?php print $user_content_count['followers']->render(); ?>
            </div>
            <div class="tabs-panel clearfix" id="Contents">
              <?php print $user_content_count['content']->render(); ?>
            </div>
            <div class="tabs-panel clearfix" id="Answers">
              <?php print $user_content_count['answer']->render(); ?>
            </div>
            <div class="tabs-panel clearfix" id=">Best-Answers">
              <?php print $user_content_count['best_answer']->render(); ?>
            </div>
          </div>
      </div>
			</div>
    </div>