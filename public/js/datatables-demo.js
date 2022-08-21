// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable();
  
  $('.btn-tambah').append(function() {
    const url = $(location).attr('pathname');
    url.split("/").filter((url,index) => {
      if(index == 2){
        if(url == 'news'){
          $('#dataTable_filter').append(`<button type="button" class="btn btn-outline-primary ml-3" data-toggle="modal" data-target="#exampleModal">
              Tambah
            </button>`)
        } else {
          $('#dataTable_filter').append(`<a href="/dashboard/${url}/create"><button type="button" class="btn btn-outline-primary ml-3">Tambah</button></a>`);
        }
      }
    });
  })
});
