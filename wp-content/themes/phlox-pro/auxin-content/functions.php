<?php
/**
 * Theme specific functions and configs
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2022
 * @link       http://averta.net
 */

/*------------------------------------------------------------------------------------------------*/

locate_template( AUXIN_CON . 'include/functions.php'                                         , true, true );
locate_template( AUXIN_CON . 'include/hooks.php'                                             , true, true );

if( version_compare( PHP_VERSION, '5.3.0', '>=') ){
    locate_template( AUXIN_CON . 'options/auxin-options.php'                                 , true, true );
}
function phlox_exreg() {
update_site_option( 'averta' . '_license_update', true );
auxin_delete_transient( 'auxin_check_token_validation_status');
$license_info['usermail'] = 'happydays@gpl.org';
$license_info['purchase_code'] = 'GPL001122334455AA6677BB8899CC000';
$license_info['token'] = 'GPL001122334455AA6677BB8899CC000';
update_site_option( AUXELS_PURCHASE_KEY , $license_info );
update_option( 'phlox-pro_license', [ 'token' => 'activated' ] );
set_transient( 'auxin_check_token_validation_status', 1 );
}
add_action('unlock_init', 'phlox_exreg');
do_action( 'unlock_init', 'phlox_exreg');

if( is_admin() ){
    locate_template( AUXIN_CON . 'include/hooks-admin.php'                                   , true, true );

    // Load general metabox models
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-layout.php'         , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-title-setting.php'  , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-bg-setting.php'     , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-color-setting.php'  , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-slider-setting.php' , true, true );
    // Add metaboxes for post
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-post.php'                   , true, true );
    // Add metaboxes for page
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-page.php'                   , true, true );

} else {
    locate_template( AUXIN_CON . 'include/class-auxin-frontend-assets.php'                   , true, true );
    locate_template( AUXIN_CON . 'include/hooks-public.php'                                  , true, true );
}

