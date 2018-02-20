<?php
$args['orderby'] = 'date';
$args['order'] = 'ASC';
?>
<form id="sorting-form">

<select name="sort" class="post-selector">
    <option selected value="ASC">Sort by newest...</option>
    <option value="DESC">Sort by oldest...</option>
</select>
<?php foreach($data as $data_key => $data_value) : ?>
  <input type="hidden" value="<?php echo $data_value; ?>" name="<?php echo $data_key; ?>">
<?php endforeach; ?>
  <input type="hidden" value="<?php echo get_sub_field('number_of_posts'); ?>" name="posts_per_page">
</form>
