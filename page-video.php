<!DOCTYPE html>
<html>
<body>

<style type="text/css">
video {
   width:100%;
   height:auto;
}
</style>

<video width="100%" controls>
  <source src="<?php echo get_post_meta( get_the_ID(), 'media', true ); ?>" type="video/mp4">
Your browser does not support video
</video>

</body>
</html>