<?php
/*
Template Name: Class Members
*/

global $wpdb, $bp;
?>

<?php get_header(); ?>

<div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			
			<div class="breadcrumb">
				<a href="<?php bloginfo('url'); ?>">&larr; Back to staff</a>
			</div>
		<h2><?php the_title(); ?></h2>
			<div class="entry">
			
				<?php the_content(); ?>

			</div>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		
			<?php if ( $bp_group_id = get_post_meta( $post->ID, 'buddypress_group_id', true ) ): ?>

			<?php if ( function_exists( 'bp_group_has_members' ) && bp_group_has_members( 'group_id=' . $bp_group_id . '&per_page=10' ) ) :
				$members = $wpdb->get_results( $wpdb->prepare( "SELECT m.user_id, m.date_modified, m.is_banned, u.user_login, u.user_nicename, u.user_email, pd.value as display_name FROM {$bp->groups->table_name_members} m, {$wpdb->users} u, {$bp->profile->table_name_data} pd WHERE u.ID = m.user_id AND u.ID = pd.user_id AND pd.field_id = 1 AND group_id = %d AND is_confirmed = 1 {$banned_sql} {$exclude_sql} ORDER BY display_name ASC;", $bp_group_id ) );
			?>
			<ul class="class-member-list">
			<?php foreach( $members as $member ) :
				$curauth = get_user_by( 'id', $member->user_id );
				$all_posts_link = get_bloginfo('url') . '/author/' . str_replace( '.', '-', $curauth->user_login ) . '/';
			?>
				
				<li class="class-member">
					<div class="avatar">
					<a href="<?php echo $all_posts_link; ?>">
					<?php
						$args = array(
									'item_id' => $member->user_id,
									'type' => 'user',
									'width' => 48,
									'height' => 48,
									'class' => 'avatar',
								);
						echo bp_core_fetch_avatar( $args );
					 ?>
					</div>
					</a>
					<div class="member-meta">
					<h4><a href="<?php echo $all_posts_link; ?>"><?php echo $curauth->display_name; ?></a></h4>
					<?php if ( $curauth->description ): ?>
						<p class="member-description"><?php echo $curauth->description; ?></p>
					<?php endif; ?>
					<p class="member-links"><a href="<?php echo $all_posts_link; ?>">See all posts</a> | <a href="<? echo bp_core_get_user_domain( $member->user_id ); ?>">Profile</a><?php if ( $curauth->user_url ): ?> | <a class="member-url" href="<?php echo $curauth->user_url; ?>">Website</a><?php endif; ?></p>
					</div>
					<div class="clear"></div>
				</li>

				<?php endforeach; ?>

			</ul>

			<?php endif; endif; ?>

		</div>

		<?php endwhile; endif; ?>
		

		<?php include (TEMPLATEPATH . '/category-sidebar.php'); ?>
	</div>

</div><!-- END #content -->
  
<?php get_footer(); ?>