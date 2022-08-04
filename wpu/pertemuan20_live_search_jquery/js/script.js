$('#keyword').on('keyup', () => {
    $('.loader').show()

    // ajax menggunakan $.get()
    $.get(`ajax/mahasiswa.php?keyword=${$('#keyword').val()}`, data => {
    // $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), data => {
        $('#container').html(data)
        $('.loader').hide()
        // console.log('hallo', data)
    })

    // ajax menggunakan load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val())

})



// Hilangkan tombol cari
// $('#tombolCari').hide()

// $(document).ready( () => {
//     // const keyword = document.getElementById('keyword')
//     // keyword.addEventListener('keyup', () => console.log('ok'))
    
//     $('#tombolCari').hide()    
//     $('#keyword').on('keyup', () => {
//         $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val())
//     })
// })