<?php



class thenotes_lite_breadcrumb_class {



	var $opts;



	function thenotes_lite_custom_breadcrumb() {



		$markup = '<li>&nbsp;/&nbsp;</li>';



		global $post, $options;


		echo '<li><a class="primary-color secondary-color" href="'. esc_url(home_url('/')) .'">'. __('Home', 'thenotes-lite') .'</a></li>';

		if (!is_front_page()) {

			echo $markup;

		}



		if (is_front_page() && !is_home()) {

			echo $markup;

		}



		$output = $this->thenotes_lite_simple_breadcrumb_case($post);



		if (is_page() || is_single()) {

			the_title('<li>', '</li>');

		} else {

			echo '<li>'.$output.'</li>';

		}

	}







	function thenotes_lite_simple_breadcrumb_case($der_post) {



		$markup = '<li>&nbsp;/&nbsp;</li>';



		if (is_page()) {



			if ($der_post->post_parent) {



				$my_query = get_post($der_post->post_parent);



				$this->thenotes_lite_simple_breadcrumb_case($my_query);







				$link = '<a class="primary-color secondary-color" href="';



				$link .= esc_url( get_permalink($my_query->ID) );



				$link .= '">';



				$link .= '' . esc_attr( get_the_title($my_query->ID) ) . '</a>' . $markup;







				echo '<li>'.$link.'</li>';



			}



			return;



		}







		if (is_single() && !is_attachment()) {



			$category = get_the_category();



			if (is_attachment()) {



				$my_query = get_post($der_post->post_parent);



				$category = get_the_category($my_query->ID);



				$ID = $category[0]->cat_ID;



				echo get_category_parents($ID, true, $markup, false);



				previous_post_link("%link $markup");



			} else {



				if (isset($category[0]->cat_ID)) {



					$ID = $category[0]->cat_ID;



					echo '<li>'.get_category_parents($ID, true, '', false).'</li>'.$markup;



				}



			}



			return;



		}







		if (is_category()) {



			$category = get_the_category();



			$i = $category[0]->cat_ID;



			$parent = $category[0]->category_parent;



			if ($parent > 0 && $category[0]->cat_name == single_cat_title('', false)) {



				echo '<li>'.get_category_parents($parent, true, '', false).'</li>'.$markup;



			}



			return single_cat_title('', false);



		}







		if (is_author()) {



			global $wp_query;



			$curauth = $wp_query->get_queried_object();



			return __('Author', 'thenotes-lite') . ' : ' . $curauth->display_name;



		}







		if (is_tag()) {



			return __('Tag', 'thenotes-lite') . ' : ' . single_tag_title('', false);



		}







		if (is_search()) {



			return __('Search', 'thenotes-lite');



		}



		if (is_404()) {			return __('Error 404', 'thenotes-lite');		}





		if (is_year()) {



			return get_the_time('Y');



		}







		if (is_month()) {



			$k_year = get_the_time('Y');



			echo "<li><a class='primary-color secondary-color' href='" . get_year_link($k_year) . "'>" . $k_year . "</a></li>" . $markup;



			return get_the_time('F');



		}







		if (is_day() || is_time()) {



			$k_year = get_the_time('Y');



			$k_month = get_the_time('m');



			$k_month_display = get_the_time('F');



			echo "<li><a class='primary-color secondary-color' href='" . get_year_link($k_year) . "'>" . $k_year . "</a></li>" . $markup;



			echo "<li><a class='primary-color secondary-color' href='" . get_month_link($k_year, $k_month) . "'>" . $k_month_display . "</a></li>" . $markup;



			return get_the_time('jS (l)');



		}



	}



}


?>
