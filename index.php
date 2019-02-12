<?php 
/*
 Plugin Name: VW Driving School Pro Posttype
 lugin URI: https://www.vwthemes.com/
 Description: Creating new post type for VW Driving School Pro Theme.
 Author: VW Themes
 Version: 1.0
 Author URI: https://www.vwthemes.com/
*/

define( 'VW_DRIVING_SCHOOL_PRO_POSTTYPE_VERSION', '1.0' );

add_action( 'init', 'vw_driving_school_pro_posttype_create_post_type' );

function vw_driving_school_pro_posttype_create_post_type() {
  
  register_post_type( 'courses',
    array(
      'labels' => array(
        'name' => __( 'Courses','vw-driving-school-pro-posttype' ),
        'singular_name' => __( 'Courses','vw-driving-school-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-portfolio',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );

  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'Faq','vw-driving-school-pro-posttype' ),
        'singular_name' => __( 'Faq','vw-driving-school-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-editor-help',
      'public' => true,
      'supports' => array(
        'title',
        'editor'
      )
    )
  );

  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Team','vw-driving-school-pro-posttype' ),
        'singular_name' => __( 'Team','vw-driving-school-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-groups',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );

  register_post_type( 'testimonials',
    array(
  		'labels' => array(
  			'name' => __( 'Testimonials','vw-driving-school-pro-posttype' ),
  			'singular_name' => __( 'Testimonials','vw-driving-school-pro-posttype' )
  		),
  		'capability_type' => 'post',
  		'menu_icon'  => 'dashicons-businessman',
  		'public' => true,
  		'supports' => array(
  			'title',
  			'editor',
  			'thumbnail'
  		)
		)
	);
}

/*--------------------- Courses section ----------------------*/
// Courses Meta
function vw_driving_school_pro_posttype_bn_custom_meta_courses() {
    add_meta_box( 'bn_meta', __( 'Enter Meta', 'vw-driving-school-pro-posttype' ), 'vw_driving_school_pro_posttype_bn_meta_callback_courses', 'courses', 'normal', 'high' );
}

/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'vw_driving_school_pro_posttype_bn_custom_meta_courses');
}

function vw_driving_school_pro_posttype_bn_meta_callback_courses( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    //Meta details
    if(!empty($bn_stored_meta['discount-price'][0]))
      $bn_meta_price = $bn_stored_meta['discount-price'][0];
    else
      $bn_meta_price = '';

    if(!empty($bn_stored_meta['course-days'][0]))
      $bn_meta_days = $bn_stored_meta['course-days'][0];
    else
      $bn_meta_days = '';

    if(!empty($bn_stored_meta['car-lesson'][0]))
      $bn_car_lesson = $bn_stored_meta['car-lesson'][0];
    else
      $bn_car_lesson = '';

    if(!empty($bn_stored_meta['classroom-lesson'][0]))
      $bn_classroom_lesson = $bn_stored_meta['classroom-lesson'][0];
    else
      $bn_classroom_lesson = '';

    if(!empty($bn_stored_meta['meta-license'][0]))
      $bn_meta_license = $bn_stored_meta['meta-license'][0];
    else
      $bn_meta_license = '';

    if(!empty($bn_stored_meta['meta-test'][0]))
      $bn_meta_test = $bn_stored_meta['meta-test'][0];
    else
      $bn_meta_test = '';

    if(!empty($bn_stored_meta['meta-auto'][0]))
      $bn_meta_auto = $bn_stored_meta['meta-auto'][0];
    else
      $bn_meta_auto = '';

    if(!empty($bn_stored_meta['meta-manual'][0]))
      $bn_meta_manual = $bn_stored_meta['meta-manual'][0];
    else
      $bn_meta_manual = '';

    if(!empty($bn_stored_meta['meta-details'][0]))
      $bn_meta_detail = $bn_stored_meta['meta-details'][0];
    else
      $bn_meta_detail = '';

    if(!empty($bn_stored_meta['meta-details-email'][0]))
      $bn_meta_details_email = $bn_stored_meta['meta-details-email'][0];
    else
      $bn_meta_details_email = '';

    if(!empty($bn_stored_meta['meta-details-call'][0]))
      $bn_meta_details_call = $bn_stored_meta['meta-details-call'][0];
    else
      $bn_meta_details_call = '';
  ?>
  <div id="property_stuff">
    <table id="list-table">     
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <td class="left">
            <?php _e( 'Course Duration', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="course-days" id="course-days" value="<?php echo esc_attr( $bn_meta_days ); ?>" />
          </td>
        </tr>
        <tr id="meta-2">
          <td class="left">
            <?php _e( 'Discount Price', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="discount-price" id="discount-price" value="<?php echo esc_attr( $bn_meta_price ); ?>" />
          </td>
        </tr>
        <tr id="meta-3">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-auto" id="meta-auto" value="<?php echo esc_attr( $bn_meta_auto ); ?>" />
          </td>
        </tr>
        <tr id="meta-4">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-manual" id="meta-manual" value="<?php echo esc_attr( $bn_meta_manual ); ?>" />
          </td>
        </tr>       
        <tr id="meta-5">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="car-lesson" id="car-lesson" value="<?php echo esc_attr( $bn_car_lesson ); ?>" />
          </td>
        </tr>
        <tr id="meta-6">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="classroom-lesson" id="classroom-lesson" value="<?php echo esc_attr( $bn_classroom_lesson ); ?>" />
          </td>
        </tr>
        <tr id="meta-7">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-license" id="meta-license" value="<?php echo esc_attr( $bn_meta_license ); ?>" />
          </td>
        </tr>
        <tr id="meta-8">
          <td class="left">
            <?php _e( 'Enter Meta', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-test" id="meta-test" value="<?php echo esc_attr( $bn_meta_test ); ?>" />
          </td>
        </tr>  
        <tr id="meta-9">
          <td class="left">
            <?php _e( 'Details Title Here', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-details" id="meta-details" value="<?php echo esc_attr( $bn_meta_detail ); ?>" />
          </td>
        </tr>   
        <tr id="meta-10">
          <td class="left">
            <?php _e( 'Email Id', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-details-email" id="meta-details-email" value="<?php echo esc_attr( $bn_meta_details_email ); ?>" />
          </td>
        </tr>   
        <tr id="meta-11">
          <td class="left">
            <?php _e( 'Phone No.', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-details-call" id="meta-details-call" value="<?php echo esc_attr( $bn_meta_details_call ); ?>" />
          </td>
        </tr>                       
      </tbody>
    </table>
  </div>
  <?php
}

function vw_driving_school_pro_posttype_bn_meta_save_courses( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Save Meta  
  if( isset( $_POST[ 'course-days' ] ) ) {
    update_post_meta( $post_id, 'course-days', sanitize_text_field($_POST[ 'course-days']) );
  }

  if( isset( $_POST[ 'meta-auto' ] ) ) {
    update_post_meta( $post_id, 'meta-auto', sanitize_text_field($_POST[ 'meta-auto']) );
  }

  if( isset( $_POST[ 'meta-manual' ] ) ) {
    update_post_meta( $post_id, 'meta-manual', sanitize_text_field($_POST[ 'meta-manual']) );
  }

  if( isset( $_POST[ 'discount-price' ] ) ) {
    update_post_meta( $post_id, 'discount-price', sanitize_text_field($_POST[ 'discount-price']) );
  }

  if( isset( $_POST[ 'car-lesson' ] ) ) {
    update_post_meta( $post_id, 'car-lesson', sanitize_text_field($_POST[ 'car-lesson']) );
  }

  if( isset( $_POST[ 'classroom-lesson' ] ) ) {
    update_post_meta( $post_id, 'classroom-lesson', sanitize_text_field($_POST[ 'classroom-lesson']) );
  }

  if( isset( $_POST[ 'meta-license' ] ) ) {
    update_post_meta( $post_id, 'meta-license', sanitize_text_field($_POST[ 'meta-license']) );
  }

  if( isset( $_POST[ 'meta-test' ] ) ) {
    update_post_meta( $post_id, 'meta-test', sanitize_text_field($_POST[ 'meta-test']) );
  } 

  if( isset( $_POST[ 'meta-details' ] ) ) {
    update_post_meta( $post_id, 'meta-details', sanitize_text_field($_POST[ 'meta-details']) );
  } 

  if( isset( $_POST[ 'meta-details-email' ] ) ) {
    update_post_meta( $post_id, 'meta-details-email', sanitize_text_field($_POST[ 'meta-details-email']) );
  } 

  if( isset( $_POST[ 'meta-details-call' ] ) ) {
    update_post_meta( $post_id, 'meta-details-call', sanitize_text_field($_POST[ 'meta-details-call']) );
  } 
}
add_action( 'save_post', 'vw_driving_school_pro_posttype_bn_meta_save_courses' );

/*----------------------Testimonial section ----------------------*/
/* Adds a meta box to the Testimonial editing screen */
function vw_driving_school_pro_posttype_bn_testimonial_meta_box() {
	add_meta_box( 'vw-driving-school-pro-posttype-testimonial-meta', __( 'Enter Details', 'vw-driving-school-pro-posttype' ), 'vw_driving_school_pro_posttype_bn_testimonial_meta_callback', 'testimonials', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'vw_driving_school_pro_posttype_bn_testimonial_meta_box');
}
/* Adds a meta box for custom post */
function vw_driving_school_pro_posttype_bn_testimonial_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'vw_driving_school_pro_posttype_posttype_testimonial_meta_nonce' );
  $bn_stored_meta = get_post_meta( $post->ID );
    if(!empty($bn_stored_meta['vw_driving_school_pro_posttype_testimonial_desigstory'][0]))
      $bn_vw_driving_school_pro_posttype_testimonial_desigstory = $bn_stored_meta['vw_driving_school_pro_posttype_testimonial_desigstory'][0];
    else
      $bn_vw_driving_school_pro_posttype_testimonial_desigstory = '';

    //facebook details
    if(!empty($bn_stored_meta['testimonial-facebookurl'][0]))
      $bn_meta_testimonial_facebookurl = $bn_stored_meta['testimonial-facebookurl'][0];
    else
      $bn_meta_testimonial_facebookurl = '';

    //linkdenurl details
    if(!empty($bn_stored_meta['testimonial-linkdenurl'][0]))
      $bn_meta_testimonial_linkdenurl = $bn_stored_meta['testimonial-linkdenurl'][0];
    else
      $bn_meta_testimonial_linkdenurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['testimonial-twitterurl'][0]))
      $bn_meta_testimonial_twitterurl = $bn_stored_meta['testimonial-twitterurl'][0];
    else
      $bn_meta_testimonial_twitterurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['testimonial-googleplusurl'][0]))
      $bn_meta_testimonial_googleplusurl = $bn_stored_meta['testimonial-googleplusurl'][0];
    else
      $bn_meta_testimonial_googleplusurl = '';
	?>
	<div id="testimonials_custom_stuff">
		<table id="list">
			<tbody id="the-list" data-wp-lists="list:meta">
				<tr id="meta-1">
					<td class="left">
						<?php _e( 'Designation', 'vw-driving-school-pro-posttype' )?>
					</td>
					<td class="left" >
						<input type="text" name="vw_driving_school_pro_posttype_testimonial_desigstory" id="vw_driving_school_pro_posttype_testimonial_desigstory" value="<?php echo esc_attr( $bn_vw_driving_school_pro_posttype_testimonial_desigstory ); ?>" />
					</td>
				</tr>
        <tr id="meta-2">
          <td class="left">
            <?php _e( 'Facebook URL', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="testimonial-facebookurl" id="testimonial-facebookurl" value="<?php echo esc_attr( $bn_meta_testimonial_facebookurl ); ?>" />
          </td>
        </tr>
        <tr id="meta-3">
          <td class="left">
            <?php _e( 'Twitter URL', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="testimonial-twitterurl" id="testimonial-twitterurl" value="<?php echo esc_attr( $bn_meta_testimonial_twitterurl ); ?>" />
          </td>
        </tr>
        <tr id="meta-4">
          <td class="left">
            <?php _e( 'Linkedin URL', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="testimonial-linkdenurl" id="testimonial-linkdenurl" value="<?php echo esc_attr( $bn_meta_testimonial_linkdenurl ); ?>" />
          </td>
        </tr>
        <tr id="meta-5">
          <td class="left">
            <?php _e( 'Googleplus URL', 'vw-driving-school-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="testimonial-googleplusurl" id="testimonial-googleplusurl" value="<?php echo esc_attr( $bn_meta_testimonial_googleplusurl ); ?>" />
          </td>
        </tr>
			</tbody>
		</table>
	</div>
	<?php
}

/* Saves the custom meta input */
function vw_driving_school_pro_posttype_bn_metadesig_save( $post_id ) {
	if (!isset($_POST['vw_driving_school_pro_posttype_posttype_testimonial_meta_nonce']) || !wp_verify_nonce($_POST['vw_driving_school_pro_posttype_posttype_testimonial_meta_nonce'], basename(__FILE__))) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Save desig.
	if( isset( $_POST[ 'vw_driving_school_pro_posttype_testimonial_desigstory' ] ) ) {
		update_post_meta( $post_id, 'vw_driving_school_pro_posttype_testimonial_desigstory', sanitize_text_field($_POST[ 'vw_driving_school_pro_posttype_testimonial_desigstory']) );
	}
  if( isset( $_POST[ 'testimonial-facebookurl' ] ) ) {
    update_post_meta( $post_id, 'testimonial-facebookurl', sanitize_text_field($_POST[ 'testimonial-facebookurl']) );
  }
  if( isset( $_POST[ 'testimonial-twitterurl' ] ) ) {
    update_post_meta( $post_id, 'testimonial-twitterurl', sanitize_text_field($_POST[ 'testimonial-twitterurl']) );
  }
  if( isset( $_POST[ 'testimonial-linkdenurl' ] ) ) {
    update_post_meta( $post_id, 'testimonial-linkdenurl', sanitize_text_field($_POST[ 'testimonial-linkdenurl']) );
  }
  if( isset( $_POST[ 'testimonial-googleplusurl' ] ) ) {
    update_post_meta( $post_id, 'testimonial-googleplusurl', sanitize_text_field($_POST[ 'testimonial-googleplusurl']) );
  }
}

add_action( 'save_post', 'vw_driving_school_pro_posttype_bn_metadesig_save' );

/*------------------------- Team Section-----------------------------*/
/* Adds a meta box for Designation */
function vw_driving_school_pro_posttype_bn_team_meta() {
    add_meta_box( 'vw_driving_school_pro_posttype_bn_meta', __( 'Enter Details','vw-driving-school-pro-posttype' ), 'vw_driving_school_pro_posttype_ex_bn_meta_callback', 'team', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'vw_driving_school_pro_posttype_bn_team_meta');
}
/* Adds a meta box for custom post */
function vw_driving_school_pro_posttype_ex_bn_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'vw_driving_school_pro_posttype_bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );

    //Email details
    if(!empty($bn_stored_meta['meta-email'][0]))
      $bn_meta_desig = $bn_stored_meta['meta-email'][0];
    else
      $bn_meta_desig = '';

    //Phone details
    if(!empty($bn_stored_meta['meta-call'][0]))
      $bn_meta_call = $bn_stored_meta['meta-call'][0];
    else
      $bn_meta_call = '';

    //facebook details
    if(!empty($bn_stored_meta['meta-facebookurl'][0]))
      $bn_meta_facebookurl = $bn_stored_meta['meta-facebookurl'][0];
    else
      $bn_meta_facebookurl = '';

    //linkdenurl details
    if(!empty($bn_stored_meta['meta-linkdenurl'][0]))
      $bn_meta_linkdenurl = $bn_stored_meta['meta-linkdenurl'][0];
    else
      $bn_meta_linkdenurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['meta-twitterurl'][0]))
      $bn_meta_twitterurl = $bn_stored_meta['meta-twitterurl'][0];
    else
      $bn_meta_twitterurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['meta-googleplusurl'][0]))
      $bn_meta_googleplusurl = $bn_stored_meta['meta-googleplusurl'][0];
    else
      $bn_meta_googleplusurl = '';

    //designation details
    if(!empty($bn_stored_meta['meta-designation'][0]))
      $bn_meta_designation = $bn_stored_meta['meta-designation'][0];
    else
      $bn_meta_designation = '';

    ?>
    <div id="agent_custom_stuff">
        <table id="list-table">         
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-1">
                    <td class="left">
                        <?php esc_html_e( 'Email', 'vw-driving-school-pro-posttype' )?>
                    </td>
                    <td class="left" >
                        <input type="text" name="meta-email" id="meta-email" value="<?php echo esc_attr($bn_meta_desig); ?>" />
                    </td>
                </tr>
                <tr id="meta-2">
                    <td class="left">
                        <?php esc_html_e( 'Phone Number', 'vw-driving-school-pro-posttype' )?>
                    </td>
                    <td class="left" >
                        <input type="text" name="meta-call" id="meta-call" value="<?php echo esc_attr($bn_meta_call); ?>" />
                    </td>
                </tr>
                <tr id="meta-3">
                  <td class="left">
                    <?php esc_html_e( 'Facebook URL', 'vw-driving-school-pro-posttype' )?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-facebookurl" id="meta-facebookurl" value="<?php echo esc_url($bn_meta_facebookurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-4">
                  <td class="left">
                    <?php esc_html_e( 'Linkedin URL', 'vw-driving-school-pro-posttype' )?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-linkdenurl" id="meta-linkdenurl" value="<?php echo esc_url($bn_meta_linkdenurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-5">
                  <td class="left">
                    <?php esc_html_e( 'Twitter URL', 'vw-driving-school-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-twitterurl" id="meta-twitterurl" value="<?php echo esc_url( $bn_meta_twitterurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-6">
                  <td class="left">
                    <?php esc_html_e( 'GooglePlus URL', 'vw-driving-school-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-googleplusurl" id="meta-googleplusurl" value="<?php echo esc_url($bn_meta_googleplusurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-7">
                  <td class="left">
                    <?php esc_html_e( 'Designation', 'vw-driving-school-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="text" name="meta-designation" id="meta-designation" value="<?php echo esc_attr($bn_meta_designation); ?>" />
                  </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
/* Saves the custom Designation meta input */
function vw_driving_school_pro_posttype_ex_bn_metadesig_save( $post_id ) {
    if( isset( $_POST[ 'meta-email' ] ) ) {
        update_post_meta( $post_id, 'meta-email', esc_html($_POST[ 'meta-email' ]) );
    }
    if( isset( $_POST[ 'meta-call' ] ) ) {
        update_post_meta( $post_id, 'meta-call', esc_html($_POST[ 'meta-call' ]) );
    }
    // Save facebookurl
    if( isset( $_POST[ 'meta-facebookurl' ] ) ) {
        update_post_meta( $post_id, 'meta-facebookurl', esc_url($_POST[ 'meta-facebookurl' ]) );
    }
    // Save linkdenurl
    if( isset( $_POST[ 'meta-linkdenurl' ] ) ) {
        update_post_meta( $post_id, 'meta-linkdenurl', esc_url($_POST[ 'meta-linkdenurl' ]) );
    }
    if( isset( $_POST[ 'meta-twitterurl' ] ) ) {
        update_post_meta( $post_id, 'meta-twitterurl', esc_url($_POST[ 'meta-twitterurl' ]) );
    }
    // Save googleplusurl
    if( isset( $_POST[ 'meta-googleplusurl' ] ) ) {
        update_post_meta( $post_id, 'meta-googleplusurl', esc_url($_POST[ 'meta-googleplusurl' ]) );
    }
    // Save designation
    if( isset( $_POST[ 'meta-designation' ] ) ) {
        update_post_meta( $post_id, 'meta-designation', esc_html($_POST[ 'meta-designation' ]) );
    }
}
add_action( 'save_post', 'vw_driving_school_pro_posttype_ex_bn_metadesig_save' );

add_action( 'save_post', 'bn_meta_save' );
/* Saves the custom meta input */
function bn_meta_save( $post_id ) {
  if( isset( $_POST[ 'vw_driving_school_pro_posttype_team_featured' ] )) {
      update_post_meta( $post_id, 'vw_driving_school_pro_posttype_team_featured', esc_attr(1));
  }else{
    update_post_meta( $post_id, 'vw_driving_school_pro_posttype_team_featured', esc_attr(0));
  }
}
/*------------------- Courses Shortcode -------------------------*/
function vw_driving_school_pro_posttype_courses_func( $atts ) {
    $courses = ''; 
    $courses = '<div id="course"><div class="row inner-test-bg">';
      $new = new WP_Query( array( 'post_type' => 'courses') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = vw_driving_school_pro_string_limit_words(get_the_excerpt(),20);
          $duration = get_post_meta($post_id,'course-days',true);
          $price = get_post_meta($post_id,'discount-price',true);

          $courses .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-4"> 
            <div class="row">
              <div class="col-lg-4 pr-0">';
                if (has_post_thumbnail()){
                    $courses.= '<img src="'.esc_url($url).'">';
                    }
              $courses .= '</div>
              <div class="col-lg-8 pl-0">
                <div class="course-box">
                  <div class="courses-box-content course-box-shortcodes">
                    <h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                    <ul>
                      <li>
                        <div class="li_content">
                          <p><i class="fas fa-car"></i>'.esc_html($duration).'</p>
                        </div>
                      </li>
                      <li>
                        <div class="li_content">
                          <p><i class="fas fa-car"></i>'.esc_html($price).'</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $courses = '<div id="course" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','vw-driving-school-pro-posttype').'</h2></div></div></div>';
      endif;
    $courses .= '</div></div>';
    return $courses;
}
add_shortcode( 'vw-driving-school-pro-courses', 'vw_driving_school_pro_posttype_courses_func' );

/*---------------- Team Shortcode ---------------------*/
function vw_driving_school_pro_posttype_team_func( $atts ) {
    $team = ''; 
    $team = '<div id="team" class="row ">';
      $new = new WP_Query( array( 'post_type' => 'team') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = vw_driving_school_pro_string_limit_words(get_the_excerpt(),20);
          $designation = get_post_meta($post_id,'meta-designation',true);
          $facebookurl= get_post_meta($post_id,'meta-facebookurl',true);
          $linkedin=get_post_meta($post_id,'meta-linkdenurl',true);
          $twitter=get_post_meta($post_id,'meta-twitterurl',true);
          $googleplus=get_post_meta($post_id,'meta-googleplusurl',true);
          $team .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-4 team_box">
              <div class="mr-3">
                <div class="row">
                  <div class="col-lg-5 px-0">';
                    if (has_post_thumbnail()){
                      $team.= '<img src="'.esc_url($url).'">';
                      }
                  $team.= '
                  <div class="box-team-content">
                    <ul class="so-icon">
                      <li>';
                        if($facebookurl != ''){
                        $team .= '<a class="" href="'.esc_url($facebookurl).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                        }
                      $team.= '</li>

                      <li>';
                        if($twitter != ''){
                        $team .= '<a class="" href="'.esc_url($twitter).'" target="_blank"><i class="fab fa-twitter"></i></a>';
                        }
                      $team.= '</li>

                      <li>';
                        if($googleplus != ''){
                        $team .= '<a class="" href="'.esc_url($googleplus).'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
                        }
                      $team.= '</li>

                      <li>';
                        if($linkedin != ''){
                        $team .= '<a class="" href="'.esc_url($linkedin).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
                        }
                      $team.= '</li>

                    </ul>  
                  </div></div>
                  <div class="col-lg-7 pl-0">
                    <div class="team-box-inner shrtteam-box">
                      <div class="team-box-content">
                        <h4 class="team_name"><a href="'.get_the_permalink().'">'.get_the_title().'</a><cite>'.esc_html($designation).'</cite>
                        </h4>
                        <div class="qoute_text py-2">'.$excerpt.'</div>
                      </div>  
                    </div>  
                  </div>
                </div>
              </div>
            </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
        $team.= '</div>';
      else :
        $team = '<div id="our_team" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','vw-driving-school-pro-posttype').'</h2></div>';
      endif;
      $team.= '</div>';
    return $team;
}
add_shortcode( 'vw-driving-school-pro-team', 'vw_driving_school_pro_posttype_team_func' );

/*------------------- Testimonial Shortcode -------------------------*/
function vw_driving_school_pro_posttype_testimonials_func( $atts ) {
    $testimonial = ''; 
    $testimonial = '<div id="testimonials"><div class="row testimonial_shortcodes">';
      $new = new WP_Query( array( 'post_type' => 'testimonials') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = vw_driving_school_pro_string_limit_words(get_the_excerpt(),20);
          $designation = get_post_meta($post_id,'vw_driving_school_pro_posttype_testimonial_desigstory',true);
          $facebookurl= get_post_meta($post_id,'testimonial-facebookurl',true);
          $linkedin=get_post_meta($post_id,'testimonial-linkdenurl',true);
          $twitter=get_post_meta($post_id,'testimonial-twitterurl',true);
          $googleplus=get_post_meta($post_id,'testimonial-googleplusurl',true);
          $testimonial .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-4">
            <div class="testimonial_box">
              <div class="row">
                <div class="col-lg-4">';
                  if (has_post_thumbnail()){
                      $testimonial.= '<img src="'.esc_url($url).'">';
                      }
                $testimonial .= '</div>
                <div class="col-lg-8 py-3">
                  <div class="qoute_text pb-3">'.$excerpt.'</div>
                  <div class="tesimonial-social-icon">';
                   if($facebookurl != ''){
                      $testimonial .= '<a class="" href="'.esc_url($facebookurl).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                    } if($twitter != ''){
                      $testimonial .= '<a class="" href="'.esc_url($twitter).'" target="_blank"><i class="fab fa-twitter"></i></a>';
                    } if($googleplus != ''){
                      $testimonial .= '<a class="" href="'.esc_url($googleplus).'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
                    } if($linkedin != ''){
                      $testimonial .= '<a class="" href="'.esc_url($linkedin).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
                    }
                  $testimonial .= '</div>
                  <div class="mt-2">
                  <h4 class="testimonial_name"><a href="'.get_the_permalink().'">'.get_the_title().'</a> <cite>'.esc_html($designation).'</cite></h4></div>
                </div>  
              </div>    
            </div>
          </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $testimonial = '<div id="testimonial" class="testimonial_wrap col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','vw-driving-school-pro-posttype').'</h2></div>';
      endif;
    $testimonial .= '</div></div>';
    return $testimonial;
}
add_shortcode( 'vw-driving-school-pro-testimonials', 'vw_driving_school_pro_posttype_testimonials_func' );

/*---------------- FAQ Shortcode ---------------------*/
function vw_driving_school_pro_posttype_faq_func( $atts ) {
    $faq = ''; 
    $faq = '<div id="our_faq" class="faq_tab_content">';
      $new = new WP_Query( array( 'post_type' => 'faq') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = vw_driving_school_pro_string_limit_words(get_the_excerpt(),20);
          $faq .= '<div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading'.esc_attr($k).'">
                  <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.esc_attr($k).'" aria-expanded="false" aria-controls="collapse'.esc_attr($k).'">
                    '.get_the_title().'
                  </a>
                </h4>
                </div>
                <div id="collapse'.esc_attr($k).'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.esc_attr($k).'">
                  <div class="panel-body">
                    <p>'.get_the_content().'</p>
                  </div>
                </div>
              </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
        $faq.= '</div>';
      else :
        $faq = '<div id="our_faq" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','vw-driving-school-pro-posttype').'</h2></div>';
      endif;
      $faq.= '</div>';
    return $faq;
}
add_shortcode( 'vw-driving-school-pro-faq', 'vw_driving_school_pro_posttype_faq_func' );