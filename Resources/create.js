
function addImg(divID){
    $(`#${divID}`).append(
    `     
    <br> 
    <label for="img">Upload image file</label><br><br>
    <input type="file" name="img[]" id="img" multiple>
    `
    ) 
}

$("#addImg").click(function(){
    addImg("img")
})