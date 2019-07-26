let optionCount = 0;
let priceCount = 0;

function optionDetails(id, type) {
    if (type === 'color') {
        return /* html */`
            <div class="form-row">
                <div class="col-2">
                    <input class="form-control form-control-sm" type="color">
                </div>
                <div class="col-10">
                    <input class="form-control form-control-sm" type="text" name="option-${id}" id="option-${id}">
                </div>
            </div>
        `;
    } else if (type === 'other') {
        return /* html */`
            <div class="form-row">
                <div class="col-12">
                    <input class="form-control form-control-sm" type="text" name="option-${id}" id="option-${id}">
                </div>
            </div>
        `;
    }
}

function optionForm(id, type) {
    return /*html*/`
    <div id="option-form-${id}" class="form-group">
    <label for="option-${id}">Option ${id+1}</label>
        <div class="form-row">
            <div class="col-3 col-md-2">
                <select class="custom-select custom-select-sm" name="option-type-${id}" id="option-type-${id}">
                    <option value="color">Color</option>
                    <option value="other">Size</option>
                </select>
            </div>
            <div id="option-details-${id}" class="col-9 col-md-6">
                ${optionDetails(id, type)}
            </div>
            <div class="col-6 col-md-2 py-1 py-md-0"><button type="button" id="save-option-button-${id}" class="btn btn-sm btn-block btn-outline-info">Save</button></div>
            <div class="col-6 col-md-2 py-1 py-md-0"><button type="button" id="delete-option-button-${id}" class="btn btn-sm btn-block btn-outline-danger">Delete</button></div>
        </div>
    </div>
    `;
}

function priceForm(id) {
    return /* html */`
        <div class="form-group">
            <label for="price-${id}">Price ${id+1}</label>
            <div class="form-row">
                <div class="col-6">
                    <input placeholder="Valid from" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="valid-from-${id}" name="valid_from_${id}">
                </div>
                <div class="col-6">
                    <input placeholder="Valid to" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="valid-to-${id}" name="valid_to_${id}">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <input class="form-control" type="text" name="currency_${id}" id="currency-${id}" placeholder="Currency">
                </div>
                <div class="col-6">
                    <input class="form-control" type="number" name="original_price_${id}" id="original-price-${id}" placeholder="Original price">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <input class="form-control" type="number" name="discounted_price_${id}" id="discounted-price-${id}" placeholder="Discounted price">
                </div>
                <div class="col-6">
                    <input class="form-control" type="number" name="discount_rate_${id}" id="discount-rate-${id}" placeholder="Discount rate">
                </div>
            </div>
        </div>
    `;
}

function addOption(id) {
    $('#options').append(optionForm(id, 'color'));
    $(`#option-type-${id}`).change(function(event) {
        console.log(event.target.value);
        $(`#option-details-${id}`).html(optionDetails(id, event.target.value));
    });
    $(`#delete-option-button-${id}`).click(function() {
        $(this).closest('.form-group').remove();
    });
    optionCount += 1;
}

function addPrice(id) {
    $('#prices').append(priceForm(id));
    priceCount += 1;
}

$(document).ready(function() {
    $('#add-option-button').click(function() {
        addOption(optionCount);
    });
    $('#add-price-button').click(function() {
        addPrice(priceCount);
    })
    addOption(0);
    addPrice(0);
});