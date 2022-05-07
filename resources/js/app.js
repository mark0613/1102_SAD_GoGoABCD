require('./bootstrap');

$( document ).ready(function() {
    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('.multi-select').selectpicker();
});