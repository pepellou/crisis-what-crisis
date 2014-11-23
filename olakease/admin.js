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

var handleAction = function(action) {
	var action = $(action.target);
	var id = action.data('video');
	switch (action.attr('name')) {
		case 'publish':
			videos.push(Videos.youtube[id].data());
			break;
		case 'unpublish':
			videos.child(Videos.web[id].key).remove();
			break;
	}
};

var Paint = {
	list: function(where, list) {
		$(where).html('');
		for (var id in list) {
			var item = list[id];
			$(where).append(ich.item_tpl(item));
		};
		$(where + " a").click(handleAction);
	}
};

$(function() {
	videos.on("child_added", function(child) {
		var video = new Video({ web: child });
		Videos.web[video.id] = video;
		Paint.list('#videos_web', Videos.web);
		if (Videos.youtube[video.id]) {
			delete Videos.youtube[video.id];
			Paint.list('#videos_yt', Videos.youtube);
		}
	}, errors);
	videos.on("child_removed", function(child) {
		var video = new Video({ web: child });
		delete Videos.web[video.id];
		Paint.list('#videos_web', Videos.web);
		delete video.key;
		video.actions = YT_VIDEO_ACTIONS;
		Videos.youtube[video.id] = video;
		Paint.list('#videos_yt', Videos.youtube);
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

	self.isEligible = function() {
		var firstVideoDate = '2014-09-14';
		return self.published >= firstVideoDate
			|| self.title.substr(0, 3) == 'CWC';
	};

	self.data = function() {
		var data = {};
		for (var field in self) {
			if (typeof(self[field]) != "function") {
				data[field] = self[field];
			}
		}
		return data;
	};

	self._createFromWeb = function(data) {
		var fields = data.val();
		for (var field in fields) {
			self[field] = fields[field];
		}
		self.key = data.key();
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
