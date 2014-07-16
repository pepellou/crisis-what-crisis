var milestones = [];

function repaint() {

    var bikePosition = position.get() + 400;

    var currentMilestone = null;
    milestones.forEach(function(milestone) {
        if (milestone.isActive(bikePosition)) {
            currentMilestone = milestone;
        }
    });

    if (currentMilestone != null) {
        var opacity = currentMilestone.getOpacity(bikePosition);
        SpeechBubble.show(currentMilestone, opacity);
        BackgroundImage.show(currentMilestone.image, opacity);
    } else {
        SpeechBubble.hide();
        BackgroundImage.hide();
    }
}

$(function() {
    $('#milestones .milestone').each(function() {
        milestones.push(new Milestone(this));
    });

    position.reset();
    repaint();

    UserInput.onMove(function(delta) {
        position.move(delta);
    });

    $('#road').focus();
});
