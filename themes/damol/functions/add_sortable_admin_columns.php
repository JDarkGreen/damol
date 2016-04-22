<?php 

/*
* Este archivo permite ordenar los posts mediante los siguientes parametros
*/

/*
* Post type = proyecto
*/
if(!function_exists('mbe_change_table_column_titles')){

    function mbe_change_table_column_titles($columns){
        $columns['damol-empresa'] = 'Empresa';
        return $columns;
    }
    add_filter('manage_proyecto_posts_columns', 'mbe_change_table_column_titles');
}

if(!function_exists('mbe_change_column_rows')){

    function mbe_change_column_rows($column_name, $post_id){
        if($column_name == 'damol-empresa'){
            echo get_the_term_list($post_id, 'damol_empresa', '', ', ', '').PHP_EOL;
        }
    }
    add_action('manage_proyecto_posts_custom_column', 'mbe_change_column_rows', 10, 2);
}

if(!function_exists('mbe_change_sortable_columns')){

    function mbe_change_sortable_columns($columns){
			$columns['damol-empresa'] = 'damol-empresa';
			$columns['categories']    = 'categories';
        return $columns;
    }
    add_filter('manage_edit-proyecto_sortable_columns', 'mbe_change_sortable_columns');
}

if(!function_exists('mbe_sort_custom_column')){
	function mbe_sort_custom_column($clauses, $wp_query){
		global $wpdb;
		if(isset($wp_query->query['orderby']) && $wp_query->query['orderby'] == 'categories')
		{
			$clauses['join'] .= "LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
			LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
			LEFT OUTER JOIN {$wpdb->terms} USING (term_id) ";
			
			$clauses['where']  .= "AND (taxonomy = 'category' OR taxonomy IS NULL)";
			
			$clauses['groupby'] = "object_id";
			
			$clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC)";

			if(strtoupper($wp_query->get('order')) == 'ASC'){
				$clauses['orderby'] .= 'ASC';
			} else{
				$clauses['orderby'] .= 'DESC';
			}
		}	
		return $clauses;
	}
	add_filter('posts_clauses', 'mbe_sort_custom_column', 10, 2);
}



?>