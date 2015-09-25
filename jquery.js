function JSONpopulate() {
  $.ajax({
    type: "POST",
    url: 'loader.php',
    data:{action:'JSONPopulate'},
    success:function(data) {
      $("#jsonTextArea").val(data);
    }
  });
}