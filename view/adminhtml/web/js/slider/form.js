/**
 * @package Vegam_Homepage
 */
define([
    'jquery',
    'Magento_Ui/js/modal/alert',
    'Magento_Ui/js/modal/confirm',
    'Magento_Ui/js/form/form',
    'underscore',
    'mage/translate'
], function ($, uiAlert, uiConfirm, Form, _, $t) {
    'use strict';

    return Form.extend({
        defaults: {
            deleteConfirmationMessage: '',
            ajaxSettings: {
                method: 'POST',
                dataType: 'json'
            }
        },

        /**
         * Delete image by provided url.
         * Will call confirmation message to be sure that user is really wants to delete this image
         *
         * @param {String} url - ajax url
         */
        deleteImage: function (url) {
            var that = this;

            uiConfirm({
                content: this.deleteConfirmationMessage,
                actions: {
                    /** @inheritdoc */
                    confirm: function () {
                        that._delete(url);
                    }
                }
            });
        },

        /**
         * Perform asynchronous DELETE request to server.
         * @param {String} url - ajax url
         * @returns {Deferred}
         */
        _delete: function (url) {
            var settings = _.extend({}, this.ajaxSettings, {
                    url: url,
                    data: {
                        'form_key': window.FORM_KEY
                    }
                }),
                that = this;

            $('body').trigger('processStart');

            return $.ajax(settings)
                .done(function (response) {
                    if (response.error) {
                        uiAlert({
                            content: response.message
                        });
                    } else {
                        that.trigger('deleteImageAction', that.source.get('data.image_id'));
                    }
                })
                .fail(function () {
                    uiAlert({
                        content: $t('Sorry, there has been an error processing your request. Please try again later.')
                    });
                })
                .always(function () {
                    $('body').trigger('processStop');
                });

        }
    });
});
