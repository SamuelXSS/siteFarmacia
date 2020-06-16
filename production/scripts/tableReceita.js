$('#datatable-checkbox').DataTable( {
    "serverSide": true,
    "ajax": {
        "url": "./Receitas/post.php",
        "type": "POST"
    },
} );