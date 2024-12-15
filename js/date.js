$(function () {
  $("#birthdate").datepicker({
    dateFormat: "mm-dd-yy",
    yearRange: "1980:2024",
    changeMonth: true,
    changeYear: true,
    maxDate: 0
  });
});