<?php
/**
 * The template for displaying all single posts
 *
 *
 */
get_header();
?>
<div class="tour-single-mods">
    <div class="top-banner-sec mb-4" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)),url('<?php echo get_template_directory_uri(); ?>/images/beautiful-sri-lanka.jpg') center/cover no-repeat">
        <div class='container'>
            <h2 class='mb-2 text-light'><?php the_title(); ?></h2>
        </div>
    </div>
    <div class='container pb-5'>
        <div class='mb-4 d-flex align-items-center justify-content-center gallery-filter'>
		<button onclick="filterSelection('all')">All</button>
    		<?php
             	if (have_rows('gallery')):
		    $classlist = get_sub_field_object( 'class' )['choices'];
		    if( is_array($classlist) ) {
		        foreach( $classlist as  $key => $choice ) { ;?>
			<button onclick="filterSelection('<?php echo $key;?>')"><?php echo $choice;?></button>
		        <?php }
		    }
		endif;
		?>
        </div>
        <div class="gallery mb-5 filterable">
            <?php
                if (have_rows('gallery')):
                    while (have_rows('gallery')): the_row();
                    $classlist = get_sub_field_object( 'class' )['value'];
                    $class = [];
                    if( is_array($classlist) ) {
                        foreach( $classlist as  $choice ) {
                            $class[] =$choice['value'];
                        }
                    }
                    ?> 
                        <div class="image  <?php echo implode( ' ', $class); ?> show">
                           <img data-src="<?php echo get_sub_field('image'); ?>" alt="Image 1" class="lazy">
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>
        </div>
        <a href='#' class='main-btn mx-auto mb-5 d-none'>See More</a>
    </div>
    <div class="img-modal">
        <span class="close">&times;</span>
        <img class="modal-img">
    </div>
</div>
<script>
    var btnContainer = document.querySelector(".gallery-filter");
    var btns = btnContainer.querySelectorAll("button");

    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
        var current = document.querySelector(".active");
        current.classList.remove("active");
        this.classList.add("active");
      });
    }

    // Filter the images based on the button clicked
    function filterSelection(c) {

      for (var i = 0; i < images.length; i++) {
        if (images[i].classList.contains(c) || c == "all") {
          images[i].classList.add("show");
        } else {
          images[i].classList.remove("show");
        }
      }
    }
</script>
<?php get_footer(); ?>
