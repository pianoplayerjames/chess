$(function() {
    move_sound = $("<audio>", { src: "assets/sounds/move.wav", preload: "auto" }).appendTo("body");
    capture_sound = $("<audio>", { src: "assets/sounds/capture.mp3", preload: "auto" }).appendTo("body");
    check_sound = $("<audio>", { src: "assets/sounds/check.wav", preload: "auto" }).appendTo("body");
    game_end_sound = $("<audio>", { src: "assets/sounds/game_end.wav", preload: "auto" }).appendTo("body");
    draw_board();
    clock();
});

function draw_board() {
    var turn = "white";
    var rank = ["1", "2", "3", "4", "5", "6", "7", "8"];
    var file = ["a", "b", "c", "d", "e", "f", "g", "h"];
    var axis = $('.board').data("axis");

    for (let j = file.length - 1; j >= 0; j--) {
        for (let i = 0; i < rank.length; i++) {
            const number = j + i + 2;

            if (number % 2 === 0) {
                $('.board').append('<div id="' + file[i] + rank[j] + '" data-square="' + file[i] + rank[j] + '" class="tile black-tile"></div>');
            } else {
                $('.board').append('<div id="' + file[i] + rank[j] + '" data-square="' + file[i] + rank[j] + '" class="tile white-tile"></div>');
            }
        }
    }

    // white pieces
    for (let p = 0; p <= 8; p++) {
        $('.tile[data-square="' + file[p] + '2"]').html("<img data-square='" + file[p] + "2' data-moved='0' data-enpassant='0' data-color='white' data-piece='pawn' src='assets/img/pieces/w_pawn.svg' class='piece' width='100%' />");
    }
    $('.tile[data-square="a1').html("<img data-square='a1' data-castling='1' data-color='white' data-piece='rook' src='assets/img/pieces/w_rook.svg' class='piece' width='100%' />");
    $('.tile[data-square="b1').html("<img data-square='b1' data-color='white' data-piece='knight' src='assets/img/pieces/w_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="c1').html("<img data-square='c1' data-color='white' data-piece='bishop' src='assets/img/pieces/w_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="d1').html("<img data-square='d1' data-color='white' data-piece='queen' src='assets/img/pieces/w_queen.svg' class='piece' width='100%' />");
    $('.tile[data-square="e1').html("<img data-square='e1' data-color='white' data-piece='king' src='assets/img/pieces/w_king.svg' class='piece' width='100%' />");
    $('.tile[data-square="f1').html("<img data-square='f1' data-color='white' data-piece='bishop' src='assets/img/pieces/w_bishop.svg' class='piece' width='100%' />");
    $('.tile[data-square="g1').html("<img data-square='g1' data-color='white' data-piece='knight' src='assets/img/pieces/w_knight.svg' class='piece' width='100%' />");
    $('.tile[data-square="h1').html("<img data-square='h1' data-castling='1' data-color='white' data-piece='rook' src='assets/img/pieces/w_rook.svg' class='piece' width='100%' />");

    // black pieces
    for (let p = 0; p <= 8; p++) {
        $('.tile[data-square="' + file[p] + '7"]').html("<img data-square='" + file[p] + "7' data-moved='0' data-enpassant='0' data-color='black' data-piece='pawn' src='assets/img/pieces/b_pawn.svg' class='piece' width='100%' />");
    }
    $('.tile[data-square="a8').html("<img data-square='a8' data-castling='1' data-color='black' src='assets/img/pieces/b_rook.svg' data-piece='rook' class='piece' width='100%' />");
    $('.tile[data-square="b8').html("<img data-square='b8' data-color='black' src='assets/img/pieces/b_knight.svg' data-piece='knight' class='piece' width='100%' />");
    $('.tile[data-square="c8').html("<img data-square='c8' data-color='black' src='assets/img/pieces/b_bishop.svg' data-piece='bishop' class='piece' width='100%' />");
    $('.tile[data-square="d8').html("<img data-square='d8' data-color='black' src='assets/img/pieces/b_queen.svg' data-piece='queen' class='piece' width='100%' />");
    $('.tile[data-square="e8').html("<img data-square='e8' data-color='black' src='assets/img/pieces/b_king.svg' data-piece='king' class='piece' width='100%' />");
    $('.tile[data-square="f8').html("<img data-square='f8' data-color='black' src='assets/img/pieces/b_bishop.svg' data-piece='bishop' class='piece' width='100%' />");
    $('.tile[data-square="g8').html("<img data-square='g8' data-color='black' src='assets/img/pieces/b_knight.svg' data-piece='knight' class='piece' width='100%' />");
    $('.tile[data-square="h8').html("<img data-square='h8' data-castling='1' data-color='black' src='assets/img/pieces/b_rook.svg' data-piece='rook' class='piece' width='100%' />");

    var fen = '';

    $(".board").resizable({
        handles: { se: '.fa-arrows-alt-h' },
        aspectRatio: 1,
        grid: 1,
        minWidth: 200,
        maxWidth: $('#board_contain').width(),
        resize: function(e, ui) {
            var grid = ui.element.width().toFixed(0) / 8;
            $(this).css("grid-template-columns", "repeat(8, " + grid + "px)");
            $(this).css("grid-template-rows", "repeat(8, " + grid + "px)");
        }
    });

    $('.piece').draggable({
        stack: '.piece',
        distance: 0,
        revert: 'invalid',
        revertDuration: 0,
        containment: "window",
        start: function(event, ui) {

            $(this).draggable('instance').offset.click = {
                left: Math.floor(ui.helper.width() / 2),
                top: Math.floor(ui.helper.height() / 2)
            };

            piece_file = $(this).data('square')[0];
            piece_rank = $(this).data('square')[1];

            console.log($(this).data('piece'));

            if ($(this).data('piece') == 'pawn') {

                // if pawn hasn't moved
                if ($(this).data('moved') == 0) {

                    if ($(this).data('color') == 'white') {
                        $('div[data-square="' + piece_file + '3"]').addClass('valid_squares');
                        $('div[data-square="' + piece_file + '4"]').addClass('valid_squares');
                    } else {
                        $('div[data-square="' + piece_file + '6"]').addClass('valid_squares');
                        $('div[data-square="' + piece_file + '5"]').addClass('valid_squares');
                    }

                } else {

                    if ($(this).data('color') == 'white') {

                        new_rank = +piece_rank + 1;
                        $('div[data-square="' + piece_file + new_rank + '"]').addClass('valid_squares');

                    } else {
                        new_rank = +piece_rank - 1;
                        console.log(new_rank);
                        $('div[data-square="' + piece_file + new_rank + '"]').addClass('valid_squares');
                    }
                }

            } else if ($(this).data('piece') == 'rook') {

                // rook up
                for (ru = +piece_rank + 1; ru <= 8; ru++) {
                    if ($('div[data-square="' + piece_file + ru + '"]').is(':empty')) {
                        $('div[data-square="' + piece_file + ru + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + piece_file + ru + '"]').children().data('color') != $(this).data('color')) {
                            $('div[data-square="' + piece_file + ru + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }

                // rook down
                for (rd = +piece_rank - 1; rd >= 1; rd--) {
                    if ($('div[data-square="' + piece_file + rd + '"]').is(':empty')) {
                        $('div[data-square="' + piece_file + rd + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + piece_file + rd + '"]').children().data('color') != $(this).data('color')) {
                            $('div[data-square="' + piece_file + rd + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }

                // rook right
                for (rr = parseInt(piece_file, 36) - 9; rr <= 7; rr++) {
                    if ($('div[data-square="' + file[rr] + piece_rank + '"]').is(':empty')) {
                        $('div[data-square="' + file[rr] + piece_rank + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[rr] + piece_rank + '"]').children().data('color') != $(this).data('color')) {
                            $('div[data-square="' + file[rr] + piece_rank + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }

                // rook left
                for (rl = (parseInt(piece_file, 36) - 9) - 2; rl >= 0; rl--) {
                    if ($('div[data-square="' + file[rl] + piece_rank + '"]').is(':empty')) {
                        $('div[data-square="' + file[rl] + piece_rank + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[rl] + piece_rank + '"]').children().data('color') != $(this).data('color')) {
                            $('div[data-square="' + file[rl] + piece_rank + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }


            } else if ($(this).data('piece') == 'knight') {

                let cell = $(this).data('square');
                // convert letter to number
                let x = parseInt(cell.substring(0, 1).charCodeAt() - 64);
                let y = parseInt(cell.substring(1, 2));

                let knightMoves = [
                    { x: 2, y: -1 }, { x: 2, y: 1 }, { x: 1, y: -2 }, { x: 1, y: 2 },
                    { x: -2, y: -1 }, { x: -2, y: 1 }, { x: -1, y: -2 }, { x: -1, y: 2 }
                ]

                let possibleMoves = [];
                for (let m of knightMoves) {
                    let row = String.fromCharCode(x + m.x + 64);
                    let column = y + m.y;
                    possibleMoves.push(row + "" + column);
                    if ($('[data-square="' + row + column + '"]').children().data('color') != $(this).data('color')) {
                        $('[data-square="' + row + column + '"]').addClass('valid_squares');
                    }
                }
                console.log('Possible Coordinates:', possibleMoves);

            } else if ($(this).data('piece') == 'bishop') {

                tl_bishop = +piece_rank;
                tr_bishop = +piece_rank;
                bl_bishop = +piece_rank;
                br_bishop = +piece_rank;

                // bishop top right
                for (tr = (parseInt(piece_file, 36) - 9); tr <= 8; tr++) {
                    tr_bishop++;
                    if ($('div[data-square="' + file[tr] + tr_bishop + '"]').is(':empty')) {
                        $('[data-square="' + file[tr] + tr_bishop + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[tr] + tr_bishop + '"]').children().data('color') != $(this).data('color')) {
                            $('[data-square="' + file[tr] + tr_bishop + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }

                }

                // bishop bottom right
                for (br = (parseInt(piece_file, 36) - 9); br <= 8; br++) {
                    br_bishop--;
                    if ($('div[data-square="' + file[br] + br_bishop + '"]').is(':empty')) {
                        $('[data-square="' + file[br] + br_bishop + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[br] + br_bishop + '"]').children().data('color') != $(this).data('color')) {
                            $('[data-square="' + file[br] + br_bishop + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }

                // bishop bottom left
                for (bl = (parseInt(piece_file, 36) - 9 - 2); bl >= 0; bl--) {
                    bl_bishop--;
                    if ($('div[data-square="' + file[bl] + bl_bishop + '"]').is(':empty')) {
                        $('[data-square="' + file[bl] + bl_bishop + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[bl] + bl_bishop + '"]').children().data('color') != $(this).data('color')) {
                            $('[data-square="' + file[bl] + bl_bishop + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }

                // bishop top left
                for (tl = (parseInt(piece_file, 36) - 9 - 2); tl >= 0; tl--) {
                    tl_bishop++;
                    if ($('div[data-square="' + file[tl] + tl_bishop + '"]').is(':empty')) {
                        $('[data-square="' + file[tl] + tl_bishop + '"]').addClass('valid_squares');
                    } else {
                        if ($('div[data-square="' + file[tl] + tl_bishop + '"]').children().data('color') != $(this).data('color')) {
                            $('[data-square="' + file[tl] + tl_bishop + '"]').addClass('valid_squares');
                            break;
                        } else {
                            break;
                        }
                    }
                }


            } else if ($(this).data('piece') == 'queen') {

                console.log('queen');

            } else if ($(this).data('piece') == 'king') {

                console.log('king');

            }


        }
    });
    $(".tile").droppable({
        accept: ".piece",
        revert: "invalid",
        drop: function(event, ui) {

            piece_file = $(ui.draggable).data('square')[0];
            piece_rank = $(ui.draggable).data('square')[1];

            // prevent piece from dropping on same square
            if ($(ui.draggable).attr("data-square") != $(this).attr("data-square")) {

                var drop_color = $(this).children().attr('data-color');

                // prevent from capturing your own piece
                if ($(ui.draggable).attr("data-color") != drop_color) {

                    if ($(this).hasClass('valid_squares')) {

                        console.log('Dragged: ' + $(ui.draggable).attr("data-piece") + ' from ' + $(ui.draggable).attr("data-square") + ' to ' + $(this).attr("data-square"));
                        $(ui.draggable).attr('data-square', $(this).attr("data-square"));
                        $(ui.draggable).data('square', $(this).attr("data-square"));

                        new_piece_file = $(ui.draggable).data('square')[0];
                        new_piece_rank = $(ui.draggable).data('square')[1];

                        $(this).empty();
                        $(this).append(ui.draggable);

                        if (turn == "white") {

                            turn = "black";
                            $('[data-color="white"]').draggable("disable");
                            $('[data-color="black"]').draggable("enable");

                        } else if (turn == "black") {

                            turn = "white";
                            $('[data-color="black"]').draggable("disable");
                            $('[data-color="white"]').draggable("enable");

                        }

                        // sound effects for moves
                        if (drop_color !== undefined && (drop_color != $(ui.draggable).attr("data-color"))) {
                            capture_sound[0].play();
                        } else {
                            move_sound[0].play();
                        }

                        if ($(ui.draggable).data("moved") == 0) {
                            $(ui.draggable).attr('data-moved', 1);
                            $(ui.draggable).data('moved', 1);
                        }

                        console.log(new_piece_file);

                        // pawn promotion
                        if ($(ui.draggable).attr("data-color") == "white" && $(ui.draggable).data("piece") == "pawn" && new_piece_rank == '8') {

                            $(ui.draggable).attr('data-piece', 'rook');
                            $(ui.draggable).data('piece', 'rook');
                            $(ui.draggable).attr('src', 'assets/img/pieces/w_rook.svg');

                        } else if ($(ui.draggable).attr("data-color") == "black" && $(ui.draggable).data("piece") == "pawn" && new_piece_rank == '1') {

                            $(ui.draggable).attr('data-piece', 'rook');
                            $(ui.draggable).data('piece', 'rook');
                            $(ui.draggable).attr('src', 'assets/img/pieces/b_rook.svg');

                        }

                    }
                }

            }
            $(ui.draggable).css({ 'position': 'relative', 'top': '', 'left': '' });
            $('[data-square]').removeClass('valid_squares');

        }
    });
    $('.board').bind('contextmenu', function(e) {
        return false;
    });
    $('[data-color="black"]').draggable("disable");

}

var _STOP = 0;

var value = 1999;

function settimer()

{
    var svalue = value.toString();

    if (svalue.length == 3)

        svalue = '0' + svalue;
    else if (svalue.length == 2)
        svalue = '00' + svalue;
    else if (svalue.length == 1)
        svalue = '000' + svalue;
    else if (value == 0)
        svalue = '0000';
    document.getElementById('timer').innerHTML = svalue[0];
    document.getElementById('timer').innerHTML = svalue[1];
    document.getElementById('timer').innerHTML = svalue[2];
    document.getElementById('timer').innerHTML = svalue[3];
    value--;

    if (_STOP == 0 && value >= 0) setTimeout("settimer();", 10);
}

setTimeout("settimer()", 10);

function flip() {
    var axis = $('.board').data("axis");

    if (axis == "white") {
        $('.board, .tile').addClass('flip');
        $('.board').attr('data-axis', 'black');
        $('.board').data('axis', 'black');
    } else if (axis == "black") {
        $('.board, .tile').removeClass('flip');
        $('.board').attr('data-axis', 'white');
        $('.board').data('axis', 'white');
    }
}