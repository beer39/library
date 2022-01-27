
const xmlhttp = new XMLHttpRequest();
const url = "http://library/auth.php";

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(response) {
    let arr = JSON.parse(response);
    let out = '';

    for(let i = 0; i < arr.length; i++) {
        out += arr[i].name_stud
    }

    console.log(out)

}

