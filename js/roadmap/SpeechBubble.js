var SpeechBubble = {

    show: function(milestone, opacity) {
        $('#speechBubble div h1').html(milestone.milestone);
        $('#speechBubble div a').attr('href', milestone.link);
        $('#speechBubble span').html(milestone.text);
        $('#speechBubble').css('display', 'block');
        $('#speechBubble').css('opacity', opacity);
    },

    hide: function() {
        $('#speechBubble').css('display', 'none');
        $('#speechBubble').css('opacity', '0');
    }

};
