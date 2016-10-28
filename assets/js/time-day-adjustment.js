var month = $("select#cm-month option:selected").val();
if(month == 2){
    $("select#cm-day option.thirty").hide();
    $("select#cm-day option.thirty-one").hide();
}
else if(month == 4 || month == 6 || month == 9 || month == 11) {
    $("select#cm-day option.thirty-one").hide();
}