// Ambil elemen2 yang dibutuhkan
const keyword = document.getElementById('keyword')
const tombolCari = document.getElementById('tombolCari')
const container = document.getElementById('container')

// Tambah event ketika keyword ditulis
keyword.addEventListener('keyup', () => {
    // console.log(keyword.value)

    // Buat Object AJAX
    const xhr = new XMLHttpRequest()

    // Cek kesiapan AJAX
    xhr.onreadystatechange = () => {
        if ( xhr.readyState == 4 & xhr.status == 200 ) {
            // console.log('ajax ok!')
            // console.log(xhr.responseText)
            container.innerHTML = xhr.responseText
        }
    }

    // Eksekusi AJAX
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true)
    xhr.send()
})