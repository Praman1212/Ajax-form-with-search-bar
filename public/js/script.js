$('#coach-info-form').on('submit',function(event){
    event.preventDefault();
    console.log('inside coach form')
    let form = $(this);
    let url = form.attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),

        success: function(response){
            console.log('OKK');
            console.log(response.data);
            if(response.url){
                history.pushState(null,'',response.url);
            }
            $('.coach-form-information').empty();
            
            $('.coach-form-information').append(response.data);

        },
        error: function(data){
            console.log(data);
            console.log('error');
        }
    });
});