$(document).ready(function (){
    $('body').on('click','.deleteConfirm', function(e){
        alert('oui');
        e.preventDefault();
        var obj = $(this);
        if (!$('#dataConfirmModal').length) {
            var html = "";
            html += '<div class="modal fade" id="dataConfirmModal">';
            html += '<div class="modal-dialog">';
            html += '<div class="modal-content">';
            html += '<div class="modal-header">';
            html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            html += '<h4 class="modal-title">Confirmation de suppression</h4>';
            html += '</div>'
            html += '<div class="modal-body"><p></p></div>';
            html += '<div class="modal-footer">';
            html += '<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>';
            html += '<a class="btn btn-primary" id="dataConfirmOK">Valider</a>';
            html += '</div>'
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('body').append(html);
        }
        $('#dataConfirmModal').find('.modal-body p').text($(this).attr('data-message'));
        $('#dataConfirmOK').click( function(){
            window.location = obj.attr('href');
        });
        $('#dataConfirmModal').modal({show:true});
    });
});
