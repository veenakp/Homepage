/**
 * @package Vegam_Homepage
 */
define([
    'jquery',
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/single-checkbox-toggle-notice'
], function ($, _, uiRegistry, toggle) {
    'use strict';
    return toggle.extend({
 
        initialize: function (){
            var status = this._super().initialValue;
            this.fieldDepend(status);
            return this;
        },
 
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
 
            this.fieldDepend(value);
            return this._super();
        },
 
        /**
         * Update field dependency
         *
         * @param {String} value
         */
        fieldDepend: function (value) {
                var autoplayTimeout = uiRegistry.get('index = autoplay_timeout');
                var autoplayHover = uiRegistry.get('index = autoplay_hover_pause');
                if (value == 0) {
                    autoplayTimeout.hide();
                    autoplayHover.hide();
                } else if (value == 1) {
                    autoplayTimeout.show();
                    autoplayHover.show();
                } 
            return this;
        }
    });
});
