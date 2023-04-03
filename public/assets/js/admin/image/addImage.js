function imageElement(imagesNumber){

  return imageHtmlElements = " <div class='row mb-4 col-12 col-md-4 col-lg-3 d-flex'>" +
      "<label for='image-" + imagesNumber + "' class='d-flex'><i class='fa fa-camera subImagesLabel'></i><img style='display: none' width='200px' height='300px' src=''" +
      "alt=''" +
      "class='imagechanger'></label>" +
      "<input type='file' name=image-" + imagesNumber + " class='image form-control mb-1 col-sm-12  d-none' id='image-" + imagesNumber + "';>" +
      "<input type='number' name=image-" + imagesNumber + "-sortOrder class='sortOrder form-control mx-auto' class='image' style='width: 200px' placeholder='Sort Order: 1(Example) ' id='image-" + imagesNumber + "-sortNumber' >" +
      "<div  class='btn btn-danger mx-auto mt-2 removeImage' style='width: 200px;' id='image-" + imagesNumber + "-sortNumber' >Remove Image</div>" +
      "</div>";


}
