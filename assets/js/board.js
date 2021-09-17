$(function() {
    draw_board();
    $('.piece').draggable({
        distance: 0,
        revert: "invalid",
        revertDuration: 100,
        containment: "window",
        start: function(event, ui){
            $(this).draggable('instance').offset.click = {
                left: Math.floor(ui.helper.width() / 2),
                top: Math.floor(ui.helper.height() / 2)
            }; 
        }
    });
    $( ".tile" ).droppable({
        accept: ".piece",
        revert: "invalid",
        drop: function(event, ui) {
            var draggableId = ui.draggable.attr("id");
            var droppableId = $(this).attr("id");

            console.log(draggableId + " to " + droppableId);
        }
      });
});

function draw_board() {
    var rank = [ "1", "2", "3", "4", "5", "6", "7", "8" ];
    var file = [ "a", "b", "c", "d", "e", "f", "g", "h" ];
    var axis = $('.board').data("axis");

    for(let j = file.length - 1; j >= 0; j--) {
        for(let i = 0; i < rank.length; i++ ) {
            const number = j + i + 2;
    
            if(number % 2 === 0) {
                $('.board').append('<div id="'+file[i]+rank[j]+'" data-square="'+file[i]+rank[j]+'" data-file="' + file[i] + '" data-rank="' + rank[j] + '" class="tile p-1 black-tile"></div>');
            } else {
                $('.board').append('<div id="'+file[i]+rank[j]+'" data-square="'+file[i]+rank[j]+'" data-file="' + file[i] + '" data-rank="' + rank[j] + '" class="tile p-1 white-tile"></div>');
            }
        }
    }

    // white pieces
    for(let p = 0; p <= 8; p++) {
        $('.tile[data-square="' + file[p] + '2"]').html("<img src='assets/img/pieces/w_pawn.svg' class='piece' width='100%' />");
    }
    $('.tile[data-square="a1').html("<img src='assets/img/pieces/w_rook.svg' class='piece' width='100%' />");
    $('.tile[data-square="b1').html("<img src='assets/img/pieces/w_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="c1').html("<img src='assets/img/pieces/w_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="d1').html("<img src='assets/img/pieces/w_queen.svg' class='piece' width='100%' />");
    $('.tile[data-square="e1').html("<img src='assets/img/pieces/w_king.svg' class='piece' width='100%' />");
    $('.tile[data-square="f1').html("<img src='assets/img/pieces/w_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="g1').html("<img src='assets/img/pieces/w_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="h1').html("<img src='assets/img/pieces/w_rook.svg' class='piece' width='100%' />");

    // black pieces
    for(let p = 0; p <= 8; p++) {
        $('.tile[data-square="' + file[p] + '7"]').html("<img src='assets/img/pieces/b_pawn.svg' class='piece' width='100%' />");
    }
    $('.tile[data-square="a8').html("<img src='assets/img/pieces/b_rook.svg' class='piece' width='100%' />");
    $('.tile[data-square="b8').html("<img src='assets/img/pieces/b_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="c8').html("<img src='assets/img/pieces/b_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="d8').html("<img src='assets/img/pieces/b_queen.svg' class='piece' width='100%' />");
    $('.tile[data-square="e8').html("<img src='assets/img/pieces/b_king.svg' class='piece' width='100%' />");
    $('.tile[data-square="f8').html("<img src='assets/img/pieces/b_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="g8').html("<img src='assets/img/pieces/b_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="h8').html("<img src='assets/img/pieces/b_rook.svg' class='piece' width='100%' />");

}

function flip() {
    var axis = $('.board').data("axis");

    if(axis == "white") {
        $('.board, .tile').addClass('flip');
        $('.board').attr('data-axis', 'black');
        $('.board').data('axis', 'black');
    } else if(axis == "black") {
        $('.board, .tile').removeClass('flip');
        $('.board').attr('data-axis', 'white');
        $('.board').data('axis', 'white');
    }
}