<?php

//hidden from the public
function get_CURL($url)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCitLJuqeGibLupUbEoDcqIA&key=AIzaSyBbTIqdpOrRkgsYa0c_5FA3CIsVWIe_c0E');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$youtubeNickname = $result['items'][0]['snippet']['title'];
$youtubeSubscriber = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$latestVideo = get_CURL('https://www.googleapis.com/youtube/v3/search?key=AIzaSyBbTIqdpOrRkgsYa0c_5FA3CIsVWIe_c0E&channelId=UCitLJuqeGibLupUbEoDcqIA&maxResult=1&order=date&part=snippet');

$latestVideoId = $latestVideo['items'][0]['id']['videoId'];
