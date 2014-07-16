var MilestonesGeometry = {

    WIDTH: 800,
    FADE_WIDTH: 200

};

function Milestone(domElement) {
    this.image = $(domElement).find('[name="image"]').text();
    this.start = parseInt($(domElement).css('margin-left'));
    this.milestone = $(domElement).find('[class="signalBot"]').text();
    this.link = $(domElement).find('[name="link"]').text();
    this.text = $(domElement).find('[name="text"]').text();

    this.isActive = function(position) {
        return position >= this.start && position <= this.start + MilestonesGeometry.WIDTH;
    };

    this.getOpacity = function(position) {
        var offset = position - this.start;
        if (offset < 0 || offset > MilestonesGeometry.WIDTH) {
            return 0;
        }
        var opacity = 0;
        if (offset < MilestonesGeometry.FADE_WIDTH) {
            return offset / MilestonesGeometry.FADE_WIDTH;
        }
        if (offset > MilestonesGeometry.WIDTH - MilestonesGeometry.FADE_WIDTH) {
            return 1 - (offset - MilestonesGeometry.WIDTH + MilestonesGeometry.FADE_WIDTH) / MilestonesGeometry.FADE_WIDTH;
        }
        return 1;
    };
};
