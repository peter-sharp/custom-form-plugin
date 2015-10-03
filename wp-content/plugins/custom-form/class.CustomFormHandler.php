<?php
/**
 * @package custom-form
 */
/*
Plugin Name: Custom-form
Plugin URI: http://custom-form.com/
Description: wordpress plugin That allows you to create custom forms. The data from these forms is displayed in a page with the name of the form on the admin toolbar.
Version: 1.0
Author: Team Pangus
Author URI: http://custom-form.com/wordpress-plugins/
License: unlicense
Text Domain: custom-form
*/
class CustomFormException extends Exception {};

    class CustomFormHandler {
        private $db;
        public function __construct() {
            add_shortcode('customform', array(&$this, 'render_form'));
            
            wp_register_script('form-processor', plugins_url('/js/formProcessor.js', __FILE__), false);
            add_action('wp_ajax_add_submission', array(&$this, 'add_submission'));
            add_action('wp_ajax_nopriv_add_submission', array(&$this, 'add_submission'));
            
            add_action( 'admin_menu', array(&$this, 'add_submissions_menu' ));
            global $wpdb;
            $this->db = $wpdb;
            
        }
        
        
        
        
        public function install() {
            try{
                $sql = "CREATE TABLE `submissions` (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    first_name text NOT NULL,
                    last_name text NOT NULL,
                    email text NOT NULL,
                    date timestamp NOT NULL,
                    message mediumtext NOT NULL,
                    UNIQUE KEY id (id)
                )" . $this->db->get_charset_collate();
                require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
                dbDelta( $sql );
            }
            catch(Exception $error){
                throw new CustomFormException( 'failed to install: '. $error);
                
            };
            
        }
        
        public function render_form() {
            try{
                wp_enqueue_script('form-processor');
                ob_start();
                include_once('_form.php');
                return ob_get_clean();
            }
            catch(Exception $error){
                throw new CustomFormException( 'failed to render form: '. $error);
                
            };
        }
        
        public function add_submission() {
            if($_POST['add_submission']) $result = $this->db->insert('submissions', $_POST['add_submission']);
            $response = ($result)? array('success' => $_POST['add_submission']): array('failiure' => 'could not save data');
            die(json_encode($response));
        }
        
        public function add_submissions_menu() {
            add_menu_page( 'Submissions', 'Submissions', 'edit_pages', 'submissions', array(&$this,'submissions') );
        }
        
        public function submissions() {
            $submissions = $this->db->get_results("SELECT * FROM `submissions`");
            include_once('_submissions_page.php');
        }
        
        public function uninstall() {
            try{
                $sql = "DROP TABLE IF EXISTS `submissions` ";
                
                $this->db->query( $sql );
            }
            catch(Exception $error){
                throw new CustomFormException( 'failed to properly uninstall: '. $error);
                
            };
            
        }
        
        
    }
    
    try {
        $customFormHandler = new CustomFormHandler();
    
        /**
         * NOTE (delete me) I fixed the plugin install error we were getting before. for some reason I thought $contactFormHelper in: array(&$contactFormHelper, 'install')
         * was the class so I initially put $ContactFormHelper. Those class callback arguments only take an instance as the first part of the array e.g. array(&$this,'callback')
         */
        register_activation_hook(__FILE__, array(&$customFormHandler, 'install'));
        register_deactivation_hook(__FILE__, array(&$customFormHandler, 'uninstall')); 
    }
    catch(Exception $error){
        throw new CustomFormException('Custom-form plugin ' . $error);
        
    };
