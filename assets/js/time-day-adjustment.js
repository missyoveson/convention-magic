var month = $(".cm-month option:selected").val();
if(month == 2){
    $(".cm-day option.thirty").css("display:none");
    $(".cm-day option.thirty-one").css("display:none");
}
else if(month == 4 || month == 6 || month == 9 || month == 11) {
    $(".cm-day option.thirty-one").css("display:none");
}