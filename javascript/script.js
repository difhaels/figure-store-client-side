// ambil item 
const key = document.querySelector("#key");
const search = document.querySelector("#search");
const items = document.querySelector("#items");


key.addEventListener('keyup', () => {
    // let keyword = key.value;
    // console.log(keyword);

    // buat object ajax
    let xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200){
            items.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/items.php?key='+key.value, true);
    xhr.send();
})