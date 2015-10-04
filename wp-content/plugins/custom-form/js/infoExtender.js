jQuery(document).ready(function($) {
    
    // use 'event delegation' to capture a click on a button
    $('.submissions').on('click', 'button', function(event){ 
        event.preventDefault();
        var $extraInfo = $( this ).closest('tr').next('tr');
        console.info($extraInfo);
        $extraInfo.toggleClass('hidden');
    });
});