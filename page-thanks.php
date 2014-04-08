<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="padded">
	<div class="container">
		<div class="lead large">
			<?php
				echo '
					<p>Thanks '.$_SESSION['fullName'].',</p> 
                	<p>We&rsquo;ll look over your inquery and get in touch with you shortly.</p>
                ';
               ?>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>