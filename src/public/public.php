<?php

function taidi_format_buffer() {
  ob_start('taidi_format_html');
}

function taidi_format_html($html) {
  $config = array(
    'indent' => intval(get_option('taidi_admin_field_pretty_indent')),
    'wrap' => intval(get_option('taidi_admin_field_pretty_wrap'))
  );
  $tidy = new tidy;
  $tidy->parseString($html, $config, 'utf8');
  $tidy->cleanRepair();
  return $tidy;
}

?>
