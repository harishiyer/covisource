<?php 

require __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$location = "pune";
$filters = explode(",", "bed,covid,plasma,oxygensupply");

foreach($filters as $filter){
    $query_string = $query_string."#".$filter." OR ";
}

$query_string = $query_string." #".$location;
 
$connection = new TwitterOAuth($_ENV['OAUTH_ACCESS_TOKEN'], $_ENV['OAUTH_ACCESS_TOKEN_SECRET'], $_ENV['YOUR_CONSUMER_KEY'], $_ENV['YOUR_CONSUMER_SECRET']);
$statuses = $connection->get("search/tweets", ["q" => $query_string, 'result_type' => 'mixed', 'count' => '100', 'tweet_mode' => 'extended', 'include_entities' => 'true', 'f' => 'live']);

if($statuses->errors){
    $error_code    = $statuses->errors[0]->code;
    $error_message = $statuses->errors[0]->message;
    
    die("<strong>Serious error occured :</strong> error code: ".$error_code.", message: ". $error_message );
}

$statuses = json_decode(json_encode($statuses), true);

$statuses = $statuses['statuses'];

foreach($statuses as $status){

    if($status['retweeted_status']){
        echo $status['retweeted_status']['full_text'];
        if (isset($status['entities']['media'])) {
            foreach ($status['entities']['media'] as $media) {
                $media_url = $media['media_url']; // Or $media->media_url_https for the SSL version.
                ?>
                <img src="<?php echo $media_url; ?>">
                <?php
            }
        }
    }else{
        echo $status['full_text'];
        if (isset($status['entities']['media'])) {
            foreach ($status['entities']['media'] as $media) {
                $media_url = $media['media_url']; // Or $media->media_url_https for the SSL version.
                ?>
                <img src="<?php echo $media_url; ?>">
                <?php
            }
        }
    }

    echo "<br><br>";
}

?>