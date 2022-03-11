<?php

/*
  Plugin Name: Donation Report
  Description: Display a list of donations made by your team
  Version: 1.0
  Author: Vand Aquino
  Author URI: https://www.vandaquino.com.br/
*/

// Creating a class so I can rename functions freely and avoid uniqueness conflicts
class DonationReport{
  function __construct(){
    // Array: First argument is an OBJECT, Second: Name of the method
    add_action ('admin_menu', array($this, 'adminPage'));
    add_action ('admin_init', array($this, 'settings'));
  }
  
  function settings() {
    //To build a section we will give 4 arguments
    //The first is the name of the section
    //The second is the subtitle of the section
    //The third gives you a small content over the options
    //The fourth is the page slug
    add_settings_section('wdr_first_section', null, null, 'wp-dreport');

    // Here we can declare 5 arguments to create option fields
    // The first is the name of the setting we want to tie it to
    // The second is the HTML label text users will see
    // The third is a function which will output the HTML
    // The fourth is the page slug
    // The fifth is the section you want to add the field to 
    add_settings_field('wdr_location', 'Total Value Display Location', array($this, 'locationHTML'), 'drHTML', 'wdr_first_section'); 

    // Here we can start put our settings options into each argument
    // The first argument is the group the settings belongs to
    // The Second argument is the actual name of the setting
    // The third argument is default values and sanitization
    register_setting('generalconfig', 'wdr_location', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  }
  
  function locationHTML(){ ?>

    Hello

  <?php }

  /*5 Arguments: 1-Title of the Page, 2-Menu Display Name, 3-Permissions/Capabilities, 4-Shortname/Slug, 5-functionHTML*/
  function adminPage(){
    add_options_page('Donation Report', 'DReport', 'manage_options', 'wp-dreport', array($this, 'drHTML'));
}
  //WordPress will take care of the CSS
  //Wordpress will know what to do with options.php
  function drHTML(){ ?>
    <div class="wrap"> 
      <h1> Settings Page </h1>
      <form action="options.php" method="POST">
        <?php
          do_settings_section('wp-dreport');
          submit_button();
        ?>
      </form>
    </div>
  <?php }
}

$donationReport = new DonationReport();

