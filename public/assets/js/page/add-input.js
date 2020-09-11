$('.add-input').click(function() {
    $('.form-add-input').append(`<div class="input-group colorpickerinput mt-3">
                            <input type="text" name="name[]" class="form-control">
                            <div class="input-group-append">
                              <div class="input-group-text btn btn-danger" style="cursor: pointer" onclick="deleteInput(this)">
                                <i class="fas fa-times"></i>
                              </div>
                            </div>
                        </div>`);
});

function deleteInput(el) {
    $(el).parent().parent().remove();
}