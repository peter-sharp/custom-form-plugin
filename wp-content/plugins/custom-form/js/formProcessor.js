jQuery(document).ready(function($) {
    $(document).on('submit', '.contact-form', function(event){
        event.preventDefault();
        var formData = {};
        $('.contact-form').children('input, textarea, select').each(function(index, element){
            console.info(element);
            formData[element.name] = element.value;
        });
        console.log(formData);
        var data = {
            'action': 'add_submission',
            'add_submission': formData
        }
        jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
            console.log(response);
        });
    });
});