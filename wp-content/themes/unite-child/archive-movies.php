<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>movieCard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<style>
        *{
			font-family: 'Poppins', sans-serif;
			 -webkit-user-select: none;
    		-moz-user-select: -moz-none;
    		-o-user-select: none;
    		user-select: none;
		}


		img {
  			-webkit-user-drag: none;
  			-moz-user-drag: none;
  			-o-user-drag: none;
  			user-drag: none;
		}
		img {
			pointer-events: none;
		}
		.movie_card{
			padding: 0 !important;
			width: 15rem;
			margin:14px; 
			border-radius: 10px;
			box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19);
		}
		.movie_card img{
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			height: 20rem;
		}
		.movie_info{
			color: #5e5c5c;
		}

		.movie_info i{
			font-size: 20px;
		}
		.card-title{
			width: 80%;
			height: 4rem;
		}
		.play_button{
			background-color: #ff3d49;
   			position: absolute;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			right: 20px;
			bottom: 111px;
			font-size: 27px;
			padding-left: 21px;
			padding-top: 16px;
			color: #FFFFFF;
			cursor: pointer;
		}
        .container{
            display: flex;
            gap: 0px;
        }

    </style>
</head>
<body>
	<header>
    <php 
get_header();
?> </header>
<div class="container mt-5">
	<h2 class="text-center">Bootstrap movie cards</h2>
	<div class="row justify-content-center">

		
		</div>

				<div class="card movie_card">
		  <img src="echo " class="card-img-top" alt="...">
		  <div class="card-body">
		  	<i class="fas fa-play play_button" data-toggle="tooltip" data-placement="bottom" title="Play Trailer">
		  	</i>
		    <h5 class="card-title"> <? get_post_thumbnail_id(); ?></h5>
		   		<span class="movie_info">2019</span>
		   		<span class="movie_info float-right"><i class="fas fa-star"></i> 9 / 10</span>
		  </div>
		</div>
        <?php 
    $image_id = get_post_thumbnail_id(); 
    $image_url = wp_get_attachment_image_src($image_id,'thumbnail');   
?>



<div class="card movie_card">
<img src="<?php echo get_the_post_thumbnail( $post_id ); ?>" alt="<?php echo get_the_title( $post_id ); ?>" >
		 
		  <div class="card-body">
		  	<i class="fas fa-play play_button" data-toggle="tooltip" data-placement="bottom" title="Play Trailer">
		  	</i>
		    <h5 class="card-title"> <?php echo get_the_title( $post_id ); ?></h5>
            <a href="<?php echo get_the_permalink( $post_id ); ?>"><?php echo get_the_title( $post_id ); ?> </a>
		   		<span class="movie_info"><a href="'.get_permalink()'"><?php get_the_title();?></span>
		   		<span class="movie_info float-right"><i class="fas fa-star"></i> 9 / 10</span>
		  </div>
		</div>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script>
		$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	})
	</script>



<?php
    $args = array(
        'post_type' => 'movies'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            ?>
            
            <div class="card movie_card">
<img src="<?php echo get_the_post_thumbnail( $post_id ); ?>"  >
		 
		  <div class="card-body">
		  	
		    <h5 class="card-title"> <?php echo get_the_title( $post_id ); ?></h5>
            <a href="<?php echo get_the_permalink( $post_id ); ?>"><?php echo get_the_title( $post_id ); ?> </a>
		   		
		  </div>
		</div>



            <?php
            }
        }
?>



















</body>
</html>