tinymce.init({
    selector: "textarea.editor",
    width: 540
});

$(".datepick").datetimepicker({
    language: 'sl',
    pickTime: false
});

$('.kategorija').typeahead({
    source: function (query, process) {
        return $.get('/kategorije/serialize', { query: query }, function (data) {
            return process(data.options);
        });
    }
});