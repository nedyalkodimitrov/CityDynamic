
function editQuestion(editQuestionUrl){
    var questionProperties = getQuestionInput();

    var questionData = new FormData();
    questionData.append('questionProperties',JSON.stringify(questionProperties));

    var result = ajaxRequest('POST', editQuestionUrl, questionData);
    return result;

}


