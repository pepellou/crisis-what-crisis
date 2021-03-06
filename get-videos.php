<?php

function getVideos(
	$user,
	$tag
) {
	$selected_videos = array();
	$xml = file_get_contents(
		"https://gdata.youtube.com/feeds/api/users/{$user}/uploads"
	);
	$xml = preg_replace('/(<|<\/)([a-z0-9]+):/i','$1$2_',$xml);
	$videos = simplexml_load_string($xml);
	foreach ($videos->entry as $video) {
		$current_video = array();
		$current_video["title"] = $video->title;
		if (substr($video->title, 0, 3) == "CWC") {
			foreach ($video->link as $link) {
				$attributes = $link->attributes();
				if ($attributes->rel == "alternate") {
					$current_video['link'] = $attributes->href;
				}
			}
			if (isset($video->georss_where)) {
				$position = $video->georss_where->gml_Point->gml_pos;
				list($current_video["lat"], $current_video["lng"]) = (explode(" ", $position));
			}
			$selected_videos[]= $current_video;
		}
	}
	return $selected_videos;
}
