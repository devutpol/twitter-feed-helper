<?php

if( !function_exists( 'get_twitter_high_quality_video' ) ){
    function get_twitter_high_quality_video($variants = array())
    {
        $max = null;
        $max_value_url = null;
        foreach($variants as $key => $value)
        {
            if( ( isset($value['bitrate']) && $value['content_type'] === 'video/mp4' ) && ($value['bitrate'] > $max || !$max ) )
            {
                $max = $value['bitrate'];
                $max_value_url = $value['url'];
            }
        }
        return $max_value_url;
    }
}

// Here is an example
$extended_entities_variants = isset($feed['extended_entities']['media'][0]['video_info']['variants']) ? $feed['extended_entities']['media'][0]['video_info']['variants'] : '';
$retweeted_status_variants = isset($feed['retweeted_status']['extended_entities']['media'][0]['video_info']['variants']) ? $feed['retweeted_status']['extended_entities']['media'][0]['video_info']['variants'] : '';
$quoted_status_variants = isset($feed['quoted_status']['extended_entities']['media'][0]['video_info']['variants']) ? $feed['quoted_status']['extended_entities']['media'][0]['video_info']['variants'] : '';

// this function will return a high quality video for normal tweet
$video_url = get_twitter_high_quality_video($extended_entities_variants);