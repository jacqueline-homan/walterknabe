<?php

// Load stylesheet and widget
//add_action('wp_head','kauriSocialWidgetCss');
add_action('widgets_init','load_kauriSocialWidget');

// Register the widget
function load_kauriSocialWidget() {
	register_widget('kauriSocialWidget');
}

/*/ Widget stylesheet
function kauriSocialWidgetCss() {
	echo '<link href="'.plugins_url('style.css', __FILE__).'" type="text/css" rel="stylesheet" media="screen" />';
}
*/
class kauriSocialWidget extends WP_Widget{

	function kauriSocialWidget() {
		//Settings
		$widget_ops = array('classname'=>'kaurisocialwidget','description'=>__('Display social icons on your site.','kauri'));
		
		//Controll settings
		$control_ops = array('id_base' => 'kaurisocialwidget');
		
		//Create widget
		$this->WP_Widget('kaurisocialwidget',__('Kauri Social Widget','kauri'),$widget_ops,$control_ops);
		
	}
	
	// Widget frontend
	function widget($args,$instance) {
		extract($args);
		
		//User selected settings
		$title = $instance['title'];
		$facebook= $instance['facebook'];
		$twitter = $instance['twitter'];
		$flickr = $instance['flickr'];
		$rss = $instance['rss'];
		$gplus = $instance['gplus'];
		$youtube = $instance['youtube'];
		
		echo $before_widget;
		?>
		<div class="social_widget">			
			<?php 
			if ( $title ) {
				echo $before_title . $title . $after_title; 
			}
			?>			
			<div class="buttons">			
			<?php if($rss == 1) : ?>
				<a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="soc_rss" title="RSS"></a>
			<?php endif; ?>			
			<?php if($twitter) : ?>
				<a href="<?php echo $twitter; ?>" target="_blank" class="soc_twitter" title="Twitter"></a>
			<?php endif; ?>			
			<?php if($facebook) : ?>
				<a href="<?php echo $facebook; ?>" target="_blank" class="soc_facebook" title="Facebook"></a>
			<?php endif; ?>			
			<?php if($flickr) : ?>
				<a href="<?php echo $flickr; ?>" target="_blank" class="soc_flickr" title="Flickr"></a>
			<?php endif; ?>			
			<?php if($gplus) : ?>
				<a href="<?php echo $gplus; ?>" target="_blank" class="soc_gplus" title="Google Plus"></a>
			<?php endif; ?>			
			<?php if($youtube) : ?>
				<a href="<?php echo $youtube; ?>" target="_blank" class="soc_youtube" title="YouTube"></a>
			<?php endif; ?>		
			</div><!-- .buttons -->			
		</div>		
		<?php
		echo $after_widget;
	}
	
	// Widget update
	function update($new_instance,$instance) {
		$pattern1 = '/^http:\/\//'; //
		$pattern2 = '/^https:\/\//';
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['rss'] = strip_tags($new_instance['rss']);
		
		if(!empty($new_instance['twitter'])) {
			$tw = strip_tags($new_instance['twitter']);		
			if(preg_match($pattern1, $tw) || preg_match($pattern2, $tw)){
				$instance['twitter'] = $tw;
			} else {
				$instance['twitter'] = 'http://'.$tw;
			}
		} else {
			$instance['twitter'] = '';	
		}
		
		if(!empty($new_instance['facebook'])) {
			$fb = strip_tags($new_instance['facebook']);		
			if(preg_match($pattern1, $fb) || preg_match($pattern2, $fb)){
				$instance['facebook'] = $fb;
			} else {
				$instance['facebook'] = 'http://'.$fb;
			}
		} else {
			$instance['facebook'] = '';
		}

		
		if(!empty($new_instance['gplus'])) {
			$gp = strip_tags($new_instance['gplus']);		
			if(preg_match($pattern1, $gp) || preg_match($pattern2, $gp)){
				$instance['gplus'] = $gp;
			} else {
				$instance['gplus'] = 'http://'.$gp;
			}		
		} else {
			$instance['gplus'] = '';
		}
		
		if(!empty($new_instance['youtube'])) {
			$yt = strip_tags($new_instance['youtube']);		
			if(preg_match($pattern1, $yt) || preg_match($pattern2, $yt)){
				$instance['youtube'] = $yt;
			} else {
				$instance['youtube'] = 'http://'.$yt;
			}		
		} else {
			$instance['youtube'] = '';
		}
		
		if(!empty($new_instance['flickr'])) {
			$fl = strip_tags($new_instance['flickr']);		
			if(preg_match($pattern1, $fl) || preg_match($pattern2, $fl)){
				$instance['flickr'] = $fl;
			} else {
				$instance['flickr'] = 'http://'.$fl;
			}		
		} else {
			$instance['flickr'] = '';
		}		
		return $instance;
	}

	// Widget backend
	function form($instance) {
		$default = array('title' =>'', 'twitter'=>'','facebook'=>'','flickr'=>'','rss'=>'', 'gplus'=>'', 'youtube'=>'');
		$instance = wp_parse_args((array)$instance,$default);
	?>
		<!-- TITLE -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>		
		<!-- RSS -->
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>"><?php echo __('RSS link:','kauri'); ?></label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" <?php if($instance['rss'] == 1): ?> checked="checked" <?php endif; ?> value="1" /> <?php echo __('Yes','kauri'); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" <?php if($instance['rss'] == 0): ?> checked="checked" <?php endif; ?> value="0" /> <?php echo __('No','kauri'); ?>
		</p>		
		<!-- Twitter -->
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php echo __('Twitter profile link:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" />
		</p>		
		<!-- Facebook -->
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php echo __('Facebook profile/page/group link:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" />
		</p>		
		<!-- Flickr -->
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php echo __('Flickr profile link:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $instance['flickr']; ?>" class="widefat" />
		</p>		
		<!-- Google Plus -->
		<p>
			<label for="<?php echo $this->get_field_id('gplus'); ?>"><?php echo __('Google Plus profile/page link:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" value="<?php echo $instance['gplus']; ?>" class="widefat" />
		</p>		
		<!-- Youtube -->
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php echo __('Youtube profile/page link:','kauri'); ?></label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $instance['youtube']; ?>" class="widefat" />
		</p>	
	<?php
	
	}

}
?>