var baseUrl = $('meta[name=baseUrl]').attr("content");
var csrfToken = $('meta[name=csrf-token]').attr("content");

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

otherFilterId = (ids) => {

}
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