var DB = new Firebase("https://crisis-whatcrisis.firebaseio.com");

var videos = DB.child('videos');

var errors = function(error) {
	console.log("Error: " + error.code);
};

var Videos = { web: [], youtube: [] };

var Paint = {
	list: function(where, list) {
		$(where).html('');
		list.forEach(function(item) {
			$(where).append(ich.item_tpl(item));
		});
	}
};

$(function() {
	videos.on("child_added", function(video) {
		Videos.web.push(video.val());
		Paint.list('#videos_web', Videos.web);
	}, errors);
});

var firstVideoDate = '2014-09-14';

function Video(youtubeData) {
	var self = this;

	self.title = youtubeData.title.$t;
	self.published = youtubeData.published.$t;
	self.id = youtubeData.id.$t;
	self.link = '';
	youtubeData.link.forEach(function(aLink) {
		if (aLink.rel == 'alternate') {
			self.link = aLink.href;
		}
	});
	self.description = youtubeData.media$group.media$description.$t;
	self.thumbs = [];
	youtubeData.media$group.media$thumbnail.forEach(function(thumbnail) {
		self.thumbs.push(thumbnail);
	});
	self.duration = youtubeData.media$group.yt$duration.seconds;
}

var loadYoutube = function(data) {
	var entries = data.feed.entry || [];
	$(function() {
		for (var i = 0; i < entries.length; i++) {
			var video = new Video(entries[i]);
			if (video.published >= firstVideoDate) {
				Videos.youtube.push(video);
			}
			Paint.list('#videos_yt', Videos.youtube);
		}
	});
};
