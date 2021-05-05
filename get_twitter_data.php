<?php 

require __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$location = $_GET['location'];

$filters = explode(",", "covid,covid-19,covid19,coronavirus");

foreach($filters as $filter){
    $query_string = $query_string."#".$filter." OR ";
}

$query_string = substr($query_string, 0, -4);

if(isset($_GET['filter'])){
    $query_string = $query_string." OR #".$_GET['filter'];
}

$query_string = $query_string." AND #".$location;
 
$connection = new TwitterOAuth($_ENV['OAUTH_ACCESS_TOKEN'], $_ENV['OAUTH_ACCESS_TOKEN_SECRET'], $_ENV['YOUR_CONSUMER_KEY'], $_ENV['YOUR_CONSUMER_SECRET']);
$statuses = $connection->get("search/tweets", ["q" => $query_string, 'result_type' => 'mixed', 'count' => '100', 'tweet_mode' => 'extended', 'include_entities' => 'true', 'f' => 'live']);

if($statuses->errors){
    $error_code    = $statuses->errors[0]->code;
    $error_message = $statuses->errors[0]->message;
    
    die("<strong>Serious error occured :</strong> error code: ".$error_code.", message: ". $error_message );
}

//return json_encode($statuses);

$statuses = json_decode(json_encode($statuses), true);

$statuses = $statuses['statuses'];

$twitter_data = array();
$i = 0;

foreach($statuses as $status){

    if($status['retweeted_status']){
        $twitter_data[$i]["name"] = $status["user"]["name"];
        $twitter_data[$i]["screen_name"] = $status["user"]["screen_name"];
        $twitter_data[$i]["profile_image"] = $status["user"]["profile_image_url_https"];
        $twitter_data[$i]["message"] = $status['retweeted_status']['full_text'];
        
        if (isset($status['entities']['media'])) {
            foreach ($status['entities']['media'] as $media) {
                $media_url = $media['media_url']; // Or $media->media_url_https for the SSL version.
                $twitter_data[$i]["featured_image"] = $media_url;
            }
        }
        $i++;
    }else{
        $twitter_data[$i]["name"] = $status["user"]["name"];
        $twitter_data[$i]["screen_name"] = $status["user"]["screen_name"];
        $twitter_data[$i]["profile_image"] = $status["user"]["profile_image_url_https"];
        $twitter_data[$i]["message"] = $status['full_text'];

        if (isset($status['entities']['media'])) {
            foreach ($status['entities']['media'] as $media) {
                $media_url = $media['media_url']; // Or $media->media_url_https for the SSL version.
                $twitter_data[$i]["featured_image"] = $media_url;
            }
        }
        $i++;
    }

}
echo json_encode($twitter_data);
die(0);
?>