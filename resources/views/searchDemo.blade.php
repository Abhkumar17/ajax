<!DOCTYPE html>
<html>
<head>
    <title>Laravel JQuery UI Autocomplete Search Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
      span.email-ids {
      float: left;
      /* padding: 4px; */
      border: 1px solid #ccc;
      margin-right: 5px;
      padding-left: 10px;
      padding-right: 10px;
      margin-bottom: 5px;
      background: #f5f5f5;
      padding-top: 3px;
      padding-bottom: 3px;
      border-radius: 5px;
  }
  span.cancel-email {
      border: 1px solid #ccc;
      width: 18px;
      display: block;
      float: right;
      text-align: center;
      margin-left: 20px;
      border-radius: 49%;
      height: 18px;
      line-height: 15px;
      margin-top: 1px;    cursor: pointer;
  }
  .col-sm-12.email-id-row {
      border: 1px solid #ccc;
  }
  .col-sm-12.email-id-row input {
      border: 0px; outline:0px;
  }
  span.to-input {
      display: block;
      float: left;
      padding-right: 11px;
  }
  .col-sm-12.email-id-row {
      padding-top: 6px;
      padding-bottom: 7px;
      margin-top: 23px;
  }
  </style>
</head>
<body>
     
<div class="col-sm-12 email-id-row">
  <span class="to-input">To</span>
     <div class="all-mail">
         
     </div>
      <input type="text" name="email" class="enter-mail-id typeahead form-control" id="search" placeholder="Email" />
</div>
     
<script type="text/javascript">
    let selectedEmails = [];
    var path = "{{ route('autocomplete') }}";
  
    $( "#search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails.push(ui.item.value)
            console.log(selectedEmails)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails.splice(index, 1);
        }
        console.log(selectedEmails)
  $(this).parent().remove();
});
</script>
     
</body>
</html>