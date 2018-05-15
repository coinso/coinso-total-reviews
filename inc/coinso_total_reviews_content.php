<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 4/22/2018
 * Time: 09:32
 */

global $ctr_options, $reviews_atts;
    $reviews_atts = shortcode_atts( array(
        'business_name'     =>  $ctr_options['business_name'] ? $ctr_options['business_name'] : '',
        'service_type'      =>  $ctr_options['service_type'] ? $ctr_options['service_type'] : '',
        'service_provider'  =>  $ctr_options['service_provider'] ? $ctr_options['service_provider'] : '',
        'total_reviews'     =>  $ctr_options['total_reviews'] ? $ctr_options['total_reviews'] : '',
        'total_score'       =>  $ctr_options['total_score'] ? $ctr_options['total_score'] : '',
        'reviews_url'       =>  $ctr_options['reviews_url'] ? $ctr_options['reviews_url'] : '',
        'cta'               =>  $ctr_options['cta'] ? $ctr_options['cta'] : '',
    ), $args);
    $stars_count = $reviews_atts['total_score'];
    function is_decimal($val){

        return is_numeric( $val ) && floor( $val ) != $val;
    }

?>
<div class="ctr-reviews-wrap">
    <div itemscope itemtype="http://schema.org/Service" class="ctr-schema">
        <meta itemprop="serviceType" content="<?php echo $reviews_atts['service_type'];?>" />
        <span itemprop="provider" itemscope itemtype="http://schema.org/<?php echo $ctr_options['service_provider'];?>">
            <span itemprop="name" class="ctr-name"><?php echo $ctr_options['business_name'];?></span>
        </span>
        <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="ctr-total">
            <span itemprop="ratingValue" class="ctr-total-score"><?php echo $reviews_atts['total_score'];?></span>
            <?php if ($stars_count){ ?>
                <ul class="ctr-stars-list">
                    <?php
                    if ( is_decimal($stars_count) ){
                        for ($i = 1; $i <= ($stars_count); $i++){

                                echo '<li class="ctr-star"><i class="fas fa-star" aria-hidden="true"></i></li>';

                        }

                            echo '<li class="ctr-star"><i class="fas fa-star-half" aria-hidden="true"></i></li>';

                    } else {
                        for ($i = 1; $i <= $stars_count; $i++){

                                echo '<li class="ctr-star"><i class="fas fa-star" aria-hidden="true"></i></li>';

                        }
                    }
                    ?>
                </ul>
            <?php } ?>
            <span class="ctr-total-reviews">
                <span itemprop="reviewCount"><?php echo $reviews_atts['total_reviews'];?></span> google reviews
            </span>

        </div>
    </div>
    <div class="review_us">
        <a href="<?php echo $reviews_atts['reviews_url'];?>" target="_blank" rel="nofollow" class="ctr-btn">
            <span class="fas fa-pencil-alt"></span>&nbsp;<?php echo $ctr_options['cta'];?>
        </a>
    </div>
</div>

