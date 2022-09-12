

$(document).ready(function () {

    
    function addImg(divID) {
        $(`#${divID}`).append(
            `     
        <br> 
        <input type="file" name="img[]" id="img" multiple>
        <label for="php">Upload CSS file</label><br><br>
        `
        )
    }

    $("#addImg").click(function () {
        addImg("img")
    })
    
    console.log("hello");
    var turn = false;
    var matching_var;
    var flipped = false;
    $(".gamecard").click(function () {

        if (!flipped) {
            if (!turn) {
                //console.log("Value of turn "+ turn)
                turn = true;
                card1 = $(this).attr('id');
                card1_value = card1.split('-')
                matching_var = card1
                $(this).text(card1_value.at(0));



            }
            else {
                //console.log("Value of turn "+ turn)
                card2 = $(this).attr('id');
                card2_value = card2.split('-');
                $(this).text(card2_value.at(0));

                if (card2_value.at(0) == matching_var.split("-")[1]) {
                    $(this).html("Matched")
                    $("#" + matching_var).html("Matched");
                    setTimeout(() => {
                        $(this).remove();
                        $("#" + matching_var).remove();
                    }, "500")

                }
                turn = false;
                flipped = true;
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    $(".gamecard").text("Default picture");
                    flipped = false;
                    //winning move
                    if ($(".gamecard").length == 0) { $("#game").text("You have won the game"); console.log("This") }
                }, "500")

                //winning move



            }
        }


    });



});