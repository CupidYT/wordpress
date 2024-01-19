<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constantinmimi
 */

?>

<div class="search-item">          
    <?php the_title( sprintf( '<a href="%s"><h3>', esc_url( get_permalink() ) ), '</h3> <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 20"><g clip-path="url(#arrow__a)" fill="#313132"><path d="M8.76 0h1.457c-.583 5.926 3.888 9.136 6.196 10C10.29 8.815 8.76 2.84 8.76 0Z"/><path d="M8.76 20h1.458c-.583-5.926 3.887-9.136 6.196-10l-16.4-.74v1.851l16.4-1.11C10.29 11.184 8.76 17.16 8.76 20Z"/></g><defs><clipPath id="arrow__a"><path fill="#fff" d="M0 0h16.497v20H0z"/></clipPath></defs></svg></a>' ); ?>    
</div>
