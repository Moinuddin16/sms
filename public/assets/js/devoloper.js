var baseUrl = $('meta[name=baseUrl]').attr("content");
var csrfToken = $('meta[name=csrf-token]').attr("content");
var currency = $('meta[name=currency]').attr("content");

// change fee status
changeFeesStatus = (id, status) => {
    
    successCallback = (data) => {
        toastr.success(data.message);
    }
    
    errorCallback = (data) => {
        toastr.error(data.message);
    }

    makeAPostAjaxRequest(baseUrl + '/admin/fees/change-status', { _token:csrfToken , id: id, status: status }, successCallback, errorCallback);  
}

// change student status
changeStudentStatus = (id, status) => {

    
    successCallback = (data) => {
        toastr.success(data.message);
    }
    
    errorCallback = (data) => {
        toastr.error(data.message);
    }

    makeAPostAjaxRequest(baseUrl + '/admin/student/change-status', { _token:csrfToken , id: id, status: status }, successCallback, errorCallback);  
}

filterTable = (otherFilters) => {
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })

    successCallback = (data) => {
       $('#inner_div').html("");
       $('#inner_div').html(data);
    }
    
    errorCallback = (data) => {
       
    }
    makeAPostAjaxRequest(baseUrl + '/admin/filter-fess-setup',{_token:csrfToken ,'data':JSON.stringify(FilterItem)}, successCallback, errorCallback); 
}

filterGenerateFeeBookTable = (otherFilters) => {
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })

    successCallback = (data) => {
       $('#inner_div').html("");
       $('#inner_div').html(data);
    }
    
    errorCallback = (data) => {
       
    }
    makeAPostAjaxRequest(baseUrl + '/admin/filter-generate-fess-book',{_token:csrfToken ,'data':JSON.stringify(FilterItem)}, successCallback, errorCallback); 
}

filterFeeBookTable = (currentFilter,otherFilters) => {
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })

    successCallback = (data) => {
        console.log(data);
       $('#inner_div').html("");
       $('#inner_div').html(data);
    }
    
    errorCallback = (data) => {
       
    }

    successCallback1 = (data) => {
        $('#filter_fees_type_id').find('option:not(:first)').remove();
        data.forEach(element => {
            $('#filter_fees_type_id').append('<option data-fees_id="'+element.fees+'" value="'+element.payment_type+'">'+element.fees_data.name+'</option>');
        });
     }
     
     errorCallback1 = (data) => {
        
     }

    let ignore = ['fees_type_id','payment_type_id'];
    let fees_type_id = $('#filter_fees_type_id').val();
    let payment_type_id = $('#filter_payment_type_id').val();
    makeAPostAjaxRequest(baseUrl + '/admin/filter-fess-book',{_token:csrfToken ,'data':JSON.stringify(FilterItem),'ignore':JSON.stringify(ignore),fees_type_id:fees_type_id,payment_type_id:payment_type_id}, successCallback, errorCallback); 
    if(currentFilter !== 'payment_type_id' && currentFilter !== 'fees_type_id'){
        makeAPostAjaxRequest(baseUrl + '/admin/get-fees-setups',{_token:csrfToken ,'data':JSON.stringify(FilterItem),'ignore':JSON.stringify(ignore)}, successCallback1, errorCallback1); 
    }
}

$(document).on('change','#filter_fees_type_id',function(){
    let paymentCategoryId = $(this).val();
     let feesId = $(this).find(':selected').data("fees_id");
    successCallback = (data) => {
        $('#filter_payment_type_id').find('option:not(:first)').remove();
        data.child.forEach(element => {
            $('#filter_payment_type_id').append('<option value="'+element.id+'">'+element.name+'</option>');
        });
        $totalAmount = $(".total_amount").text(`${currency} ${data.amount}`);
    
    }
    
    errorCallback = (data) => {       
    }

    makeAGetAjaxRequest(baseUrl + '/admin/get-payment-category/'+paymentCategoryId+'/'+feesId,'', successCallback, errorCallback); 
});
   

makeAPostAjaxRequest = (url, data, successCallback, errorCallback) => {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (data) {
            successCallback(data);
        },
        error: function (data) {
            errorCallback(data);
        }
    });
}

makeAGetAjaxRequest = (url, data, successCallback, errorCallback) => {
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            successCallback(data);
        },
        error: function (data) {
            errorCallback(data);
        }
    });
}