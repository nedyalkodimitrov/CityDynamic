function getQuestionInput(){
    var question = $('#question').val();
    var questionEn = $('#questionEn').val();
    var answer = $('#answer').val();
    var answerEn = $('#answerEn').val();



    var bg ={
        'question' : question,
        'answer' : answer
    }

    var en ={
        'question' : questionEn,
        'answer' : answerEn
    }

    return {bg, en};
}
