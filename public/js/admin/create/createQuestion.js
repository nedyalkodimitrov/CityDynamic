function createQuestion(createQuestionUrl){
    var questionProperties = getQuestionInput();
    console.log(questionProperties);
    var result = ajaxRequest('POST', createQuestionUrl, questionProperties);
    console.log(result);

    if (result == '1'){
        location.reload();
    }

}


