var DB = new Firebase("https://crisis-whatcrisis.firebaseio.com");

var videos = DB.child('videos');

var errors = function(error) {
	console.log("Error: " + error.code);
};

var Videos = { web: [], youtube: [] };

var WEB_VIDEO_ACTIONS = [
	{ name: 'unpublish', message: 'Despublicar' }
];

var YT_VIDEO_ACTIONS = [
	{ name: 'publish', message: 'Publicar' }
];

var Paint = {
	list: function(where, list) {
		$(where).html('');
		for (var id in list) {
			var item = list[id];
			$(where).append(ich.item_tpl(item));
		};
	}
};

$(function() {
	videos.on("child_added", function(child) {
		var video = new Video({ web: child.val() });
		Videos.web[video.id] = video;
		Paint.list('#videos_web', Videos.web);
		if (Videos.youtube[video.id]) {
			delete Videos.youtube[video.id];
			Paint.list('#videos_yt', Videos.youtube);
		}
	}, errors);
});

function Video(options) {
	options = options || {};

	var self = this;

	self.init = function() {
		if (options.youtube) {
			self._createFromYoutube(options.youtube);
		} else if (options.web) {
			self._createFromWeb(options.web);
		}
		return self;
	};

	self._createFromWeb = function(data) {
		for (var field in data) {
			self[field] = data[field];
		}
		self.actions = WEB_VIDEO_ACTIONS;
	};

	self._createFromYoutube = function(data) {
		self.title = data.title.$t;
		self.published = data.published.$t;
		self.id = data.id.$t;
		self.link = '';
		data.link.forEach(function(aLink) {
			if (aLink.rel == 'alternate') {
				self.link = aLink.href;
			}
		});
		self.description = data.media$group.media$description.$t;
		self.thumbs = [];
		data.media$group.media$thumbnail.forEach(function(thumbnail) {
			self.thumbs.push(thumbnail);
		});
		self.duration = data.media$group.yt$duration.seconds;

		self.gps = { lat: 0, lng: 0 };
		if (data.georss$where) {
			var gps = data.georss$where.gml$Point.gml$pos.$t.split(' ');
			self.gps = {
				lat: gps[0],
				lng: gps[1]
			};
		}

		self.actions = YT_VIDEO_ACTIONS;
	};

	self.isEligible = function() {
		var firstVideoDate = '2014-09-14';
		return self.published >= firstVideoDate
			|| self.title.substr(0, 3) == 'CWC';
	};

	return self.init();
}

var loadYoutube = function(data) {
	var entries = data.feed.entry || [];
	$(function() {
		for (var i = 0; i < entries.length; i++) {
			var video = new Video({ youtube: entries[i] });
			if (video.isEligible() && !(Videos.web[video.id])) {
				Videos.youtube[video.id] = video;
			}
			Paint.list('#videos_yt', Videos.youtube);
		}
	});
};
