/**
 * @package Vegam_Homepage
 */

define([
    'Magento_Ui/js/form/components/insert-form'
], function (Insert) {
    'use strict';

    return Insert.extend({
        defaults: {
            listens: {
                responseData: 'onResponse'
            },
            modules: {
                imageListing: '${ $.imageListingProvider }',
                imageModal: '${ $.imageModalProvider }'
            }
        },

        /**
         * Close modal, reload listing and save image
         *
         * @param {Object} responseData
         */
        onResponse: function (responseData) {
            var data;

            if (!responseData.error) {
                this.imageModal().closeModal();
                this.imageListing().reload({
                    refresh: true
                });
                data = this.externalSource().get('data');
                this.saveimage(responseData, data);
            }
        },

        /**
         * Save image to form data source
         *
         * @param {Object} responseData
         * @param {Object} data - image
         */
        saveimage: function (responseData, data) {
            data['image_id'] = responseData.data['image_id'];
        },

        /**
         *
         *
         * @param {String} id - image ID to delete
         */
         onImageDelete: function (id) {
            this.imageModal().closeModal();
            this.imageListing().reload({
                refresh: true
            });
            this.imageListing()._delete([parseFloat(id)]);
        }
    });
});
