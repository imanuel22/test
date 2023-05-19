
$(function() {
    $('.Tcreat').on('click',function(){
        $('#judulModal').html('Tambah Data mahasiswa');
        $('.modal-footer button[type=submit]').html("Tambah Data")
    
    });
    
    $('.TModalEdit').on('click',function(){
        $('#judulModal').html('Ubah Data mahasiswa');
        $('.modal-footer button[type=submit]').html("Ubah Data");
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');



        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);

            }
        });
    
    });

});