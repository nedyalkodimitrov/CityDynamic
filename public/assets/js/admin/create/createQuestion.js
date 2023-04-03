function createQuestion(createQuestionUrl){
    var questionProperties = getQuestionInput();
    var questionData =new FormData();

    questionData.append('questionProperties',JSON.stringify(questionProperties));

    var result = ajaxRequest('POST', createQuestionUrl, questionData);


    if (result == '1'){
        location.reload();
    }

}


