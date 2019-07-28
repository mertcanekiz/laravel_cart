let optionCount = 0;
let priceCount = 0;

function optionDetails(id, type) {
    if (type === 'color') {
        return /* html */`
            <div class="form-row">
                <input type="hidden" name="option_type[]" value="color">
                <div class="col-2">
                    <input class="form-control form-control-sm" name="option_value[]" type="color">
                </div>
                <div class="col-10">
                    <input class="form-control form-control-sm" type="text" id="option-${id}">
                </div>
            </div>
        `;
    } else if (type === 'size') {
        return /* html */`
            <div class="form-row">
                <div class="col-6">
                    <select class="form-control form-control-sm" name="option_type[]" id="size-type-${id}">
                        <option value="clothes">Clothes</option>
                        <option value="shoes">Shoes</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>
                <div class="col-6">
                    <input class="form-control form-control-sm" type="text" name="option_value[]" id="option-${id}">
                </div>
            </div>
        `;
    }
}

function optionForm(id, type) {
    return /*html*/`
    <div id="option-form-${id}" class="form-group">
    <h5>Option ${id+1}</h5>
        <div class="form-row">
            <div class="col-3 col-md-2">
                <select class="custom-select custom-select-sm" id="option-type-${id}">
                    <option value="color">Color</option>
                    <option value="size">Size</option>
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
            <h5>Price ${id+1}</h5>
            <div class="form-row">
                <div class="col-6">
                    <label for="valid-from-${id}" class="col-form-label">Valid from</label>
                    <input placeholder="Valid from" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="valid-from-${id}" name="valid_from[]">
                </div>
                <div class="col-6">
                    <label for="valid-to-${id}" class="col-form-label">Valid to</label>
                    <input placeholder="Valid to" class="form-control form-control-sm" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="valid-to-${id}" name="valid_to[]">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <label for="currency-${id}" class="col-form-label">Currency</label>
                    <input class="form-control form-control-sm" type="text" name="currency[]" id="currency-${id}" placeholder="Currency">
                </div>
                <div class="col-6">
                    <label for="original-price-${id}" class="col-form-label">Original price</label>
                    <input class="form-control form-control-sm" type="number" name="original_price[]" id="original-price-${id}" placeholder="Original price">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <label for="discounted-price-${id}" class="col-form-label">Discounted price</label>
                    <input class="form-control form-control-sm" type="number" name="discounted_price[]" id="discounted-price-${id}" placeholder="Discounted price">
                </div>
                <div class="col-6">
                    <label for="discount-rate-${id}" class="col-form-label">Discount rate</label>
                    <input class="form-control form-control-sm" type="number" name="discount_rate[]" id="discount-rate-${id}" placeholder="Discount rate">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <label for="price-options-${id}" class="col-form-label">Options</label>
                </div>
                <div class="col-6">
                    
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-6">
                    <select class="form-control" name="price_options[${id}][]" id="price-options-${id}" multiple>
                        <option value="blue">Blue</option>
                        <option value="small">Small</option>
                    </select>
                </div>
                <div class="col-6">
                    <button type="button" id="delete-price-button-${id}" class="btn btn-sm btn-block btn-outline-danger">Delete</button>
                    <button type="button" class="btn btn-sm btn-block btn-outline-info">Save</button>
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
    $(`#delete-price-button-${id}`).click(function() {
        $(this).closest('.form-group').remove();
    });
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