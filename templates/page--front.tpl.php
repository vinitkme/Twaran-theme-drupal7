<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
global $user;
$account = user_load($user->uid);
?>
<!--.page -->
  <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
    <button class="close-button" aria-label="Close menu" type="button" data-close="">
        <span aria-hidden="true">×</span>
      </button>
          <?php $block = module_invoke('twaran_custom', 'block_view', 'twaran_custom_mobile_menu');
              print $block['content'];
            ?>
    </div>

      <div class="off-canvas-content" data-off-canvas-content>
<!--.l-messages -->
<section class="l-messages row">
  <div class="large-12 columns">
    <div class="wow fadeInDown animated delay"><?php if ($messages): print $messages; endif; ?></div>
  </div>
</section>
<!--/.l-messages --> 
<!--.l-header for large-->
<header id="header-large" class="show-for-larges">
  <nav class="top-bar">
    <div class="row">
      <div class="top-bar-left hide-for-large">
      <?php global $base_url, $language; ?>
        <h1 class="logo"><a href="<?php print $base_url . '/' . $language->language; ?>" title="<?php print t('Home'); ?>" rel="home">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a></h1>
          <button type="button" class="small-navigation menu-icon" data-toggle="offCanvasRight"></button>
      </div>
      <div class="top-bar-left show-for-large">    
            <?php $block = module_invoke('twaran_custom', 'block_view', 'twaran_menu');
              print $block['content'];
            ?>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
        <?php if ($user->uid): ?>
        
          <?php endif; ?>  
          <li>
            <a data-toggle="search-modal"><i class="fa fa-search"></i></a>
          </li>                                                                                                                                                 
          <?php if (!$user->uid): ?>
          <li class="login-register">
            <div><i class="fa fa-user"></i> <a href="<?php print $base_path; ?>user"><?php print t('Login'); ?></a> / <a href="<?php print $base_path; ?>user/register"><?php print t('Register'); ?></a></div>
          </li>
          <?php endif; ?>
          <?php if ($user->uid): ?>
            <li class="notification">
            <a href="javascript:void(0)" data-toggle="notification-dropdown"><i class="fa fa-bell"></i></a>
            <div class="dropdown-pane" id="notification-dropdown" data-dropdown data-auto-focus="true">
             <div class="text-center loader"><img src="<?php print $base_path; ?>sites/all/themes/twaran_responsive/images/rolling.gif"></div>

            </div>
         </li>
          <li class="message hide">
            <a href="javascript:void(0)" data-toggle="message-dropdown">
              <i class="fa fa-envelope"></i>
              <?php if ($new_message_count) :?>
                <span class="has-notification"><?php print $new_message_count; ?></span>
              <?php endif; ?>
            </a>
            <div class="dropdown-pane" id="message-dropdown" data-dropdown data-auto-focus="true">
            <h5>NOTIFICATION</h5>
             <?php print $new_messages; ?>
            </div>
          </li>
          <li>
        <a href="javascript:void(0)" data-toggle="language-select"><i class="fa fa-language"></i>Language</a>
          </li>         
            <li class="user-name">
          <a class="hide-for-small" data-toggle="profile-modal"><?php print $account->field_name['und'][0]['value']; ?> <i class="fa fa-bars"></i></a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav> 
</header>
<!--/.l-header for large ends here -->
<?php global $user;
if(!$user->uid) { ?>
<section id="banner">    
  <div class="row">
    <div class="large-5 columns banner-brand">
      <div class="banner-brand-inner">
        <div class=" main-brand-home">
          <div class="title-one"><?php print t('WELCOME TO'); ?></div>
          <div class="title-two"><?php print t('SCHOOLTUD'); ?></div>
          <div class="title-three"><?php print t('A Techtud School'); ?></div>
        </div>
        <hr>
        <p> <?php print t('Bridging the gap between quality educators and needy students.'); ?></p>
        <div class="language-select clearfix">
          <span class="title">
           <i class="fa fa-language"></i> <?php print t('Select Language'); ?>
          </span>
          <?php $block = module_invoke( 'locale', 'block_view', 'language');
            print $block['content'];
          ?>
        </div>
        <div class="educate-link"><a href="#">Educate with us</a></div>
        <nav data-magellan class="qod-link" data-bar-offset="-20">
        <a href="#setup" class="active"><?php print t('Question of the day'); ?></a>
      </nav>
      </div>
    </div>
    <div class="large-7 columns banner-right">
      <div class="banner-right-inner columns">
        <div class="banner-featured-inner">
          <div class="row text-center" data-equalizer>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon1 icon">icon</div>
                  <h6><?php print t('MULTILINGUAL CONTENT'); ?></h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon2 icon">icon</div>
                  <h6><?php print t('BOARD SPECIFIC STUDY'); ?></h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon3 icon">icon</div>
                  <h6><?php print t('SYLLABUS WISE TOPI'); ?>C</h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon4 icon">icon</div>
                  <h6><?php print t('EDUCATIONAL SOCIAL NETWORK'); ?></h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon5 icon">icon</div>
                  <h6>QUALITY TEACHERS</h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
            <div class="medium-4 columns">
              <div class="feature-type" data-equalizer-watch>
                <a href="javascript:void(0)">
                  <div class="icon6 icon">icon</div>
                  <h6><?php print t('COLLABORATION WITH SCHOOLS'); ?></h6>
                  <div class="visit-arrow">visit</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      <div class="linear-gradient-border"></div>
       <div class="featured-course ">
            <h3>Featured Courses</h3>
            <div class="row text-center">
              <div class="medium-4 columns">
                <div class="course">
                    <h6>Mathematics</h6>
                     <div class="board"><a href="#">Cbse</a> - <a href="#">Class 10</a></div>
                    <div class="author">by <a href="#">Pritam Prasun</a></div>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="course">
                    <h6>Mathematics</h6>
                    <div class="board"><a href="#">Cbse</a> - <a href="#">Class 10</a></div>
                    <div class="author">by <a href="#">Pritam Prasun</a></div>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="course">
                    <h6>Mathematics</h6>
                     <div class="board"><a href="#">Cbse</a> - <a href="#">Class 10</a></div>
                    <div class="author">by <a href="#">Pritam Prasun</a></div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<section id="qod" class="media-height">
  <div class="row">
    <div class="small-12 column">
      
      <h2 id="setup" class="docs-heading" data-magellan-target="setup"><a class="docs-heading-icon" href="#setup"></a></h2>
      <div class="large-5 columns qod-left">
        <h3><?php print t('AWARDS'); ?> & <span><?php print t('RECOGNITION'); ?></span></h3>
         <div class="gallery">
          <div class="gallery-content" >
          <img data-toggle="one-gallery" src="<?php print $base_path; ?>sites/all/themes/twaran_responsive/images/1-small.jpg" alt="Schooltud on ZeeBangla">
          <a href="javascript:void(0)">SchoolTud in ZeeBangla</a>
          </div>
        </div>
      </div>
      <div class="large-7 columns qod-right">
        <div class="qod-block-wrap">
        <h3>Question of the day</h3>
        <?php $block = module_invoke('twaran_quiz', 'block_view', 'twaran_quiz_question');
          print $block['content'];
        ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="footer-block">
  <div class="row">
    <div class="footer-content text-center wow fadeInUp animated">
      <h3><?php print t('Want to get started'); ?>?</h3>
      <p><?php print t('Learn or test your true potential, enhance or prove your teaching skills, get hired or hire the best teaching talents. Everything is completely <span>FREE</span>, except your efforts & passion!.'); ?></p>
      <div><a href="<?php print $base_path; ?>user/register" class="button"><?php print t('Join Now'); ?></a></div>
    </div>
  </div>
</section>
    
<?php } else { ?>
  <div class="main-page-title">
          <div class="row columns">
            <h1 id="page-title" class="title">Hello <?php print $account->field_name['und'][0]['value']; ?></h1>
        </div>
        </div>
<section id="dashboard">
  <div class="row">
  <div class="large-7 columns twaran-activity">
    <div class="qod-result">
    <div class="qod-result-inner">
    <?php $block = module_invoke('twaran_quiz', 'block_view', 'twaran_quiz_question');
      print $block['content'];
    ?>
  </div>
  </div>
    <div class="twaran-activity-inner">
      <?php
        print views_embed_view('twaran_activity', 'page');
      ?>
    </div>
  </div>
  <div class="large-5 columns user-link">
    <div class="user-link-inner clearfix">
      <?php $block = module_invoke('twaran_custom', 'block_view', 'twaran_custom_user_links');
        print $block['content'];
      ?>
    </div>
  </div>
  </div>
  </section>
<?php } ?>
    
<footer id="footer-main">
  <div class="row">
      <?php if (!empty($page['footer_one'])): ?>
        <!--.footer one -->
        <div class="medium-2 columns">
            <?php print render($page['footer_one']); ?>
        </div>
        <!--/.footer one  -->
      <?php endif; ?>
       <?php if (!empty($page['footer_two'])): ?>
        <!--.footer two -->
        <div class="medium-2 columns">
            <?php print render($page['footer_two']); ?>
            </div>
        <!--/.footer two -->
      <?php endif; ?>
       <?php if (!empty($page['footer_three'])): ?>
        <!--.footer three -->
        <div class="medium-2 columns">
            <?php print render($page['footer_three']); ?>
            </div>
        <!--/.footer three  -->
      <?php endif; ?>
    <div class="medium-6 columns">
      <div class="footer-block-large">
      <div class="footer-subs clearfix">
        <h6>Update yourself with Latest Courses</h6>
          <?php $block = module_invoke('simplenews', 'block_view', '45');
            print $block['content'];
          ?>
      </div>
      <div class="footer-social clearfix">
      <ul class="menu">
          <li><a href="../icon/facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="../icon/facebook"><i class="fa fa-twitter"></i></a></li>
          <li><a href="../icon/facebook"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
      </div>
       <?php if ($site_name) :?>
    <div class="copyright large-12 columns">
      &copy; <?php print date('Y') . ' ' . check_plain($site_name) . ' ' . t('All rights reserved.'); ?>
    </div>
  <?php endif; ?>
  </div>
    </div>
  </div>
  </div> 
</footer>

<!--All modals
=========================-->
<div class="full reveal" id="search-modal" data-reveal data-auto-focus="true" data-close-on-click="true" data-animation-in="slide-in-left" data-animation-out="fade-out">
  <div class="row text-center">
    <h1><?php print t('Search your course...'); ?></h1>
    <?php
      $search_form = drupal_get_form('search_block_form');
      print drupal_render($search_form);
    ?>
  </div>
  <button class="close-button" data-close aria-label="Close reveal" type="button">
  <span aria-hidden="true">&times;</span>
  </button>
</div>

  <div class="tiny reveal" id="language-select" data-reveal data-close-on-click="true" data-animation-in="scale-in-up" data-animation-out="fade-out" >
        <div class="row">
        <h4>Select Language</h4>
             <?php $block = module_invoke( 'locale', 'block_view', 'language');
            print $block['content'];
          ?>
          </div>
          <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
<div class="full reveal " id="one-gallery" data-reveal>
  <div class="gallery-big"><img src="<?php print $base_path; ?>sites/all/themes/twaran_responsive/images/1.jpg" alt="Schooltud on ZeeBangla"></div>
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="full reveal" id="profile-modal" data-reveal data-close-on-click="true" data-animation-in="slide-in-left" data-animation-out="slide-out-right">
  <div class="row text-center ">
    <ul class="tabs hide-for-large" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true"><?php print t('Profile'); ?></a></li>
        <li class="tabs-title"><a href="#panel2"><?php print t('More...'); ?></a></li>
    </ul>
    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
          <div class="medium-9 large-7 columns user-profile-link">
           <?php if($user->uid) { ?>
            <div class="user-profile-img"><?php (isset($account->picture->uri)) ? ( print l(theme_image_style(array('path' => $account->picture->uri, 'style_name' => 'thumbnail')), 'user/' . $account->uid, array('html' => TRUE))) : (print custom_user_picture($account->name, $account->field_name['und'][0]['value'], $account->uid)) ; ?>
            </div>
            <h2>Hello, <?php print $account->field_name['und'][0]['value']; ?></h2>
            <?php } ?>
            <div class="small-4 medium-4 large-4 columns">
              <a href="<?php print $base_path . 'user/' . $user->uid; ?>"><i class="fa fa-user"></i><?php print t('View Profile'); ?></a>
            </div>
            <div class="small-4 medium-4 large-4 columns">
              <a href="#"><i class="fa fa-cogs"></i><?php print t('Edit Setting'); ?></a>
            </div>
            <div class="small-4 medium-4 large-4 columns">
              <a href="#"><i class="fa fa-comment"></i><?php print t('Feedback'); ?></a>
            </div>
            <div class="clearfix"></div>
            <div class="logout"><a class="button" href="<?php print $base_path; ?>user/logout"><?php print t('Logout'); ?></a></div>
          </div>
        </div>
        <div class="tabs-panel" id="panel2">
          <div class="user-link-inner clearfix">
            <?php $block = module_invoke('twaran_custom', 'block_view', 'twaran_custom_user_links');
              print $block['content'];
            ?>
          </div>
          <div class="logout"><a class="button" href="<?php print $base_path; ?>user/logout"><?php print t('Logout'); ?></a></div>
        </div>
    </div>
    
  <button class="close-button" data-close aria-label="Close reveal" type="button">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
</div>


