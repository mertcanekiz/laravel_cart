function optionForm(id) {
    return `
    <div class="form-group">
    <label for="option-${id}">Option ${id+1}</label>
        <div class="form-row">
            <div class="col-3 col-md-2">
                <select class="custom-select custom-select-sm" name="option-type-${id}" id="option-type-${id}">
                    <option value="color">Color</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-9 col-md-6">
                <div class="form-row">
                    <div class="col-2">
                        <input class="form-control form-control-sm" type="color">
                    </div>
                    <div class="col-10">
                        <input class="form-control form-control-sm" type="text" name="option-${id}" id="option-${id}">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 py-1 py-md-0"><button type="button" class="btn btn-sm btn-block btn-outline-danger">Delete</button></div>
            <div class="col-6 col-md-2 py-1 py-md-0"><button type="button" class="btn btn-sm btn-block btn-outline-info">Save</button></div>
        </div>
    </div>
    `;
}

function addOption(id) {
    $('#options').append(optionForm(id));
}

$(document).ready(function() {
    addOption(0);
});