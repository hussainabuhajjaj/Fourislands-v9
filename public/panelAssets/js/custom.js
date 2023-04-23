function getProductOptions(catagory_id) {
    $.ajax({
        url : window.location.origin +'/panel/catagory/'+catagory_id+'/products',
        success : function (response) {
            $('select[name=product_id]').html(response.data)
        }
    });
}
