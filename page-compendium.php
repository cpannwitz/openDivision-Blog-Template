<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>
					<hr />
		<!-- CSS COMPENDIUM TABLE -->
			<div id="css-table" class="compendium-section">
				<?php	$lastposts = get_posts(array(
					'numberposts' => '5',
					'category' => get_cat_ID('snippets-css'),
					'orderby' => 'title',
					'post_type' => 'snippet',
				)); ?>
				<label for="css-cbox" class="toggle-content">
					<i id="css-plus" class="fa fa-plus fa-lg fa-fw labelplus"></i>
					<h4>CSS Snippets</h4>
				</label>
				<input type="checkbox" id="css-cbox" class="cbox" />
				<div class="contenttable"><br />
					<table class="u-full-width">
						<thead><tr>
							<th>Name</th>
							<th>Description</th>
							<th>Link</th>
						</tr></thead>
						<tbody class="">								
							<?php foreach($lastposts as $post) : setup_postdata($post); ?>
								<tr>
								<td><a href="<?php the_permalink() ?>"><i class="fa fa-arrow-circle-o-right"></i> <?php the_title(); ?></a></td>
								<td><?php the_field("short_description"); ?></td>
								<td><a href="<?php the_field("codepen_link"); ?>"><i class="fa fa-codepen fa-2x fa-fw"></i></a></td>																
								</tr>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>								
						</tbody>													
					</table>
				</div>
			</div>
			<hr />
		<!-- JAVASCRIPT COMPENDIUM TABLE -->
			<div id="javascript-table" class="compendium-section">
				<?php	$lastposts = get_posts(array(
					'numberposts' => '5',
					'category' => get_cat_ID('snippets-javascript'),
					'orderby' => 'title',
					'post_type' => 'snippet',
				)); ?>
				<label for="javascript-cbox" class="toggle-content">
					<i id="javascript-plus" class=" fa fa-plus fa-lg fa-fw labelplus"></i>
					<h4>Javascript Snippets</h4>
				</label>
				<input type="checkbox" id="javascript-cbox" class="cbox" />
				<div class="contenttable"><br />
					<table class="u-full-width">
						<thead><tr>
							<th>Name</th>
							<th>Description</th>
							<th>Link</th>
						</tr></thead>
						<tbody class="">								
							<?php foreach($lastposts as $post) : setup_postdata($post); ?>
								<tr>
								<td><a href="<?php the_permalink() ?>"><i class="fa fa-arrow-circle-o-right"></i> <?php the_title(); ?></a></td>
								<td><?php the_field("short_description"); ?></td>
								<td><a href="<?php the_field("codepen_link"); ?>"><i class="fa fa-codepen fa-2x fa-fw"></i></a></td>								
								</tr>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>								
						</tbody>													
					</table>
				</div>
			</div>
			<hr />
			<!-- PHP COMPENDIUM TABLE -->
			<div id="php-table" class="compendium-section">
				<?php	$lastposts = get_posts(array(
					'numberposts' => '5',
					'category' => get_cat_ID('snippets-php'),
					'orderby' => 'title',
					'post_type' => 'snippet',
				)); ?>
				<label for="php-cbox" class="toggle-content">
					<i id="php-plus" class=" fa fa-plus fa-lg fa-fw labelplus"></i>
					<h4>PHP Snippets</h4>
				</label>
				<input type="checkbox" id="php-cbox" class="cbox" />
				<div class="contenttable"><br />
					<table class="u-full-width">
						<thead><tr>
							<th>Name</th>
							<th>Description</th>
							<th>Link</th>
						</tr></thead>
						<tbody class="">								
							<?php foreach($lastposts as $post) : setup_postdata($post); ?>
								<tr>
								<td><a href="<?php the_permalink() ?>"><i class="fa fa-arrow-circle-o-right"></i> <?php the_title(); ?></a></td>
								<td><?php the_field("short_description"); ?></td>
								<td><a href="<?php the_field("codepen_link"); ?>"><i class="fa fa-codepen fa-2x fa-fw"></i></a></td>								
								</tr>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>								
						</tbody>													
					</table>
				</div>
			</div>

					
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'owndefault' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'owndefault' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>