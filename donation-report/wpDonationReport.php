<?php

/*
  Plugin Name: Donation Report
  Description: Display a list of donations made by your team
  Version: 1.0
  Author: Vand Aquino
  Author URI: https://www.vandaquino.com.br/
*/

/* Creating a class so I can rename functions freely and avoid uniqueness conflicts*/
class DonationReport{
  function __construct(){
    /* Array: First argument is an OBJECT, Second: Name of the method */ 
    add_action ('admin_menu', array($this, 'adminPage'));
    add_action ('admin_init', array($this, 'settings'));
  }
  
  function settings() {
  /* Here we can start put our settings options into each argument */
  /* The first argument is the group the settings belongs to */
  /* The Second argument is the actual name of the setting */
    register_setting();
  }
  
/* 5 Arguments: 1-Title of the Page, 2-Menu Display Name, 3-Permissions/Capabilities, 4-Shortname/Slug, 5-functionHTML */
  function adminPage(){
    add_options_page('Donation Report', 'DReport', 'manage_options', 'wp-dreport', array($this, 'drHTML'));
}
/* WordPress will take care of the CSS */
  function drHTML(){ ?>
<div class="wrap"> 
  <h1> Settings Page </h1>
</div>
  <?php }
}

$donationReport = new DonationReport();

