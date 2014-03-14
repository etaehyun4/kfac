var file_num = 0;
var block_num = 0;
var max_file = 5;
var count = 0;

function initialize(){
    header = $('#header')[0];
    header.style.height = "1100px";
    CKEDITOR.replace('editor', {
    });
    if (file_num == 0)
        blockAdd();
}

function blockAdd(){
    if(file_num+block_num==max_file){
        alert('최대 '+max_file+'개의 파일을 업로드 할 수 있습니다.');
    }else{
        block_num=block_num+1;
        file_list = $('#file-list')[0];
        file = $('<input>', {'type':'file', 'name':'file'+block_num});
        file.appendTo(file_list);
        document.getElementsByName('file_num')[0].value=block_num;
    }
}

function blockDelete(){
    if(block_num>1){
        block_num=block_num-1;
        file_list = $('#file-list input[type=file]');
        file_list[block_num].remove();
        document.getElementsByName('file_num')[0].value=block_num;
    }
}

function fileDelete(obj){
    if (confirm('파일을 지우겠습니까?')){
        parent_div = obj.parentElement;
        conditions = {'file_id':parent_div.id};
        $.ajax({
            type: 'GET',
            url: '/only/board/'+board_num+'/file_delete/',
            data: conditions,
            dataType: 'json',
            success: $.proxy(function(){
                try{
                    parent_div.remove();
                    file_num = file_num-1;
                    if (file_num == 0)
                        blockAdd();
                }catch(e){
                }
            }, this)
        });
    }
}

function delSelect(){
    checkbox = $('input[type=checkbox');
    selected = checkbox.filter(function(k, obj){ return obj.checked; });
    count = 0;
    selected.each(function(k, obj){
        conditions = {'file_id':obj.id};
        $.ajax({
            type: 'GET',
            url: '/only/board/'+board_num+'/delete/',
            data: conditions,
            dataType: 'json',
            success: $.proxy(function(){
                try{
                    count++;
                    if (count == selected.length){
                        window.location.reload();
                    }
                }catch(e){
                }
            }, this)
        });
    });
}

function delArticle(article_id){
    conditions = {'article_id':article_id};
    $.ajax({
        type: 'GET',
        url: '/only/board/'+board_num+'/delete/',
        data: conditions,
        dataType: 'json',
        success: $.proxy(function(){
            try{
                window.location='/only/board/'+board_num+'/';
            }catch(e){
            }
        }, this)
    });
}
