
$('.question-a').keyup(function() {
    let timeout = null;
    clearTimeout(timeout);
    let val = $(this).val();

    timeout = setTimeout(function() {
        if($('.answer-a').length) $('.answer-a').remove();
        
        $('.correct').append(`<option value="${val}" class="answer-a">${val}</option>`)
    }, 1000);
});

$('.question-b').keyup(function() {
    let timeout = null;
    clearTimeout(timeout);
    let val = $(this).val();

    timeout = setTimeout(function() {
        if($('.answer-b').length) $('.answer-b').remove();
        
        $('.correct').append(`<option value="${val}" class="answer-b">${val}</option>`)
    }, 1000);
});

$('.question-c').keyup(function() {
    let timeout = null;
    clearTimeout(timeout);
    let val = $(this).val();

    timeout = setTimeout(function() {
        if($('.answer-c').length) $('.answer-c').remove();
        
        $('.correct').append(`<option value="${val}" class="answer-c">${val}</option>`)
    }, 1000);
});
$('.question-d').keyup(function() {
    let timeout = null;
    clearTimeout(timeout);
    let val = $(this).val();

    timeout = setTimeout(function() {
        if($('.answer-d').length) $('.answer-d').remove();
        
        $('.correct').append(`<option value="${val}" class="answer-d">${val}</option>`)
    }, 1000);
});
$('.question-e').keyup(function() {
    let timeout = null;
    clearTimeout(timeout);
    let val = $(this).val();

    timeout = setTimeout(function() {
        if($('.answer-e').length) $('.answer-e').remove();
        
        $('.correct').append(`<option value="${val}" class="answer-e">${val}</option>`)
    }, 1000);
});