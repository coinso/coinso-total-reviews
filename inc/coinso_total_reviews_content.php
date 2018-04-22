<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 4/22/2018
 * Time: 09:32
 */

global $ctr_options, $reviews_atts;
    $reviews_atts = shortcode_atts( array(
        'total_reviews'     =>  $ctr_options['total_reviews'] ? $ctr_options['total_reviews'] : '',
        'total_score'       =>  $ctr_options['total_score'] ? $ctr_options['total_score'] : '',
        'reviews_url'       =>  $ctr_options['reviews_url'] ? $ctr_options['reviews_url'] : '',
    ), $args);
?>

<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue"><?php echo $reviews_atts['total_score'];?></span> stars -
    <span itemprop="reviewCount"><?php echo $reviews_atts['total_reviews'];?></span> reviews
</div>
<div class="review_us">
    <a href="<?php echo $reviews_atts['reviews_url'];?>" target="_blank" rel="nofollow">Review Us</a>
</div>

