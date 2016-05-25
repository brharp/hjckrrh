<?php

/*****************************
SITE CONFIGURATION VARIABLES
******************************/


/* ---- 
* 
*  UPDATE NODELINKS
*
*  Allows you to replace the source node ID with the destination node ID in body field links.
*  For example, /sitename/node/12 may become /sitename/node/84 to match the new post-migration node ID.
*
*  USAGE: Set update_nodelinks to TRUE in $update_arguments. 
*  Add list of any internal urls (relative and absolute) referencing /node in $update_nodelinks_urls.
*
* 'update_nodelinks' => TRUE,
*
*  $update_nodelinks_urls = array(
*      '/node/'
*      '/sitename/node/',
*      'http://www.uoguelph.ca/sitename/node/',
*      'https://www.uoguelph.ca/sitename/node/',
*  );
*
*/

/* ---- 
* 
*  UPDATE HARDLINKS 
*
*  Allows you to replace any absolute urls in the body field with relative urls.
*  For example, https://www.uoguelph.ca/sitename/pagename could become /sitename/pagename
*
*  Can also be used when updating the sitename.
*  For example, /oldsitename can be updated to /newsitename.
*
*  USAGE: Set update_nodelinks to TRUE in $update_arguments. 
*  Set update_hardlinks_destination to new URL in quotes.
*  Add list of any (old) absolute urls that you want to fix in $update_hardlinks_source.
*
* 'update_nodelinks' => TRUE,
* 'update_hardlinks_destination' => '/sitename',
*
*  $update_hardlinks_source = array(
*      'http://www.uoguelph.ca/sitename',
*      'https://www.uoguelph.ca/sitename',
*      'https://www.uoguelph.ca/oldsitename',
*      'http://www.uoguelph.ca/oldsitename',
*      '/oldsitename',
*  );
*
*/

/* ---- 
* 
*  UPDATE PREFIX SOURCE 
*
*  Allows you to update the prefix source for any inline files and images referenced in the body field.
*  For example, /oldsitename/sites/default could become completely/newname/sites/default
*
*  USAGE: Set update_prefix_inline to TRUE in $update_arguments. 
*  Set update_hardlinks_destination to new URL in quotes.
*  Add list of any (old) absolute urls that you want to fix in $update_prefix_source.
*
* 'update_prefix_inline' => TRUE,
* 'update_prefix_destination' => '/completely/newname/sites/default',
*
*  $update_prefix_source = array(
*      '/sitename/sites/default',
*      'http://www.uoguelph.ca/sitename/sites/default',
*      'https://www.uoguelph.ca/sitename/sites/default',
*  );
*
*/

/**************************
*  UPDATE NODE Settings
**************************/

  $update_nodelinks_urls = array();
  $update_hardlinks_source = array();
  $update_prefix_source = array();

  $update_arguments = array(
    'update_nodelinks' => FALSE,
    'update_nodelinks_urls' => $update_nodelinks_urls,
    'update_hardlinks_source' => $update_hardlinks_source,
    'update_hardlinks_destination' => '',
    'update_prefix_inline' => FALSE,
    'update_prefix_source' => $update_prefix_source,
    'update_prefix_destination' => '',
  );

/**************************
*  MENU Settings
**************************/

  $menu_names = array('main-menu');

/**************************
*  USER Settings
**************************/

  // ROLE format: 'source role' => 'destination role'
  $role_mappings = array(
    // e.g. 'source-editor' => 'editor',
  );

  $user_arguments = array(
    'role_mappings' => $role_mappings,
  );

/**************************
*  FILE Settings
**************************/

  $file_arguments = array(
    'source_directory' => 'public://',
    'destination_directory' => 'public://',
  );

/**************************
*  TAXONOMY Settings
**************************/

  $term_arguments = array(
    'source_term_keyword' => 'tags',
  );



/* ----
*
*  USING DEFAULT VALUES
*
*  Use with caution. Setting default value will override the value for all migrated rows.
*  To set multiple default values in one taxonomy, use an array.
*
*  Single value example: 'source_page_category_default_value' => 47,
*  Multi value example:  'source_page_keyword_default_value' => array(1,2,3),
* 
*/

/* ----
*
*  MAPPING CUSTOM TEXT FIELDS into Body field
*  
*  Allows you to add text field content directly into content type body field with a custom heading.
*
*  For each field, create an array containing the following key values:
*     - content_before: Include any HTML content that needs to occur before the text field (eg. HTML heading)
*     - db_table: database table to retrieve text field
*     - db_field_value: database column to retrieve text field value
*     - db_field_entity_id: database column to retrieve entity_id value (ie. nid for node associated with field)
*     - placement: can be set to "top" or "bottom". Default is bottom.
*     - content_after: (optional) Include any HTML content that needs to occur after the text field (eg. separator, heading)
*
*  Once all custom fields have an associated array, add the array in the insert_fields array
*  associated with the content type being migrated, using the machine name of the field as the key.
*
*  // Sample Field array
*  $field_info = array(
*    'content_before' => '<h2>Example Heading</h2>',
*    'db_table' => 'field_data_field_source_table_name',
*    'db_field_value' => array('field_value_column'),
*    'db_field_entity_id' => 'field_entityid_column',
*    'placement' => 'top',
*    'content_after' => '<h2>Details</h2>',
*  );
*
*  // Sample Insert Fields array 
*  $page_insert_fields = array(
*    'field_machine_name' => $field_info,
*   );
*/

/**************************
*  PAGE Settings
**************************/

  $page_insert_fields = NULL;
  $page_arguments = array(
    'source_page_node_type' => 'page',
    'source_page_term_category' => '',
    'source_page_term_keyword' => '',
    'source_page_body' => 'body',
    'source_page_summary' => 'body:summary',
    'source_page_format' => 'body:format',
    'source_page_category' => '',
    'source_page_category_default_value' => '',
    'source_page_keyword' => 'field_tags',
    'source_page_keyword_default_value' => '',
    'source_page_attachments' => '',
    'source_page_insert_fields' => $page_insert_fields,
  );
  

/**************************
*  NEWS Settings
**************************/

  $news_insert_fields = NULL;
  $news_arguments = array(
    'source_news_node_type' => 'article',
    'source_news_term_category' => '',
    'source_news_term_keyword' => '',
    'source_news_body' => 'body',
    'source_news_summary' => 'body:summary',
    'source_news_format' => 'body:format',
    'source_news_category' => '',
    'source_news_category_default_value' => '',
    'source_news_keyword' => '',
    'source_news_keyword_default_value' => '',
    'source_news_writer' => '',
    'source_news_link' => '',
    'source_news_image' => '',
    'source_news_caption' => '',
    'source_news_attachment' => '',
    'source_news_insert_fields' => $news_insert_fields,
  );

/**************************
*  FAQ Settings
**************************/

  $faq_insert_fields = NULL;

  $faq_arguments = array(
    'source_faq_node_type' => '',
    'source_faq_term_category' => '',
    'source_faq_term_keyword' => '',
    'source_faq_answer' => 'body',
    'source_faq_format' => 'body:format',
    'source_faq_category' => '',
    'source_faq_category_default_value' => '',
    'source_faq_keyword' => '',
    'source_faq_keyword_default_value' => '',
    'source_faq_insert_fields' => $faq_insert_fields,
  );

/**************************
*  FEATURED ITEM Settings
**************************/

  $featureditem_insert_fields = NULL;

  $featureditem_arguments = array(
    'source_featureditem_node_type' => '',
    'source_featureditem_term_category' => '',
    'source_featureditem_term_keyword' => '',
    'source_featureditem_body' => 'body',
    'source_featureditem_summary' => 'body:summary',
    'source_featureditem_format' => 'body:format',
    'source_featureditem_link' => '',
    'source_featureditem_image' => '',
    'source_featureditem_category' => '',
    'source_featureditem_category_default_value' => '',
    'source_featureditem_keyword' => '',
    'source_featureditem_keyword_default_value' => '',
    'source_featureditem_insert_fields' => $featureditem_insert_fields,
  );


/**************************
*  EVENT Settings
**************************/

  $event_insert_fields = NULL;

  $event_arguments = array(
    'source_event_node_type' => '',
    'source_event_term_category' => '',
    'source_event_term_keyword' => '',
    'source_event_term_heading' => '',
    'source_event_body' => 'body',
    'source_event_summary' => 'body:summary',
    'source_event_format' => 'body:format',
    'source_event_category' => '',
    'source_event_category_default_value' => '',
    'source_event_keyword' => '',
    'source_event_keyword_default_value' => '',
    'source_event_date' => '',
    'source_event_date_timezone' => 'America/New_York',
    'source_event_location' => '',
    'source_event_multipart' => '',
    'source_event_multipart_heading' => '',
    'source_event_multipart_content' => '',
    'source_event_image' => '',
    'source_event_caption' => '',
    'source_event_attachments' => '',
    'source_event_link' => '',
    'source_event_insert_fields' => $event_insert_fields,
  );

/**************************
*  PROFILE Settings
**************************/

  $profile_insert_fields = NULL;

  $profile_arguments = array(
    'source_profile_node_type'              => 'profile',
    'source_profile_name'                   => 'field_profile_name',
    'source_profile_lastname'               => 'field_profile_lastname',
    'source_profile_role'                   => 'field_profile_role',
    'source_profile_role_source_type'       => 'tid',
    'source_profile_role_ignore_case'       => TRUE,
    'source_profile_role_create_term'       => TRUE,
    'source_profile_role_vocabulary'        => 'profile_role',
    'source_profile_role_default_value'     => '',
    'source_profile_unit'                   => 'field_profile_unit',
    'source_profile_unit_source_type'       => 'tid',
    'source_profile_unit_ignore_case'       => TRUE,
    'source_profile_unit_create_term'       => TRUE,
    'source_profile_unit_vocabulary'        => 'profile_unit',
    'source_profile_unit_default_value'     => '',
    'source_profile_summary'                => 'field_profile_summary',
    'source_profile_format'                 => 'field_profile_summary:format',
    'source_profile_category'               => 'field_profile_category',
    'source_profile_category_source_type'   => 'tid',
    'source_profile_category_ignore_case'   => TRUE,
    'source_profile_category_create_term'   => TRUE,
    'source_profile_category_vocabulary'    => 'profile_category',
    'source_profile_category_default_value' => '',
    'source_profile_title'                  => 'field_profile_title',
    'source_profile_subunit'                => 'field_profile_subunit',
    'source_profile_subunit_source_type'    => 'tid',
    'source_profile_subunit_ignore_case'    => TRUE,
    'source_profile_subunit_create_term'    => TRUE,
    'source_profile_subunit_vocabulary'     => 'profile_subunit',
    'source_profile_subunit_default_value'  => '',
    'source_profile_research'               => 'field_profile_research',
    'source_profile_research_source_type'   => 'tid',
    'source_profile_research_ignore_case'   => TRUE,
    'source_profile_research_create_term'   => TRUE,
    'source_profile_research_vocabulary'    => 'profile_research',
    'source_profile_research_default_value' => '',
    'source_profile_attachments'            => 'field_profile_attachments',
    'source_profile_image'                  => 'field_profile_image',
    'source_profile_caption'                => 'field_profile_caption',
    'source_profile_address'                => 'field_profile_address',
    'source_profile_email'                  => 'field_profile_email',
    'source_profile_telephonenumber'        => 'field_profile_telephonenumber',
    'source_profile_faxnumber'              => 'field_profile_faxnumber',
    'source_profile_office'                 => 'field_profile_office',
    'source_profile_lab'                    => 'field_profile_lab',
    'source_profile_website'                => 'field_profile_website',
    'source_tags'                           => 'field_tags',
    'source_tags_source_type'               => 'tid',
    'source_tags_ignore_case'               => TRUE,
    'source_tags_create_term'               => TRUE,
    'source_tags_vocabulary'                => '',
    'source_tags_default_value'             => '',
    'source_profile_insert_fields'          => $profile_insert_fields,
  );


/**************************
*  EVENT MULTIPART (Field Collection) Settings
**************************/

/******
*
*   VARIABLES
*
*   $event_multipart_query: Contains SOURCE database query for collecting event field collection heading + content
*   $event_multipart_sourcefields: Contains array of source fields (heading + content) used in event field collection
*   $event_multipart_mapping: Contains mapping for field collection ID
*
******/

/******
*
*   SAMPLE CODE:
*
*   $event_multipart_query = Database::getConnection('default','legacy_d7')
*     -> select('tableA', 'tableA_alias');
*
*   $event_multipart_query->join('tableB','tableB_alias','tableA_alias.fieldCollectionID = tableB_alias.id');
*   $event_multipart_query->join('tableC','tableC_alias','tableA_alias.fieldCollectionID = tableC_alias.id');
*
*   $event_multipart_query->fields('tableA',array('eventID', 'fieldCollectionID'));
*   $event_multipart_query->fields('tableB',array('id','heading'));
*   $event_multipart_query->fields('tablec',array('id','content'));
*
*   $event_multipart_sourcefields = array(
*       'heading' => 'Field Collection Heading Term ID',
*       'content' => 'Field Collection Content',
*   );
*
*
*  $event_multipart_mapping = array(
*    'fieldCollectionID' => array(
*      'type' => 'int',
*      'not signed' => true,
*      'not null' => true,
*      'description' => t('Field Collection ID'),
*      'alias' => 'f',
*    ),
*  );
*
*/

  $event_multipart_query = NULL; //database query for field collection heading + content
  $event_multipart_sourcefields = array();
  $event_multipart_mapping = NULL;

  /* Field collection ID, heading termID, and content fields should match fields retrieved by query */
  $event_multipart_arguments = array(
    'source_event_multipart_query' => $event_multipart_query,
    'source_event_multipart_sourcefields' => $event_multipart_sourcefields,
    'source_event_multipart_mapping' => $event_multipart_mapping,
    'source_event_multipart_field_collection_ID'=>'',
    'source_event_multipart_field_collection_heading_termID'=>'',
    'source_event_multipart_field_collection_content'=>'',
  );

  /* COURSE OUTLINE Settings */
    $courseoutline_arguments = array(
    'source_course_node_type'      => 'course_outline',
    'source_course_term_category'  => 'course_outline_category',
    'source_course_term_keyword'   => 'field_tags',
    'source_course_title'          => 'field_course_title',
    'source_course_name'           => 'field_course_name',
    'source_course_code'           => 'field_course_code',
    'source_course_section'        => 'field_course_section',
    'source_course_semester'       => 'field_course_semester',
    'source_course_year'           => 'field_course_year',
    'source_course_instructor'     => 'field_course_instructor', 
    'source_course_instructor_url' => 'field_course_instructor_url',      
    'source_course_body'           => 'body',
    'source_course_summary'        => 'body:summary',
    'source_course_format'         => 'body:format',      
    'source_course_website'        => 'field_course_website',     
    'source_course_attachments'    => 'field_course_attachments',
    'source_course_level'          => 'field_course_level', 
    'source_course_type'           => 'field_course_type', 
    'source_course_subject'        => 'field_course_subject',
    'source_course_department'     => 'field_course_department',    
    'source_course_category'       => 'field_course_category',      
    'source_course_keyword'        => 'field_tags',
  );

