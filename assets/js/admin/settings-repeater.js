jQuery(document).ready(function($) {
    'use strict';

    // Initialize repeater fields
    $('.plugin-boilerplate-repeater-container').each(function() {
        var $container = $(this);
        var $items = $container.find('.plugin-boilerplate-repeater-items');
        var $template = $container.find('.plugin-boilerplate-repeater-template');
        var itemIndex = $items.find('.plugin-boilerplate-repeater-item').length;

        // Make items sortable
        $items.sortable({
            handle: '.plugin-boilerplate-repeater-handle',
            placeholder: 'plugin-boilerplate-repeater-placeholder',
            update: function() {
                updateItemNumbers($items);
            }
        });

        // Add new item
        $container.on('click', '.plugin-boilerplate-repeater-add', function(e) {
            e.preventDefault();
            var template = $template.html();
            var newItem = template.replace(/\{\{INDEX\}\}/g, itemIndex);
            $items.append(newItem);
            itemIndex++;
            updateItemNumbers($items);
        });

        // Remove item
        $container.on('click', '.plugin-boilerplate-repeater-remove', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).closest('.plugin-boilerplate-repeater-item').remove();
                updateItemNumbers($items);
            }
        });

        // Toggle item content
        $container.on('click', '.plugin-boilerplate-repeater-toggle', function(e) {
            e.preventDefault();
            var $item = $(this).closest('.plugin-boilerplate-repeater-item');
            $item.toggleClass('collapsed');
            $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
        });
    });

    // Update item numbers
    function updateItemNumbers($items) {
        $items.find('.plugin-boilerplate-repeater-item').each(function(index) {
            $(this).find('.plugin-boilerplate-repeater-number').text(index + 1);
        });
    }
});
