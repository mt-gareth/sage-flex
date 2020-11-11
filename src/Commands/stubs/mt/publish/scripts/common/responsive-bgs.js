export default {

    init: function () {
        this.targets = $('.responsive');
        if (this.targets.length === 0) return;

        this.debounce = 0;

        this.breakpointsDefault = {
            'm': '768',
            't': '900',
        };
        this.checkImages();
        this.bindEvents();
    },

    checkImages: function () {
        this.targets.each((index, el) => {
            const $el = $(el);
            const $parent = $el.parent('figure');
            const sources = $el.data('src');
            const breakPoints = $el.data('breakpoints') || this.breakpointsDefault;
            let desiredSource = this.getDesiredSource(sources, breakPoints);

            if (!$parent.css('background-image').indexOf(desiredSource) > -1) this.loadImage($parent, desiredSource);
        });
    },

    getDesiredSource: function (sources, breakPoints) {
        const windowWidth = $(window).width();
        let desiredSource = this.getLastInObject(sources);
        Object.keys(breakPoints).some((key) => {
            if (windowWidth < parseInt(breakPoints[key]) && sources.hasOwnProperty(key)) {
                desiredSource = sources[key];
                return true;
            }
            return false;
        });

        return desiredSource;
    },

    getLastInObject: function (object) {
        const keys = Object.keys(object);
        const lastKey = keys[keys.length - 1];
        return object[lastKey];
    },

    loadImage: function ($$, src) {
        let $img = $('<img />');
        $img
            .load(() => {
                $$.css('background-image', 'url(' + src + ')');
            })
            .prop('src', src);
    },

    onResize: function () {
        clearTimeout(this.debounce);
        this.debounce = setTimeout(() => {
            clearTimeout(this.debounce);
            this.checkImages();
        }, 250);
    },

    bindEvents: function () {
        $(window).resize(() => this.onResize());
    },
};
