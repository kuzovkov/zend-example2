var App = {};

/*���������� ����� �� ����*/
$('.menu').click(function(){
    var menuId = this.id;
   App.switchMenu(menuId);
});

/*������������ ������� ����*/
App.switchMenu = function(menuId){
    $('li').removeClass('active');
    $('#'+menuId).parent().addClass('active');
}