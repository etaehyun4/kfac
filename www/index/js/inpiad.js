var str;
str="                                                 귀사의 파트너로써 최선을 다하겠습니다..!!";
val1="인피아드[www.inpiad.com] 온ㆍ오프라인 원스톱서비스 업체~~!!!!                                                ";
tmp=" "; cnt=0;
function ck() {	(cnt<str.length)?cnt++:cnt=0;	tmp=val1+str.substr(cnt,50); window.status=tmp;}
tid=setInterval(ck,100);
