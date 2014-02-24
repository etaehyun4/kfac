
function view_cover(id, formid, nurl, divtype, cover)
{
	if(!id) id = "LayLoginForm";
	if(!divtype) divtype = true;
	if(!cover) cover = true;

	if(cover == true) {
		if(!top.document.getElementById('div_cover')){
			create_cover();
		}else{
			top.document.getElementById('div_cover').style.width = '100%';

			if(top.document.body.clientHeight > top.document.body.scrollHeight) top.document.getElementById('div_cover').style.height = '100%';
			else top.document.getElementById('div_cover').style.height = top.document.body.scrollHeight;
			top.document.getElementById('div_cover').style.display = 'block';
		}
	}

	var w = parseInt(top.document.getElementById(id).style.width);
	var h = parseInt(top.document.getElementById(id).style.height);
	var window_left = (top.document.body.clientWidth-w)/2;
	var window_top = (top.document.body.clientHeight-h)/2;
	this.Lw = h/2;

	if(id) {
		this.Lid = id;
		top.document.getElementById(id).style.display = '';
		top.document.getElementById(id).style.top = window_top;
		top.document.getElementById(id).style.left = window_left;
		if(divtype == true) CheckUIElements();
	}

//	if(formid) top.document.getElementById('formid').value = formid;
//	if(nurl) top.document.getElementById('nurl').value = nurl;

	//return true;
}

function CheckUIElements() 
{
    var yMenuFrom, yMenuTo, yButtonFrom, yButtonTo, yOffset, timeoutNextCheck;

    yMenuFrom   = parseInt (top.document.getElementById(this.Lid).style.top, 10);
    if ( window.document.layers ) 
        yMenuTo = top.pageYOffset + 0;
    else if ( window.document.getElementById ) 
        yMenuTo = top.document.body.scrollTop + parseInt('0');

    timeoutNextCheck = 500;

    if ( Math.abs (yButtonFrom - (yMenuTo + 152)) < 6 && yButtonTo < yButtonFrom )
     {
        setTimeout ("CheckUIElements()", timeoutNextCheck);
        return;
    }

    if ( yMenuFrom != yMenuTo )
    {
        yOffset = Math.ceil( Math.abs( yMenuTo - yMenuFrom ) / 10 );
        if ( yMenuTo < yMenuFrom )
            yOffset = -yOffset;

        top.document.getElementById(this.Lid).style.top = (parseInt(top.document.getElementById(this.Lid).style.top) + yOffset) + 20;

        timeoutNextCheck = 10;
    }

    setTimeout ("CheckUIElements()", timeoutNextCheck);
}

function cover_off(id){
	if(top.document.getElementById('div_cover')) top.document.getElementById('div_cover').style.display = 'none';
	if(id) top.document.getElementById(id).style.display = 'none';
}

function create_cover(){

	var color = '#FFFFFF';
	var opacity = '70';

	var cover_div = top.document.createElement('div');
	cover_div.style.position = 'absolute';
	cover_div.style.top = '0px';
	cover_div.style.left = '0px';
	cover_div.style.width = '100%';
	cover_div.style.zIndex = 1;
	if(top.document.body.offsetHeight > top.document.body.scrollHeight) cover_div.style.height = '100%';
	else cover_div.style.height = top.document.body.scrollHeight;
	cover_div.style.backgroundColor = color;
	cover_div.style.filter = 'alpha(opacity='+opacity+')';
	cover_div.id = 'div_cover';
	top.document.body.appendChild(cover_div);
}

