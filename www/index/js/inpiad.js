var str;
str="                                                 �ͻ��� ��Ʈ�ʷν� �ּ��� ���ϰڽ��ϴ�..!!";
val1="���ǾƵ�[www.inpiad.com] �¤��������� �����鼭�� ��ü~~!!!!                                                ";
tmp=" "; cnt=0;
function ck() {	(cnt<str.length)?cnt++:cnt=0;	tmp=val1+str.substr(cnt,50); window.status=tmp;}
tid=setInterval(ck,100);
