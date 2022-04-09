function opacityGradient(classname){
    var List=document.getElementsByClassName(''+classname);
    var opcaityRange = 1.0;
    var i;
    var opacityDiff = 1.0/(List.length * 1.6);
    for (i = 0; i < List.length; i++) {
        List[i].style.opacity = opcaityRange;
        opcaityRange -= opacityDiff;
    }
}
//
// function opacityGradient(classname){
//     var List=document.getElementsByClassName(''+classname);
//     var opcaityRange = 1.0;
//     var i;
//     var opacityDiff = 1.0/11;
//     for (i = 0; i < List.length; i++) {
//         List[i].style.opacity = opcaityRange;
//         opcaityRange -= opacityDiff;
//     }
// }