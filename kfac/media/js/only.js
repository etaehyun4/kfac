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
    checkbox = $('td input[type=checkbox]');
    selected = checkbox.filter(function(k, obj){ return obj.checked; });
    if (selected.length>0 && confirm('이 파일들을 모두 지우겠습니까?')){
        count = 0;
        selected.each(function(k, obj){
            conditions = {'article_id':obj.id};
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

function delComment(obj, comment_id){
    if (confirm('이 댓글을 삭제하시겠습니까?')){
        box = obj.parentElement.parentElement;
        $.ajax({
            type: 'GET',
            url: '/only/board/'+board_num+'/del_comment/?comment_id='+comment_id,
            dataType: 'json',
            success: $.proxy(function(){
                try{
                    box.remove();
                }catch(e){
                }
            }, this)
        });
    }
}

function cbToggle()
{
    $('td input[type=checkbox]').each(function(k, obj){
        obj.click();
    });
}

function showEmpty()
{
    var table = $('#board tbody')[0];
    var tr_div = $('<tr>');
    var td_div = $('<td>', {'colspan':6});
    var text = $('<p>',{'id':'empty'}).text('비어 있는 게시판입니다.');

    text.appendTo(td_div);
    td_div.appendTo(tr_div);
    tr_div.appendTo(table);
}

function addArticle(article){
    var table = $('#board tbody')[0];
    var tr_div = $('<tr>');
    if (article.order%2==0)
        tr_div.className='even_tr';
    tr_div.appendTo(table);


    var order_td = $('<td>');
    var order = $('<p>').text(article.order);
    order.appendTo(order_td);
    order_td.appendTo(tr_div);

    var notice_td = $('<td>');
    if (is_superuser){
        var notice_input = $('<input>', {'id':article.id, 'type':'checkbox'});
        notice_input.appendTo(notice_td);
    }
    notice_td.appendTo(tr_div);

    var title_td = $('<td>', {'class':'title'});
    var title = $('<p>', {'onclick':'window.location=\'/only/board/'+board_num+'/read/?article_num='+article.id+'\''}).text(article.title);
    title.appendTo(title_td);
    if (article.has_file){
        var file_img = $('<img>', {'src':'/media/image/only/icon_file.gif'});
        file_img.appendTo(title_td)
    }
    title_td.appendTo(tr_div);

    var writer_td=$('<td>', {'class':'writer'});
    var writer=$('<p>').text(article.author);
    writer.appendTo(writer_td);
    writer_td.appendTo(tr_div);

    var created_td=$('<td>');
    var created=$('<p>').text(article.created);
    created.appendTo(created_td);
    created_td.appendTo(tr_div);
    
    var read_td=$('<td>');
    var read=$('<p>').text(article.read);
    read.appendTo(read_td);
    read_td.appendTo(tr_div);
}

function unfoldPage(page){
    $('#board tbody tr').slice(1).each(function(k,obj){ obj.remove(); });
    conditions = {'page_num':page};
    $.ajax({
        type: 'GET',
        url: '/only/board/'+board_num+'/show_articles/',
        data: conditions,
        dataType: 'json',
        success: $.proxy(function(articles){
            try{
                articles.forEach(function(article){ addArticle(article); });
                adjustHeight();

                pages = $('#numbering p');
                pages.each(function(k, obj){
                    obj.style.color='#8292A0';
                    obj.style.cursor='pointer';
                    obj.onclick = function(){ unfoldPage(k+1); };
                });
                selected = pages[parseInt(page)-1];
                selected.style.color='black';
                selected.style.cursor='default';
                selected.onclick=function(){};
            }catch(e){
            }
        }, this)
    });
}

function adjustHeight(){
    $('#header')[0].style.height = $('#container')[0].clientHeight+'px';
}
