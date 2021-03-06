<?php
session_start();

?>

<?php
require "init.php";
$link = $_GET['link'];

parse_str($link, $urlData);
$my_id = array_values($urlData)[0];

$videoFetchURL = "http://www.youtube.com/get_video_info?&video_id=" . $my_id . "&asv=3&el=detailpage&hl=en_US";
$videoData = get($videoFetchURL);

parse_str($videoData, $video_info);

$video_info = json_decode(json_encode($video_info));
if (!$video_info->status ===  "ok") {
    die("error in fetching youtube video data");
}
if (!isset($video_info->url_encoded_fmt_stream_map)) {
    die('No data found');
}

$streamFormats = explode(",", $video_info->url_encoded_fmt_stream_map);

if (isset($video_info->adaptive_fmts)) {
    $streamSFormats = explode(",", $video_info->adaptive_fmts);
    $pStreams = parseStream($streamSFormats);
}
    $cStreams = parseStream($streamFormats);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>This saveVid</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/savevid.css">
</head>

<body>

	<!--Ads Code Start-->
    <div class="left-ad">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- LeftAd -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:300px;height:600px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="4745434880"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
    <div class="top-ad-1">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- TopAd1 -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="4613572946"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
    <div class="top-ad-2">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- TopAd2 -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="8169674574"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!--Ads Code Start-->
	
	<!--Inner Code Start-->
    <section>
	
		<?php foreach ($cStreams as $stream): ?>
                            <?php $stream = json_decode(json_encode($stream)) ;?>
                             <div class="text-center head-div" style=" margin-top:80px; margin-bottom:80px;">
								<p style="font-size:22px;"><strong>If your video doesn't download in under 30 seconds, click </strong><a id="down" href="<?php echo $stream->url; ?>" download="" style="text-decoration:none; color:blue;"><b><strong>here.</strong></b></a></p>
							</div>
        <?php 
				if($_SESSION["page"]=="index")
				{
					header("refresh:1; url=$stream->url");
					$_SESSION["page"]="nextPage";
				}
		?>
							<?php break; ?>
                        <?php endforeach ?>
       

    </section>
	

		<!--Inner Code End-->

	<!--Ads Code Start-->

    <div class="top-ad-1">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- BottomAd1 -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="5320149954"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
    <div class="top-ad-1">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- BottomAd2 -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="8279207982"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
    <div class="right-ad">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- RightAd -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:300px;height:600px"
		data-ad-client="ca-pub-6204496815847429"
		data-ad-slot="3688515849"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
	<!--Ads Code Start-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>