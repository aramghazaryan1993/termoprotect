// Image View
$(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})

$(function () {
    // Summernote
    $('.summernote').summernote()
})

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
        reader.readAsDataURL(this.files[0]);

    });

    var ok = [];
    $(function () {
// Multiple images preview with JavaScript
        var previewImages = function (input, imgPreviewPlaceholder) {
            ok.push(input.files)
            if (input.files) {
                filesAmount = input.files.length;
                for (let i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    $(".preview-images-before-upload").remove()

                    reader.onload = function (event) {
                        let html = `<div  class="img__wrap img_index" style="padding: 10px 10px 10px 10px">
                                               <img src="` + event.target.result + `"  class="preview-images-before-upload img__img" style="max-height: 100px;">
                                                <p class="img__description">
                                                   <button  style="opacity:1!important" data-index="` + i + `" type="button" class="close remove_img" aria-label="Close">
                                                        <span style="color: red;font-size: 50px;margin-right: 10px" aria-hidden="true">×</span>
                                                    </button>
                                                </p>
                                            </div>`;


                        $(`${imgPreviewPlaceholder}`).append(html);
                    }
                    reader.readAsDataURL(input.files[i]);
                }

                filesAppended = Array.from(input.files)
            }

        };
        $('#images2').on('change', function () {
            previewImages(this, 'div.previews');
        });
    });





    $(document).on('click', ".remove_img",  function () {

        // Retrieve all previous elements that have the same class
        // and count them
        let blockImage = $(this).closest('.img_index')
        var prevElmts = blockImage.prevAll('.img_index'),
            numPrevElements = prevElmts.length;

        filesAppended.splice(numPrevElements, 1)

        blockImage.remove()
    })

    $(document).on('submit', '#news_form',function (e){

        if(filesAppended.length){
            let container = new DataTransfer();

            for (i in filesAppended) {
                container.items.add(filesAppended[i]);
            }

            document.querySelector('#images').files = container.files;
        }
    })
});

// Video Blog checkbox
var checkbox = document.querySelector('input[type="checkbox"]');
checkbox.addEventListener('change', function (e) {
    if(this.checked == true)
    {
        $('#upload_video').css('display','none')
        $('#youtube').css('display','block')
        $('#video_up').val('')

    }else{
        $('#upload_video').css('display','block')
        $('#youtube').css('display','none')
        $('#video_yo').val('')
    }
});








