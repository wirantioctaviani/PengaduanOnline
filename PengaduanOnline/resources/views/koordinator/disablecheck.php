<script>
  $(".is_answering").on("change", function() {
  $("#subkoor").find("input").prop("checked", false).prop("disabled", !$("#is_answering_no").prop('checked'));
});
</script>