<?php

/*
  Plugin Name: Donation Report
  Description: Display a list of donations made by your team
  Version: 1.0
  Author: Vand Aquino
  Author URI: https://www.vandaquino.com.br/
*/
  
add_action ('admin_menu', 'wpDReportSettings');
/* 5 Arguments: 1-Title of the Page, 2-Menu Display Name, 3-Permissions/Capabilities, 4-Shortname/Slug, 5-functionHTML */
function wpDReportSettings(){
  add_options_page('Donation Report', 'DReport', 'manage_options', 'wp-dreport', 'dreportHTML');
}

function dreportHTML(){
  
}
