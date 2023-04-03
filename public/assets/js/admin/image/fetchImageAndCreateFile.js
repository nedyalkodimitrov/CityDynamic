async function fetchImageAndCreateFile(imagesNumber) {
    var images = [];

    for (let i = 0; i < imagesNumber; i++) {
        await new Promise((resolve) => {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", $("#imagechanger-" + i).attr("src"));
            xhr.responseType = "blob";
            xhr.onload = function () {
                var blob = xhr.response;
                var file = new File([blob], "image-" + i + ".jpg", {type: "image/jpeg"});
                images["image-" + i] = file;
                resolve();
            };
            xhr.send();
        });
    }
  return images;
}
