<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();
$context['template'] = get_page_template();

if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('singles/single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'singles/single.twig'), $context);
}


