var App = {};

/*обработчик клика на меню*/
$('.menu').click(function(){
    var menuId = this.id;
   App.switchMenu(menuId);
});

/*переключение пунктов меню*/
App.switchMenu = function(menuId){
    $('li').removeClass('active');
    $('#'+menuId).parent().addClass('active');
}