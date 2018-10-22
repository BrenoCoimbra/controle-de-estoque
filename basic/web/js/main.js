$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#modalButtonR').click(function(){
        $('#modalR').modal('show')
            .find('#modalContentR')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#modalButtonV').click(function(){
        $('#modalV').modal('show')
            .find('#modalContentV')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#modalButtonS').click(function(){
        $('#modalS').modal('show')
            .find('#modalContentS')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#modalButtonVH').click(function(){
        $('#modalVH').modal('show')
            .find('#modalContentS')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#modalButtonM').click(function(){
        $('#modalM').modal('show')
            .find('#modalContentM')
            .load($(this).attr('value'));
    });
});
$(function(){
    $('#modalButtonTM').click(function(){
        $('#modalTM').modal('show')
            .find('#modalContentM')
            .load($(this).attr('value'));
    });
});