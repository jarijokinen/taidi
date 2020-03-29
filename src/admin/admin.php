<?php

function taidi_admin_menu() {
  add_options_page(
    __('Taidi', TAIDI_NAME),
    __('Taidi', TAIDI_NAME),
    'manage_options',
    'taidi_admin',
    'taidi_admin_page'
  );
}

function taidi_admin_page() {
  ?>
  <div class="wrap">
    <h1><?php _e('Taidi Settings', TAIDI_NAME); ?></h1>
    <form method="post" action="options.php">
      <?php 
        settings_fields('taidi_admin');
        do_settings_sections('taidi_admin');
        submit_button();
      ?>
    </form>
  </div>
  <?php
}

function taidi_admin_init() {
  $page = 'taidi_admin';

  // SECTION: Pretty Print

  $section = 'taidi_admin_section_pretty';
  add_settings_section($section, 
    __('Pretty Print Settings', TAIDI_NAME), $section, $page);

  // FIELD: Indent

  $title = __('Indent', TAIDI_NAME);
  $field = 'taidi_admin_field_pretty_indent';
  $args = [
    'type' => 'integer', 
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 0
  ];
  add_settings_field($field, $title, $field, $page, $section);
  register_setting($page, $field, $args);
  
  // FIELD: Wrap

  $title = __('Wrap', TAIDI_NAME);
  $field = 'taidi_admin_field_pretty_wrap';
  $args = [
    'type' => 'integer', 
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 0
  ];
  add_settings_field($field, $title, $field, $page, $section);
  register_setting($page, $field, $args);
}

// SECTION: Pretty Print
function taidi_admin_section_pretty() {
}

// FIELD: Indent
function taidi_admin_field_pretty_indent() {
  $field = 'taidi_admin_field_pretty_indent';
  $option = intval(get_option($field));
  echo '<select name="taidi_admin_field_pretty_indent">';
  echo '<option value="0"' . ($option == 0 ? ' selected="selected"' : '') . '>No</option>';
  echo '<option value="1"' . ($option == 1 ? ' selected="selected"' : '') . '>Yes</option>';
  echo '<option value="2"' . ($option == 2 ? ' selected="selected"' : '') . '>Auto</option>';
  echo '</select>';
  echo '<p>This option specifies if Tidy should indent block-level tags. If set to "auto", this option causes Tidy to decide whether or not to indent the content of tags such as TITLE, H1-H6, LI, TD, TD or P depending on whether or not the content includes a block-level element. You are advised to avoid setting indent to yes as this can expose layout bugs in some browsers.</p>';
}

// FIELD: Wrap
function taidi_admin_field_pretty_wrap() {
  $field = 'taidi_admin_field_pretty_wrap';
  $option = intval(get_option($field));
  echo '<input type="text" name="' . $field . '" value="' . $option . '">';
  echo '<p>This option specifies the right margin Tidy uses for line wrapping. Tidy tries to wrap lines so that they do not exceed this length. Set wrap to zero if you want to disable line wrapping.</p>';
}

?>
