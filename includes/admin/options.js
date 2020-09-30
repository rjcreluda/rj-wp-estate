jQuery(function($){
    var frame       = wp.media({
        title:      'Select or upload logo',
        button:     {
            text:   'Use this media'
        },
        multiple:   false
    });
    var frame2       = wp.media({
        title:      'Select or upload logo',
        button:     {
            text:   'Use this media'
        },
        multiple:   false
    });
    var frame3       = wp.media({
        title:      'Select or upload logo',
        button:     {
            text:   'Use this media'
        },
        multiple:   false
    });
    $('#btn_upload_logo').click(function(e){
        e.preventDefault();
        frame.open();
    });
    frame.on('select', function(){
        var attachment      = frame.state().get('selection').first().toJSON();
        $('input[name=jind_logo_file]').val(attachment.url);
    });

    $('#btn_upload_header_home').click(function(e){
        e.preventDefault();
        frame2.open();
    });
    frame2.on('select', function(){
        var attachment      = frame2.state().get('selection').first().toJSON();
        $('input[name=home_header_image_file]').val(attachment.url);
    });

    $('#btn_upload_header_page').click(function(e){
        e.preventDefault();
        frame3.open();
    });
    frame3.on('select', function(){
        var attachment      = frame3.state().get('selection').first().toJSON();
        $('input[name=page_header_image_file]').val(attachment.url);
    });
});