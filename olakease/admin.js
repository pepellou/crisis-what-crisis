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
	list: function(where, list, actions) {
		$(where).html('');
		list.forEach(function(item) {
			console.log(actions);
			item.actions = actions;
			console.log(item);
			$(where).append(ich.item_tpl(item));
		});
	}
};

$(function() {
	videos.on("child_added", function(video) {
		Videos.web.push(new Video({ web: video.val() }));
		Paint.list(
			'#videos_web',
			Videos.web,
			WEB_VIDEO_ACTIONS
		);
	}, errors);
});

var firstVideoDate = '2014-09-14';

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
		self.title = data.title;
		self.published = data.published;
		self.id = data.id;
		self.link = data.link;
		self.description = data.description;
		self.thumbs = data.thumbs;
		self.duration = data.duration;
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
	};

	return self.init();
}

var loadYoutube = function(data) {
	var entries = data.feed.entry || [];
	$(function() {
		for (var i = 0; i < entries.length; i++) {
			var video = new Video({ youtube: entries[i] });
			if (video.published >= firstVideoDate) {
				Videos.youtube.push(video);
			}
			Paint.list(
				'#videos_yt',
				Videos.youtube,
				YT_VIDEO_ACTIONS
			);
		}
	});
};
