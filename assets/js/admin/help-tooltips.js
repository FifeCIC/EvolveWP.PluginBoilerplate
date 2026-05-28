/**
 * Plugin Boilerplate — Help Tooltips
 *
 * Initialises hover tooltips for elements with data-tooltip attributes.
 * Used on development pages for contextual help.
 *
 * Usage in PHP templates:
 *   <span class="plugin-boilerplate-help-tip" data-tooltip="Explanation text">
 *       <span class="dashicons dashicons-editor-help"></span>
 *   </span>
 *
 * @package plugin-boilerplate/JS/Admin
 * @since   3.1.0
 */

( function( $ ) {
	'use strict';

	var activeTooltip = null;

	/**
	 * Show a tooltip above (or below) the trigger element.
	 */
	function showTooltip( trigger ) {
		hideTooltip();

		var text = trigger.getAttribute( 'data-tooltip' );
		if ( ! text ) {
			return;
		}

		var tooltip = document.createElement( 'div' );
		tooltip.className = 'plugin-boilerplate-help-tooltip plugin-boilerplate-help-tooltip--top';
		tooltip.textContent = text;
		document.body.appendChild( tooltip );

		// Position above the trigger.
		var rect = trigger.getBoundingClientRect();
		var tipRect = tooltip.getBoundingClientRect();
		var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

		var top = rect.top + scrollTop - tipRect.height - 10;
		var left = rect.left + scrollLeft + ( rect.width / 2 ) - ( tipRect.width / 2 );

		// If tooltip would go above viewport, show below instead.
		if ( top < scrollTop ) {
			top = rect.bottom + scrollTop + 10;
			tooltip.className = 'plugin-boilerplate-help-tooltip plugin-boilerplate-help-tooltip--bottom';
		}

		// Keep within horizontal bounds.
		if ( left < 5 ) {
			left = 5;
		}
		if ( left + tipRect.width > document.documentElement.clientWidth - 5 ) {
			left = document.documentElement.clientWidth - tipRect.width - 5;
		}

		tooltip.style.top = top + 'px';
		tooltip.style.left = left + 'px';

		// Trigger reflow then add visible class for fade-in.
		tooltip.offsetHeight; // eslint-disable-line no-unused-expressions
		tooltip.classList.add( 'plugin-boilerplate-visible' );

		activeTooltip = tooltip;
	}

	/**
	 * Remove the active tooltip.
	 */
	function hideTooltip() {
		if ( activeTooltip ) {
			activeTooltip.remove();
			activeTooltip = null;
		}
	}

	/**
	 * Initialise all help tip triggers.
	 */
	function init() {
		var triggers = document.querySelectorAll( '.plugin-boilerplate-help-tip, [data-tooltip]' );

		triggers.forEach( function( trigger ) {
			trigger.addEventListener( 'mouseenter', function() {
				showTooltip( trigger );
			} );

			trigger.addEventListener( 'mouseleave', hideTooltip );
			trigger.addEventListener( 'focusin', function() {
				showTooltip( trigger );
			} );
			trigger.addEventListener( 'focusout', hideTooltip );
		} );
	}

	// Initialise when DOM is ready.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}

} )( jQuery );
