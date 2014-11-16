var DB = new Firebase("https://crisis-whatcrisis.firebaseio.com");

var videos = DB.child('videos');

var errors = function(error) {
	console.log("The read failed: " + error.code);
};

$(function() {
	videos.on("child_added", function(video) {
		$('#videos').append(ich.video_tpl(video.val()));
	}, errors);
});
