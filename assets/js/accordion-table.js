/**
 * Plugin Boilerplate Accordion Table Functionality
 * 
 * @package Plugin Boilerplate/JS
 * @version 1.2.0
 */

(function($) {
    'use strict';
    
    function initAccordionTable() {
        // Accordion row click handler
        $('.plugin-boilerplate-accordion-table .accordion-header').on('click', function() {
            var $header = $(this);
            var $content = $header.next('.accordion-content');
            var $row = $header.parent('.accordion-row');
            
            // Toggle active state
            $header.toggleClass('active');
            $content.toggleClass('active');
            
            // Slide animation
            if ($content.hasClass('active')) {
                $content.slideDown(200);
            } else {
                $content.slideUp(200);
            }
            
            // Close other rows (optional - remove for multi-open)
            $('.plugin-boilerplate-accordion-table .accordion-header').not($header).removeClass('active');
            $('.plugin-boilerplate-accordion-table .accordion-content').not($content).removeClass('active').slideUp(200);
        });
        
        // Search functionality
        $('#item-search').on('keyup', function() {
            var searchTerm = $(this).val().toLowerCase();
            
            $('.plugin-boilerplate-accordion-table .accordion-row').each(function() {
                var $row = $(this);
                var text = $row.text().toLowerCase();
                
                if (text.indexOf(searchTerm) > -1) {
                    $row.show();
                } else {
                    $row.hide();
                }
            });
        });
    }
    
    // Initialize on document ready
    $(document).ready(function() {
        initAccordionTable();
    });
    
})(jQuery);
