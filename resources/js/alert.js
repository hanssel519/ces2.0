
function confirmTest() {
    swal.fire({
        title: "操作確認",
        text: "請點選你想按的按鈕",
        showCancelButton: true
    }).then(function(result) {
       if (result.value) {
            swal.fire("您按了OK");
       }
       else {
           swal.fire("您選擇了Cancel");
       }
    });
}
