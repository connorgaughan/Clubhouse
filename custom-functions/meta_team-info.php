<?php

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">
        <tr>
            <th><label for="image">Profile Image</label></th>
            <td>
                <input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter the url of your profile image (get this from the media library).</span>
            </td>
        </tr>
        <tr>
            <th><label for="title">Title</label></th>
            <td>
                <input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your official title.</span>
            </td>
        </tr>
        <tr>
            <th><label for="location">Location</label></th>
            <td>
                <input type="text" name="location" id="location" value="<?php echo esc_attr( get_the_author_meta( 'location', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your location (Cleveland, OH or Chicago,IL).</span>
            </td>
        </tr>

        <tr>
            <th><label for="twitter">Twitter</label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter account URL.</span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin">LinkedIn</label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your LinkedIn URL.</span>
            </td>
        </tr>
        <tr>
            <th><label for="instagram">Instagram</label></th>
            <td>
                <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Instagram URL.</span>
            </td>
        </tr>
        <tr>
            <th><label for="dribbble">Dribbble</label></th>
            <td>
                <input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Dribbble URL.</span>
            </td>
        </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    update_usermeta( $user_id, 'image', $_POST['image'] );
    update_usermeta( $user_id, 'title', $_POST['title'] );
    update_usermeta( $user_id, 'location', $_POST['location'] );
    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
    update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
    update_usermeta( $user_id, 'dribbble', $_POST['dribbble'] ); 
}

function count_user_posts_by_type($userid, $post_type = 'portfolio', $post_status = 'publish') {

    global $wpdb; 
    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = $userid AND post_type = '$post_type' AND post_status = '$post_status'"; 
    $count = $wpdb->get_var($query); 
    return apply_filters('get_usernumposts', $count, $userid);
}

?>