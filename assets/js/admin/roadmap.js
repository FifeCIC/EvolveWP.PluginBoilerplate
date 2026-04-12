/**
 * Roadmap Tab — accordion, localStorage task persistence, progress tracking.
 *
 * Ported from WPVerifier's admin-roadmap.js. All CSS class prefixes use
 * plugin-boilerplate- instead of wpv- so the styles are plugin-agnostic.
 *
 * @package EvolveWP Core
 * @since   3.0.0
 */

jQuery(document).ready(function($) {

    // Phase accordion
    $('.plugin-boilerplate-roadmap-phase-header').on('click', function() {
        var phaseId = $(this).data('phase');
        var content = $('#' + phaseId + '-content');
        var toggle  = $(this).find('.plugin-boilerplate-roadmap-phase-toggle');

        if (content.is(':visible')) {
            content.slideUp(300);
            toggle.text('▶');
        } else {
            content.slideDown(300);
            toggle.text('▼');
        }
    });

    // Task checkboxes
    $('.plugin-boilerplate-task-checkbox').on('change', function() {
        saveTaskState();
    });

    // Save to localStorage
    function saveTaskState() {
        var states = {};
        $('.plugin-boilerplate-task-checkbox').each(function() {
            states[$(this).attr('id')] = $(this).is(':checked');
        });
        localStorage.setItem('plugin_boilerplate_roadmap_tasks', JSON.stringify(states));
    }

    // Load from localStorage
    function loadTaskState() {
        var saved = localStorage.getItem('plugin_boilerplate_roadmap_tasks');
        if (saved) {
            var states = JSON.parse(saved);
            Object.keys(states).forEach(function(id) {
                var cb = $('#' + id);
                if (cb.length && !cb.prop('disabled')) {
                    cb.prop('checked', states[id]);
                }
            });
        }
    }

    // Keyboard shortcuts
    $(document).on('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'E') {
            $('.plugin-boilerplate-roadmap-phase-content').slideDown(300);
            $('.plugin-boilerplate-roadmap-phase-toggle').text('▼');
            e.preventDefault();
        }
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'C') {
            $('.plugin-boilerplate-roadmap-phase-content').slideUp(300);
            $('.plugin-boilerplate-roadmap-phase-toggle').text('▶');
            e.preventDefault();
        }
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'R') {
            if (confirm('Reset all task progress?')) {
                $('.plugin-boilerplate-task-checkbox').not(':disabled').prop('checked', false);
                saveTaskState();
            }
            e.preventDefault();
        }
    });

    // Init
    loadTaskState();
});
