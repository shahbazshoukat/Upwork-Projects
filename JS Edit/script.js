var totalWords = 0;
var currentwords = 0;
$(document).ready(function () {
    
    textArray.forEach(function (element) {
        totalWords += element.split(' ').length;
    }, this);
    $("#wordsBox").html("0/" + totalWords + " Words")
});
