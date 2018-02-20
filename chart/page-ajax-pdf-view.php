<?php
/**
 * Template Name: AJAX PDF View template
 */
header('Content-Type: text/html');

$url = (isset($_POST['param'])) ? $_POST['param'] : "";
$type = (isset($_POST['type'])) ? $_POST['type'] : "";
$ext = (isset($_POST['ext'])) ? $_POST['ext'] : "";
?>

<?php if( $type == 'file' ) : ?>
  <?php if( $ext == 'pdf' ) : ?>
      <object data="<?php echo $url; ?>" type="application/pdf" width="100%" height="600">
      <iframe src="<?php echo $url; ?>" width="100%" height="600" style="border: none;">
      This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo $url; ?>">Download PDF</a>
      </iframe>
    </object>
  <?php // elseif( $ext == 'doc' || $ext == 'docx' ) : ?>

     <!-- <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?php// echo $url; ?>" width="100%" height="600" style="border: none;">
      This browser does not support DOCs. Please download the DOC to view it: <a href="<?php // echo $url; ?>">Download PDF</a>
      </iframe> -->

  <?php else : ?>
    <h4> This document type is not available for preview. </h4>
    <a href="<?php echo $url; ?>">Download the document here. </a>
  <?php endif; ?>
<?php elseif( $type == 'post' ) : ?>
  <?php $post = get_post($url); ?>
  <?php setup_postdata($post); ?>
  <div class="column">
    <?php if( has_post_thumbnail() ) : ?>
  <div style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center" class="preview-thumbnail"></div>
<?php endif; ?>
  <?php the_content(); ?>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php
exit;
