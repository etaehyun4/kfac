var file_num = 1;
var max_file = 5;

function initialize(){
    header = $('#header')[0];
    header.style.height = "1100px";
    CKEDITOR.replace('editor', {
    });
}

function fileAdd(){
    if(file_num==max_file){
        alert('최대 '+max_file+'개의 파일을 업로드 할 수 있습니다.');
    }else{
        file_num=file_num+1;
        file_list = $('#file-list')[0];
        file = $('<input>', {'type':'file', 'name':'file'+file_num});
        file.appendTo(file_list);
        document.getElementsByName('file_num')[0].value=file_num;
    }
}

function fileDelete(){
    if(file_num>1){
        file_num=file_num-1;
        file_list = $('#file-list')[0].children;
        file_list[file_num-1].remove();
        document.getElementsByName('file_num')[0].value=file_num;
    }
}
