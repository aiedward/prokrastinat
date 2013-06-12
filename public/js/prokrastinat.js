tinymce.init({
    selector: "textarea.editor",
    width: 540
});

$(".datepick").datetimepicker({
    dateFormat: 'dd. mm. yyyy',
    language: 'sl',
    pickTime: false
});