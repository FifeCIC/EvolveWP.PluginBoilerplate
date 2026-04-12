jQuery(document).ready(function($) {
    var deactivateLink = '';
    
    // Intercept deactivate link click
    $('tr[data-slug="' + evolvewpCoreUninstall.plugin_slug.split('/')[0] + '"] .deactivate a').on('click', function(e) {
        e.preventDefault();
        deactivateLink = $(this).attr('href');
        $('#plugin-boilerplate-uninstall-feedback-modal').fadeIn(200);
    });
    
    // Close modal
    $('.plugin-boilerplate-modal-close, .plugin-boilerplate-modal-overlay').on('click', function() {
        $('#plugin-boilerplate-uninstall-feedback-modal').fadeOut(200);
    });
    
    // Show details textarea for certain reasons
    $('input[name="reason"]').on('change', function() {
        var value = $(this).val();
        if (value === 'missing_features' || value === 'not_working' || value === 'other') {
            $('.plugin-boilerplate-details').slideDown(200);
        } else {
            $('.plugin-boilerplate-details').slideUp(200);
        }
    });
    
    // Skip and deactivate
    $('.plugin-boilerplate-skip').on('click', function() {
        window.location.href = deactivateLink;
    });
    
    // Submit feedback and deactivate
    $('.plugin-boilerplate-submit').on('click', function() {
        var $btn = $(this);
        var reason = $('input[name="reason"]:checked').val();
        
        if (!reason) {
            alert('Please select a reason');
            return;
        }
        
        $btn.prop('disabled', true).text('Submitting...');
        
        $.ajax({
            url: evolvewpCoreUninstall.ajaxurl,
            type: 'POST',
            data: {
                action: 'plugin_boilerplate_uninstall_feedback',
                nonce: evolvewpCoreUninstall.nonce,
                reason: reason,
                details: $('textarea[name="details"]').val(),
                email: $('input[name="email"]').val()
            },
            success: function() {
                window.location.href = deactivateLink;
            },
            error: function() {
                window.location.href = deactivateLink;
            }
        });
    });
});
