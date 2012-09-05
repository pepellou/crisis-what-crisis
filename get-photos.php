<?php

	function getGpsForPhoto(
		$theLink
	) {
		$public_page = file_get_contents($theLink);
		$lat = strpos($public_page, '"perm_viewgeo":"0","geo"') + 35;
		$lat = strpos($public_page, ":", $lat) + 1;
		$end_lat = strpos($public_page, ",", $lat);
		$lng = strpos($public_page, ":", $end_lat) + 1;
		$end_lng = strpos($public_page, ",", $lng);
		$theLatitude = substr($public_page, $lat, $end_lat - $lat);
		$theLongitude = substr($public_page, $lng, $end_lng - $lng);
		return array($theLatitude, $theLongitude);
	}

	function getPhotos(
		$user,
		$tag
	) {
		$selected_photos = array();
		$user = "27418660@N05"; // xavierbelho
		$user = "63176109@N03"; // pepellou
		$tag = "acampadaobradoiro";
		$xml = file_get_contents(
			"http://api.flickr.com/services/feeds/photos_public.gne?id={$user}"
		);
		$xml = preg_replace('/(<|<\/)([a-z0-9]+):/i','$1$2_',$xml);
		$photos = simplexml_load_string($xml);
		foreach ($photos->entry as $photo) {
			$theLink = "";
			foreach ($photo->link as $link) {
				$attributes = $link->attributes();
				if ($attributes->rel == "alternate") {
					$theLink = $attributes->href;
				}
			}
			foreach ($photo->category as $category) {
				$attributes = $category->attributes();
				if ($attributes["scheme"] = "http://www.flickr.com/photos/tags/") {
					if ($attributes["term"] == $tag) {
						$selected_photos []= array(
							"title" => (string) $photo->title,
							"link" => (string) $theLink,
							"lat" => $theLatitude,
							"lng" => $theLongitude
						);
					}
				}
			}
		}
		return $selected_photos;
	}

	function getPhoto(
		$theLink
	) {
		foreach (getPhotos() as $photo) {
			if ($photo["link"] == $theLink) {
				list($lat, $lng) = getGpsForPhoto($theLink);
				$photo["lat"] = $lat;
				$photo["lng"] = $lng;
				return $photo;
			}
		}
		return null;
	}

	if (isset($_POST['photo_link'])) {
		echo json_encode(getPhoto($_POST['photo_link']));
	} else {
		echo json_encode(getPhotos());
	}
