Inputmask({ regex: "^[a-zA-Z ]+$" }, {

    placeholder: "",
    greedy: false,
    jitMasking: true
})
    .mask('#title').mask('#titleEn')
    .mask('#theme')
    .mask('information').mask('informationEn')
;

Inputmask({ regex: "^[a-zA-Z]+$" }, {

    placeholder: "",
    greedy: false,
    jitMasking: true
}).mask('#material').mask('#materialEn').mask('#technique');

Inputmask({ regex: "^[1-9x]+$" }, {

    placeholder: "20x20",
    greedy: false,
    jitMasking: true
}).mask('#size');

Inputmask({ regex: "^[1-9]+$" }, {

    placeholder: "1000",
    greedy: false,
    jitMasking: true
}).mask('#price');
