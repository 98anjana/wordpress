<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Norely</title>

    <?php wp_head(); ?>

    <!-- Bootstrap CSS (Only version 5 is needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Paytone One">

    <!-- Custom styles -->
    <link rel="stylesheet" href="style.css">

    <!-- jQuery (included only once) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom script -->
    <script src="index.js"></script>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Mobile Menu Toggle (Hamburger Icon) for Mobile Devices -->
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            // Display the menu with the 'main-menu' location
            wp_nav_menu(array(
                'theme_location' => 'mainmenu',
                'menu_class' => 'navbar-nav w-100',
                'container' => false,
                'fallback_cb' => 'wp_page_menu',
            ));
            ?>

            <!-- Centered Logo -->
            <a class="navbar-brand " href="#">
                <img src="http://localhost/wordpress/wp-content/uploads/2024/12/norle_Black_135x-1.jpg" alt="Logo" class="logo"> <!-- Replace with your logo -->
            </a>
        </div>

        </div>
</nav>
	
	
        
    <!-- Carousel for Custom Post Type "Carousel Items" -->
    <div class="carousel">
       <?Php   $page_id = 11; 
     $page = get_post($page_id);

        if ($page) {
    echo apply_filters('the_content', $page->post_content); 
       }
       ?>
</div>
	
	


<section class="hero">
        <div class="image-container ">
			<?php
// The Query to get all posts
$args = array(
    'posts_per_page' => 15, 
);
$query = new WP_Query($args);

// Start the loop
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
			
            <div class="image-item">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Featured Image" class="src">
        </div>
			
			 <?php endwhile;
    wp_reset_postdata(); 
else :
    echo '<p>No posts found</p>';
endif;
?>
           
        </div>
    </section>

	
	
	
<div class="animate-text w-100">
  <p class="moving-text">
<?php
    $page_id = 11;
    $field_value = get_field('animationtext', $page_id);
    
    if ($field_value) {
        echo $field_value; 
    } else {
        echo 'No value available'; 
    }
?>
</p>
</div>

    <section id="about" class="about">
        <div class="row">
            <div class="quote-container col-md-8 col-lg-8 col-sm-12 col-xs-12">
              <h2 class="quote ">A DISCOGRAPHY OF<br>YUMMINESS</h2>
              <h6 class="short-quote">From crunch rock (crunchy corn flakes) to smooth jazz (silky peanut butter), discover lip-smacking  food that’ll make your taste buds sing!</h6>
            </div>
            <div class="icon-container col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="icon-item">
                      <img src="https://cdn.shopify.com/s/files/1/0814/6616/3478/files/gluten_free.png?v=1697033961" alt="Icon 1" class="icon">
                      <p class="caption">Icon 1</p>
                    </div>
                    <div class="icon-item">
                      <img src="" alt="Icon 2" class="icon">
                      <p class="caption">Icon 2</p>
                    </div>
                    <div class="icon-item">
                      <img src="" alt="Icon 3" class="icon">
                      <p class="caption">Icon 3</p>
                    </div>
                  </div>
                  
              </div>



    </section>

    <hr style="width:95%;text-align:justify;margin:0 auto;">

<br>


<br>
<section>
    
    
    <div class="slider-body">
        <div class="slider-container">
            <div class="slider">
                  <?php
    // Query to fetch the products
    $args = array(
        'posts_per_page' => 15,  // Limit to 3 products
        'post_type' => 'product',
        'orderby' => 'popularity', // Order by popularity
        'order' => 'desc' // Descending order
    );
    $products = new WP_Query($args);

    // Loop through products and display them in cards
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            global $product;
    ?>
            <div class="card cart-card">
				
               <div style="background: #f8f2e4; display: block;
    aspect-ratio: 299 / 349;
    border-radius: 50% 50% 0 0;">
                <!-- Product Image -->
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
				   </div>
<div class="card-body">
                <!-- Product Title -->
                <h3><?php the_title(); ?></h3>

                <!-- Product Price -->
                <p><?php echo $product->get_price_html(); ?></p>
                
                <!-- Optional: Add a short description or content -->
                <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                
                <!-- Add to Cart Button -->
                <button class="add-to-cart">
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                </button>
	</div>
            </div>
    <?php
        endwhile;
    else :
        echo '<p>No products found.</p>';
    endif;

    // Reset post data
    wp_reset_postdata();
    ?>
                
            </div>

            <!-- Buttons to navigate the slider -->
            <button class="btn btn-prev">&#8592;</button> 
            <button class="btn btn-next">&#8594;</button> 
        </div>
    </div>

   
  </section>
<br><br>

	<br><br>
<section >
    <div class="pink-section">
    <div class="product-images">
<h3 style="color:white" >aljdshdlasjdnsajldfnaljf</h3>
</div>
   <div class="productcard">
    <div class="card">
        
            <img src="https://cdn.shopify.com/s/files/1/0666/4460/7149/t/3/assets/2.jpg?v=1732538021" alt="Card Image" />
        
      </div>
      <div class="card">
      
            <img src="https://cdn.shopify.com/s/files/1/0666/4460/7149/t/3/assets/2.jpg?v=1732538021" alt="Card Image" />
        
      </div>
      <div class="card" >
       
            <img src="https://cdn.shopify.com/s/files/1/0666/4460/7149/t/3/assets/2.jpg?v=1732538021" alt="Card Image" />
       
      </div>
   </div>
    </div>
</section>
	
	
	<br><br><br>
<section>
    <div class="wave-container">
        <div class="wave-content">
          <h1>Your Content Here</h1>
          <p>Some other content</p>
        </div>
      </div>
      
</section>
	<section>
		
		<div class="slider container">
                  <?php
    // Query to fetch the products
    $args = array(
        'posts_per_page' => 15,  
        'post_type' => 'product',
        'orderby' => 'popularity', 
        'order' => 'desc' 
    );
    $products = new WP_Query($args);

    // Loop through products and display them in cards
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            global $product;
    ?>
            <div class="card cart-card">
				
               <div style="background: #f8f2e4; display: block;
    aspect-ratio: 299 / 349;
    border-radius: 50% 50% 0 0;">
                <!-- Product Image -->
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
				   </div>
<div class="card-body">
                <!-- Product Title -->
                <h3><?php the_title(); ?></h3>

                <!-- Product Price -->
                <p><?php echo $product->get_price_html(); ?></p>
                
                <!-- Optional: Add a short description or content -->
                <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                
                <!-- Add to Cart Button -->
                <button class="add-to-cart">
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                </button>
	</div>
            </div>
    <?php
        endwhile;
    else :
        echo '<p>No products found.</p>';
    endif;

    // Reset post data
    wp_reset_postdata();
    ?>
                
            </div>

           

	
	</section>

    <!-- Footer or Other Content -->
    <footer>
        <!-- Your footer content here -->
    </footer>

    <?php wp_footer(); ?>

</body>

</html>
