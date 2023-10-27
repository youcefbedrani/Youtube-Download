const urlField = document.querySelector(".field input"),
preview = document.querySelector(".preview-area"),
imgTag = preview.querySelector(".thumbnail"),
hiddeninp = document.querySelector(".hidden-ino");

urlField.onkeyup = () => {
    let imgUrl = urlField.value;
    preview.classList.add("active");
    
    if(imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1){//if entired video is yt video then 
        let vidID = imgUrl.split("v=")[1].substring(0, 11);
        let ytThumbUrl = `https://img.youtube.com/vi/${vidID}/maxresdefault.jpg`;
        console.log(ytThumbUrl);
        imgTag.src = ytThumbUrl;
    }else if(imgUrl.indexOf("https://youtu.be/") != -1){
        let vidID = imgUrl.split("be/")[1].substring(0, 11);
        let ytThumbUrl = `https://img.youtube.com/vi/${vidID}/maxresdefault.jpg`;
        console.log(ytThumbUrl);
        imgTag.src = ytThumbUrl;
    }else if(imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
        imgTag.src = imgUrl;
    }else {
        imgTag.src = "";
        preview.classList.remove("active");
    }
    hiddeninp.value = imgTag.src;
}