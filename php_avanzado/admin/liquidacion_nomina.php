<style type="text/css">

.table-hideable td,
.table-hideable th {
  width: auto;
  transition: width .5s, margin .5s;
}

.btn-condensed.btn-condensed {
  padding: 0 5px;
  box-shadow: none;
}
</style>

<table class="table table-condensed table-hover table-bordered table-striped table-hideable">
  <thead>
    <tr>
      <th>
        Controller
        <button class="pull-right btn btn-default btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash" onclick="HideColumnIndex();"></i>  
        </button>
      </th>
      <th class="hide-col">
        Action
        <button class="pull-right btn btn-default btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash"></i>  
        </button>
      </th>
      <th>
        Type
        <button class="pull-right btn btn-default btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash"></i>  
        </button>
      </th>
      <th >
        Attributes
        <button class="pull-right btn btn-default btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash"></i>  
        </button>
      </th>
  </thead>
  <tbody>

    <tr>
      <td>Home</td>
      <td>Index</td>
      <td>ActionResult</td>
      <td>Authorize</td>
    </tr>

    <tr>
      <td>Client</td>
      <td>Index</td>
      <td>ActionResult</td>
      <td>Authorize</td>
    </tr>

    <tr>
      <td>Client</td>
      <td>Edit</td>
      <td>ActionResult</td>
      <td>Authorize</td>
    </tr>

  </tbody>
  <tfoot class="footer-restore-columns">
    <tr>
      <th colspan="4"><a class="restore-columns" href="#">Some columns hidden - click to show all</a></th>
    </tr>
  </tfoot>
</table>

<script type="text/javascript">
$(function() {
  // on init
  $(".table-hideable .hide-col").each(HideColumnIndex);

  // on click
  $('.hide-column').click(HideColumnIndex)

function HideColumnIndex() {
    var $el = $(this);
    var $cell = $el.closest('th,td')
    var $table = $cell.closest('table')

    // get cell location - https://stackoverflow.com/a/4999018/1366033
    var colIndex = $cell[0].cellIndex + 1;

    // find and hide col index
    $table.find("tbody tr, thead tr")
      .children(":nth-child(" + colIndex + ")")
      .addClass('hide-col');
      
    // show restore footer
    $table.find(".footer-restore-columns").show()
  }

  // restore columns footer
  $(".restore-columns").click(function(e) {
    var $table = $(this).closest('table')
    $table.find(".footer-restore-columns").hide()
    $table.find("th, td")
      .removeClass('hide-col');

  })

  $('[data-toggle="tooltip"]').tooltip({
    trigger: 'hover'
  })

})
</script>