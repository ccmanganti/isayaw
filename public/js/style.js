// document.getElementById("sample").innerHTML = "Hello JavaScript!";
$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
 });

$('#next-tutorial').click(function(){

    $('#tutorial-title').css('opacity', '0');
    $('#tutorial-desc').css('opacity', '0');
    $('#tutorial-welcome').css('opacity', '0');
    $('#tutorial-2').css('opacity', '0');
    $('#tutorial-3').css('opacity', '0');

    if($('#progress1').hasClass("current-progress")){
        $('#progress2').css('opacity', '0');
    } else if($('#progress2').hasClass("current-progress")){
        $('#progress3').css('opacity', '0');
    }

    setTimeout(function(){

        if($('#progress1').hasClass("current-progress")){
            // Remove the class first
            $('#progress1').removeClass("current-progress")
            $('#progress2').addClass("current-progress")
            $('#tutorial-welcome').css('display', 'none');
            $('#tutorial-2').css('opacity', '1');

            // Change the content
            $('#tutorial-title').html("Learn New Things");
            $('#tutorial-desc').html("Learn anywhere, anytime, at your own pace with the iSAYAW App");
            $('#tutorial-title').css('opacity', '1');
            $('#tutorial-desc').css('opacity', '1');
            $('#progress2').css('opacity', '1');
            $('#tutorial-2').css('display', 'block');


        } else if($('#progress2').hasClass("current-progress")){
            // Remove the class first
            $('#progress2').removeClass("current-progress")
            $('#progress3').addClass("current-progress")
            $('#tutorial-2').css('display', 'none');
            $('#progress3').css('opacity', '1');
            $('#tutorial-3').css('opacity', '1');

            // Change the content
            $('#tutorial-title').html("Unlock new modules");
            $('#tutorial-desc').html("Assess your learnings and add new ones by unlocking new modules.");
            $('#tutorial-title').css('opacity', '1');
            $('#tutorial-desc').css('opacity', '1');
            $('#tutorial-3').css('display', 'block');


        } else if($('#progress3').hasClass("current-progress")){
            // Remove the class first
            $('#progress3').removeClass("current-progress")
            $('#tutorial').addClass("current-progress")
            $('#onboarding').css('display', 'none');
            $('#tutorial').css("display", 'block')
            $('#tutor-contain').css("display", 'flex')
            $('#tutorial-contain').css("display", 'flex')
            $('#tutor-content').css("display", 'flex')
        }
    }, '500');
});

$('#tutorial-next').click(function(){

    if($('#tutorial').hasClass("current-progress")){

        $.ajax({
            url:"/onboarding",
            method:'get',
            data:{
                onboarding:1
            },
        });

        setTimeout(function(){
            location.reload();
        }, '500');
        
        
    }
});

// Dashboard
$('#nav-module').click(function(){
    $('#nav-module').removeClass("inactive")
    $('#nav-exe').addClass("inactive")
    $('.lesson-link').css('display', 'block')
    $('.assessment-link').css('display', 'none')

});

$('#nav-exe').click(function(){
    $('#nav-module').addClass("inactive")
    $('#nav-exe').removeClass("inactive")
    $('.lesson-link').css('display', 'none')
    $('.assessment-link').css('display', 'block')

});

