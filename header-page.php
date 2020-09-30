<?php
global $ji_opts;
if( has_post_thumbnail( get_the_ID() ) ){
	$thumb_url = get_the_post_thumbnail_url(get_the_ID(),'full');
}
else{
	$thumb_url = $ji_opts['page_header_image'];
}

?>
<section class="section bg-dark inner-header" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5) 10%, rgba(0, 0, 0, 0.5)), url(<?php echo $thumb_url; ?>);">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="mt-0 mb-3">
					<?php
						if( !empty(get_search_query()) ):
							echo 'Results for "' . get_search_query() . '"';
						/*else:
							echo get_the_archive_title() === 'Archives' ? 'Result' : 'Result';*/
						endif;
					?>
				</h1>
			</div>
		</div>
	</div>
</section>