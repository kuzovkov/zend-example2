/*валидация формы*/
function validate(){
    var result = true;
    $('input.number').each(function(){
        var parent = $(this).parent();
        var re = /^[1-9][0-9]{0,}(\.[0-9]{0,})?$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Введите число!');
            }else{
                parent.append('<p class="novalid-message">Введите число!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        }  
    });
	
	$('input.number-order').each(function(){
        var parent = $(this).parent();
        var re = /^[1-9][0-9]{7}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Введите число!');
            }else{
                parent.append('<p class="novalid-message">Введите число!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        }  
    });
    
    $('input.time').each(function(){
        var parent = $(this).parent();
        var re = /^[0-9]{1,2}:[0-9]{1,2}(:[0-9]{1,2})?$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Неверный формат времени!');
            }else{
                parent.append('<p class="novalid-message">Неверный формат времени!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    $('input.passport').each(function(){
        var parent = $(this).parent();
        var re = /^[0-9]{4} [0-9]{6}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Неверный формат паспорта!');
            }else{
                parent.append('<p class="novalid-message">Неверный формат паспорта!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    $('input.city').each(function(){
        var parent = $(this).parent();
        var re = /^[a-zA-Zа-яА-я-]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Некорректное название!');
            }else{
                parent.append('<p class="novalid-message">Некорректное название!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    $('input.name').each(function(){
        var parent = $(this).parent();
        var re = /^[a-zA-Zа-яА-я-]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Некорректное имя!');
            }else{
                parent.append('<p class="novalid-message">Некорректное имя!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    $('input.login').each(function(){
        var parent = $(this).parent();
        var re = /^[a-zA-Z]{1,2}[a-zA-Z0-9]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Некорректный логин!');
            }else{
                parent.append('<p class="novalid-message">Некорректный логин!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
     $('input.email').each(function(){
        var parent = $(this).parent();
        var re = /\w[^\s\n]+@\w{1,}[.][^\s\n]{2,}/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Некорректный email!');
            }else{
                parent.append('<p class="novalid-message">Некорректный email!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    
     $('input.required').each(function(){
        var parent = $(this).parent();
        var re = /[.]+/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Поле обязательно!');
            }else{
                parent.append('<p class="novalid-message">Поле обязательно!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
     
     $('input.field_id').each(function(){
        var parent = $(this).parent();
        var re = /^[a-z]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Поле обязательно!');
            }else{
                parent.append('<p class="novalid-message">Поле обязательно!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
     
     $('input.field_name').each(function(){
        var parent = $(this).parent();
        var re = /^[a-zA-Zа-яА-Я0-9]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            result = false;
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').text('Поле обязательно!');
            }else{
                parent.append('<p class="novalid-message">Поле обязательно!</p>');
            } 
        }else{
            $(this).removeClass('novalid');
            if ( parent.children('p.novalid-message').length > 0 ){
                parent.children('p.novalid-message').remove();
            }
        } 
    });
    
    var passOk = true;
    var pass1 = $('#pass1');
    var pass2 = $('#pass2');
    var parent1 = pass1.parent();
    var parent2 = pass2.parent();
    if (pass1.val() == '' || pass2.val() == '' || pass1.val() != pass2.val() ){
        pass1.addClass('novalid');
        pass2.addClass('novalid');
        passOk = false;
        if ( parent1.children('p.novalid-message').length > 0 ){
            parent1.children('p.novalid-message').text('Пароль пустой или пароли не совпадают!');
        }else{
            parent1.append('<p class="novalid-message">Пароль пустой или пароли не совпадают!</p>');
        } 
    }else{
        pass1.removeClass('novalid');
        pass2.removeClass('novalid');
        if ( parent1.children('p.novalid-message').length > 0 ){
            parent1.children('p.novalid-message').remove();
        }
        passOk = true;
    } 
        
    
    return result && passOk;
}
