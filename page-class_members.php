<?php
/*
Template Name: Class Members
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
			
				<?php the_content(); ?>

			</div>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		
			<?php if ( $bp_group_id = get_post_meta( $post->ID, 'buddypress_group_id', true ) ): ?>

			<?php if ( bp_group_has_members( 'group_id=' . $bp_group_id . '&per_page=200' ) ) : ?>
			<ul class="class-member-list">
			<?php while ( bp_group_members() ) : bp_group_the_member(); ?>
				<li>
					<div class="avatar">
					<a href="<?php bp_group_member_domain() ?>">
						<?php bp_group_member_avatar( 'width=32&height=32' ) ?>
					</a>
					</div>

					<div class="class-member">
						<h4><?php bp_group_member_link() ?></h4>		
					</div>

					</li>

				<?php endwhile; ?>

			</ul>

			<?php endif; endif; ?>

		</div>

		<?php endwhile; endif; ?>
		

		<?php include (TEMPLATEPATH . '/category-sidebar.php'); ?>
	</div>

</div><!-- END #content -->
  
<?php get_footer(); ?>