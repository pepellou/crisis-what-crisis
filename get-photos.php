<?php

	function getGpsForPhoto(
		$thePhotoPublicPage
	) {
		$public_page = $thePhotoPublicPage;
		$lat = strpos($public_page, '"perm_viewgeo":"0","geo"') + 35;
		$lat = strpos($public_page, ":", $lat) + 1;
		$end_lat = strpos($public_page, ",", $lat);
		$lng = strpos($public_page, ":", $end_lat) + 1;
		$end_lng = strpos($public_page, ",", $lng);
		$theLatitude = substr($public_page, $lat, $end_lat - $lat);
		$theLongitude = substr($public_page, $lng, $end_lng - $lng);
		return array($theLatitude, $theLongitude);
	}

	function getSizeForPhoto(
		$thePhotoPublicPage
	) {
		$public_page = $thePhotoPublicPage;
		$start_width = strpos(
			$public_page, 
			'<meta property="og:image:width" content="'
		) + strlen('<meta property="og:image:width" content="');
		$end_width = strpos($public_page, "\"", $start_width);
		$start_height = strpos(
			$public_page, 
			'<meta property="og:image:height" content="'
		) + strlen('<meta property="og:image:height" content="');
		$end_height = strpos($public_page, "\"", $start_height);
		$start_image = strpos(
			$public_page, 
			'<meta property="og:image" content="'
		) + strlen('<meta property="og:image" content="');
		$end_image = strpos($public_page, "\"", $start_image);
		return array(
			substr($public_page, $start_width, $end_width - $start_width),
			substr($public_page, $start_height, $end_height - $start_height),
			substr($public_page, $start_image, $end_image - $start_image)
		);
	}

	function getPhotos(
	) {
		$selected_photos = array();
		$xml = file_get_contents(
			"http://api.flickr.com/services/feeds/photoset.gne?set=72157631496285776&nsid=49750261@N05&lang=en-us"
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
			$selected_photos []= array(
				"title" => (string) $photo->title,
				"link" => (string) $theLink
			);
		}
		return $selected_photos;
	}

	function getPhoto(
		$theLink
	) {
		foreach (getPhotos() as $photo) {
			if ($photo["link"] == $theLink) {
				$public_page = file_get_contents($theLink);
				list($lat, $lng) = getGpsForPhoto($public_page);
				$photo["lat"] = $lat;
				$photo["lng"] = $lng;
				list($width, $height, $image) = getSizeForPhoto($public_page);
				$photo["width"] = $width;
				$photo["height"] = $height;
				$photo["image"] = $image;
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
