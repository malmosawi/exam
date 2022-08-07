$(document).on('click','body',function(event){
    event.preventDefault();
    x=$(this).find('body').text();
    alert(x);
})


