$(document).ready(function() {

    $('#search').on('input', function() {
      var value = $(this).val().toLowerCase();
      $('#task-table tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $('#image-input').on('change', function() {
      var file = this.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });

  // Refresh table every 60 seconds
  setInterval(function() {
    $.ajax({
      url: 'update-table.php',
      success: function(data) {
        $('#task-table tbody').html(data);
      }
    });
  }, 60000);