// LESSONS
$("blockquote").each(function() {
    // do something exciting with each div
    $(this).css("font-style", "italic");
    $(this).css("color", "gray");
    $(this).css("font-size", "large");
    $(this).css("border-left", "5px solid gray");
    $(this).css("padding-left", "15px");
});

$("h2").each(function() {
    // do something exciting with each div
    $(this).css("font-weight", "bolder");
    $(this).css("font-size", "x-large");
});

$("h3").each(function() {
    // do something exciting with each div
    $(this).css("font-weight", "bolder");
    $(this).css("font-size", "larger");
});

$("ol").each(function() {
    // do something exciting with each div
    $(this).css("list-style-type", "decimal");
    $(this).css("padding-left", "20px");
});

$("a").each(function() {
    // do something exciting with each div
    $(this).attr("loop", "");
    $(this).attr("autoplay", "");
    $(this).attr("controls", "");
});
