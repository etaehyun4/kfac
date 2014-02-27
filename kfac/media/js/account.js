var JoinCheck = {
    initialize:function(){
        id = false;
        password = false;
        name = false;
        nick = false;
        birth = false;
    }
}

function reg_mb_id_check(){
    var input_div = $('#reg_mb_id')[0];
    var status_p = $('#msg_mb_id')[0];
    var id = input_div.value;
    if (id.length < 3){
        status_p.innerHTML = '최소 3자가 필요합니다.';
        status_p.style.color = 'red';
        JoinCheck.id = false;
    }else if(id.replace(/[a-zA-Z0-9_]/g,'').length>0){
        status_p.innerHTML = '잘못된 기호가 포함되어있습니다.';
        status_p.style.color = 'red';
        JoinCheck.id = false;
    }else{
        conditions = {'id':id};
        $.ajax({
            type: 'GET',
            url: '/account/join/id_check/',
            data: conditions,
            dataType: 'json',
            success: $.proxy(function(check){
                try{
                    reg_mb_id_check_sub(check);
                }catch(e){
                }
            }, this)
        });
    }
}

function reg_mb_id_check_sub(check){
    var status_p = $('#msg_mb_id')[0];
    if(check){
        status_p.innerHTML = '이미 존재하는 아이디입니다.';
        status_p.style.color = 'red';
        JoinCheck.id = false;
    }else{
        status_p.innerHTML = '사용할 수 있는 아이디입니다.';
        status_p.style.color = 'blue';
        JoinCheck.id = true;
    }
}

function reg_mb_passwd_check(){
    var passwd = $('input[type=password]')[0].value;
    var re_passwd = $('input[type=password]')[1].value;
    var status_p = $('#msg_mb_passwd')[0];
    if (passwd.length < 6){
        status_p.innerHTML = '최소 6자가 필요합니다.';
        status_p.style.color = 'red';
        JoinCheck.password = false;
    }else if(passwd!=re_passwd){
        status_p.innerHTML = '패스워드가 일치하지 않습니다.';
        status_p.style.color = 'red';
        JoinCheck.password = false;
    }else{
        status_p.innerHTML = '';
        JoinCheck.password = true;
    }
}
