/*global plugin_boilerplate_setup_params */
jQuery( function( $ ) {

    $( '.button-next' ).on( 'click', function() {
        $('.plugin-boilerplate-setup-content').block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        return true;
    } );

    $( '.plugin-boilerplate-wizard-plugin-extensions' ).on( 'change', '.plugin-boilerplate-wizard-extension-enable input', function() {
        if ( $( this ).is( ':checked' ) ) {
            $( this ).closest( 'li' ).addClass( 'checked' );
        } else {
            $( this ).closest( 'li' ).removeClass( 'checked' );
        }
    } );

    $( '.plugin-boilerplate-wizard-plugin-extensions' ).on( 'click', 'li.plugin-boilerplate-wizard-extension', function() {
        var $enabled = $( this ).find( '.plugin-boilerplate-wizard-extension-enable input' );

        $enabled.prop( 'checked', ! $enabled.prop( 'checked' ) ).change();
    } );

    $( '.plugin-boilerplate-wizard-plugin-extensions' ).on( 'click', 'li.plugin-boilerplate-wizard-extension table, li.plugin-boilerplate-wizard-extension a', function( e ) {
        e.stopPropagation();
    } );
} );
