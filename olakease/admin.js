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

var loadYoutube = function(data) {
	var entries = data.feed.entry || [];
	$(function() {
		for (var i = 0; i < entries.length; i++) {
			if (entries[i].published.$t >= firstVideoDate) {
				Videos.youtube.push({
					title: entries[i].title.$t,
					link: '?'
				});
			}
			Paint.list('#videos_yt', Videos.youtube);
		}
	});
};
