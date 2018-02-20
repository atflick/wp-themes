<?php

$terms_array = array();
// for each tax, get the related terms, push to array
foreach($taxonomies as $tax_name => $tax){
  if($tax_name == 'locale'){
    $terms_array[$tax_name] = get_terms(array(
      'taxonomy' => $tax,
      'hide_empty'=>false,
    ));
  } else {
    $terms_array[$tax_name] = get_terms(array(
      'taxonomy' => $tax,
      'hide_empty' => true,
      'orderby' => 'name',
      'order' => 'DESC'
    ));
  }
}

?>
  <form class="flex-container column" id="sorting-form">
    <?php foreach($terms_array as $tax_name => $sortable_terms) :
      if($tax_name !== 'locale') : ?>
        <div class="flex-container">
          <?php foreach($sortable_terms as $sortable_term) : ?>
            <label class="resource-sort-label" for="<?php echo $sortable_term->name; ?>"><input <?php
            if($tax_name == 'category_name'){
              if( !isset($_GET['tax']) && $sortable_term->slug == 'educational_resources'){
                echo 'checked="checked"';
              } elseif( isset($_GET['tax']) && $sortable_term->slug == 'disposal' && $_GET['tax'] == 'disposal'){
                  echo 'checked="checked"';
              } 
            } else {
              echo isset($_GET['tax']) && $_GET['tax'] == $sortable_term->slug ? 'checked="checked"' : '';
            } ?> class="post-selector" name="<?php echo $tax_name; ?>" type="radio" id="<?php echo $sortable_term->name; ?>" value="<?php echo $sortable_term->slug; ?>"/><span><?php echo $tax_name == 'category_name' ? $sortable_term->name .'s': $sortable_term->name; ?></span></label>
          <?php endforeach; ?>
          <label class="resource-sort-label" for="all">
          <input <?php 
          if($tax_name =="category_name"){
          echo isset($_GET['tax']) && $_GET['tax'] == 'all' ? 'checked="checked"' : '';
          } else {
            echo !isset($_GET['tax']) ? 'checked="checked"' : '';
          }
         ?> class="post-selector" name="<?php echo $tax_name; ?>" type="radio" id="all" value="all"/><span>All <?php echo $selection == 'post' ? 'News' : 'Resources'; ?> </span>
          </label>
        </div>
      <?php else : ?>
        <div class="flex-container form-header columns flex-60">
          <img class='icon' src="<?php the_sub_field('image');?>"/>
          <h2><?php the_sub_field('module_title'); ?> </h2>
          <p> <?php the_sub_field('module_content', false, false); ?> </p>
        </div>
        <div class="select-holder center-center flex-container">
          <select id="<?php echo $tax_name; ?>" name="<?php echo $tax_name; ?>" class="post-selector">
              <option selected disabled>Filter by <?php echo $tax_name; ?>...</option>
            <?php foreach($sortable_terms as $sortable_term) : ?>
              <option <?php echo $sortable_term->name == 'Patients' ? 'selected' : ''; ?> value="<?php echo $sortable_term->count == 0 ? 'national' : $sortable_term->slug;?>"><?php echo $sortable_term->name; ?></option>
            <?php endforeach; ?>
              <option value="all">All</option>
          </select>
        </div>
    <?php endif; ?>
  <?php endforeach; ?>
    <?php foreach($data as $data_key => $data_value) : ?>
      <input type="hidden" value="<?php echo $data_value; ?>" name="<?php echo $data_key; ?>">
    <?php endforeach; ?>
  </form>
