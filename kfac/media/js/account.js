var JoinCheck = {
    initialize:function(){
        this.id = false;
        this.password = false;
        this.nick = false;
        $('#mb_birth').datepicker({
            changeMonth:true,
            changeYear:true,
        });
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

function reg_mb_nick_check(){
    var val = event.keyCode;
    if (!isHangul(val) && !isAlphabet(val) && !isNumber(val))
        event.returnValue=false;
}

function join_submit(){
    if (!JoinCheck.id){
        alert('아이디가 올바르지 않습니다.');
    }else if(!JoinCheck.password){
        var passwd = $('input[type=password]')[0].value;
        if (passwd.length<1)
            alert('비밀번호를 입력해 주세요.');
        else
            alert('비밀번호가 올바르지 않습니다.');
    }else if($('#reg_mb_email')[0].value.length<1){
        alert('이메일을 입력해 주세요.');
    }else if($('#mb_birth')[0].value.length<1){
        alert('생년월일을 입력해 주세요.');
    }else if($('#mb_sex')[0].selectedIndex == 0){
        alert('성별을 입력해 주세요.');
    }else if(document.getElementsByName('mb_hp')[0].value.length<1){
        alert('휴대폰 번호를 입력해 주세요.');
    }else if($('#profile_textarea')[0].value.length<1){
        alert('자기소개를 입력해 주세요.');
    }else{
        $('form')[0].submit();
    }
}
