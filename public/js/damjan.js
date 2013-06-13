$('#modal-brisanje').on('show', function() {
    var id = $(this).data('id'),
        removeBtn = $(this).find('.danger');

    removeBtn.attr('href', removeBtn.attr('href').replace(/(id|[\d]+)/, id));
});

$('.brisiPotrditev').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    $('#modal-brisanje').data('id', id).modal('show');
});
