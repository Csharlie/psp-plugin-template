<?php
if(!class_exists('Post_Type_Template'))
{
	/**
	 * A PostTypeTemplate class that provides 3 additional meta fields
	 */
	class Post_Type_Template
	{
		const POST_TYPE	= "post-type-template";
		private $_meta	= array(
			'meta_a',
			'meta_b',
			'meta_c',
		);
		
    	/**
    	 * The Constructor
    	 */
    	public function __construct()
    	{
    		// register actions
    		add_action('init', array(&$this, 'init'));
    		add_action('admin_init', array(&$this, 'admin_init'));
    	} // END public function __construct()

    	/**
    	 * hook into WP's init action hook
    	 */
    	public function init()
    	{
    		// Initialize Post Type
    		$this->create_post_type();
    		add_action('save_post', array(&$this, 'save_post'));
    	} // END public function init()

    	/**
    	 * Create the post type
    	 */
    	public function create_post_type()
    	{
    		$labels = array(
                'name'                => __( sprintf(ucwords(str_replace("_", " ", self::POST_TYPE)))),
                'singular_name'       => __( ucwords(str_replace("_", " ", self::POST_TYPE))),
                'menu_name'           => __( ucwords(str_replace("-", " ", self::POST_TYPE)), 'text_domain' ),
                'name_admin_bar'      => __( 'Custom Post', 'text_domain' ),
                'parent_item_colon'   => __( 'Parent Custom Post:', 'text_domain' ),
                'all_items'           => __( 'All Custom Posts', 'text_domain' ),
                'add_new_item'        => __( 'Add New Custom Post', 'text_domain' ),
                'add_new'             => __( 'Add New', 'text_domain' ),
                'new_item'            => __( 'New Custom Post', 'text_domain' ),
                'edit_item'           => __( 'Edit Custom Post', 'text_domain' ),
                'update_item'         => __( 'Update Custom Post', 'text_domain' ),
                'view_item'           => __( 'View Custom Post', 'text_domain' ),
                'search_items'        => __( 'Search Custom Post', 'text_domain' ),
                'not_found'           => __( 'Not found Custom Post(s)', 'text_domain' ),
                'not_found_in_trash'  => __( 'Not found Custom Post(s) in Trash', 'text_domain' )
            );

            $args = array(
                'label'               => __( ucwords(str_replace("_", " ", self::POST_TYPE)), 'text_domain' ),
                'description'         => __( 'Custom Post Type for PSP WP Plugin', 'text_domain' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
                'taxonomies'          => array( 'category', 'post_tag' ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => 'dashicons-images-alt2',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => false,     
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'rewrite'             => $rewrite,
                'capability_type'     => 'page',
            );

            register_post_type(self::POST_TYPE, $args);
    	}
	
    	/**
    	 * Save the metaboxes for this custom post type
    	 */
    	public function save_post($post_id)
    	{
            // verify if this is an auto save routine. 
            // If it is our form has not been submitted, so we dont want to do anything
            if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            {
                return;
            }
            
    		if(isset($_POST['post_type']) && $_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
    		{
    			foreach($this->_meta as $field_name)
    			{
    				// Update the post's meta field
    				update_post_meta($post_id, $field_name, $_POST[$field_name]);
    			}
    		}
    		else
    		{
    			return;
    		} // if($_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
    	} // END public function save_post($post_id)

    	/**
    	 * hook into WP's admin_init action hook
    	 */
    	public function admin_init()
    	{			
    		// Add metaboxes
    		add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
    	} // END public function admin_init()
			
    	/**
    	 * hook into WP's add_meta_boxes action hook
    	 */
    	public function add_meta_boxes()
    	{
    		// Add this metabox to every selected post
    		add_meta_box( 
    			sprintf('wp_plugin_template_%s_section', self::POST_TYPE),
    			sprintf('%s Information', ucwords(str_replace("_", " ", self::POST_TYPE))),
    			array(&$this, 'add_inner_meta_boxes'),
    			self::POST_TYPE
    	    );					
    	} // END public function add_meta_boxes()

		/**
		 * called off of the add meta box
		 */		
		public function add_inner_meta_boxes($post)
		{		
			// Render the job order metabox
			include(sprintf("%s/../templates/%s_metabox.php", dirname(__FILE__), self::POST_TYPE));			
		} // END public function add_inner_meta_boxes($post)

	} // END class Post_Type_Template
} // END if(!class_exists('Post_Type_Template'))
