
let filesAppended = []
$(document).ready(function (e) {

    $('#image').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {

            $("#preview-image-before-upload").remove()
            $("#data_img").remove()
            $("#preview").append(' <img id="preview-image-before-upload" src="' + e.target.result + '"\n' +
                '                             alt="preview image" style="max-height: 100px;">')
        }
        if(this.files[0]['type'] !== 'video/mp4')
        {
           reader.readAsDataURL(this.files[0]);
        }


    });

    // Preview Video
    document.getElementById("image").onchange = function(event) {
        let file = event.target.files[0];
        if(file['type'] == 'video/mp4')
        {
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").style.display = 'block';
            document.querySelector("video").src = blobURL;
        }

    }
});


