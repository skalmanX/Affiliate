<?php

/* Add our function to the widgets_init hook. */
add_action('widgets_init', 'load_featuredwidget');

/* Function that registers our widget. */
function load_featuredwidget()
{
    register_widget('Featured_Room_Widget');
}

class Featured_Room_Widget extends WP_Widget
{
    
    function __construct()
    {
        parent::__construct('featuredroom-widget', // Base ID
            __('Featured Gambling Site', 'highroller'), // Name
            array(
            'description' => __('Display a featured casino or other promoted site', 'highroller')
        ) // Args
            );
    }
    
    
    public function widget($args, $instance)
    {
        extract($args);
        $roomfilter  = $instance["roomfilter"];
        $title       = apply_filters('widget_title', $instance['title']);
        $detailslink = $instance["detailslink"];
        /* User-selected settings. */
        if (substr($roomfilter, 0, 1) == "P") {
            $id    = explode("|", $roomfilter);
            $id    = $id[1];
            $p     = get_post($id);
            $posts = array(
                $p
            );
        } else {
            $loop  = new WP_Query(array(
                'post_type' => 'casino',
                'posts_per_page' => -1,
                'orderby' => 'title'
            ));
            $posts = $loop->posts;
            shuffle($posts);
        }
        $post = $posts[0];
        
        /* Before widget (defined by themes). */
        echo $before_widget;
        
        /* Title of widget (before and after defined by themes). */
        if ($title)
            echo $before_title . $title . $after_title;
        $redirectkey = fly_redirect_slug();
        $rateper     = get_post_meta($post->ID, "_as_rating", true) * 20;

        // Get Terms and Conditions

        $_tc_enable = (get_post_meta($post->ID,"_tc_enable",true)) ?: '';
        $_tc_link 	= (get_post_meta($post->ID,"_tc_link",true)) ?: '#'; 
        $_tc_text 	= (get_post_meta($post->ID,"_tc_text",true)) ?: ''; 

        $dcontent    = '
                
                
        <div class="featsites">
            <div class="midtop"> ';
        
        if ($detailslink) {
            $dcontent .= '    <a href=" ' . get_the_permalink($post->ID) . ' " >' . get_the_post_thumbnail($post->ID, 'casino-logo', array(
                'class' => 'casinologo'
            )) . '    </a> ';
        } else {
            
            $dcontent .= '    <a  ' . (get_theme_option('redirect-new-window') != "" ? "target=\"_blank\"" : "") . ' href="' . get_bloginfo('url') . '/' . $redirectkey . '/' . get_post_meta($post->ID, "_as_redirectkey", true) . '">' . get_the_post_thumbnail($post->ID, 'casino-logo', array(
                'class' => 'casinologo'
            )) . '
            </a>';
        }
        $dcontent .= ' </div>
             <h4> ' . get_the_title($post->ID) . '</h4>
            
            <span class="hilite">' . get_post_meta($post->ID, '_as_bonustext', true) . ' </span>';

        if ($_tc_enable = 'enabled') {
            $dcontent .= '<a href="' . $_tc_link . '" class="revlink tc center featured">'.__($_tc_text, 'highroller').'</a>';
        }
        
        
        if ($detailslink) {
            $dcontent .= '    <a href=" ' . get_the_permalink($post->ID) . ' " class="visbutton fullbutton">' . __('Review', 'highroller') . '</a> ';
        } else {
            
            $dcontent .= '    <a  ' . (get_theme_option('redirect-new-window') != "" ? "target=\"_blank\"" : "") . ' href="' . get_bloginfo('url') . '/' . $redirectkey . '/' . get_post_meta($post->ID, "_as_redirectkey", true) . '" class="visbutton fullbutton">' . __('Visit Now', 'highroller') . '</a>';
        }


        
        
        
        $dcontent .= ' 
          </div><!--End of featsites -->';
        
        
        $content = apply_filters('featured-widget', array(
            $post
        ));
        
        if (!is_array($content) && $content != "") {
            echo $content;
        } else {
            echo $dcontent;
        }
        
        /* After widget (defined by themes). */
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance)
    {
        $instance                = $old_instance;
        $instance['title']       = strip_tags($new_instance['title']);
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title']       = strip_tags($new_instance['title']);
        $instance['roomfilter']  = strip_tags($new_instance['roomfilter']);
        $instance['detailslink'] = strip_tags($new_instance['detailslink']);
        return $instance;
    }
    
    public function form($instance)
    {
        
        /* Set up some default widget settings. */
        $defaults = array(
            'title' => 'Featured Casino',
            'usonly' => '',
            'ts_sort' => '_as_bonusamount',
            'numsites' => '5'
        );
        $instance = wp_parse_args((array) $instance, $defaults);
?>

<p>
<label for="<?php
        echo $this->get_field_id('title');
?>"><?php
        _e('Title', 'highroller');
?>:</label>
<input class="widefat" id="<?php
        echo $this->get_field_id('title');
?>" name="<?php
        echo $this->get_field_name('title');
?>" value="<?php
        echo $instance['title'];
?>" type="text" style="width:100%;" />
</p>


<p>
<label for="<?php
        echo $this->get_field_id('roomfilter');
?>"><?php
        _e('Featured', 'highroller');
?>:</label><br />
<select style="width: 100%" name="<?php
        echo $this->get_field_name('roomfilter');
?>">
    <option style="font-weight:bold" value="random"><?php
        _e('Random', 'highroller');
?></option>
<?php
        
        $loop = new WP_Query(array(
            'post_type' => 'casino',
            'posts_per_page' => -1,
            'orderby' => 'title'
        ));
        foreach ($loop->posts as $p) {
            var_dump($p);
            echo "<option " . ($instance['roomfilter'] == "P|" . $p->ID ? 'SELECTED' : '') . " style=\"padding-left: 15px\" value=\"P|" . $p->ID . "\">" . $p->post_title . "</option>";
        }
        
?>
</select>
</p>

<p>    
<label><?php
        _e('Link to Review Page Instead of Casino Directly', 'highroller');
?>:</label>    
<input style="width:20px;" class="widefat" type="checkbox" <?php
        if ($instance['detailslink'])
            echo 'CHECKED';
?> name="<?php
        echo $this->get_field_name('detailslink');
?>" /><?php
        _e('Check to link widget to review page instead of outbound casino.', 'highroller');
?>
</p>
  <?php
    }
}

?>