document.getElementById("get-photo").onchange = function() {
    var img = document.getElementById("get-photo");
    var txt = document.getElementById("size-chk");
    var imgSize = img.files[0].size;
    var imgName = img.files[0].name;
    console.log(imgSize + " " + imgName);
    if(imgSize >= 16777216) {
        txt.innerHTML = "File size should be less than 16MiB";
        txt.style.color = "red";
        document.getElementById("create-post").reset();
    }else{
        txt.innerHTML = imgName;
        txt.style.color = "#334";
    }
}