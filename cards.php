<!DOCTYPE html>


<?php
require_once "partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="library/css/president.css"/>

</head>

<body id="body" class="body call-no" data-page="mainsite">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

      <?php
      require_once "partials/sites.php";
      ?>

    </div>
</div>
<!-- end header -->

<!-- begin content -->

<div id="content" class="content">
    <div id="home" class="page" data-page="home">
        <div class="page_wrapper">
            <div class="page_content">
                <div class="game_content">
                    <div class="game_block game_block_right">
                        <div class="player_info">
                            <div class="cards_remaining">Cards Remaining: <span id="cards_remaining"></span></div>
                        </div>
                        <div class="pile">
                            <div class="pile_cont"></div>
                        </div>
                        <div class="player_turn">
                            <div class="player_hand_cont"></div>
                            <div class="player_ctrl">
                                <div class="btn btn_sort">Sort Cards</div>
                                <div class="btn btn_play">Pass</div>
                                <div class="btn btn_return">Return</div>
                                <div class="btn btn_redeal">Redeal</div>
                            </div>
                        </div>
                    </div>
                    <div class="game_block game_block_left">
                        <div class="turn_display">
                        </div>
                    </div>
                    <div class="screen screen_start">
                        <div class="game_title">President</div>
                        <div class="btn_start">Start</div>
                        <div class="game_message">Press Start to Play</div>
                    </div>
                    <div class="screen screen_next_player">
                        <div class="whos_turn"></div>
                        <div class="btn_start">Start</div>
                    </div>
                    <script>
                      // [President Card Game]
                      // Game Settings
                      let players_num = 0;
                      let players = {};
                      let players_passed = 0;
                      let turn = 0;
                      let turn_overall = 0;
                      let deck = [];
                      let current_card_val = 0;
                      let amount_cards_selected = 0;
                      let suits_selected = '';

                      set_players();
                      generate_deck(deck);
                      shuffle(deck);
                      deal(deck, players);
                      deal_hand(deck, players);
                      turn_calculator();
                      $('.player_info .cards_remaining #cards_remaining').text($('.player_hand.active .card').length.toString());


                      // GAME FUNCTIONS
                      // Set Players
                      function set_players() {
                        players_num = 2;
                        players = {
                          player: [
                            {id: "1", hand: []},
                            {id: "2", hand: []}
                          ]
                        };
                        if (players_num === 3) {
                          players.player.push(
                            {id: "3", hand: []}
                          );
                        } else if (players_num === 4) {
                          players.player.push(
                            {id: "3", hand: []},
                            {id: "4", hand: []}
                          );
                        }
                      }


                      // Generate Deck
                      function generate_deck(deck) {
                        for (let i = 0; i < 4; i++) {
                          let suit;
                          switch (i) {
                            case 0:
                              suit = "spade";
                              break;
                            case 1:
                              suit = "heart";
                              break;
                            case 2:
                              suit = "club";
                              break;
                            case 3:
                              suit = "diamond";
                          }
                          for (let j = 0; j < 13; j++) {
                            let this_val = j + 1;
                            let this_point = j + 1;
                            if (this_val === 1) {
                              this_val = "A";
                              this_point = 14;
                            } else if (this_val === 2) {
                              this_point = 15;
                            } else if (this_val === 11) {
                              this_val = "J";
                            } else if (this_val === 12) {
                              this_val = "Q";
                            } else if (this_val === 13) {
                              this_val = "K";
                            }
                            let card = {val: this_val, suit: suit, point: this_point};
                            deck.push(card);
                          }
                        }
                        deck.push({val: 'J', suit: 'joker', point: 16},
                          {val: 'J', suit: 'joker', point: 16});
                      }


                      // Shuffle
                      function shuffle(array) {
                        let currentIndex = array.length, temporaryValue, randomIndex;
                        // While there remain elements to shuffle...
                        while (0 !== currentIndex) {
                          // Pick a remaining element...
                          randomIndex = Math.floor(Math.random() * currentIndex);
                          currentIndex -= 1;
                          // And swap it with the current element.
                          temporaryValue = array[currentIndex];
                          array[currentIndex] = array[randomIndex];
                          array[randomIndex] = temporaryValue;
                        }
                        return array;
                      }


                      // Deal
                      function deal(deck, players) {
                        let l = 1;
                        for (let k = 0; k < 54; k++) {
                          let deal = deck.shift();

                          for (let m in players.player) {
                            if (players.player[m].id == l) {
                              players.player[m].hand.push(deal);
                            }
                          }

                          if (l === players_num) {
                            l = 1;
                          } else {
                            l++;
                          }
                        }
                      }


                      // Deal Hand
                      function deal_hand(deck, players) {
                        // Hand Builder
                        for (let o = 0; o < players_num; o++) {
                          let this_player_hand = 'player_' + (o + 1) + '_hand';
                          $('.player_hand_cont').append('<div class="player_hand ' + this_player_hand + '"></div>');

                          let card_left = 0;
                          //console.log(this_player_hand);

                          for (let n in players.player[o].hand) {
                            $('.' + this_player_hand).append('<div class="card card-' + n + '" data-owner="'
                              + players.player[o].id + '" data-order="' + n + '" data-point="'
                              + players.player[o].hand[n].point + '" data-suit="'
                              + players.player[o].hand[n].suit + '"><div class="number">'
                              + players.player[o].hand[n].val + '</div></div>');

                            let cstr = ".card-" + n;
                            let $this_card = $(cstr);

                            $this_card.css('z-index', n);
                            $this_card.css('left', card_left + 'px');
                            card_left += 30;
                          }
                        }


                        // Set Hand width
                        let player_hand_width = ($('.player_1_hand .card').length * 30) + 60;
                        if ($(window).width() > player_hand_width) {
                          $('.player_hand_cont').css('width', player_hand_width);
                          $('.player_hand_cont').css('overflow-x', 'hidden');
                        } else {
                          $('.player_hand_cont').css('width', 'auto');
                          $('.player_hand_cont').css('overflow-x', 'scroll');
                        }
                        $(window).on('resize', function () {
                          if ($(window).width() > player_hand_width) {
                            $('.player_hand_cont').css('width', player_hand_width);
                            $('.player_hand_cont').css('overflow-x', 'hidden');
                          } else {
                            $('.player_hand_cont').css('width', 'auto');
                            $('.player_hand_cont').css('overflow-x', 'scroll');
                          }
                        });
                      }


                      // Turn Calculator
                      function turn_calculator() {
                        $('.player_hand').hide();
                        if (turn > (players_num - 1)) {
                          turn = 0;
                        }

                        turn++;
                        turn_overall++;

                        $('.whos_turn').text('Pass to Player ' + turn);

                        switch (turn) {
                          case 1 :
                            $('.player_hand').hide();
                            $('.player_1_hand').show();
                            $('.player_hand').removeClass("active");
                            $('.player_1_hand').addClass("active");
                            break;
                          case 2 :
                            $('.player_hand').hide();
                            $('.player_2_hand').show();
                            $('.player_hand').removeClass("active");
                            $('.player_2_hand').addClass("active");
                            break;
                          case 3 :
                            $('.player_hand').hide();
                            $('.player_3_hand').show();
                            $('.player_hand').removeClass("active");
                            $('.player_3_hand').addClass("active");
                            break;
                          case 4 :
                            $('.player_hand').hide();
                            $('.player_4_hand').show();
                            $('.player_hand').removeClass("active");
                            $('.player_4_hand').addClass("active");
                            break;
                        }

                        if (players_passed == (players_num - 1)) {
                          $('.turn_played').remove();
                        }

                        // must make turn update when not burned or round won
                        $('.btn_play').text('Pass');
                        $('.player_info .cards_remaining #cards_remaining').text($('.player_hand.active .card').length.toString());
                      }


                      //Reorganize Cards
                      function reorganize_cards() {
                        //var cards_remaining = $('.player_hand.active .card').length;
                        //$('.player_info .cards_remaining #cards_remaining').text(cards_remaining.toString());

                        var card_left = -30;
                        for (var k = 0; k < $('.player_hand.active .card').length + 1; k++) {
                          let plstr = ".player_hand .card:nth-child(" + k + ")";
                          let $this_card = $(plstr);

                          $this_card.animate({left: card_left + 'px'},10).delay(500).css('z-index', k);
                          card_left += 30;
                        }
                      }


                      // Sort Cards by value Ascending
                      function sortCardsByValue() {
                        var $activeHand = $('.player_hand.active .card');
                        $('.player_hand.active').html();
                        //$activeHand.sort(sort_cards).appendTo('.player_hand.active');

                        var firstValue = $('.player_hand.active .card:first-child').data('point');
                        var lastValue = $('.player_hand.active .card:last-child').data('point');

                        if (firstValue < lastValue ) {
                          $activeHand.sort(sort_cards_down).appendTo('.player_hand.active');
                        } else {
                          $activeHand.sort(sort_cards_up).appendTo('.player_hand.active');
                        }

                        function sort_cards_up(a, b) {
                          return ($(b).data('point')) < ($(a).data('point')) ? 1 : -1;
                        }

                        function sort_cards_down(a, b) {
                          return ($(b).data('point')) < ($(a).data('point')) ? -1 : 1;
                        }

                        reorganize_cards();
                      }


                      // Check for win
                      function check_win(){
                        $('.player_hand').each(function () {
                          console.log(
                            $(this).children().size() + ' cards in player ' +
                            $(this).index() + ' hand'
                          );


                          if($(this).children().size() < 1) {
                            restart_game();
                          }
                        });
                      }


                      // Restart Game
                      function restart_game(){
                        $('.screen.screen_next_player').css('display','none');
                        $('.screen.screen_start').show();
                        $('.screen.screen_start .game_message').text('Congrats You Won!');
                        $('.turn_played').remove();
                        $('.player_hand').remove();
                        $('.turn_display .msg').remove();

                        players_num = 0;
                        players = {};
                        players_passed = 0;
                        turn = 1;
                        turn_overall = 1;
                        deck = [];
                        current_card_val = 0;
                        amount_cards_selected = 0;
                        suits_selected = '';

                        set_players();
                        generate_deck(deck);
                        shuffle(deck);
                        deal(deck, players);
                        deal_hand(deck, players);

                        $('.player_1_hand').addClass("active");
                        $('.player_hand').hide();
                        $('.player_hand.active').show();

                        // Bind Functions
                        $('.card').bind('click', function () {
                          pick_a_card($(this));
                        });
                      }


                      // PLAYER FUNCTIONS
                      // Start
                      $('.screen_start .btn_start').on('click', function () {
                        $('.screen_start').hide();
                        $('.turn_display').append('<div class="msg">Turn ' + turn_overall + ': Player ' + turn + '</div>');
                      });


                      // Next Player
                      $('.screen_next_player .btn_start').on('click', function () {
                        $('.screen_next_player').hide();
                      });


                      // Sort Cards
                      $('.btn_sort').on('click', function () {
                        sortCardsByValue()
                      });


                      // Pick A Card
                      function pick_a_card(card) {
                        $('.btn_play').text('Play');

                        if (current_card_val === card.attr('data-point') || current_card_val === 0) {
                          card.toggleClass('active');
                          current_card_val = card.attr('data-point');
                        }

                        amount_cards_selected = $('.card.active').length;

                        if (!$('.card').hasClass('active')) {
                          current_card_val = 0;
                          amount_cards_selected = 0;
                          $('.btn_play').text('Pass');
                        }
                      }

                      // Bind Pick A Card Function
                      $('.card').bind('click', function () {
                        pick_a_card($(this));
                      });


                      // Play Cards
                      function play_cards() {
                        let msg = '';
                        let alertmsg = '';

                        // create msg for Turn Display
                        $('.card.active').each(function (index, value) {
                          suits_selected += $(this).attr('data-suit');

                          if (amount_cards_selected === 2) {
                            if (index == 1) {
                              suits_selected += 's';
                            } else {
                              suits_selected += 's and ';
                            }
                          } else if (amount_cards_selected === 3) {
                            if (index == 2) {
                              suits_selected += 's';
                            } else if (index == 1) {
                              suits_selected += 's and ';
                            } else {
                              suits_selected += 's, ';
                            }
                          } else if (amount_cards_selected === 4) {
                            if (index == 3) {
                              suits_selected += 's';
                            } else if (index == 2) {
                              suits_selected += 's and ';
                            } else {
                              suits_selected += 's, ';
                            }
                          } else {
                            suits_selected += 's';
                          }
                        });


                        // Player Passed
                        if (!$('.card').hasClass('active')) {
                          msg = 'Player ' + turn + ' passed ';

                          $('.pile .pile_cont').append('<div class="turn_played turn_' + turn_overall
                            + '"></div>');

                          $('.turn_display').prepend('<div class="msg">' + msg + '</div>');

                          players_passed++;

                          turn_calculator();

                          $('.turn_display').prepend('<div class="msg">Turn ' + turn_overall + ': Player ' + turn + '</div>');

                          reorganize_cards();

                          $('.screen_next_player').css('display', 'block');

                          return;
                        }

                        // Get Card in Play information
                        let card_owner = $('.card.active').attr('data-owner');
                        let card_played = $('.card.active .number').last().text();
                        let card_point = parseInt($('.card.active').attr('data-point'));
                        let last_card_point = 0;
                        let cards_in_play = $('.turn_played').first().children().length;
                        if ($('.turn_played .card.played').length) {
                          last_card_point = parseInt($('.turn_played .card.played').last().attr('data-point'));
                        }
                        let tuple = '';
                        if (amount_cards_selected === 1) {
                          tuple = 'the ';
                        } else if (amount_cards_selected === 2) {
                          tuple = 'double ';
                        } else if (amount_cards_selected === 3) {
                          tuple = 'triple ';
                        } else if (amount_cards_selected === 4) {
                          tuple = 'quadruple ';
                        }


                        // Validate Play
                        if(card_point === 16) {
                          $('.pile .pile_cont').append('<div class="turn_played turn_' + turn_overall
                            + '"></div>');
                          $('.card.active').prependTo('.pile .pile_cont .turn_' + turn_overall);
                          $('.turn_played').remove();
                          msg = 'Player ' + card_owner + ' played a joker';

                          turn_overall++;

                          $('.turn_display').prepend('<div class="msg">' + msg + '</div>');
                          $('.turn_display').prepend('<div class="msg">Turn ' + turn_overall + ': Player ' + turn + '</div>');
                        } else if ((card_point > last_card_point  && amount_cards_selected === cards_in_play) || last_card_point === 0 ) {
                          //STANDARD PLAY
                          $('.pile .pile_cont').append('<div class="turn_played turn_' + turn_overall
                            + '"></div>');
                          $('.card.active').prependTo('.pile .pile_cont .turn_' + turn_overall);

                          if ($('.card').hasClass('active')) {
                            msg = 'Player ' + card_owner + ' played ' + tuple + card_played
                              + ' of ' + suits_selected;
                          } else {
                            msg = 'Player ' + (turn - 1) + ' passed ';
                          }


                          $('.card.active').addClass('played');
                          $('.card.played').removeClass('active');
                          $('.card.played').each(function () {
                            if ($(this).is(':nth-last-child(1)')) {
                              $(this).css('left', '0').css('z-index', '1');
                            } else if ($(this).is(':nth-last-child(2)')) {
                              $(this).css('left', '30px').css('z-index', '2');
                            } else if ($(this).is(':nth-last-child(3)')) {
                              $(this).css('left', '60px').css('z-index', '3');
                            } else if ($(this).is(':nth-last-child(4)')) {
                              $(this).css('left', '90px').css('z-index', '4');
                            }
                          });

                          current_card_val = 0;
                          amount_cards_selected = 0;
                          players_passed = 0;

                          $('.screen_next_player').css('display', 'block');

                          turn_calculator();

                          $('.turn_display').prepend('<div class="msg">' + msg + '</div>');
                          $('.turn_display').prepend('<div class="msg">Turn ' + turn_overall + ': Player ' + turn + '</div>');

                          check_win();

                        } else if (card_point === last_card_point && amount_cards_selected === cards_in_play) {
                          //BURN CARDS IN PLAY
                          //wrap card played in div to register turn
                          $('.pile .pile_cont').append('<div class="turn_played turn_' + turn_overall
                            + '"></div>');
                          $('.card.active').prependTo('.pile .pile_cont .turn_' + turn_overall);

                          msg = 'Player ' + turn + ' BURNED the pile with ' + tuple + card_played
                            + ' of ' + suits_selected;
                          ;
                          suits_selected = '';

                          $('.card.active').addClass('played');
                          $('.card.played').removeClass('active');
                          $('.card.played').each(function () {
                            if ($(this).is(':nth-last-child(1)')) {
                              $(this).css('left', '0').css('z-index', '1');
                            } else if ($(this).is(':nth-last-child(2)')) {
                              $(this).css('left', '30px').css('z-index', '2');
                            } else if ($(this).is(':nth-last-child(3)')) {
                              $(this).css('left', '60px').css('z-index', '3');
                            } else if ($(this).is(':nth-last-child(4)')) {
                              $(this).css('left', '90px').css('z-index', '4');
                            }
                          });

                          current_card_val = 0;
                          amount_cards_selected = 0;
                          players_passed = 0;

                          $('.turn_played').remove();
                          turn_overall++;

                          $('.turn_display').prepend('<div class="msg">' + msg + '</div>');
                          $('.turn_display').prepend('<div class="msg">Turn ' + turn_overall + ': Player ' + turn + '</div>');
                        } else {
                          //CANNOT PLAY
                          if (amount_cards_selected != $('.turn_played').first().children().length) {
                            alertmsg += 'Please select ' + $('.turn_played').first().children().length + ' cards to play\n';
                          }
                          if (card_point < last_card_point) {
                            alertmsg += 'Please select a card higher than ' + $('.turn_played:last-child .card:last-child .number').text() + ' to play\n';
                          }

                          alert(alertmsg);
                          alertmsg = '';
                          suits_selected = '';
                          $('.card').removeClass('active');
                          current_card_val = 0;
                          amount_cards_selected = 0;
                          players_passed = 0;
                          $('.btn_play').text('Pass');

                          return;
                        }

                        reorganize_cards();

                        suits_selected = '';
                      }

                      // Bind Play Cards Function
                      $('.btn_play').bind('click', function() {
                        play_cards();
                      });


                      $('.btn_redeal').on('click', function () {
                        restart_game();
                      });


                      // Return Cards
                      $('.btn_return').on('click', function () {
                        $('.card').removeClass('active');
                        $('.btn_play').text('Pass');
                        current_card_val = 0;
                        amount_cards_selected = 0;



                        //testing code
                        let cardssdfasdf = $('.player_turn .player_hand .card').length - 4;
                        $('.player_turn .player_hand.active .card').each(function(){
                          if(!$(this).hasClass('card-0') ){
                            $(this).remove();
                          }
                        });



                      });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end page content -->

<?php
require_once "partials/footer.php";
?>

<?php
require_once "partials/scripts.php";
?>


</body>
</html>