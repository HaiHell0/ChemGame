
function addImg(divID){
    $(`#${divID}`).append(
    `     
    <br> 
    <input type="file" name="img[]" id="img" multiple>
    <label for="php">Upload CSS file</label><br><br>
    `
    ) 
}

$("#addImg").click(function(){
    addImg("img")
})