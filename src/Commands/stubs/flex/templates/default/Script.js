export default {

    init: function () {
        this.section = $('.FlexNameDashes');
        if(!this.section.length) return;

        this.bindEvents();
    },

    bindEvents: function () {
        console.log('Running FlexNameDashes');
    },
};
