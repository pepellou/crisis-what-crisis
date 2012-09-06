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
		foreach ($video->category as $category) {
			$attributes = $category->attributes();
			if ($attributes->scheme == "http://gdata.youtube.com/schemas/2007/keywords.cat") {
				if ($attributes->term == $tag) {
					$selected_videos[]= $current_video;
				}
			}
		}
	}
	return $selected_videos;
}
